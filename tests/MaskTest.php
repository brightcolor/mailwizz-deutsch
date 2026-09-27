<?php

require_once dirname(__DIR__) . '/tools/SecretLikeMask.php';

return [
    'Beispielschlüssel werden im JSON maskiert, der Inhalt bleibt gleich' => function () {
        $data   = ['servers' => ['i.e: pnSXPeHkmapf6gghCyfIDz8YJce9iu9fzyqLB123' => 'z. B.: pnSXPeHkmapf6gghCyfIDz8YJce9iu9fzyqLB123']];
        $masked = SecretLikeMask::json(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        assertSame(0, preg_match('/[A-Za-z0-9+\/]{32,}/', $masked));
        assertSame($data, json_decode($masked, true));
        assertSame($masked, SecretLikeMask::json($masked));
    },

    'Beispielschlüssel werden in PHP-Quellen geteilt, der Inhalt bleibt gleich' => function () {
        $data   = ['i.e: AiXXXYK4XyBLdXXXXXmDzlenWowza2zlXXXXXfCg9xxV' => 'z. B.: AiXXXYK4XyBLdXXXXXmDzlenWowza2zlXXXXXfCg9xxV'];
        $masked = SecretLikeMask::php('<?php return ' . var_export($data, true) . ';');
        assertSame(0, preg_match('/[A-Za-z0-9+\/]{32,}/', $masked));
        $file = tempnam(sys_get_temp_dir(), 'mask');
        file_put_contents($file, $masked);
        $loaded = include $file;
        unlink($file);
        assertSame($data, $loaded);
        assertSame($masked, SecretLikeMask::php($masked));
    },

    'Wörter, Klassennamen und Pfade bleiben unverändert' => function () {
        $text = json_encode(['Paymentgatewaystripesubscriptionsextbackendsettings', 'TransactionalEmails7DaysActivityWidget', 'https://github.com/brightcolor/mailwizz-deutsch/releases/latest/download/manifest.json'], JSON_UNESCAPED_SLASHES);
        assertSame($text, SecretLikeMask::json($text));
    },
];
