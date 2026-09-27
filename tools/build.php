<?php
// Builds the text package from the sources:
//   source/messages/<language>/*.php  translations per category (MailWizz language files)
//   source/history/messages.php        former German texts per category and English text
//   source/content/*.php               texts MailWizz keeps as database content
// and writes translations/<language>.json, translations/manifest.json and the
// copy shipped with the extension (deutsch/data/<language>.json).
//
//   php tools/build.php          build
//   php tools/build.php --check  only check that the committed files match the sources

declare(strict_types=1);

define('MW_PATH', __DIR__);

$root     = dirname(__DIR__);
$language = 'de_de';
$check    = in_array('--check', $argv, true);

foreach (['DeutschExtException', 'DeutschExtTokens', 'DeutschExtSettings', 'DeutschExtBundle'] as $class) {
    require $root . '/deutsch/common/lib/' . $class . '.php';
}
require __DIR__ . '/SecretLikeMask.php';

$fail = function (string $message): void {
    fwrite(STDERR, $message . "\n");
    exit(1);
};

$version = trim((string)file_get_contents($root . '/VERSION'));
if (!preg_match('/^\d+\.\d+\.\d+$/', $version)) {
    $fail('VERSION enthält keine Versionsnummer wie 1.2.3.');
}
if (!preg_match('/public \$version = \'([^\']+)\';/', (string)file_get_contents($root . '/deutsch/DeutschExt.php'), $m) || $m[1] !== $version) {
    $fail(sprintf('DeutschExt::$version (%s) passt nicht zu VERSION (%s). Zieh beide gleich.', $m[1] ?? '?', $version));
}

$messages = [];
foreach (glob($root . '/source/messages/' . $language . '/*.php') as $file) {
    $category = basename($file, '.php');
    $data     = include $file;
    if (!is_array($data)) {
        $fail("{$file} liefert kein Array.");
    }
    ksort($data, SORT_STRING);
    $messages[$category] = $data;
}
ksort($messages, SORT_STRING);

$history = include $root . '/source/history/messages.php';
if (!is_array($history)) {
    $fail('source/history/messages.php liefert kein Array.');
}

$content = [];
foreach (glob($root . '/source/content/*.php') as $file) {
    $data = include $file;
    if (!is_array($data) || !isset($data['table'], $data['rules'])) {
        $fail("{$file} hat nicht den Aufbau ['table' => …, 'rules' => […]].");
    }
    $content[$data['table']] = $data['rules'];
}
ksort($content, SORT_STRING);

$package = [
    'format'   => DeutschExtBundle::FORMAT,
    'language' => $language,
    'version'  => $version,
    'messages' => $messages,
    'history'  => $history,
    'content'  => $content,
];

try {
    $bundle = DeutschExtBundle::fromArray($package, $language);
} catch (DeutschExtException $e) {
    $fail($e->getMessage());
}
if ($bundle->problems() !== []) {
    $fail("Das Textpaket enthält ungültige Einträge:\n  " . implode("\n  ", $bundle->problems()));
}

// Example keys from MailWizz hints get a \u escape, see tools/SecretLikeMask.php.
$json     = SecretLikeMask::json(json_encode($package, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR)) . "\n";
if (json_decode($json, true) !== $package) {
    $fail('Das maskierte Textpaket ergibt beim Einlesen andere Daten. Prüfe tools/SecretLikeMask.php.');
}
$manifest = json_encode([
    'format'        => DeutschExtBundle::FORMAT,
    'name'          => 'mailwizz-deutsch',
    'version'       => $version,
    'language'      => $language,
    'min_extension' => '1.0.0',
    'files'         => [
        $language . '.json' => [
            'sha256'   => hash('sha256', $json),
            'bytes'    => strlen($json),
            'messages' => $bundle->messageCount(),
            'content'  => $bundle->contentCount(),
        ],
    ],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR) . "\n";

$targets = [
    $root . '/translations/' . $language . '.json' => $json,
    $root . '/translations/manifest.json'         => $manifest,
    $root . '/deutsch/data/' . $language . '.json' => $json,
];

if ($check) {
    $stale = [];
    foreach ($targets as $file => $expected) {
        if (!is_file($file) || file_get_contents($file) !== $expected) {
            $stale[] = substr($file, strlen($root) + 1);
        }
    }
    if ($stale !== []) {
        $fail("Diese Dateien passen nicht zu den Quellen: " . implode(', ', $stale) . ". Führe php tools/build.php aus und committe das Ergebnis.");
    }
    printf("Textpaket %s ist aktuell: %d Übersetzungen, %d Inhaltsstellen.\n", $version, $bundle->messageCount(), $bundle->contentCount());
    exit(0);
}

foreach ($targets as $file => $content) {
    if (!is_dir(dirname($file))) {
        mkdir(dirname($file), 0775, true);
    }
    file_put_contents($file, $content);
}
printf("Textpaket %s gebaut: %d Übersetzungen, %d Inhaltsstellen, %s Bytes.\n", $version, $bundle->messageCount(), $bundle->contentCount(), number_format(strlen($json), 0, ',', '.'));
