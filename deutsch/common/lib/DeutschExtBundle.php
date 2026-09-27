<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * A text package: translations per category, former German texts and the
 * rules for database content. Every entry is checked on load; entries whose
 * placeholders, tags or links differ from the English source are dropped and
 * listed in problems().
 */
final class DeutschExtBundle
{
    public const FORMAT = 1;

    public const CONTENT_MODES = ['whole', 'fragment'];

    /**
     * @param array<string, array<string, string>> $messages
     * @param array<string, array<string, string[]>> $history
     * @param array<string, array<int, array{field: string, mode: string, pairs: array<string, string>, history: array<string, string[]>}>> $content
     * @param string[] $problems
     */
    private function __construct(
        private string $language,
        private string $version,
        private array $messages,
        private array $history,
        private array $content,
        private array $problems
    ) {
    }

    public static function fromJson(string $json, string $language): self
    {
        try {
            $data = json_decode($json, true, 64, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new DeutschExtException('Die Textdatei ist kein gültiges JSON (' . $e->getMessage() . '). Lade sie erneut herunter; bis dahin gilt die installierte Fassung.');
        }
        if (!is_array($data)) {
            throw new DeutschExtException('Die Textdatei enthält kein Textpaket. Lade sie erneut herunter; bis dahin gilt die installierte Fassung.');
        }

        return self::fromArray($data, $language);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function fromArray(array $data, string $language): self
    {
        if (($data['format'] ?? null) !== self::FORMAT) {
            throw new DeutschExtException(sprintf(
                'Die Textdatei hat das Format %s, diese Erweiterung liest Format %d. Aktualisiere die Erweiterung, dann passt es wieder.',
                json_encode($data['format'] ?? null),
                self::FORMAT
            ));
        }
        if (($data['language'] ?? null) !== $language) {
            throw new DeutschExtException(sprintf(
                'Die Textdatei gilt für die Sprache „%s“, eingestellt ist „%s“. Prüfe den Sprachcode in den Einstellungen.',
                is_scalar($data['language'] ?? null) ? (string)$data['language'] : '?',
                $language
            ));
        }
        $version = is_string($data['version'] ?? null) ? $data['version'] : '';
        if (!preg_match('/^\d+\.\d+\.\d+$/', $version)) {
            throw new DeutschExtException('Die Textdatei hat keine gültige Versionsnummer (erwartet wie 1.2.3). Lade sie erneut herunter; bis dahin gilt die installierte Fassung.');
        }

        $problems = [];
        $messages = self::readMessages($data['messages'] ?? null, $problems);
        $history  = self::readHistory($data['history'] ?? [], $messages, $problems);
        $content  = self::readContent($data['content'] ?? [], $problems);

        return new self($language, $version, $messages, $history, $content, $problems);
    }

    /**
     * Version of a text file without loading it completely, for status pages.
     */
    public static function peekVersion(string $json): ?string
    {
        return preg_match('/"version"\s*:\s*"(\d+\.\d+\.\d+)"/', substr($json, 0, 2000), $m) ? $m[1] : null;
    }

    public function language(): string
    {
        return $this->language;
    }

    public function version(): string
    {
        return $this->version;
    }

    /**
     * @return array<string, array<string, string>>
     */
    public function messages(): array
    {
        return $this->messages;
    }

    /**
     * @return array<string, array<string, string[]>>
     */
    public function history(): array
    {
        return $this->history;
    }

    /**
     * @return array<int, array{field: string, mode: string, pairs: array<string, string>, history: array<string, string[]>}>
     */
    public function contentRules(string $table): array
    {
        return $this->content[$table] ?? [];
    }

    /**
     * @return string[]
     */
    public function problems(): array
    {
        return $this->problems;
    }

    public function has(string $category, string $message): bool
    {
        return isset($this->messages[$category][$message]);
    }

    public function messageCount(): int
    {
        return array_sum(array_map('count', $this->messages));
    }

    public function contentCount(): int
    {
        $count = 0;
        foreach ($this->content as $rules) {
            foreach ($rules as $rule) {
                $count += count($rule['pairs']);
            }
        }

        return $count;
    }

    /**
     * @param mixed $raw
     * @param string[] $problems
     *
     * @return array<string, array<string, string>>
     */
    private static function readMessages($raw, array &$problems): array
    {
        if (!is_array($raw)) {
            throw new DeutschExtException('Die Textdatei enthält keine Übersetzungen. Lade sie erneut herunter; bis dahin gilt die installierte Fassung.');
        }
        $messages = [];
        foreach ($raw as $category => $entries) {
            $category = (string)$category;
            if (!self::validCategory($category) || !is_array($entries)) {
                $problems[] = sprintf('Kategorie „%s“ übersprungen: ungültiger Name oder Aufbau.', mb_substr($category, 0, 60));
                continue;
            }
            foreach ($entries as $message => $translation) {
                $message = (string)$message;
                if ($message === '' || !is_string($translation) || $translation === '') {
                    $problems[] = sprintf('%s: leerer Eintrag übersprungen.', $category);
                    continue;
                }
                if (!DeutschExtTokens::same($message, $translation)) {
                    $problems[] = sprintf(
                        '%s: „%s“ übersprungen, Platzhalter, Tags oder Links weichen ab (%s).',
                        $category,
                        mb_substr($message, 0, 60),
                        DeutschExtTokens::difference($message, $translation)
                    );
                    continue;
                }
                $messages[$category][$message] = $translation;
            }
        }

        return $messages;
    }

    /**
     * @param mixed $raw
     * @param array<string, array<string, string>> $messages
     * @param string[] $problems
     *
     * @return array<string, array<string, string[]>>
     */
    private static function readHistory($raw, array $messages, array &$problems): array
    {
        if (!is_array($raw)) {
            return [];
        }
        $history = [];
        foreach ($raw as $category => $entries) {
            $category = (string)$category;
            if (!is_array($entries)) {
                continue;
            }
            foreach ($entries as $message => $olds) {
                $message = (string)$message;
                if (!isset($messages[$category][$message]) || !is_array($olds)) {
                    continue;
                }
                foreach ($olds as $old) {
                    if (is_string($old) && $old !== '' && DeutschExtTokens::same($message, $old)) {
                        $history[$category][$message][] = $old;
                    }
                }
            }
        }

        return $history;
    }

    /**
     * @param mixed $raw
     * @param string[] $problems
     *
     * @return array<string, array<int, array{field: string, mode: string, pairs: array<string, string>, history: array<string, string[]>}>>
     */
    private static function readContent($raw, array &$problems): array
    {
        if (!is_array($raw)) {
            return [];
        }
        $content = [];
        foreach ($raw as $table => $rules) {
            $table = (string)$table;
            if (!isset(DeutschExtSettings::CONTENT_TABLES[$table]) || !is_array($rules)) {
                $problems[] = sprintf('Inhalt für „%s“ übersprungen: unbekannte Tabelle.', mb_substr($table, 0, 60));
                continue;
            }
            foreach ($rules as $rule) {
                if (
                    !is_array($rule) ||
                    !is_string($rule['field'] ?? null) ||
                    !preg_match('/^[a-z_]{1,64}$/', $rule['field']) ||
                    !in_array($rule['mode'] ?? null, self::CONTENT_MODES, true) ||
                    !is_array($rule['pairs'] ?? null)
                ) {
                    $problems[] = sprintf('%s: Regel mit ungültigem Aufbau übersprungen.', $table);
                    continue;
                }
                $pairs = [];
                foreach ($rule['pairs'] as $en => $de) {
                    $en = (string)$en;
                    if ($en === '' || !is_string($de) || $de === '') {
                        continue;
                    }
                    if (!DeutschExtTokens::same($en, $de)) {
                        $problems[] = sprintf(
                            '%s.%s: „%s“ übersprungen, Platzhalter, Tags oder Links weichen ab (%s).',
                            $table,
                            $rule['field'],
                            mb_substr(strip_tags($en), 0, 60),
                            DeutschExtTokens::difference($en, $de)
                        );
                        continue;
                    }
                    $pairs[$en] = $de;
                }
                $history = [];
                foreach ((array)($rule['history'] ?? []) as $en => $olds) {
                    $en = (string)$en;
                    if (!isset($pairs[$en]) || !is_array($olds)) {
                        continue;
                    }
                    foreach ($olds as $old) {
                        if (is_string($old) && $old !== '' && DeutschExtTokens::same($en, $old)) {
                            $history[$en][] = $old;
                        }
                    }
                }
                $content[$table][] = [
                    'field'   => $rule['field'],
                    'mode'    => $rule['mode'],
                    'pairs'   => $pairs,
                    'history' => $history,
                ];
            }
        }

        return $content;
    }

    private static function validCategory(string $category): bool
    {
        return (bool)preg_match('/^[A-Za-z0-9_\-\.]{1,100}$/', $category);
    }
}
