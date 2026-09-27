<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "list_export" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'Export subscribers from your list' => 'Abonnenten deiner Liste exportieren',
  'Export subscribers' => 'Abonnenten exportieren',
  'CSV Export' => 'CSV-Export',
  'Your list has no subscribers to export!' => 'Deine Liste hat keine Abonnenten zum Exportieren.',
  'Cannot create the storage directory for your export!' => 'Das Verzeichnis für deinen Export ließ sich nicht anlegen.',
  'Cannot open the storage file for your export!' => 'Die Speicherdatei für deinen Export ließ sich nicht öffnen.',
  'Successfully added the email "{email}" to the export list.' => 'Die E-Mail-Adresse „{email}“ ist in der Exportliste.',
  'Exported {count} subscribers, from {start} to {end}.' => '{count} Abonnenten exportiert, von {start} bis {end}.',
  'The export is now complete, starting the packing process...' => 'Der Export ist fertig, jetzt wird gepackt …',
  'Packing done, your file will be downloaded now, please wait...' => 'Fertig gepackt. Deine Datei wird jetzt heruntergeladen, bitte warten …',
  'Please wait, starting another batch...' => 'Bitte warten, der nächste Stapel startet …',
  'The export file has been deleted.' => 'Die Exportdatei ist gelöscht.',
  'Export subscribers from your list segment' => 'Abonnenten deines Listensegments exportieren',
  'Export segment' => 'Segment exportieren',
  'CSV' => 'CSV',
  'Click to export' => 'Zum Exportieren klicken',
  'CSV export progress' => 'Fortschritt des CSV-Exports',
  'Back to export options' => 'Zurück zu den Exportoptionen',
  'From a total of {total} subscribers, so far {totalProcessed} have been processed, {successfullyProcessed} successfully and {errorProcessing} with errors. {percentage} completed.' => 'Von {total} Abonnenten sind bisher {totalProcessed} verarbeitet, {successfullyProcessed} erfolgreich und {errorProcessing} mit Fehlern. {percentage} erledigt.',
  'The export process is starting, please wait...' => 'Der Export startet, bitte warten …',
  'Export' => 'Exportieren',
  'Call this command with the --folder_path=XYZ param where XYZ is the full path to the folder you want to save the exports to.' => 'Ruf diesen Befehl mit dem Parameter --folder_path=XYZ auf, wobei XYZ der vollständige Pfad zu dem Ordner ist, in dem die Exporte landen sollen.',
  'Call this command with the --list_uid=XYZ param where XYZ is the 13 chars unique list id.' => 'Ruf diesen Befehl mit dem Parameter --list_uid=XYZ auf, wobei XYZ die 13-stellige eindeutige ID der Liste ist.',
  'Cannot create the storage file for your export!' => 'Die Datei für deinen Export ließ sich nicht anlegen.',
  'The export process finished, your file: {path}!' => 'Der Export ist abgeschlossen. Deine Datei: {path}',
  'The list with the uid {uid} was not found in database.' => 'Die Liste mit der UID {uid} steht nicht in der Datenbank.',
);
