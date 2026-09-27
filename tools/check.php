<?php
// Checks the German texts against the glossary (GLOSSAR.md): terms the
// glossary rules out are errors, a possible formal address is a warning.
//
//   php tools/check.php

declare(strict_types=1);

define('MW_PATH', __DIR__);

$root     = dirname(__DIR__);
$language = 'de_de';

// Term => preferred term. Matched on the German text without placeholders,
// tags, links and product names.
$forbidden = [
    '/\bZustellserver\w*/u'           => 'Versandserver',
    '/\bLieferserver\w*/u'            => 'Versandserver',
    '/\bBlacklist\w*/iu'              => 'Sperrliste',
    '/\bschwarze[nr]? Liste/iu'       => 'Sperrliste',
    '/\bUnterdrückungsliste\w*/iu'    => 'Ausschlussliste',
    '/\bVerteiler\w*/u'               => 'Liste',
    '/\bAussendung\w*/u'              => 'Kampagne',
    '/\bMailings?\b/u'                => 'Kampagne',
    '/\bTemplates?\b/u'               => 'Vorlage',
    '/\bQueue\b/u'                    => 'Warteschlange',
    '/\bAPI-Key\w*/iu'                => 'API-Schlüssel',
    '/\bPromo-?Codes?\b/iu'           => 'Gutscheincode',
    '/\bLanding Pages?\b/iu'          => 'Landingpage',
    '/\bPayment-?Gateways?\b/iu'      => 'Zahlungsanbieter',
    '/\bSubscriber\w*/iu'             => 'Abonnent',
    '/\bCustomers?\b(?!-Modell)/u'    => 'Kunde',
    '/\bCampaigns?\b(?!-Modell)/u'    => 'Kampagne',
    '/\babbestell\w*/iu'              => 'abmelden',
    '/\baustrag\w*/iu'                => 'abmelden',
    '/\bNutzer\w*/u'                  => 'Benutzer',
    '/\bPreispl\w*/iu'                => 'Tarif',
    '/\bEmails?\b/u'                  => 'E-Mail',
    '/(?<!E-)\bMail-Adresse/u'        => 'E-Mail-Adresse',
    '/\bBackend\b/u'                  => 'Adminbereich',
];
$formal   = '/\b(Sie|Ihr|Ihre|Ihren|Ihrem|Ihrer|Ihres|Ihnen)\b/u';
$products = ['Bulk Email Checker', 'Email List Verify', 'Elastic Email', 'Emailable', 'SendinBlue', 'Sendinblue', 'Google Authenticator', 'Content Builder', 'Email Template Builder', 'process-subscribers', 'send-campaigns'];

$strip = function (string $text) use ($products): string {
    $text = (string)preg_replace('/\{[^}]+\}|\[[A-Z0-9_]+\]|<[^>]+>|https?:\/\/\S+/', ' ', $text);

    return str_ireplace($products, ' ', $text);
};

$texts = [];
foreach (glob($root . '/source/messages/' . $language . '/*.php') as $file) {
    $category = basename($file, '.php');
    foreach ((array)include $file as $en => $de) {
        if ((string)$en !== (string)$de) {
            $texts[] = [$category, (string)$en, (string)$de];
        }
    }
}
foreach (glob($root . '/source/content/*.php') as $file) {
    $data = include $file;
    foreach ($data['rules'] as $rule) {
        foreach ($rule['pairs'] as $en => $de) {
            $texts[] = [$data['table'] . '.' . $rule['field'], (string)$en, (string)$de];
        }
    }
}

$errors   = 0;
$warnings = 0;
foreach ($texts as [$where, $en, $de]) {
    $plain = $strip($de);
    foreach ($forbidden as $pattern => $better) {
        if (preg_match($pattern, $plain, $m)) {
            $errors++;
            printf("FEHLER %s: „%s“ laut Glossar „%s“\n   %s\n", $where, $m[0], $better, mb_substr($de, 0, 160));
        }
    }
    if (preg_match($formal, $plain, $m)) {
        $warnings++;
        printf("PRÜFEN %s: Sie-Form? „%s“\n   %s\n", $where, $m[0], mb_substr($de, 0, 160));
    }
}

printf("%d Texte geprüft, %d Fehler, %d zu prüfen.\n", count($texts), $errors, $warnings);
exit($errors > 0 ? 1 : 0);
