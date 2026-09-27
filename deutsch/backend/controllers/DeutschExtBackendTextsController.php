<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * Open texts (no German yet) and own translations: translate, keep English,
 * reset to the package text, export.
 */
class DeutschExtBackendTextsController extends ExtensionController
{
    /**
     * Session key for rejected inputs, shown again in their fields.
     */
    private const DRAFTS_STATE = 'deutsch_ext_drafts';

    /**
     * @return string
     */
    public function getViewPath()
    {
        return $this->getExtension()->getPathOfAlias('backend.views.texts');
    }

    /**
     * @return void
     * @throws CException
     */
    public function actionIndex()
    {
        /** @var DeutschExt $extension */
        $extension  = $this->getExtension();
        $settings   = $extension->getSettings();
        $language   = (string)$settings['language'];
        $repository = $extension->getRepository();
        $repository->ensureSchema();

        $tab      = request()->getQuery('tab') === 'own' ? 'own' : 'open';
        $category = trim((string)request()->getQuery('category', ''));
        $search   = trim((string)request()->getOriginalQuery('q', ''));
        $page     = max(1, (int)request()->getQuery('page', 1));
        $perPage  = (int)$settings['texts_per_page'];

        $synchronizer = $extension->getSynchronizer();
        if ($tab === 'open') {
            $all = $synchronizer->openTexts($language);
        } else {
            $all = array_map(fn (array $row): array => [
                'category'    => (string)$row['category'],
                'message'     => (string)$row['message'],
                'translation' => (string)$row['translation'],
                'origin'      => (string)$row['origin'],
            ], $repository->ownRows($language));
        }

        $categories = array_values(array_unique(array_column($all, 'category')));
        sort($categories, SORT_STRING);

        $rows = array_values(array_filter($all, function (array $row) use ($category, $search): bool {
            if ($category !== '' && $row['category'] !== $category) {
                return false;
            }
            if ($search === '') {
                return true;
            }

            return mb_stripos($row['message'], $search) !== false || mb_stripos((string)$row['translation'], $search) !== false;
        }));

        $total = count($rows);
        $pages = max(1, (int)ceil($total / $perPage));
        $page  = min($page, $pages);
        $rows  = array_slice($rows, ($page - 1) * $perPage, $perPage);

        $counts = [
            'open' => $tab === 'open' ? count($all) : count($synchronizer->openTexts($language)),
            'own'  => $tab === 'own' ? count($all) : $repository->countOwn($language),
        ];

        $drafts = (array)user()->getState(self::DRAFTS_STATE, []);
        user()->setState(self::DRAFTS_STATE, null);

        $this->setData([
            'pageMetaTitle'   => $this->getData('pageMetaTitle') . ' | Deutsche Übersetzung',
            'pageHeading'     => 'Deutsche Übersetzung',
            'pageBreadcrumbs' => [
                t('extensions', 'Extensions') => createUrl('extensions/index'),
                'Deutsche Übersetzung',
            ],
        ]);

        $this->render('index', compact('extension', 'language', 'tab', 'category', 'search', 'page', 'pages', 'total', 'rows', 'categories', 'counts', 'drafts'));
    }

