<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Deutsch
 *
 * German translation for MailWizz 3 in du form: translations, form messages
 * of the framework, hints of empty pages, tour, list page types and system
 * mails. A check restores everything an update overwrites, new English texts
 * can be translated in the backend and new versions of the texts come from
 * GitHub.
 *
 * @link https://github.com/brightcolor/mailwizz-deutsch
 */
class DeutschExt extends ExtensionInit
{
    /**
     * @var string
     */
    public $name = 'Deutsch';

    /**
     * @var string
     */
    public $description = 'Deutsche Übersetzung in Du-Form: Oberfläche, Formularmeldungen, Hinweise, Tour, Listenseiten und System-Mails. Stellt Texte nach Updates wieder her und holt neue Fassungen von GitHub.';

    /**
     * @var string
     */
    public $version = '1.0.1';

    /**
     * @var string
     */
    public $minAppVersion = '3.0.0';

    /**
     * @var string
     */
    public $author = 'bright color';

    /**
     * @var string
     */
    public $website = 'https://github.com/brightcolor/mailwizz-deutsch';

    /**
     * @var string
     */
    public $email = '';

    /**
     * @var bool
     */
    public $cliEnabled = true;

    /**
     * @var array
     */
    public $allowedApps = ['*'];

    /**
     * @var int
     */
    public $priority = -900;

    /**
     * @var DeutschExtRepository|null
     */
    private $_repository;

    /**
     * @inheritDoc
     */
    public function run()
    {
        $this->importClasses('common.lib.*');
        $this->importClasses('common.components.*');
        $this->importClasses('common.models.*');

        $settings = $this->getSettings();

        if ((int)$settings['framework_messages'] === 1) {
            $this->useFrameworkMessages((string)$settings['language']);
        }

        if ($this->isAppName('backend')) {
            $this->addUrlRules([
                ['settings/index', 'pattern' => 'extensions/deutsch/settings'],
                ['settings/<action>', 'pattern' => 'extensions/deutsch/settings/<action:\w+>'],
                ['texts/index', 'pattern' => 'extensions/deutsch/texts'],
                ['texts/<action>', 'pattern' => 'extensions/deutsch/texts/<action:\w+>'],
            ]);
            $this->addControllerMap([
                'settings' => ['class' => 'backend.controllers.DeutschExtBackendSettingsController'],
                'texts'    => ['class' => 'backend.controllers.DeutschExtBackendTextsController'],
            ]);
            hooks()->addFilter('backend_left_navigation_menu_items', $this->_addMenuItem(...));
        }

        if (is_cli()) {
            $this->registerConsoleCommand();
            hooks()->addAction('console_command_hourly_after_process', $this->_onHourly(...));
            hooks()->addAction('console_command_auto_update_after_process', $this->_onAutoUpdate(...));

            return;
        }

        if (
            (int)$settings['capture_missing'] === 1 &&
            in_array(MW_APP_NAME, DeutschExtSettings::captureApps((string)$settings['capture_apps']), true) &&
            app()->hasComponent('messages') &&
            app()->getMessages() instanceof CDbMessageSource
        ) {
            (new DeutschExtMissingCapture($this->getRepository(), (string)$settings['language']))->attach(app()->getMessages());
        }
    }

    /**
     * @return string
     */
    public function getPageUrl()
    {
        return $this->createUrl('settings/index');
    }

    /**
     * @return bool
     */
    public function beforeEnable()
    {
        $this->importClasses('common.lib.*');
        $this->importClasses('common.components.*');
        $this->getRepository()->ensureSchema();

        return true;
    }

    /**
     * @return void
     */
    public function afterEnable()
    {
        $this->importClasses('common.lib.*');
        $this->importClasses('common.components.*');
        $this->importClasses('common.models.*');
        $this->getSynchronizer()->run(['trigger' => DeutschExtSynchronizer::TRIGGER_ENABLE]);
    }

    /**
     * @return bool
     */
    public function update()
    {
        $this->importClasses('common.lib.*');
        $this->importClasses('common.components.*');
        $this->getRepository()->ensureSchema();

        return true;
    }

    /**
     * @return void
     */
    public function afterDelete()
    {
        $this->importClasses('common.components.*');
        $this->getRepository()->dropSchema();
        $this->removeAllOptions();
    }

