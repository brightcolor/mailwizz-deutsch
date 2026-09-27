<?php

$whole = ['field' => 'heading', 'mode' => 'whole', 'pairs' => ['Create your first email list' => 'Leg deine erste Liste an'], 'history' => ['Create your first email list' => ['Erstellen Sie Ihre erste Liste']]];
$fragment = ['field' => 'content', 'mode' => 'fragment', 'pairs' => [
    'Please follow the following url in order to reset your password:' => 'Bitte öffne diese Adresse, um dein Passwort zurückzusetzen:',
    'Click <a href="[OVERVIEW_URL]">here</a> to see the overview page!' => 'Zur Übersicht geht es <a href="[OVERVIEW_URL]">hier</a>.',
    'Hello [CUSTOMER_NAME],' => 'Hallo [CUSTOMER_NAME],',
    'Hello [CUSTOMER_NAME]' => 'Hallo [CUSTOMER_NAME]',
    'All rights reserved' => 'Alle Rechte vorbehalten',
], 'history' => []];

return [
    'ganzer Wert: das englische Original wird ersetzt, auch mit anderen Leerzeichen' => function () use ($whole) {
        $applier = new DeutschExtContentApplier();
        assertSame('Leg deine erste Liste an', $applier->apply('Create your first email list', $whole));
        assertSame('Leg deine erste Liste an', $applier->apply("  Create your first\n email list ", $whole));
    },

    'ganzer Wert: eigene Texte und die deutsche Fassung bleiben' => function () use ($whole) {
        $applier = new DeutschExtContentApplier();
        assertSame('Unsere Listen', $applier->apply('Unsere Listen', $whole));
        assertSame(" Leg deine erste Liste an\n", $applier->apply(" Leg deine erste Liste an\n", $whole));
        assertSame('Create your first email list today', $applier->apply('Create your first email list today', $whole));
    },

    'ganzer Wert: eine frühere Fassung wird aktualisiert' => function () use ($whole) {
        assertSame('Leg deine erste Liste an', (new DeutschExtContentApplier())->apply('Erstellen Sie Ihre erste Liste', $whole));
    },

    'Bausteine: Sätze samt Link werden ersetzt, der Rahmen bleibt' => function () use ($fragment) {
        $mail = '<title>Meine Firma</title><td>Hello [CUSTOMER_NAME],<br />
Please follow the following url in order to reset your password:<br />
Click <a href="[OVERVIEW_URL]">here</a>
to see the overview page!</td><span>© 2026 Meine Firma. All rights reserved</span>';
        $result = (new DeutschExtContentApplier())->apply($mail, $fragment);
        assertTrue(str_contains($result, 'Hallo [CUSTOMER_NAME],'));
        assertTrue(str_contains($result, 'Bitte öffne diese Adresse, um dein Passwort zurückzusetzen:'));
        assertTrue(str_contains($result, 'Zur Übersicht geht es <a href="[OVERVIEW_URL]">hier</a>.'));
        assertTrue(str_contains($result, '© 2026 Meine Firma. Alle Rechte vorbehalten'));
        assertTrue(str_contains($result, '<title>Meine Firma</title>'));
    },

    'Bausteine: der längere Baustein gewinnt und ein zweiter Lauf ändert nichts' => function () use ($fragment) {
        $applier = new DeutschExtContentApplier();
        $once = $applier->apply('Hello [CUSTOMER_NAME], and Hello [CUSTOMER_NAME]', $fragment);
        assertSame('Hallo [CUSTOMER_NAME], and Hallo [CUSTOMER_NAME]', $once);
        assertSame($once, $applier->apply($once, $fragment));
    },

    'Sonderzeichen im Baustein werden wörtlich genommen' => function () {
        $rule = ['field' => 'content', 'mode' => 'fragment', 'pairs' => ['Price (net) / month?' => 'Preis (netto) / Monat?'], 'history' => []];
        assertSame('x Preis (netto) / Monat? y', (new DeutschExtContentApplier())->apply('x Price (net) / month? y', $rule));
        assertSame('Price net month', (new DeutschExtContentApplier())->apply('Price net month', $rule));
    },
];
