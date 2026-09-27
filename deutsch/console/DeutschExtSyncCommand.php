<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Runs the check of the extension "Deutsch" from the console:
 *
 *   php apps/console/console.php deutsch-sync
 *   php apps/console/console.php deutsch-sync --remote=1 --scan=1
 *   php apps/console/console.php deutsch-sync --dry=1
 *
 * --remote=1 also loads the newest texts from GitHub, --scan=1 searches the
 * code for new English texts, --dry=1 only shows what would change.
 */
class DeutschExtSyncCommand extends ConsoleCommand
{
    /**
     * @var int
     */
    public $verbose = 1;

    /**
     * @param int $remote
     * @param int $scan
     * @param int $dry
     *
     * @return int
     */
    public function actionIndex($remote = 0, $scan = 0, $dry = 0)
    {
        $extension = extensionsManager()->getExtensionInstance('deutsch');
        if (!($extension instanceof DeutschExt) || !$extension->getIsEnabled()) {
            $this->stdout('Die Erweiterung „Deutsch“ ist nicht aktiviert. Aktiviere sie unter Erweitern → Erweiterungen und starte den Befehl erneut.');

            return 1;
        }

        $result = $extension->getSynchronizer()->run([
            'remote'  => (bool)$remote,
            'scan'    => (bool)$scan,
            'dry'     => (bool)$dry,
            'trigger' => DeutschExtSynchronizer::TRIGGER_CONSOLE,
        ]);

        $this->stdout(($result['dry'] ? 'Probelauf, nichts geschrieben' : 'Abgleich') . ' für ' . $result['language']);
        if (!empty($result['bundle'])) {
            $this->stdout(sprintf(
                'Textpaket %s (%s): %s Übersetzungen, %s Inhaltsstellen',
                $result['bundle']['version'],
                $result['bundle']['source'],
                DeutschExtResultPresenter::number((int)$result['bundle']['messages']),
                DeutschExtResultPresenter::number((int)$result['bundle']['content'])
            ));
        }
        if (!empty($result['remote'])) {
            $this->stdout('GitHub: ' . $result['remote']['message']);
        }
        if (!empty($result['scan'])) {
            $this->stdout(DeutschExtResultPresenter::scanLine((array)$result['scan']));
        }
        foreach ((array)$result['messages'] as $label => $count) {
            if ($count > 0) {
                $this->stdout(sprintf('  %s %8s', $this->pad((string)$label), DeutschExtResultPresenter::number((int)$count)));
            }
        }
        foreach ((array)$result['content'] as $table => $count) {
            $this->stdout(sprintf('  %s %8s geändert', $this->pad(DeutschExtResultPresenter::contentLabel((string)$table, 2)), DeutschExtResultPresenter::number((int)$count)));
        }
        if (!$result['dry']) {
            $this->stdout(sprintf('  %s %8s geschrieben', $this->pad('Sprachdateien'), DeutschExtResultPresenter::number((int)$result['files']['language'])));
            $this->stdout(sprintf('  %s %8s geschrieben', $this->pad('Framework-Dateien'), DeutschExtResultPresenter::number((int)$result['files']['framework'])));
        }
        foreach ((array)$result['problems'] as $problem) {
            $this->stdout('Übersprungen: ' . $problem);
        }
        foreach ((array)$result['errors'] as $error) {
            $this->stdout('Fehler: ' . $error);
        }

        return $result['ok'] ? 0 : 1;
    }

    /**
     * Pads by characters, so labels with umlauts line up.
     */
    private function pad(string $label): string
    {
        return $label . str_repeat(' ', max(0, 26 - mb_strlen($label)));
    }
}
