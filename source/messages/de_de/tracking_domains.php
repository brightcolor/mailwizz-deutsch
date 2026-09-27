<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "tracking_domains" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'View tracking domains' => 'Tracking-Domains ansehen',
  'Tracking domains' => 'Tracking-Domains',
  'Create new tracking domain' => 'Neue Tracking-Domain anlegen',
  'Update tracking domain' => 'Tracking-Domain bearbeiten',
  'Please note, in order for this feature to work this (sub)domain needs a dedicated IP address, otherwise all defined CNAMES for it will point to the default domain on this server.' => 'Diese Funktion braucht eine eigene IP-Adresse für diese (Sub-)Domain. Sonst zeigen alle CNAME-Einträge dafür auf die Standarddomain dieses Servers.',
  'If you do not use a dedicated IP address for this domain only or you are not sure you do so, do not use this feature!' => 'Nutze diese Funktion nur, wenn du sicher eine eigene IP-Adresse allein für diese Domain hast.',
  'Please note that because of the way DNS servers work, you need to add a subdomain like tracking.your-domain.com as a DNS CNAME record and point it to {currentDomain}!' => 'Wegen der Arbeitsweise von DNS-Servern brauchst du eine Subdomain wie tracking.deine-domain.de als DNS-CNAME-Eintrag, der auf {currentDomain} zeigt.',
  'Domain' => 'Domain',
  'Customer' => 'Kunde',
  'Name' => 'Name',
  'Scheme' => 'Protokoll',
  'Skip validation' => 'Validierung überspringen',
  'tracking.your-domain.com' => 'tracking.deine-domain.de',
  'Please DO NOT SKIP validation unless you are 100% sure you know what you are doing.' => 'Überspring die Bestätigung nur, wenn du ganz sicher weißt, was du tust.',
  'Choose HTTPS only if your tracking domain can also provide a valid SSL certificate, otherwise stick to regular HTTP.' => 'Wähle HTTPS nur, wenn deine Tracking-Domain ein gültiges SSL-Zertifikat hat. Bleib andernfalls bei HTTP.',
  'Unable to get the current domain name!' => 'Der aktuelle Domainname kann nicht abgerufen werden!',
  'Your specified domain name does not seem to be valid!' => 'Der angegebene Domainname ist offenbar ungültig.',
  'Your PHP install does not contain the {function} function needed to query the DNS records!' => 'In deiner PHP-Installation fehlt die Funktion {function}, die für die Abfrage der DNS-Einträge nötig ist.',
  'Cannot find a valid CNAME record for {domainName}! Remember, the CNAME of {domainName} must point to {currentDomain}!' => 'Für {domainName} gibt es keinen gültigen CNAME-Eintrag. Der CNAME von {domainName} muss auf {currentDomain} zeigen.',
  'Verified' => 'Bestätigt',
  'Skip verification' => 'Bestätigung überspringen',
  'Please DO NOT SKIP verification unless you are 100% sure you know what you are doing.' => 'Überspring die Bestätigung nur, wenn du ganz sicher weißt, was du tust.',
  'Domain ID' => 'Domain-ID',
  'You have reached the maximum number of allowed tracking domains!' => 'Du hast die höchste erlaubte Zahl an Tracking-Domains erreicht.',
);
