<?php
// Splits secret-like example keys in the message sources into concatenated
// string pieces, so GitHub push protection accepts the files. Safe to run
// again: already split runs are left alone.
//
//   php tools/mask-sources.php

declare(strict_types=1);

require __DIR__ . '/SecretLikeMask.php';

$root  = dirname(__DIR__);
$files = array_merge(glob($root . '/source/messages/*/*.php') ?: [], [$root . '/source/history/messages.php']);
$changed = 0;

foreach ($files as $file) {
    $code   = (string)file_get_contents($file);
    $masked = SecretLikeMask::php($code);
    if ($masked === $code) {
        continue;
    }
    file_put_contents($file, $masked);
    echo 'geteilt: ', substr($file, strlen($root) + 1), "\n";
    $changed++;
}

echo $changed === 0 ? "Keine Beispielschlüssel zu teilen.\n" : "{$changed} Dateien angepasst.\n";
