<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Turns the result of a check into short German sentences for the backend.
 */
final class DeutschExtResultPresenter
{
    /**
     * Content tables with their names in singular and plural.
     */
    public const CONTENT_LABELS = [
        'start_page'            => ['Hinweisseite', 'Hinweisseiten'],
        'tour_slideshow_slide'  => ['Tour-Folie', 'Tour-Folien'],
        'list_page_type'        => ['Vorlage für Listenseiten', 'Vorlagen für Listenseiten'],
        'common_email_template' => ['System-Mail', 'System-Mails'],
    ];

    private const MESSAGE_LABELS = [
        'neu'               => ['Text neu angelegt und übersetzt', 'Texte neu angelegt und übersetzt'],
        'ergänzt'           => ['Übersetzung ergänzt', 'Übersetzungen ergänzt'],
        'aktualisiert'      => ['Übersetzung auf die neue Fassung aktualisiert', 'Übersetzungen auf die neue Fassung aktualisiert'],
        'ersetzt'           => ['Übersetzung durch das Textpaket ersetzt', 'Übersetzungen durch das Textpaket ersetzt'],
        'wiederhergestellt' => ['eigene Übersetzung wiederhergestellt', 'eigene Übersetzungen wiederhergestellt'],
        'repariert'         => ['fehlerhafte Übersetzung repariert', 'fehlerhafte Übersetzungen repariert'],
        'eigene erkannt'    => ['eigene Übersetzung erkannt und geschützt', 'eigene Übersetzungen erkannt und geschützt'],
        'eigene geändert'   => ['eigene Übersetzung neu übernommen', 'eigene Übersetzungen neu übernommen'],
    ];

    /**
     * @param array<string, mixed> $result
     *
     * @return array<int, array{0: string, 1: string}> list of [type, text], type is success, info, warning or error
     */
    public static function lines(array $result): array
    {
        $lines = [];

        if (!empty($result['remote']['message'])) {
            $lines[] = [$result['remote']['status'] === 'Fehler' ? 'warning' : 'info', 'GitHub: ' . $result['remote']['message']];
        }

        if (!empty($result['scan'])) {
            $lines[] = ['info', self::scanLine((array)$result['scan'])];
        }

        $parts = [];
        foreach (self::MESSAGE_LABELS as $key => [$one, $many]) {
            $count = (int)($result['messages'][$key] ?? 0);
            if ($count > 0) {
                $parts[] = self::count($count, $one, $many);
            }
        }
        $content = [];
        foreach ((array)($result['content'] ?? []) as $table => $count) {
            if ((int)$count > 0) {
                $content[] = self::count((int)$count, ...(self::CONTENT_LABELS[$table] ?? [(string)$table, (string)$table]));
            }
        }
        if ($content !== []) {
            $parts[] = 'Inhalte übersetzt: ' . implode(', ', $content);
        }
        $files = (int)($result['files']['language'] ?? 0);
        if ($files > 0) {
            $parts[] = self::count($files, 'Sprachdatei', 'Sprachdateien') . ' geschrieben';
        }

        $prefix = !empty($result['dry']) ? 'Probelauf: ' : '';
        if ($parts !== []) {
            $lines[] = ['success', $prefix . implode('; ', $parts) . '.'];
        } elseif (empty($result['errors'])) {
            $lines[] = ['success', $prefix . 'Alles aktuell.'];
        }

        $problems = count((array)($result['problems'] ?? []));
        if ($problems > 0) {
            $lines[] = ['warning', sprintf(
                '%s des Textpakets %s übersprungen, weil Platzhalter, Tags oder Links abweichen. Die Liste steht unten auf der Seite.',
                self::count($problems, 'Eintrag', 'Einträge'),
                $problems === 1 ? 'wurde' : 'wurden'
            )];
        }

        foreach ((array)($result['errors'] ?? []) as $error) {
            $lines[] = ['error', (string)$error];
        }

        return $lines;
    }

    /**
     * @param array{files?: int, new?: int, open?: int} $scan
     */
    public static function scanLine(array $scan): string
    {
        $new  = (int)($scan['new'] ?? 0);
        $open = (int)($scan['open'] ?? $new);
        $text = 'Code durchsucht: ' . self::count((int)($scan['files'] ?? 0), 'Datei', 'Dateien') . ', ';

        if ($new === 0) {
            return $text . 'keine neuen Texte.';
        }
        $text .= self::count($new, 'neuer Text', 'neue Texte') . ' gefunden';
        if ($open === 0) {
            return $text . ' und aus dem Textpaket übersetzt.';
        }
        if ($open === $new) {
            return $text . '. ' . ($new === 1 ? 'Er wartet' : 'Sie warten') . ' unter „Offene Texte“ auf deine Übersetzung.';
        }

        return $text . ', ' . self::number($open) . ' davon ' . ($open === 1 ? 'wartet' : 'warten') . ' unter „Offene Texte“ auf deine Übersetzung.';
    }

    public static function contentLabel(string $table, int $count): string
    {
        [$one, $many] = self::CONTENT_LABELS[$table] ?? [$table, $table];

        return $count === 1 ? $one : $many;
    }

    /**
     * "1 Datei", "2.414 Dateien".
     */
    public static function count(int $count, string $one, string $many): string
    {
        return self::number($count) . ' ' . ($count === 1 ? $one : $many);
    }

    public static function number(int $value): string
    {
        return number_format($value, 0, ',', '.');
    }
}