    /**
     * @return array<string, mixed>
     */
    public function getSettings(): array
    {
        $this->importClasses('common.lib.*');
        $this->importClasses('common.models.*');

        return (new DeutschExtSettingsModel())->toArray();
    }

    public function getRepository(): DeutschExtRepository
    {
        if ($this->_repository === null) {
            $this->_repository = new DeutschExtRepository(db());
        }

        return $this->_repository;
    }

    public function getSynchronizer(): DeutschExtSynchronizer
    {
        return new DeutschExtSynchronizer($this, $this->getSettings(), $this->getRepository());
    }

    /**
     * Result of the last check, as stored after the run.
     *
     * @return array<string, mixed>
     */
    public function getLastResult(): array
    {
        $raw = (string)$this->getOption('state.last_result', '');
        $data = $raw === '' ? null : json_decode($raw, true);

        return is_array($data) ? $data : [];
    }

    /**
     * Runs the check from the hourly cron job when it is due, right away after
     * a MailWizz update and with the GitHub download when that is due.
     *
     * @return void
     */
    public function _onHourly(): void
    {
        try {
            $settings       = $this->getSettings();
            $now            = time();
            $versionChanged = (string)$this->getOption('state.mw_version', '') !== MW_VERSION;
            $syncDue        = $now - (int)$this->getOption('state.last_run', 0) >= (int)$settings['sync_interval_hours'] * 3600 - 300;
            $remoteDue      = (int)$settings['remote_enabled'] === 1
                && $now - (int)$this->getOption('state.last_remote', 0) >= (int)$settings['remote_interval_hours'] * 3600 - 300;

            if (!$syncDue && !$versionChanged && !$remoteDue) {
                return;
            }

            $this->getSynchronizer()->run([
                'remote'  => $remoteDue,
                'scan'    => $versionChanged && (int)$settings['scan_after_update'] === 1,
                'trigger' => $versionChanged ? DeutschExtSynchronizer::TRIGGER_UPDATE : DeutschExtSynchronizer::TRIGGER_CRON,
            ]);
        } catch (Throwable $e) {
            Yii::log('Deutsch: stündliche Prüfung fehlgeschlagen: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
        }
    }

    /**
     * @return void
     */
    public function _onAutoUpdate(): void
    {
        try {
            $settings = $this->getSettings();
            $this->getSynchronizer()->run([
                'scan'    => (int)$settings['scan_after_update'] === 1,
                'trigger' => DeutschExtSynchronizer::TRIGGER_UPDATE,
            ]);
        } catch (Throwable $e) {
            Yii::log('Deutsch: Prüfung nach dem Update fehlgeschlagen: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
        }
    }

    /**
     * @param array $items
     *
     * @return array
     */
    public function _addMenuItem(array $items): array
    {
        if (!isset($items['extend']['items']) || !is_array($items['extend']['items'])) {
            return $items;
        }
        $route  = app()->getController() ? (string)app()->getController()->getRoute() : '';
        $prefix = $this->getRoutePrefix();

        $items['extend']['items'][] = [
            'url'    => [$this->getRoute('texts/index')],
            'label'  => 'Deutsche Übersetzung',
            'active' => str_starts_with($route, $prefix),
        ];
        if (isset($items['extend']['active']) && is_array($items['extend']['active'])) {
            $items['extend']['active'][] = rtrim($prefix, '_');
        }

        return $items;
    }

    /**
     * Framework messages (form errors, pager, uploads) come from language
     * files the check writes, because Yii's own folder has no files for
     * language codes with a region such as de_de.
     */
    private function useFrameworkMessages(string $language): void
    {
        $candidates = [
            Yii::getPathOfAlias('common.runtime') . '/deutsch-ext/messages',
            (string)Yii::getPathOfAlias('common.messages'),
        ];
        foreach ($candidates as $dir) {
            if (is_file($dir . '/' . $language . '/yii.php')) {
                app()->setComponent('coreMessages', [
                    'class'    => 'CPhpMessageSource',
                    'basePath' => $dir,
                ]);

                return;
            }
        }
    }

    private function registerConsoleCommand(): void
    {
        $app = app();
        if (!($app instanceof CConsoleApplication)) {
            return;
        }
        $command = ['class' => $this->getPathAlias('console.DeutschExtSyncCommand')];
        $app->commandMap['deutsch-sync'] = $command;
        if ($app->getCommandRunner() !== null) {
            $app->getCommandRunner()->commands['deutsch-sync'] = $command;
        }
    }
}
