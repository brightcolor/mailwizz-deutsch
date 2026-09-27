<?php

$row = fn (?string $translation, array $ids = [7]): array => ['ids' => $ids, 'translation' => $translation];

return [
    'fehlende, leere und englische Übersetzungen werden ergänzt' => function () use ($row) {
        $plan = (new DeutschExtMessagePlanner())->plan(
            ['app' => ['Lists' => 'Listen', 'Save' => 'Speichern', 'Close' => 'Schließen', 'Open' => 'Öffnen']],
            [],
            ['app' => ['Lists' => $row(null), 'Save' => $row(''), 'Close' => $row('Close')]],
            [],
            true
        );
        assertSame(4, count($plan['write']));
        assertSame(3, $plan['stats']['ergänzt']);
        assertSame(1, $plan['stats']['neu']);
        assertSame([], $plan['write'][3]['ids']);
    },

    'gleiche Übersetzung bleibt, englisch gewollte auch' => function () use ($row) {
        $plan = (new DeutschExtMessagePlanner())->plan(
            ['app' => ['Lists' => 'Listen', 'Name' => 'Name']],
            [],
            ['app' => ['Lists' => $row('Listen'), 'Name' => $row('Name')]],
            [],
            true
        );
        assertSame([], $plan['write']);
        assertSame(2, $plan['stats']['unverändert']);
    },

    'eine frühere Fassung des Pakets wird aktualisiert' => function () use ($row) {
        $plan = (new DeutschExtMessagePlanner())->plan(
            ['app' => ['Delivery servers' => 'Versandserver']],
            ['app' => ['Delivery servers' => ['Zustellserver']]],
            ['app' => ['Delivery servers' => $row('Zustellserver')]],
            [],
            true
        );
        assertSame('Versandserver', $plan['write'][0]['translation']);
        assertSame('aktualisiert', $plan['write'][0]['reason']);
    },

    'fremde Übersetzungen werden geschützt und als eigene erkannt' => function () use ($row) {
        $plan = (new DeutschExtMessagePlanner())->plan(
            ['app' => ['Lists' => 'Listen']],
            [],
            ['app' => ['Lists' => $row('Verteilerlisten')]],
            [],
            true
        );
        assertSame([], $plan['write']);
        assertSame('Verteilerlisten', $plan['capture'][0]['translation']);
        assertSame(1, $plan['stats']['eigene erkannt']);
    },

    'ohne Schutz gilt das Paket überall' => function () use ($row) {
        $plan = (new DeutschExtMessagePlanner())->plan(
            ['app' => ['Lists' => 'Listen']],
            [],
            ['app' => ['Lists' => $row('Verteilerlisten')]],
            ['app' => ['Lists' => 'Meine Listen']],
            false
        );
        assertSame('Listen', $plan['write'][0]['translation']);
        assertSame('ersetzt', $plan['write'][0]['reason']);
        assertSame([], $plan['capture']);
    },

    'eigene Übersetzungen werden nach einem Update wiederhergestellt' => function () use ($row) {
        $plan = (new DeutschExtMessagePlanner())->plan(
            ['app' => ['Lists' => 'Listen']],
            [],
            ['app' => ['Lists' => $row('Lists'), 'Custom' => $row(null)]],
            ['app' => ['Lists' => 'Meine Listen', 'Custom' => 'Eigenes']],
            true
        );
        assertSame(2, count($plan['write']));
        assertSame('Meine Listen', $plan['write'][0]['translation']);
        assertSame('wiederhergestellt', $plan['write'][0]['reason']);
        assertSame('Eigenes', $plan['write'][1]['translation']);
    },

    'eine erneut in MailWizz geänderte eigene Übersetzung wird übernommen' => function () use ($row) {
        $plan = (new DeutschExtMessagePlanner())->plan(
            ['app' => ['Lists' => 'Listen']],
            [],
            ['app' => ['Lists' => $row('Unsere Listen')]],
            ['app' => ['Lists' => 'Meine Listen']],
            true
        );
        assertSame([], $plan['write']);
        assertSame('Unsere Listen', $plan['capture'][0]['translation']);
        assertSame(1, $plan['stats']['eigene geändert']);
    },

    'mehrere Quellzeilen für denselben Text bekommen alle die Übersetzung' => function () use ($row) {
        $plan = (new DeutschExtMessagePlanner())->plan(
            ['app' => ['Lists' => 'Listen']],
            [],
            ['app' => ['Lists' => $row(null, [3, 9])]],
            [],
            true
        );
        assertSame([3, 9], $plan['write'][0]['ids']);
    },

    'Übersetzungen mit kaputten Platzhaltern werden repariert, auch alte eigene' => function () use ($row) {
        $plan = (new DeutschExtMessagePlanner())->plan(
            ['messages' => ['See details {here}!' => 'Details findest du {here}.', 'Hello {name}' => 'Hallo {name}']],
            [],
            ['messages' => ['See details {here}!' => $row('Details finden Sie {hier}!'), 'Hello {name}' => $row('Hallo')]],
            ['messages' => ['Hello {name}' => 'Hallo']],
            true
        );
        assertSame(2, $plan['stats']['repariert']);
        assertSame('Details findest du {here}.', $plan['write'][0]['translation']);
        assertSame('Hallo {name}', $plan['write'][1]['translation']);
        assertSame([['category' => 'messages', 'message' => 'Hello {name}']], $plan['release']);
        assertSame([], $plan['capture']);
    },
];
