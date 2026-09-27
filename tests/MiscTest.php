<?php

return [
    'Sprachdateien sind gültiges PHP und liefern die Übersetzungen' => function () {
        $code = (new DeutschExtLanguageFileRenderer())->render('lists', ['Lists' => 'Listen', "It's {n}" => 'Es sind {n} \\ „x“']);
        $file = tempnam(sys_get_temp_dir(), 'deutsch');
        file_put_contents($file, $code);
        $data = include $file;
        unlink($file);
        assertSame(['It\'s {n}' => 'Es sind {n} \\ „x“', 'Lists' => 'Listen'], $data);
    },

    'der Scanner findet t()- und Yii::t()-Aufrufe' => function () {
        $code = <<<'PHP'
<?php
echo t('lists', 'Create new list');
echo Yii::t('yii', '{attribute} cannot be blank.');
echo t("app", "Hello \"there\"");
echo t('app', 'It\'s done');
echo t('app', "Hi $name");
echo $model->t('ignored');
echo format('app', 'ignored');
PHP;
        $found = (new DeutschExtSourceScanner())->extract($code);
        assertSame([
            ['lists', 'Create new list'],
            ['yii', '{attribute} cannot be blank.'],
            ['app', 'Hello "there"'],
            ['app', "It's done"],
        ], $found);
    },

    'die Adresse der Textdatei liegt neben der Paketbeschreibung' => function () {
        require_once dirname(__DIR__) . '/deutsch/common/components/DeutschExtRemoteSource.php';
        assertSame(
            'https://github.com/brightcolor/mailwizz-deutsch/releases/latest/download/de_de.json',
            DeutschExtRemoteSource::sibling('https://github.com/brightcolor/mailwizz-deutsch/releases/latest/download/manifest.json', 'de_de.json')
        );
        assertSame('https://example.org/texte/de_de.json', DeutschExtRemoteSource::sibling('https://example.org/texte/manifest.json?v=2', 'de_de.json'));
    },

    'die Ergebniszeilen nennen Zahlen, Inhalte und Fehler' => function () {
        $lines = DeutschExtResultPresenter::lines([
            'messages' => ['ergänzt' => 1200, 'aktualisiert' => 3, 'unverändert' => 5000],
            'content'  => ['start_page' => 42, 'tour_slideshow_slide' => 0],
            'files'    => ['language' => 122],
            'errors'   => ['Kaputt.'],
        ]);
        assertSame(['success', '1.200 Übersetzungen ergänzt; 3 Übersetzungen auf die neue Fassung aktualisiert; Inhalte übersetzt: 42 Hinweisseiten; 122 Sprachdateien geschrieben.'], $lines[0]);
        assertSame(['error', 'Kaputt.'], $lines[1]);
        assertSame([['success', 'Alles aktuell.']], DeutschExtResultPresenter::lines(['messages' => ['unverändert' => 10]]));
    },

    'Einzelne Treffer stehen in der Einzahl' => function () {
        $lines = DeutschExtResultPresenter::lines([
            'messages' => ['ergänzt' => 1, 'wiederhergestellt' => 1],
            'content'  => ['start_page' => 1, 'common_email_template' => 1],
            'files'    => ['language' => 1],
            'problems' => ['x'],
        ]);
        assertSame(['success', '1 Übersetzung ergänzt; 1 eigene Übersetzung wiederhergestellt; Inhalte übersetzt: 1 Hinweisseite, 1 System-Mail; 1 Sprachdatei geschrieben.'], $lines[0]);
        assertSame('warning', $lines[1][0]);
        assertSame(true, str_starts_with($lines[1][1], '1 Eintrag des Textpakets wurde übersprungen'));
    },

    'die Suchzeile sagt, ob neue Texte noch offen sind' => function () {
        assertSame('Code durchsucht: 2.414 Dateien, keine neuen Texte.', DeutschExtResultPresenter::scanLine(['files' => 2414, 'new' => 0, 'open' => 0]));
        assertSame('Code durchsucht: 12 Dateien, 1 neuer Text gefunden und aus dem Textpaket übersetzt.', DeutschExtResultPresenter::scanLine(['files' => 12, 'new' => 1, 'open' => 0]));
        assertSame('Code durchsucht: 12 Dateien, 1 neuer Text gefunden. Er wartet unter „Offene Texte“ auf deine Übersetzung.', DeutschExtResultPresenter::scanLine(['files' => 12, 'new' => 1, 'open' => 1]));
        assertSame('Code durchsucht: 12 Dateien, 5 neue Texte gefunden, 3 davon warten unter „Offene Texte“ auf deine Übersetzung.', DeutschExtResultPresenter::scanLine(['files' => 12, 'new' => 5, 'open' => 3]));
    },

    'VERSION und Erweiterung haben dieselbe Version' => function () {
        $root = dirname(__DIR__);
        preg_match('/public \$version = \'([^\']+)\';/', (string)file_get_contents($root . '/deutsch/DeutschExt.php'), $m);
        assertSame(trim((string)file_get_contents($root . '/VERSION')), $m[1] ?? null);
    },
];
