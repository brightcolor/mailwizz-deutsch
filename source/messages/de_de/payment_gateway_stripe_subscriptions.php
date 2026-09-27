<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "payment_gateway_stripe_subscriptions" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'Stripe subscriptions' => 'Stripe-Abonnements',
  'Retrieve payments using stripe subscriptions' => 'Zahlungen mit Stripe-Abonnements abrufen',
  'Stripe subscriptions payment gateway' => 'Stripe-Abonnement-Zahlungsgateway',
  'Please do not forget to add the webhook url into your Stripe dashboard, this is maybe the most important thing you have to do, without it, customers will not be assigned to customer groups.' => 'Trag unbedingt die Webhook-URL in deinem Stripe-Dashboard ein. Das ist der wichtigste Schritt: Erst damit werden Kunden ihren Kundengruppen zugeordnet.',
  'The webhook url that you have to add is: {url}' => 'Diese Webhook-URL trägst du ein: {url}',
  'Please note that {here} you have a screenshot showing how the webhook has to be added and what event type you must select.' => 'Auf dem Screenshot {here} siehst du, wie du den Webhook anlegst und welchen Ereignistyp du wählst.',
  'Subscriptions are created on a monthly basis, so please make sure your customer groups sending quota targets the monthly time unit, this is very important.' => 'Abonnements werden monatlich angelegt. Achte deshalb darauf, dass das Versandkontingent deiner Kundengruppen die Zeiteinheit Monat nutzt. Das ist sehr wichtig.',
  'test' => 'Test',
  'live' => 'Live',
  'Test secret key' => 'Geheimer Testschlüssel',
  'Test publishable key' => 'Veröffentlichbarer Testschlüssel',
  'Live secret key' => 'Geheimer Live-Schlüssel',
  'Live publishable key' => 'Veröffentlichbarer Live-Schlüssel',
  'Expiration move to group' => 'Ablauf verschieben in Gruppe',
  'Mode' => 'Modus',
  'Whether to move the customer in this group when the subscription ends' => 'Ob der Kunde in diese Gruppe verschoben wird, wenn das Abonnement endet',
  'Whether the payments are live or run in test mode' => 'Ob die Zahlungen live oder im Testmodus ausgeführt werden',
  'Whether this gateway is enabled and can be used for payments processing' => 'Ob dieses Gateway aktiviert ist und für die Zahlungsabwicklung verwendet werden kann',
  'The sort order for this gateway' => 'Die Sortierreihenfolge für dieses Gateway',
  'Subscriptions' => 'Abonnements',
);
