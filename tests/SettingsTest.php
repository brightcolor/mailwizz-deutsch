<?php

return [
    'die Vorgaben sind gültig' => function () {
        assertSame([], DeutschExtSettings::validate([]));
        assertSame([], DeutschExtSettings::validate(DeutschExtSettings::DEFAULTS));
    },

    'andere gültige Werte werden angenommen' => function () {
        $values = [
            'language'              => 'de',
            'sync_interval_hours'   => '12',
            'remote_enabled'        => '0',
            'remote_manifest_url'   => '',
            'remote_interval_hours' => 720,
            'http_timeout_seconds'  => 5,
            'max_download_mb'       => 100,
            'capture_apps'          => 'frontend, api',
            'texts_per_page'        => 10,
            'protect_own'           => 0,
        ];
        assertSame([], DeutschExtSettings::validate($values));
        $normalized = DeutschExtSettings::normalize($values);
        assertSame(12, $normalized['sync_interval_hours']);
        assertSame(0, $normalized['remote_enabled']);
        assertSame(['frontend', 'api'], DeutschExtSettings::captureApps($normalized['capture_apps']));
    },

    'Grenzen werden mit verständlicher Meldung geprüft' => function () {
        $errors = DeutschExtSettings::validate(['sync_interval_hours' => 0, 'texts_per_page' => 501, 'max_download_mb' => 'viel']);
        assertSame('Bitte gib eine ganze Zahl von 1 bis 168 ein.', $errors['sync_interval_hours']);
        assertSame('Bitte gib eine ganze Zahl von 10 bis 500 ein.', $errors['texts_per_page']);
        assertTrue(isset($errors['max_download_mb']));
    },

    'Sprachcode, Adresse, Schalter und Bereiche werden geprüft' => function () {
        $errors = DeutschExtSettings::validate([
            'language'            => 'Deutsch',
            'remote_manifest_url' => 'http://example.org/manifest.json',
            'protect_own'         => 2,
            'capture_apps'        => 'backend,kasse',
        ]);
        assertTrue(str_contains($errors['language'], 'de_de'));
        assertTrue(str_contains($errors['remote_manifest_url'], 'https://'));
        assertSame('Bitte wähle „Ja“ oder „Nein“.', $errors['protect_own']);
        assertTrue(str_contains($errors['capture_apps'], 'kasse'));
    },

    'ohne GitHub-Abruf ist keine Adresse nötig' => function () {
        assertSame([], DeutschExtSettings::validate(['remote_enabled' => 0, 'remote_manifest_url' => 'kaputt']));
        assertTrue(isset(DeutschExtSettings::validate(['remote_enabled' => 1, 'remote_manifest_url' => 'kaputt'])['remote_manifest_url']));
    },

    'jede Inhaltstabelle hat einen Schalter mit Vorgabe' => function () {
        foreach (DeutschExtSettings::CONTENT_TABLES as $table => $switch) {
            assertTrue(in_array($switch, DeutschExtSettings::SWITCHES, true), $switch . ' ist kein Schalter');
            assertSame(1, DeutschExtSettings::DEFAULTS[$switch]);
        }
    },
];
