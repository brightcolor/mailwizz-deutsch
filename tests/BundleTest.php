<?php

$package = function (array $messages = [], array $content = [], array $history = [], array $over = []): array {
    return array_merge([
        'format'   => 1,
        'language' => 'de_de',
        'version'  => '2.3.4',
        'messages' => $messages ?: ['lists' => ['Lists' => 'Listen', 'Hello {name}' => 'Hallo {name}']],
        'history'  => $history,
        'content'  => $content,
    ], $over);
};

return [
    'ein gültiges Paket wird gelesen' => function () use ($package) {
        $bundle = DeutschExtBundle::fromArray($package(), 'de_de');
        assertSame('2.3.4', $bundle->version());
        assertSame(2, $bundle->messageCount());
        assertTrue($bundle->has('lists', 'Lists'));
        assertSame([], $bundle->problems());
    },

    'Einträge mit abweichenden Platzhaltern, Tags oder Links fliegen raus' => function () use ($package) {
        $bundle = DeutschExtBundle::fromArray($package(['lists' => [
            'Hello {name}'                  => 'Hallo',
            'Open <a href="[URL]">list</a>' => 'Öffne <a href="https://example.org">Liste</a>',
            'Save'                          => 'Speichern<script>alert(1)</script>',
            'Lists'                         => 'Listen',
            'Empty'                         => '',
        ]]), 'de_de');
        assertSame(1, $bundle->messageCount());
        assertSame(4, count($bundle->problems()));
    },

    'falsches Format, falsche Sprache und fehlende Version brechen mit Hinweis ab' => function () use ($package) {
        assertThrows(DeutschExtException::class, fn () => DeutschExtBundle::fromArray($package([], [], [], ['format' => 2]), 'de_de'), 'Format 2');
        assertThrows(DeutschExtException::class, fn () => DeutschExtBundle::fromArray($package(), 'fr_fr'), 'fr_fr');
        assertThrows(DeutschExtException::class, fn () => DeutschExtBundle::fromArray($package([], [], [], ['version' => 'neu']), 'de_de'), 'Versionsnummer');
        assertThrows(DeutschExtException::class, fn () => DeutschExtBundle::fromJson('{kaputt', 'de_de'), 'JSON');
    },

    'frühere Fassungen gelten nur mit gleichen Platzhaltern' => function () use ($package) {
        $bundle = DeutschExtBundle::fromArray($package([], [], ['lists' => ['Hello {name}' => ['Hallo, {name}!', 'Hallo Sie']]]), 'de_de');
        assertSame(['Hallo, {name}!'], $bundle->history()['lists']['Hello {name}']);
    },

    'Inhaltsregeln werden geprüft, unbekannte Tabellen übersprungen' => function () use ($package) {
        $bundle = DeutschExtBundle::fromArray($package([], [
            'start_page' => [
                ['field' => 'heading', 'mode' => 'whole', 'pairs' => ['Welcome' => 'Willkommen']],
                ['field' => 'content', 'mode' => 'magic', 'pairs' => []],
            ],
            'customer' => [['field' => 'email', 'mode' => 'whole', 'pairs' => ['a' => 'b']]],
        ]), 'de_de');
        assertSame(1, count($bundle->contentRules('start_page')));
        assertSame([], $bundle->contentRules('customer'));
        assertSame(2, count($bundle->problems()));
    },

    'die Version lässt sich ohne vollständiges Laden lesen' => function () use ($package) {
        assertSame('2.3.4', DeutschExtBundle::peekVersion(json_encode($package())));
        assertSame(null, DeutschExtBundle::peekVersion('{}'));
    },

    'das gebaute Paket im Repository ist fehlerfrei' => function () {
        $file = dirname(__DIR__) . '/translations/de_de.json';
        $bundle = DeutschExtBundle::fromJson((string)file_get_contents($file), 'de_de');
        assertSame([], $bundle->problems());
        assertTrue($bundle->messageCount() > 6000, 'zu wenige Übersetzungen');
        assertSame(trim((string)file_get_contents(dirname(__DIR__) . '/VERSION')), $bundle->version());
        foreach (array_keys(DeutschExtSettings::CONTENT_TABLES) as $table) {
            assertTrue($bundle->contentRules($table) !== [], 'keine Regeln für ' . $table);
        }
    },
];
