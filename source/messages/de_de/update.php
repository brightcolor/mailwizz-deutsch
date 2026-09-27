<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "update" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'Please note that starting with this version update, we deprecated the redis queue feature!' => 'Ab dieser Version ist die Funktion „Redis-Warteschlange“ eingestellt.',
  'Version {version} brings a new cron job that you have to add to run once at 20 minutes. After addition, it must look like: {cron}' => 'Version {version} bringt einen neuen Cronjob, der alle 20 Minuten laufen muss. Leg ihn so an: {cron}',
  'Version {version} brings a new cron job that you have to add to run once a day. After addition, it must look like: {cron}' => 'Version {version} bringt einen neuen Cronjob, der einmal am Tag laufen muss. Leg ihn so an: {cron}',
  'Starting with version {version}, the "process-subscribers" command is no longer needed, please disable it from your crons!' => 'Ab Version {version} wird der Befehl „process-subscribers“ nicht mehr gebraucht. Bitte entferne ihn aus deinen Cronjobs.',
  'Version {version} brings a new cron job that you have to add to run each hour. After addition, it must look like: {cron}' => 'Version {version} bringt einen neuen Cronjob, der stündlich laufen muss. Leg ihn so an: {cron}',
  'Version {version} brings a new cron job that you have to add to run once at 2 minutes. After addition, it must look like: {cron}' => 'Version {version} bringt einen neuen Cronjob, der alle 2 Minuten laufen muss. Leg ihn so an: {cron}',
  'This version adds new fields for delivery servers and some of them are required. Because of this, all delivery servers have been marked as inactive. Please review the settings and validate the servers once again.' => 'Diese Version bringt neue Felder für Versandserver, darunter Pflichtfelder. Deshalb sind alle Versandserver jetzt inaktiv. Bitte prüfe die Einstellungen und bestätige die Server neu.',
  'Updating to version {version}.' => 'Aktualisierung auf Version {version} …',
  'Updated to version {version} successfully.' => 'Auf Version {version} aktualisiert.',
  'Updating to version {version} failed with: {message}' => 'Die Aktualisierung auf Version {version} ist fehlgeschlagen: {message}',
  'Congratulations, your application has been successfully updated to version {version}' => 'Deine Anwendung ist auf Version {version} aktualisiert',
  'Please note, depending on your database size it is better to run the command line update tool instead.' => 'Bei großen Datenbanken ist die Aktualisierung über die Kommandozeile die bessere Wahl.',
  'In order to run the command line update tool, you must run the following command from a ssh shell:' => 'Für die Aktualisierung über die Kommandozeile führst du diesen Befehl in einer SSH-Shell aus:',
  'Update' => 'Aktualisieren',
  'Application update' => 'Aktualisierung der Anwendung',
  'Update application' => 'Anwendung aktualisieren',
  'Your current application version is {version}' => 'Deine aktuelle Version der Anwendung ist {version}',
  'The update process will try to update it to version {version}' => 'Die Aktualisierung versucht, sie auf Version {version} zu bringen',
  'Please backup all your data before proceeding and note that the update process might take a while depending on your database size, just wait for it to finish.' => 'Sichere vor dem Weitermachen alle Daten. Je nach Größe der Datenbank kann die Aktualisierung eine Weile laufen; warte einfach, bis sie fertig ist.',
  'Your application has been moved offline until the update process is done.' => 'Deine Anwendung ist offline, bis die Aktualisierung fertig ist.',
  'Start update process' => 'Aktualisierung starten',
  'Are you sure you want to update your Mailwizz application from version {vFrom} to version {vTo} ?' => 'Möchtest du MailWizz wirklich von Version {vFrom} auf Version {vTo} aktualisieren?',
  'Okay, aborting the update process!' => 'In Ordnung, die Aktualisierung wird abgebrochen.',
  'Version {version} brings a new cron job that you have to add to run each minute. After addition, it must look like: {cron}' => 'Version {version} bringt einen neuen Cronjob, der jede Minute laufen muss. Leg ihn so an: {cron}',
  'You are already at latest version!' => 'Du hast schon die neueste Version.',
);
