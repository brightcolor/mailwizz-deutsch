<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "custom_subscriber_attachment" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'Custom subscriber attachment' => 'Eigene Anhänge je Abonnent',
  'Common' => 'Allgemein',
  'You have to set the absolute path to the storage folder where you will upload attachments. By default it is: {path}' => 'Gib den absoluten Pfad zum Speicherordner für die Anhänge an. Vorgabe: {path}',
  'After you set the storage folder, inside it, you can upload your subscriber specific attachments but make sure you create subfolders and you upload the attachments in these subfolders.' => 'Hast du den Speicherordner festgelegt, lädst du darin die Anhänge für einzelne Abonnenten hoch. Leg dafür Unterordner an und lade die Anhänge in diese Unterordner.',
  'For example, you can have following structure:' => 'Zum Beispiel so:',
  'Then in the campaign setup step, you will be able to select the "{folder}" folder as the folder from where the attachments will be loaded. Also, you will be able to select which custom field represents the file name.' => 'Beim Einrichten der Kampagne wählst du dann den Ordner „{folder}“ als Quelle der Anhänge. Außerdem wählst du, welches benutzerdefinierte Feld den Dateinamen enthält.',
  'Storage folder' => 'Speicherordner',
  'The storage folder where the attachment folders will be created' => 'Der Speicherordner, in dem die Ordner für Anhänge angelegt werden',
);
