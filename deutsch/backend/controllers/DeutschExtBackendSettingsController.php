<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Overview, settings and manual runs of the check.
 */
class DeutschExtBackendSettingsController extends ExtensionController
{
    /**
     * @return string
     */
    public function getViewPath()
    {
        return $this->getExtension()->getPathOfAlias('backend.views.settings');
    }

    /**
     * @return void
     * @throws CException
     */
    public function actionIndex()
    {
        /** @var DeutschExt $extension */
        $extension = $this->getExtension();
        $model     = new DeutschExtSettingsModel();

        if (request()->getIsPostRequest()) {
            $model->attributes = (array)request()->getPost($model->getModelName(), []);
            if ($model->save()) {
                notify()->addSuccess('Die Einstellungen sind gespeichert.');
                $this->redirect([$extension->getRoute('settings/index')]);
            }
            notify()->addError('Einige Angaben sind ungültig. Die Hinweise stehen an den Feldern.');
        }

        $settings = $model->toArray();
        $status   = $this->collectStatus($extension, $settings);

        $this->setData([
            'pageMetaTitle'   => $this->getData('pageMetaTitle') . ' | Deutsche Übersetzung',
            'pageHeading'     => 'Deutsche Übersetzung',
            'pageBreadcrumbs' => [
                t('extensions', 'Extensions') => createUrl('extensions/index'),
                'Deutsche Übersetzung' => $extension->createUrl('texts/index'),
                'Übersicht und Einstellungen',
            ],
        ]);

        $this->render('index', compact('extension', 'model', 'status'));
    }

    /**
     * @return void
     */
    public function actionSync()
    {
        $this->runCheck([]);
    }

    /**
     * @return void
     */
    public function actionRemote()
    {
        $this->runCheck(['remote' => true]);
    }

    /**
     * @return void
     */
    public function actionScan()
    {
        $this->runCheck(['scan' => true]);
    }

    /**
     * @param array{remote?: bool, scan?: bool} $options
     *
     * @return void
     */
    private function runCheck(array $options)
    {
        /** @var DeutschExt $extension */
        $extension = $this->getExtension();
        if (!request()->getIsPostRequest()) {
            notify()->addError('Diese Aktion startet über die Knöpfe auf der Übersichtsseite.');
            $this->redirect([$extension->getRoute('settings/index')]);
        }

        $result = $extension->getSynchronizer()->run($options + ['trigger' => DeutschExtSynchronizer::TRIGGER_MANUAL]);
        foreach (DeutschExtResultPresenter::lines($result) as [$type, $text]) {
            if ($type === 'error') {
                notify()->addError(html_encode($text));
            } elseif ($type === 'warning') {
                notify()->addWarning(html_encode($text));
            } elseif ($type === 'success') {
                notify()->addSuccess(html_encode($text));
            } else {
                notify()->addInfo(html_encode($text));
            }
        }

        $this->redirect([$extension->getRoute('settings/index')]);
    }

    /**
     * @param array<string, mixed> $settings
     *
     * @return array<string, mixed>
     */
    private function collectStatus(DeutschExt $extension, array $settings): array
    {
        $language     = (string)$settings['language'];
        $synchronizer = $extension->getSynchronizer();
        $repository   = $extension->getRepository();
        $status       = [
            'language'        => $language,
            'mailwizz'        => MW_VERSION,
            'extension'       => $extension->version,
            'bundle'          => null,
            'bundleError'     => '',
            'shipped'         => $this->bundleVersion($synchronizer->shippedBundleFile($language)),
            'downloaded'      => $this->bundleVersion($synchronizer->downloadedBundleFile($language)),
            'last'            => $extension->getLastResult(),
            'lastRun'         => (int)$extension->getOption('state.last_run', 0),
            'lastRemote'      => (int)$extension->getOption('state.last_remote', 0),
            'own'             => 0,
            'open'            => 0,
            'countError'      => '',
            'framework'       => false,
        ];

        try {
            $bundle = $synchronizer->loadBundle($language);
            $status['bundle'] = ['version' => $bundle['bundle']->version(), 'source' => $bundle['source']];
        } catch (DeutschExtException $e) {
            $status['bundleError'] = $e->getMessage();
        }

        try {
            $repository->ensureSchema();
            $status['own']  = $repository->countOwn($language);
            $status['open'] = count($synchronizer->openTexts($language));
        } catch (Throwable $e) {
            Yii::log('Deutsch: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
            $status['countError'] = 'Die Zahlen zu offenen und eigenen Texten fehlen, weil die Übersetzungstabellen nicht lesbar waren. Lade die Seite neu; bleibt der Hinweis, steht die Ursache im Anwendungslog.';
        }

        $core = app()->getCoreMessages();
        $status['framework'] = $core instanceof CPhpMessageSource && is_file($core->basePath . '/' . $language . '/yii.php');

        return $status;
    }

    private function bundleVersion(string $file): ?string
    {
        if (!is_file($file)) {
            return null;
        }

        return DeutschExtBundle::peekVersion((string)file_get_contents($file, false, null, 0, 2000));
    }
}
