<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "payment_gateway_stripe" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'Stripe payment gateway' => 'Stripe-Zahlungsgateway',
  'Test secret key' => 'Geheimer Testschlüssel',
  'Test publishable key' => 'Veröffentlichbarer Testschlüssel',
  'Live secret key' => 'Geheimer Live-Schlüssel',
  'Live publishable key' => 'Veröffentlichbarer Live-Schlüssel',
  'Mode' => 'Modus',
  'Whether the payments are live or run in test mode' => 'Ob die Zahlungen live oder im Testmodus ausgeführt werden',
  'Whether this gateway is enabled and can be used for payments processing' => 'Ob dieses Gateway aktiviert ist und für die Zahlungsabwicklung verwendet werden kann',
  'The sort order for this gateway' => 'Die Sortierreihenfolge für dieses Gateway',
  'Stripe' => 'Stripe',
  'Retrieve payments using stripe' => 'Zahlungen mit Stripe abrufen',
  'Credit card number' => 'Kreditkartennummer',
  'Exp. month' => 'Ablaufmonat',
  'Exp. year' => 'Ablaufjahr',
  'Cvv' => 'Prüfnummer (CVV)',
  'Your credit card number seems invalid!' => 'Deine Kreditkartennummer ist offenbar ungültig.',
  'Invalid date!' => 'Ungültiges Datum!',
  'Invalid CVV!' => 'Ungültiger CVV!',
  'All your data is sent over a secure connection without touching our server.' => 'Deine Daten gehen über eine sichere Verbindung direkt an den Zahlungsanbieter.',
  'test' => 'Test',
  'live' => 'Live',
);
