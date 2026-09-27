<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "suppression_lists" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'Email' => 'E-Mail',
  'List' => 'Liste',
  'The email address {email} is already in your suppression list!' => 'Die E-Mail-Adresse {email} steht schon in deiner Ausschlussliste.',
  'Please enter a valid email address!' => 'Bitte gib eine gültige E-Mail-Adresse ein.',
  'Customer' => 'Kunde',
  'Name' => 'Name',
  'Emails count' => 'Anzahl E-Mail-Adressen',
  'Suppression list emails' => 'E-Mail-Adressen der Ausschlussliste',
  'Suppression lists' => 'Ausschlusslisten',
  'Create new' => 'Neu anlegen',
  'Update' => 'Aktualisieren',
  'Cannot open export temporary file!' => 'Die temporäre Exportdatei kann nicht geöffnet werden!',
  'Your file does not contain the header with the fields title!' => 'In deiner Datei fehlt die Kopfzeile mit den Feldnamen.',
  'Your file has been successfuly imported, from {count} records, {total} were imported!' => 'Deine Datei ist importiert: {total} von {count} Einträgen wurden übernommen.',
  'Unable to move the uploaded file!' => 'Die hochgeladene Datei ließ sich nicht verschieben.',
  'Your file has been successfully queued for processing and you will be notified when processing is done!' => 'Deine Datei steht in der Warteschlange. Du bekommst eine Benachrichtigung, sobald sie verarbeitet ist.',
  'Import from CSV file' => 'Aus CSV-Datei importieren',
  'Please note, the csv file must contain a header with the email column.' => 'Die CSV-Datei braucht eine Kopfzeile mit der Spalte für die E-Mail-Adresse.',
  'If unsure about how to format your file, do an export first and see how the file looks.' => 'Weißt du nicht, wie die Datei aufgebaut sein muss, exportiere zuerst und sieh dir das Ergebnis an.',
);
