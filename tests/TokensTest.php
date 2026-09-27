<?php

return [
    'gleiche Platzhalter in anderer Reihenfolge passen' => function () {
        assertTrue(DeutschExtTokens::same('From {start} to {end} of [LIST_NAME]', '[LIST_NAME]: {end} bis {start}'));
        assertTrue(DeutschExtTokens::same('%s of %d', '%d von %s'));
    },

    'fehlende oder zusätzliche Platzhalter fallen auf' => function () {
        assertTrue(!DeutschExtTokens::same('Hello {name}', 'Hallo'));
        assertTrue(!DeutschExtTokens::same('Hello', 'Hallo {name}'));
        assertTrue(!DeutschExtTokens::same('{n} of {n}', '{n} von'));
        assertSame('fehlt: {name}', DeutschExtTokens::difference('Hello {name}', 'Hallo'));
    },

    'Tags und Links müssen gleich bleiben' => function () {
        $en = 'Click <a href="[URL]">here</a>';
        assertTrue(DeutschExtTokens::same($en, 'Klick <a href="[URL]">hier</a>'));
        assertTrue(!DeutschExtTokens::same($en, 'Klick <a href="https://example.org">hier</a>'));
        assertTrue(!DeutschExtTokens::same('Text', 'Text<script>alert(1)</script>'));
        assertTrue(!DeutschExtTokens::same('See https://www.mailwizz.com/', 'Siehe https://example.org/'));
    },

    'die Fehlerbeschreibung nennt Tags in der Reihenfolge des Textes' => function () {
        assertSame(
            'fehlt: <a href="{url}"> </a>',
            DeutschExtTokens::difference('Open the <a href="{url}">report</a>.', 'Öffne den Bericht.')
        );
        assertSame(
            'fehlt: {name}; zu viel: {Name}',
            DeutschExtTokens::difference('Hello {name}', 'Hallo {Name}')
        );
    },

    'Wörter in eckigen Klammern mit Leerzeichen sind kein Platzhalter' => function () {
        assertTrue(DeutschExtTokens::same('[TEST TEMPLATE] {name}', '[TEST-VORLAGE] {name}'));
    },
];
