<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "ip_blacklist" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'IP address' => 'IP-Adresse',
  'Customer' => 'Kunde',
  'Import from CSV file' => 'Aus CSV-Datei importieren',
  'Please note, the csv file must contain a header with at least the ip_address column.' => 'Die CSV-Datei braucht eine Kopfzeile mit mindestens der Spalte „ip_address“.',
  'Add a new IP to blacklist' => 'Neue IP-Adresse sperren',
  'Please enter a valid IP address!' => 'Bitte gib eine gültige IP-Adresse ein.',
  'Update blacklisted IP' => 'Gesperrte IP-Adresse bearbeiten',
  'The IP address({ip_address}) is already in your blacklist!' => 'Die IP-Adresse ({ip_address}) steht bereits auf deiner Sperrliste.',
  'Your file has been successfully imported, from {count} records, {total} were imported!' => 'Deine Datei ist importiert: {total} von {count} Einträgen wurden übernommen.',
);
