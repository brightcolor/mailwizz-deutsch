<?php
// German texts for the MailWizz table "start_page".
// mode "whole": the field is replaced when its whole value equals the English text.
// mode "fragment": every occurrence of the English piece inside the field is replaced.
// Whitespace differences are ignored when matching. Tags must stay the same.

return array (
  'table' => 'start_page',
  'rules' => 
  array (
    0 => 
    array (
      'field' => 'heading',
      'mode' => 'whole',
      'pairs' => 
      array (
        'Create the first bounce server' => 'Leg den ersten Bounce-Server an',
        'Monitor system wide campaigns' => 'Alle Kampagnen im System im Blick',
        'Create the first customer group' => 'Leg die erste Kundengruppe an',
        'Create the first customer' => 'Leg den ersten Kunden an',
        'Welcome' => 'Willkommen',
        'Create the first delivery server' => 'Leg den ersten Versandserver an',
        'Create the first email blacklist monitor' => 'Leg den ersten Sperrlisten-Monitor an',
        'Manage the email blacklist' => 'Sperrliste verwalten',
        'Create the first email box monitor' => 'Leg deine erste Postfachüberwachung an',
        'Create first template category' => 'Leg die erste Vorlagenkategorie an',
        'Create the email templates gallery' => 'Leg die Galerie der E-Mail-Vorlagen an',
        'Create the first feedback loop server' => 'Leg den ersten Feedback-Loop-Server an',
        'Monitor system wide email lists' => 'Alle Listen im System im Blick',
        'Create the first order' => 'Leg die erste Bestellung an',
        'Create your first page' => 'Leg deine erste Seite an',
        'Create the first price plan' => 'Leg den ersten Tarif an',
        'Create the first promo code' => 'Leg den ersten Gutscheincode an',
        'Create the first sending domain' => 'Leg die erste Absenderdomain an',
        'Create the first tax for orders' => 'Leg die erste Steuer für Bestellungen an',
        'Create the first tracking domain' => 'Leg die erste Tracking-Domain an',
        'Create the first user group' => 'Leg die erste Benutzergruppe an',
        'Disable my account' => 'Mein Konto deaktivieren',
        'Create your API keys' => 'Leg deine API-Schlüssel an',
        'Create your first bounce server' => 'Leg deinen ersten Bounce-Server an',
        'Create your first campaign group' => 'Leg deine erste Kampagnengruppe an',
        'Create your first campaign tag' => 'Leg deinen ersten Kampagnen-Tag an',
        'Campaigns stats' => 'Kampagnenstatistik',
        'Create your first campaign' => 'Leg deine erste Kampagne an',
        'Create your first delivery server' => 'Leg deinen ersten Versandserver an',
        'Manage your email blacklist' => 'Verwalte deine Sperrliste',
        'Create your first feedback loop server' => 'Leg deinen ersten Feedback-Loop-Server an',
        'Create your list first segment' => 'Leg das erste Segment deiner Liste an',
        'Create your list first subscriber' => 'Leg den ersten Abonnenten deiner Liste an',
        'Create your first email list' => 'Leg deine erste Liste an',
        'Create your first order' => 'Deine erste Bestellung',
        'Create your first sending domain' => 'Leg deine erste Absenderdomain an',
        'Manage your suppression lists' => 'Verwalte deine Ausschlusslisten',
        'Create your first template category' => 'Leg deine erste Vorlagenkategorie an',
        'Create your first email template' => 'Leg deine erste E-Mail-Vorlage an',
        'Create your first tracking domain' => 'Leg deine erste Tracking-Domain an',
      ),
    ),
    1 => 
    array (
      'field' => 'content',
      'mode' => 'whole',
      'pairs' => 
      array (
        'Bounce servers are used to take action against the email addresses<br />
of the subscribers that bounce back when campaigns are sent to them.' => 'Mit Bounce-Servern reagierst du auf die E-Mail-Adressen von Abonnenten,<br />
deren E-Mails beim Versand von Kampagnen zurückkommen.',
        'When campaigns will be created from the customers area, you\'ll see them here too for easier monitoring.' => 'Sobald Kunden in ihrem Bereich Kampagnen anlegen, siehst du sie auch hier und behältst sie leichter im Blick.',
        'You can create groups with various settings, permissions and quotas and assign customers to these groups.<br />
You can also assign customer groups with price plans.' => 'Du legst Gruppen mit eigenen Einstellungen, Rechten und Kontingenten an und ordnest ihnen Kunden zu.<br />
Kundengruppen lassen sich auch mit Tarifen verknüpfen.',
        'Create the first system customer which will be able to manage email lists, subscribers, campaigns and much more.<br />
Customers can be part of customer groups for easier management.' => 'Leg den ersten Kunden im System an. Er verwaltet Listen, Abonnenten, Kampagnen und vieles mehr.<br />
Kunden lassen sich zur einfacheren Verwaltung in Kundengruppen ordnen.',
        'The dashboard will be populated with more info once<br />
you and/or your customers start using the system and add content to it.' => 'Das Dashboard füllt sich mit weiteren Angaben, sobald<br />
du und deine Kunden das System nutzen und Inhalte anlegen.',
        'Delivery servers are responsible for deliverying the emails to the subscribers.<br />
You have a wide range of delivery server types you can choose from. ' => 'Versandserver stellen die E-Mails an die Abonnenten zu.<br />
Du kannst aus vielen Arten von Versandservern wählen. ',
        'Sometimes, emails can be automatically added in the global blacklisted for false reasons and when this happens,<br />
you need a way to monitor the email blacklist to remove such false positives.' => 'Manchmal landen E-Mail-Adressen zu Unrecht automatisch in der globalen Sperrliste.<br />
Mit einem Sperrlisten-Monitor findest und entfernst du solche Fehlalarme.',
        'Start adding emails in the global email blacklist to prevent sending to them or being added in the system from email lists, registrations and so on.<br />
This is a global email blacklist that applies to absolutely each email from the system.' => 'Trag E-Mail-Adressen in die globale Sperrliste ein. An sie geht keine E-Mail mehr, und sie gelangen weder über Listen noch über Registrierungen ins System.<br />
Diese globale Sperrliste gilt für jede E-Mail-Adresse im System.',
        'Email box monitors will help monitoring given email boxes and<br />
take actions against subscribers based on the contents of the incoming emails.' => 'Postfachüberwachungen behalten bestimmte Postfächer im Blick und<br />
lösen je nach Inhalt der eingehenden E-Mails Aktionen für Abonnenten aus.',
        'You can categorize the email templates so that it will be easier to group and find them.' => 'Mit Kategorien ordnest du die E-Mail-Vorlagen, damit du sie leichter gruppierst und findest.',
        'All the email templates you create here will be visible in the customers area<br />
where customers can import them into their own accounts and change them as they wish.' => 'Alle Vorlagen, die du hier anlegst, sehen deine Kunden in ihrem Bereich.<br />
Dort übernehmen sie sie in ihr Konto und passen sie nach Belieben an.',
        'Feedback loop servers will help monitoring the abuse reports that subscribers do<br />
and take proper action when it finds such reports.' => 'Feedback-Loop-Server erfassen die Missbrauchsmeldungen von Abonnenten<br />
und reagieren passend darauf.',
        'When lists will be created from the customers area, you\'ll see them here too for easier monitoring.' => 'Sobald Kunden in ihrem Bereich Listen anlegen, siehst du sie auch hier und behältst sie leichter im Blick.',
        'If the system customers didn\'t buy any price plan yet,<br />you can manually create orders in the name of the existing customers.<br />
 ' => 'Haben deine Kunden noch keinen Tarif gekauft,<br />kannst du Bestellungen im Namen vorhandener Kunden von Hand anlegen.<br />
 ',
        'This area allows you to create simple pages for frontend.<br />
It is suited for pages like "Terms and Conditions", "Privacy policy",  but also any page where you want to showcase various info.' => 'Hier legst du einfache Seiten für das Frontend an.<br />
Das passt für Seiten wie „AGB“ und „Datenschutzerklärung“ und für jede andere Seite, auf der du Informationen zeigen willst.',
        'Start adding price plans to the system so that the customers can buy them.' => 'Leg Tarife im System an, damit deine Kunden sie kaufen können.',
        'Start adding promotional codes that can later be used by<br />customers when they will purchase any of the available price plans.' => 'Leg Gutscheincodes an, die Kunden später<br />beim Kauf eines Tarifs einlösen können.',
        'Sending domains will match the FROM address of the email campaigns and<br />
will add proper DKIM signatures to the email headers, thus increasing the chances for the emails to land inbox.' => 'Absenderdomains passen zur Absenderadresse der Kampagnen und<br />
versehen die E-Mails mit passenden DKIM-Signaturen. So landen die E-Mails eher im Posteingang.',
        'Create the tax rates that will apply for the customers of this system.' => 'Leg die Steuersätze an, die für die Kunden dieses Systems gelten.',
        'Tracking domains allow masking of the domains used in the tracking urls<br />
from email campaigns with other domains that you specify here.' => 'Mit Tracking-Domains ersetzt du die Domains in den Tracking-Links<br />
der Kampagnen durch eigene Domains, die du hier festlegst.',
        'User groups allow additional access in the backend area of the system.<br />
You can decide exactly to what areas the users in the groups are allowed.' => 'Benutzergruppen geben weiteren Benutzern Zugriff auf den Adminbereich.<br />
Du legst genau fest, welche Bereiche die Benutzer einer Gruppe nutzen dürfen.',
        'Once you disable your account, all your lists, segments, campaigns and subscribers will be removed from our system.<br />
We will keep your account disabled for a period of time and if you don\'t login anymore, we will simply remove it for good.<br />
You can reactivate your account at any time by simply logging into the system.<br /><br /><button class="btn btn-danger btn-flat" type="submit" value="1"><span class="glyphicon glyphicon-ban-circle"> </span>Disable account</button>' => 'Deaktivierst du dein Konto, werden alle deine Listen, Segmente, Kampagnen und Abonnenten aus unserem System entfernt.<br />
Dein deaktiviertes Konto bleibt eine Weile erhalten. Meldest du dich in dieser Zeit nicht mehr an, wird es endgültig gelöscht.<br />
Du kannst dein Konto jederzeit wieder aktivieren, indem du dich einfach anmeldest.<br /><br /><button class="btn btn-danger btn-flat" type="submit" value="1"><span class="glyphicon glyphicon-ban-circle"> </span>Konto deaktivieren</button>',
        'If you need to connect to the system from a 3rd-party app, then using the API is the best way to do it.<br />
Start by generating a set of API keys to access the API.' => 'Willst du dich aus einer anderen Anwendung mit dem System verbinden, ist die API der beste Weg.<br />
Erzeuge zuerst ein Paar API-Schlüssel für den Zugriff auf die API.',
        'You might find it easier to manage your email campaigns if you group them together in groups that make more sense to you.<br />
You can later filter your campaigns by the groups you create here.' => 'Deine Kampagnen verwaltest du leichter, wenn du sie in Gruppen ordnest, die für dich Sinn ergeben.<br />
Später kannst du deine Kampagnen nach diesen Gruppen filtern.',
        'Create custom tags to be used inside campaigns, in addition to the<br />
regular tags available already for each campaign you create.' => 'Leg eigene Tags für deine Kampagnen an, zusätzlich zu den<br />
üblichen Tags, die jede Kampagne schon mitbringt.',
        'This area shows overview reports for sent campaigns,<br />
so you will have to create and send at least one campaign in order to view information here.' => 'Hier siehst du Übersichten zu versendeten Kampagnen.<br />
Damit hier etwas erscheint, legst du mindestens eine Kampagne an und versendest sie.',
        'Start creating your first campaign to reach your target audience.<br />
You can create Regular, Recurring or Autoresponder campaigns that target one<br />
or more lists or even one or more segments of your lists and schedule them for sending at the right time.' => 'Leg deine erste Kampagne an und erreiche deine Zielgruppe.<br />
Du kannst reguläre, wiederkehrende oder Autoresponder-Kampagnen anlegen, die an eine<br />
oder mehrere Listen oder an Segmente deiner Listen gehen, und sie für den passenden Zeitpunkt einplanen.',
        'You will see more info on this page after you start using the system and<br />
create your first email list and send your first email campaign.<br /><br /><a class="btn btn-primary btn-flat" href="[CUSTOMER_BASE_URL]lists/create"><span class="glyphicon glyphicon-list-alt"><!-- --></span> Create your first email list</a>   <a class="btn btn-primary btn-flat" href="[CUSTOMER_BASE_URL]campaigns/create"><span class="glyphicon glyphicon-envelope"><!-- --></span> Create your first email campaign</a>' => 'Mehr siehst du auf dieser Seite, sobald du das System nutzt,<br />
deine erste Liste anlegst und deine erste Kampagne versendest.<br /><br /><a class="btn btn-primary btn-flat" href="[CUSTOMER_BASE_URL]lists/create"><span class="glyphicon glyphicon-list-alt"><!-- --></span> Erste Liste anlegen</a>   <a class="btn btn-primary btn-flat" href="[CUSTOMER_BASE_URL]campaigns/create"><span class="glyphicon glyphicon-envelope"><!-- --></span> Erste Kampagne anlegen</a>',
        'Create your own email blacklist to include subscribers that will never receive emails<br />
from you and that will never be added to your email lists.' => 'Leg deine eigene Sperrliste an. Abonnenten darauf bekommen keine E-Mails von dir<br />
und landen auch nie in deinen Listen.',
        'You can segment the list subscribers based on the custom fields defined in this list<br />
and you can also send email campaigns to segments only instead of sending to the whole list.' => 'Du kannst die Abonnenten einer Liste nach ihren benutzerdefinierten Feldern segmentieren<br />
und Kampagnen gezielt an einzelne Segmente senden.',
        'You can create a new subscriber, or use the list import feature to import subscribers in bulk.' => 'Du kannst einen neuen Abonnenten anlegen oder mit dem Import viele Abonnenten auf einmal übernehmen.',
        'Start creating your first email list, add subscribers to it, edit it\'s forms and pages<br />
and create custom fields that you can later use for segmentation.' => 'Leg deine erste Liste an, trag Abonnenten ein, passe ihre Formulare und Seiten an<br />
und leg benutzerdefinierte Felder an, die du später zum Segmentieren nutzt.',
        'When you purchase a price plan you will see the order details here.' => 'Kaufst du einen Tarif, siehst du hier die Details der Bestellung.',
        'Create your own suppression lists where you can import email addresses that will never receive emails from you.<br />
You will be able to select these lists to be used in various places, such as when sending a campaign.' => 'Leg eigene Ausschlusslisten an und importiere E-Mail-Adressen, die nie E-Mails von dir bekommen sollen.<br />
Diese Listen kannst du an verschiedenen Stellen auswählen, etwa beim Versand einer Kampagne.',
        'Create your first email template that you can later use in campaigns.<br />
You can set the base template here and edit it further in campaigns specifically for the given campaign.' => 'Leg deine erste E-Mail-Vorlage an und nutze sie später in Kampagnen.<br />
Hier legst du die Grundvorlage fest; in der Kampagne passt du sie für genau diese Kampagne weiter an.',
      ),
    ),
  ),
);
