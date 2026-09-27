<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "landing_page_domains" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'Cannot find a valid CNAME record for {domainName}! Remember, the CNAME of {domainName} must point to {currentDomain}!' => 'Für {domainName} gibt es keinen gültigen CNAME-Eintrag. Der CNAME von {domainName} muss auf {currentDomain} zeigen.',
  'Choose HTTPS only if your tracking domain can also provide a valid SSL certificate, otherwise stick to regular HTTP.' => 'Wähle HTTPS nur, wenn deine Tracking-Domain ein gültiges SSL-Zertifikat hat. Bleib andernfalls bei HTTP.',
  'Create new domain' => 'Neue Domain anlegen',
  'Customer' => 'Kunde',
  'Domain ID' => 'Domain-ID',
  'Domains' => 'Domains',
  'Name' => 'Name',
  'Please DO NOT SKIP verification unless you are 100% sure you know what you are doing.' => 'Überspring die Bestätigung nur, wenn du ganz sicher weißt, was du tust.',
  'Please note that because of the way DNS servers work, you need to add a subdomain like subdomain.your-domain.com as a DNS CNAME record and point it to {currentDomain}!' => 'Wegen der Arbeitsweise von DNS-Servern legst du eine Subdomain wie subdomain.deine-domain.de als CNAME-Eintrag an und lässt ihn auf {currentDomain} zeigen.',
  'Scheme' => 'Protokoll',
  'Skip verification' => 'Bestätigung überspringen',
  'subdomain.your-domain.com' => 'subdomain.deine-domain.de',
  'Update domain' => 'Domain bearbeiten',
  'Verified' => 'Bestätigt',
  'View domains' => 'Domains ansehen',
  'Your specified domain name does not seem to be valid!' => 'Der angegebene Domainname ist offenbar ungültig.',
);
