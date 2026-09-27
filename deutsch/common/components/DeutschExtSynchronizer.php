<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * The check that keeps MailWizz German: loads the text package (shipped with
 * the extension or newer from GitHub), fills in and restores translations,
 * translates the database content, writes the language files and clears the
 * translation cache.
 */
final class DeutschExtSynchronizer
{
    public const TRIGGER_MANUAL  = 'von Hand';
    public const TRIGGER_CRON    = 'stündlicher Cronjob';
    public const TRIGGER_UPDATE  = 'nach einem MailWizz-Update';
    public const TRIGGER_CONSOLE = 'Konsole';
    public const TRIGGER_ENABLE  = 'Aktivierung';

    private const MUTEX = 'deutsch-ext-sync';

    /**
     * Folders skipped when the code is searched for new texts.
     */
    private const SCAN_SKIP = ['/messages/', '/runtime/', '/vendor/', '/node_modules/', '/assets/'];

    /**
     * Categories served from language files by Yii itself.
     */
    private const FILE_CATEGORIES = ['yii', 'zii'];

    /**
     * @param array<string, mixed> $settings normalized settings
     */
    public function __construct(
        private DeutschExt $extension,
        private array $settings,
        private DeutschExtRepository $repository
    ) {
    }

    /**
     * @param array{remote?: bool, scan?: bool, dry?: bool, trigger?: string} $options
     *
     * @return array<string, mixed>
     */
    public function run(array $options = []): array
    {
        $dry      = (bool)($options['dry'] ?? false);
        $language = (string)$this->settings['language'];
        $result   = [
            'ok'       => false,
            'dry'      => $dry,
            'trigger'  => (string)($options['trigger'] ?? self::TRIGGER_MANUAL),
            'time'     => time(),
            'language' => $language,
            'bundle'   => null,
            'remote'   => null,
            'scan'     => null,
            'messages' => [],
            'written'  => 0,
            'content'  => [],
            'files'    => ['language' => 0, 'framework' => 0],
            'problems' => [],
            'errors'   => [],
        ];

        if (!mutex()->acquire(self::MUTEX, 0)) {
            $result['errors'][] = 'Ein anderer Abgleich läuft gerade. Bitte versuch es gleich noch einmal.';

            return $result;
        }

        try {
            $this->repository->ensureSchema();

            if (!empty($options['remote'])) {
                $result['remote'] = $this->updateFromRemote($language, $dry);
            }

            $bundle = $this->loadBundle($language);
            $result['bundle'] = [
                'version'  => $bundle['bundle']->version(),
                'source'   => $bundle['source'],
                'messages' => $bundle['bundle']->messageCount(),
                'content'  => $bundle['bundle']->contentCount(),
            ];
            $result['problems'] = array_slice($bundle['bundle']->problems(), 0, 50);

            $current = $this->repository->translations($language);

            if (!empty($options['scan'])) {
                $result['scan'] = $this->scan($current, $bundle['bundle'], $language, $dry);
            }

            $touched = $this->syncMessages($bundle['bundle'], $current, $language, $dry, $result);
            $result['content'] = $this->syncContent($bundle['bundle'], $dry, $result['errors']);

            if (!$dry) {
                $result['files']['framework'] = $this->writeFrameworkFiles($bundle['bundle'], $language, $result['errors']);
                if ((int)$this->settings['write_language_files'] === 1) {
                    $result['files']['language'] = $this->writeLanguageFiles($language, $result['errors']);
                }
                $this->clearCache(array_keys($touched), $language);
            }

            $result['ok'] = $result['errors'] === [];
        } catch (Throwable $e) {
            Yii::log('Deutsch: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
            $result['errors'][] = $e instanceof DeutschExtException
                ? $e->getMessage()
                : 'Der Abgleich ist abgebrochen (' . $e->getMessage() . '). Die Datenbank ist unverändert; die Fehlerkennung steht im Protokoll der Anwendung.';
        } finally {
            mutex()->release(self::MUTEX);
        }

        if (!$dry) {
            $this->extension->setOption('state.last_run', $result['time']);
            $this->extension->setOption('state.last_result', json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
            $this->extension->setOption('state.mw_version', MW_VERSION);
        }

        return $result;
    }

    /**
     * @return array{bundle: DeutschExtBundle, source: string}
     */
    public function loadBundle(string $language): array
    {
        $candidates = [
            'mitgeliefert' => $this->shippedBundleFile($language),
            'GitHub'       => $this->downloadedBundleFile($language),
        ];
        $best   = null;
        $errors = [];
        foreach ($candidates as $source => $file) {
            if (!is_file($file)) {
                continue;
            }
            try {
                $bundle = DeutschExtBundle::fromJson((string)file_get_contents($file), $language);
            } catch (DeutschExtException $e) {
                $errors[] = $source . ': ' . $e->getMessage();
                continue;
            }
            if ($best === null || version_compare($bundle->version(), $best['bundle']->version(), '>')) {
                $best = ['bundle' => $bundle, 'source' => $source];
            }
        }
        if ($best === null) {
            throw new DeutschExtException(sprintf(
                'Für „%s“ gibt es kein gültiges Textpaket. %sLade die Erweiterung erneut hoch oder hol die Texte von GitHub.',
                $language,
                $errors === [] ? '' : implode(' ', $errors) . ' '
            ));
        }

        return $best;
    }

    /**
     * Texts without German translation that the package does not cover and
     * that are no own translation: the list under "Offene Texte".
     *
     * @return array<int, array{category: string, message: string, translation: ?string}>
     */
    public function openTexts(string $language): array
    {
        $own = $this->repository->own($language);
        try {
            $bundle = $this->loadBundle($language)['bundle'];
        } catch (DeutschExtException) {
            $bundle = null;
        }

        $open = [];
        foreach ($this->repository->untranslated($language) as $row) {
            if (
                in_array($row['category'], self::FILE_CATEGORIES, true) ||
                isset($own[$row['category']][$row['message']]) ||
                ($bundle !== null && $bundle->has($row['category'], $row['message']))
            ) {
                continue;
            }
            $open[] = $row;
        }

        return $open;
    }

    public function shippedBundleFile(string $language): string
    {
        return $this->extension->getPathOfAlias('data') . '/' . $language . '.json';
    }

    public function downloadedBundleFile(string $language): string
    {
        return $this->runtimeDir() . '/' . $language . '.json';
    }

    public function runtimeDir(): string
    {
        return Yii::getPathOfAlias('common.runtime') . '/deutsch-ext';
    }

    public function frameworkMessagesDir(): string
    {
        return $this->runtimeDir() . '/messages';
    }

    /**
     * @return array{status: string, message: string, version: ?string}
     */
    private function updateFromRemote(string $language, bool $dry): array
    {
        $this->extension->setOption('state.last_remote', time());
        try {
            $source = new DeutschExtRemoteSource(
                (string)$this->settings['remote_manifest_url'],
                (int)$this->settings['http_timeout_seconds'],
                (int)$this->settings['max_download_mb'] * 1048576,
                'MailWizz-Deutsch/' . $this->extension->version
            );
            $remote = $source->fetch($language);
            $bundle = DeutschExtBundle::fromJson($remote['json'], $language);

            $installed = null;
            try {
                $installed = $this->loadBundle($language)['bundle']->version();
            } catch (DeutschExtException) {
            }
            if ($installed !== null && !version_compare($bundle->version(), $installed, '>')) {
                return ['status' => 'aktuell', 'message' => sprintf('Die Texte sind aktuell (Version %s).', $installed), 'version' => $bundle->version()];
            }
            if (!$dry) {
                $this->writeFileAtomic($this->downloadedBundleFile($language), $remote['json']);
            }

            return [
                'status'  => 'neu',
                'message' => sprintf('Version %s von GitHub geladen%s.', $bundle->version(), $installed !== null ? ' (vorher ' . $installed . ')' : ''),
                'version' => $bundle->version(),
            ];
        } catch (DeutschExtException $e) {
            return ['status' => 'Fehler', 'message' => $e->getMessage(), 'version' => null];
        }
    }

    /**
     * Searches the MailWizz code for texts and adds unknown ones as sources, so
     * they show up in the list of open texts.
     *
     * @param array<string, array<string, array{ids: int[], translation: ?string}>> $current
     *
     * @return array{files: int, new: int, open: int} open: new texts neither the package nor an own translation covers
     */
    private function scan(array &$current, DeutschExtBundle $bundle, string $language, bool $dry): array
    {
        $scanner = new DeutschExtSourceScanner();
        $ownDir  = str_replace('\\', '/', (string)realpath($this->extension->getPathOfAlias()));
        $own     = $this->repository->own($language);
        $files   = 0;
        $new     = 0;
        $open    = 0;

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(MW_APPS_PATH, FilesystemIterator::SKIP_DOTS)
        );
        foreach ($iterator as $file) {
            $path = str_replace('\\', '/', (string)$file->getPathname());
            if (substr($path, -4) !== '.php' || ($ownDir !== '' && str_starts_with($path, $ownDir . '/'))) {
                continue;
            }
            foreach (self::SCAN_SKIP as $skip) {
                if (str_contains($path, $skip)) {
                    continue 2;
                }
            }
            $code = @file_get_contents($path);
            if (!is_string($code)) {
                continue;
            }
            $files++;
            foreach ($scanner->extract($code) as [$category, $message]) {
                if (in_array($category, self::FILE_CATEGORIES, true) || strlen($category) > 100 || isset($current[$category][$message])) {
                    continue;
                }
                $ids = $dry ? [] : [$this->repository->insertSource($category, $message)];
                $current[$category][$message] = ['ids' => $ids, 'translation' => null];
                $new++;
                if (!$bundle->has($category, $message) && !isset($own[$category][$message])) {
                    $open++;
                }
            }
        }

        return ['files' => $files, 'new' => $new, 'open' => $open];
    }

    /**
     * @param array<string, array<string, array{ids: int[], translation: ?string}>> $current
     * @param array<string, mixed> $result
     *
     * @return array<string, bool> touched categories
     */
    private function syncMessages(DeutschExtBundle $bundle, array $current, string $language, bool $dry, array &$result): array
    {
        $own  = $this->repository->own($language);
        $plan = (new DeutschExtMessagePlanner())->plan(
            $bundle->messages(),
            $bundle->history(),
            $current,
            $own,
            (int)$this->settings['protect_own'] === 1
        );
        $result['messages'] = $plan['stats'];
        $touched = [];
        if ($dry) {
            $result['written'] = count($plan['write']);

            return $touched;
        }

        $this->repository->transaction(function () use ($plan, $language, &$touched): void {
            foreach ($plan['write'] as $write) {
                if ($write['ids'] === []) {
                    $this->repository->storeTranslation($write['category'], $write['message'], $language, $write['translation']);
                } else {
                    $this->repository->saveTranslation($write['ids'], $language, $write['translation']);
                }
                $touched[$write['category']] = true;
            }
            foreach ($plan['capture'] as $capture) {
                $this->repository->saveOwn($language, $capture['category'], $capture['message'], $capture['translation'], 'erkannt');
            }
            foreach ($plan['release'] as $release) {
                $this->repository->deleteOwn($language, $release['category'], $release['message']);
            }
        });
        $result['written'] = count($plan['write']);

        return $touched;
    }

    /**
     * @param string[] $errors
     *
     * @return array<string, int> changed rows per table
     */
    private function syncContent(DeutschExtBundle $bundle, bool $dry, array &$errors): array
    {
        $applier = new DeutschExtContentApplier();
        $changed = [];
        foreach (DeutschExtSettings::CONTENT_TABLES as $table => $switch) {
            if ((int)$this->settings[$switch] !== 1) {
                continue;
            }
            $rules = $bundle->contentRules($table);
            if ($rules === []) {
                continue;
            }
            $fields = array_values(array_unique(array_column($rules, 'field')));
            try {
                if (!$this->repository->tableExists($table)) {
                    continue;
                }
                $rows = $this->repository->contentRows($table, $fields);
            } catch (Throwable $e) {
                $errors[] = sprintf('Die Tabelle „%s“ ließ sich nicht lesen (%s). Die übrigen Texte sind abgeglichen.', $table, $e->getMessage());
                continue;
            }
            $count = 0;
            $key   = DeutschExtRepository::CONTENT_KEYS[$table];
            foreach ($rows as $row) {
                $rowChanged = false;
                foreach ($fields as $field) {
                    if (!array_key_exists($field, $row)) {
                        continue;
                    }
                    $value = (string)$row[$field];
                    $new   = $value;
                    foreach ($rules as $rule) {
                        if ($rule['field'] === $field) {
                            $new = $applier->apply($new, $rule);
                        }
                    }
                    if ($new !== $value) {
                        if (!$dry) {
                            $this->repository->updateContent($table, (int)$row[$key], $field, $new);
                        }
                        $rowChanged = true;
                    }
                }
                if ($rowChanged) {
                    $count++;
                }
            }
            $changed[$table] = $count;
        }

        return $changed;
    }

    /**
     * Writes yii.php and zii.php for the framework messages (form errors,
     * pager, uploads). Yii reads them through the component coreMessages.
     *
     * @param string[] $errors
     */
    private function writeFrameworkFiles(DeutschExtBundle $bundle, string $language, array &$errors): int
    {
        $renderer = new DeutschExtLanguageFileRenderer();
        $messages = $bundle->messages();
        $own      = (int)$this->settings['protect_own'] === 1 ? $this->repository->own($language) : [];
        $written  = 0;
        foreach (self::FILE_CATEGORIES as $category) {
            $entries = array_merge($messages[$category] ?? [], $own[$category] ?? []);
            if ($entries === []) {
                continue;
            }
            $file = $this->frameworkMessagesDir() . '/' . $language . '/' . $category . '.php';
            try {
                if ($this->writeIfChanged($file, $renderer->render($category, $entries))) {
                    $written++;
                }
            } catch (DeutschExtException $e) {
                $errors[] = $e->getMessage();
            }
        }

        return $written;
    }

    /**
     * Mirrors the translations of the database into apps/common/messages, as
     * the language export of MailWizz does.
     *
     * @param string[] $errors
     */
    private function writeLanguageFiles(string $language, array &$errors): int
    {
        $renderer   = new DeutschExtLanguageFileRenderer();
        $dir        = Yii::getPathOfAlias('common.messages') . '/' . $language;
        $categories = [];
        foreach ($this->repository->translations($language) as $category => $entries) {
            foreach ($entries as $message => $row) {
                if ($row['translation'] !== null && $row['translation'] !== '') {
                    $categories[$category][$message] = $row['translation'];
                }
            }
        }
        $written = 0;
        foreach ($categories as $category => $entries) {
            if (!preg_match('/^[A-Za-z0-9_\-\.]{1,100}$/', (string)$category)) {
                continue;
            }
            try {
                if ($this->writeIfChanged($dir . '/' . $category . '.php', $renderer->render((string)$category, $entries))) {
                    $written++;
                }
            } catch (DeutschExtException $e) {
                $errors[] = $e->getMessage();

                break;
            }
        }

        return $written;
    }

    /**
     * @param string[] $categories
     */
    private function clearCache(array $categories, string $language): void
    {
        foreach ($categories as $category) {
            cache()->delete(CDbMessageSource::CACHE_KEY_PREFIX . '.messages.' . $category . '.' . $language);
        }
    }

    private function writeIfChanged(string $file, string $content): bool
    {
        if (is_file($file) && file_get_contents($file) === $content) {
            return false;
        }
        $this->writeFileAtomic($file, $content);

        return true;
    }

    private function writeFileAtomic(string $file, string $content): void
    {
        $dir = dirname($file);
        if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
            throw new DeutschExtException(sprintf('Der Ordner %s ließ sich nicht anlegen. Gib dem Webserver dort Schreibrechte und starte den Abgleich erneut.', $dir));
        }
        $tmp = $file . '.tmp-' . getmypid();
        if (@file_put_contents($tmp, $content) === false || !@rename($tmp, $file)) {
            @unlink($tmp);
            throw new DeutschExtException(sprintf('Die Datei %s ließ sich nicht schreiben. Gib dem Webserver dort Schreibrechte und starte den Abgleich erneut.', $file));
        }
        @chmod($file, 0664);
    }
}