    /**
     * @return void
     */
    public function actionSave()
    {
        /** @var DeutschExt $extension */
        $extension = $this->getExtension();
        $back      = $this->backUrl();
        if (!request()->getIsPostRequest()) {
            $this->redirect($back);
        }

        $language   = (string)$extension->getSettings()['language'];
        $repository = $extension->getRepository();
        $saved      = 0;
        $errors     = [];
        $drafts     = [];

        // MailWizz strips tags from getPost(); texts with links would lose them
        // and land under a wrong key. The token check below guards the raw input.
        foreach ((array)request()->getOriginalPost('rows', []) as $row) {
            if (!is_array($row)) {
                continue;
            }
            $category    = (string)($row['category'] ?? '');
            $message     = (string)($row['message'] ?? '');
            $translation = trim((string)($row['translation'] ?? ''));
            $keep        = !empty($row['keep']);

            if ($message === '' || !preg_match('/^[A-Za-z0-9_\-\.]{1,100}$/', $category)) {
                continue;
            }
            if ($keep) {
                $translation = $message;
            }
            if ($translation === '') {
                continue;
            }
            if (!DeutschExtTokens::same($message, $translation)) {
                $errors[] = sprintf(
                    '„%s“ ist nicht gespeichert: Platzhalter, Tags oder Links weichen vom englischen Text ab (%s). Übernimm sie genau so und speichere erneut.',
                    mb_substr(strip_tags($message), 0, 80),
                    DeutschExtTokens::difference($message, $translation)
                );
                $drafts[$category . "\0" . $message] = $translation;
                continue;
            }

            try {
                $repository->storeTranslation($category, $message, $language, $translation);
                $repository->saveOwn($language, $category, $message, $translation, $keep ? 'englisch' : 'editor');
                cache()->delete(CDbMessageSource::CACHE_KEY_PREFIX . '.messages.' . $category . '.' . $language);
                $saved++;
            } catch (Throwable $e) {
                Yii::log('Deutsch: ' . $e->getMessage(), CLogger::LEVEL_ERROR);
                $errors[] = sprintf('„%s“ ließ sich nicht speichern, weil die Datenbank den Eintrag abgelehnt hat. Versuch es erneut; bleibt der Fehler, steht die Ursache im Anwendungslog.', mb_substr(strip_tags($message), 0, 80));
                $drafts[$category . "\0" . $message] = $translation;
            }
        }

        // Rejected inputs come back into their fields, so nothing has to be typed twice.
        user()->setState(self::DRAFTS_STATE, $drafts === [] ? null : $drafts);

        if ($saved > 0) {
            notify()->addSuccess(sprintf(
                '%s gespeichert. %s ab sofort und %s bei Updates erhalten.',
                DeutschExtResultPresenter::count($saved, 'Text', 'Texte'),
                $saved === 1 ? 'Er gilt' : 'Sie gelten',
                $saved === 1 ? 'bleibt' : 'bleiben'
            ));
        }
        foreach ($errors as $error) {
            notify()->addError(html_encode($error));
        }
        if ($saved === 0 && $errors === []) {
            notify()->addInfo('Es gab keine neuen Eingaben zum Speichern.');
        }

        $this->redirect($back);
    }

    /**
     * Removes an own translation; the text of the package applies again.
     *
     * @return void
     */
    public function actionReset()
    {
        /** @var DeutschExt $extension */
        $extension = $this->getExtension();
        $back      = $this->backUrl();
        if (!request()->getIsPostRequest()) {
            $this->redirect($back);
        }

        $category = (string)request()->getOriginalPost('category', '');
        $message  = (string)request()->getOriginalPost('message', '');
        if ($message === '' || !preg_match('/^[A-Za-z0-9_\-\.]{1,100}$/', $category)) {
            notify()->addError('Der Text ließ sich nicht zuordnen. Lade die Seite neu und versuch es erneut.');
            $this->redirect($back);
        }

        $language   = (string)$extension->getSettings()['language'];
        $repository = $extension->getRepository();
        $repository->deleteOwn($language, $category, $message);

        $packaged = null;
        try {
            $bundle   = $extension->getSynchronizer()->loadBundle($language)['bundle'];
            $packaged = $bundle->messages()[$category][$message] ?? null;
        } catch (DeutschExtException) {
        }

        if ($packaged !== null) {
            $repository->storeTranslation($category, $message, $language, $packaged);
            cache()->delete(CDbMessageSource::CACHE_KEY_PREFIX . '.messages.' . $category . '.' . $language);
            notify()->addSuccess('Die eigene Übersetzung ist entfernt, es gilt wieder der Text aus dem Paket.');
        } else {
            notify()->addSuccess('Die eigene Übersetzung ist entfernt. Das Paket hat für diesen Text keine Fassung, deshalb steht er jetzt unter „Offene Texte“.');
            $repository->storeTranslation($category, $message, $language, $message);
            cache()->delete(CDbMessageSource::CACHE_KEY_PREFIX . '.messages.' . $category . '.' . $language);
        }

        $this->redirect($back);
    }

    /**
     * Own translations as JSON file, for a backup or to send them in.
     *
     * @return void
     */
    public function actionExport()
    {
        /** @var DeutschExt $extension */
        $extension = $this->getExtension();
        $language  = (string)$extension->getSettings()['language'];
        $data      = [
            'format'   => 1,
            'language' => $language,
            'exported' => date('c'),
            'messages' => $extension->getRepository()->own($language),
        ];

        request()->sendFile(
            'deutsch-eigene-uebersetzungen-' . date('Y-m-d') . '.json',
            (string)json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'application/json'
        );
    }

    /**
     * @return array
     */
    private function backUrl(): array
    {
        /** @var DeutschExt $extension */
        $extension = $this->getExtension();
        $params    = [];
        foreach (['tab', 'category', 'q', 'page'] as $key) {
            $value = request()->getOriginalPost('back_' . $key, request()->getOriginalQuery($key));
            if ($value !== null && $value !== '') {
                $params[$key] = (string)$value;
            }
        }

        return array_merge([$extension->getRoute('texts/index')], $params);
    }
}
