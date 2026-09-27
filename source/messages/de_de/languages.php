<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "languages" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'View available languages' => 'Verfügbare Sprachen ansehen',
  'Languages' => 'Sprachen',
  'Create new language' => 'Neue Sprache anlegen',
  'Update language' => 'Sprache bearbeiten',
  'Your language pack has been successfully uploaded!' => 'Dein Sprachpaket ist hochgeladen.',
  'Please select a language pack archive for upload!' => 'Bitte wähle ein Archiv mit einem Sprachpaket zum Hochladen aus.',
  'Upload language pack' => 'Sprachpaket hochladen',
  'Please note that only zip files are allowed for upload.' => 'Hochladen lassen sich nur ZIP-Dateien.',
  'Language packs contain executable PHP files, please check the packs before upload.' => 'Sprachpakete enthalten ausführbare PHP-Dateien. Prüfe die Pakete bitte vor dem Hochladen.',
  'Language' => 'Sprache',
  'Name' => 'Name',
  'Language code' => 'Sprachcode',
  'Region code' => 'Regionscode',
  'Is default language?' => 'Standardsprache?',
  'The visible language name to distinct between same language but distinct regions (i.e: between English US and English GB)' => 'Der angezeigte Name der Sprache, um Regionen derselben Sprache zu unterscheiden (z. B. Englisch US und Englisch GB)',
  '2 letter language code, i.e: en' => 'Sprachcode aus 2 Buchstaben, z. B.: en',
  '2 letter region code, i.e: us. Please do not fill this field unless necessary. For most of the cases, the language code is enough' => 'Regionscode aus 2 Buchstaben, z. B.: us. Füll das Feld bitte nur aus, wenn es nötig ist. Meist reicht der Sprachcode.',
  'Whether this language is the default language for users/customers that have not set a language' => 'Ob diese Sprache für Benutzer und Kunden ohne eigene Spracheinstellung gilt',
  'i.e: English - United States' => 'z. B.: Englisch – Vereinigte Staaten',
  'i.e: en' => 'z. B.: en',
  'i.e: us' => 'z. B.: us',
  'The archive upload is only allowed for php message source.' => 'Das Hochladen von Archiven ist nur für PHP-Nachrichtenquellen erlaubt.',
  'The language directory {dirName} is not valid and was deleted!' => 'Das Sprachverzeichnis {dirName} war ungültig und wurde gelöscht.',
  'The language "{languageName}" cannot be saved, failure reason: ' => 'Die Sprache „{languageName}“ ließ sich nicht speichern. Grund: ',
  'Duplicate entry for the language and region code combination!' => 'Diese Kombination aus Sprach- und Regionscode gibt es bereits.',
  'The archive upload is only allowed for Db message source.' => 'Das Hochladen von Archiven geht nur mit der Datenbank als Quelle der Texte.',
  'The language export is not allowed.' => 'Der Export von Sprachen ist nicht erlaubt.',
);
