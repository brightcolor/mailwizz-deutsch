<?php
// German texts for the MailWizz table "tour_slideshow_slide".
// mode "whole": the field is replaced when its whole value equals the English text.
// mode "fragment": every occurrence of the English piece inside the field is replaced.
// Whitespace differences are ignored when matching. Tags must stay the same.

return array (
  'table' => 'tour_slideshow_slide',
  'rules' => 
  array (
    0 => 
    array (
      'field' => 'title',
      'mode' => 'whole',
      'pairs' => 
      array (
        'Thank you for choosing [APP_NAME]!' => 'Danke, dass du dich für [APP_NAME] entschieden hast!',
        'Understanding the application structure' => 'So ist die Anwendung aufgebaut',
        'Cron jobs setup' => 'Cronjobs einrichten',
        'Your customer account' => 'Dein Kundenkonto',
        'Delivery servers' => 'Versandserver',
        'Bounce servers' => 'Bounce-Server',
        'Feedback loop servers' => 'Feedback-Loop-Server',
        'Delivery settings' => 'Versandeinstellungen',
        'Monetization' => 'Monetarisierung',
        'Extend [APP_NAME]' => '[APP_NAME] erweitern',
        'Logs' => 'Protokolle',
        '[FULL_NAME], welcome!' => '[FULL_NAME], willkommen!',
        'Email lists' => 'Listen',
        'Subscribers' => 'Abonnenten',
        'Campaigns' => 'Kampagnen',
        'Email templates' => 'E-Mail-Vorlagen',
      ),
    ),
    1 => 
    array (
      'field' => 'content',
      'mode' => 'whole',
      'pairs' => 
      array (
        'Hello [FULL_NAME], thank you for choosing [APP_NAME]!<br />
This small tour will guide you through some of the [APP_NAME]  features and will help you get started using the application.<br />
If you ever need support, please use our dedicated <a href="[SUPPORT_URL]" target="_blank">support channel</a>.<br />
Let\'s get started!' => 'Hallo [FULL_NAME], danke, dass du dich für [APP_NAME] entschieden hast!<br />
Diese kurze Tour zeigt dir einige Funktionen von [APP_NAME] und hilft dir beim Einstieg.<br />
Brauchst du Hilfe, nutze unseren <a href="[SUPPORT_URL]" target="_blank">Support-Kanal</a>.<br />
Los geht\'s!',
        'In order to make things easier to manage, [APP_NAME] is divided into several small sub-apps, like the <a href="[BACKEND_URL]" target="_blank">backend</a>, <a href="[CUSTOMER_URL]" target="_blank">customer</a>, <a href="[API_URL]" target="_blank">api</a>, console and <a href="[FRONTEND_URL]" target="_blank">frontend</a> app.<br /><br />
The <a href="[BACKEND_URL]" target="_blank">backend</a> app is used for administrative tasks and here only the system users have access.<br />
The <a href="[CUSTOMER_URL]" target="_blank">customer</a> app is used to create manage emails lists, subscribers and campaigns.<br />
The console app is the heavy worker, it contains all the cron jobs commands that are executed on various intervals to run maintenance, send campaigns, process bounces and so on.<br />
The <a href="[FRONTEND_URL]" target="_blank">frontend</a> app is used for public facing actions, like showing the subscription forms.<br />
The <a href="[API_URL]" target="_blank">api</a> app is used to allow custom integrations from various other apps with your own app, like customers sending subscribers from external systems to their lists. You can <a href="[BACKEND_URL]/settings/index" target="_blank">disable</a> it any any time.' => 'Damit sich alles leichter verwalten lässt, besteht [APP_NAME] aus mehreren kleinen Teilanwendungen: dem <a href="[BACKEND_URL]" target="_blank">Adminbereich</a>, dem <a href="[CUSTOMER_URL]" target="_blank">Kundenbereich</a>, der <a href="[API_URL]" target="_blank">API</a>, der Konsole und dem <a href="[FRONTEND_URL]" target="_blank">Frontend</a>.<br /><br />
Der <a href="[BACKEND_URL]" target="_blank">Adminbereich</a> dient der Verwaltung, Zugang haben nur die Benutzer des Systems.<br />
Im <a href="[CUSTOMER_URL]" target="_blank">Kundenbereich</a> legen Kunden Listen, Abonnenten und Kampagnen an und verwalten sie.<br />
Die Konsole erledigt die schwere Arbeit, denn sie enthält alle Cronjob-Befehle, die in festen Abständen Wartung erledigen, Kampagnen versenden, Bounces verarbeiten und vieles mehr.<br />
Das <a href="[FRONTEND_URL]" target="_blank">Frontend</a> ist die öffentliche Seite, etwa für die Anmeldeformulare.<br />
Über die <a href="[API_URL]" target="_blank">API</a> binden andere Anwendungen deine Installation an, zum Beispiel wenn Kunden Abonnenten aus fremden Systemen in ihre Listen übertragen. Du kannst sie jederzeit <a href="[BACKEND_URL]/settings/index" target="_blank">abschalten</a>.',
        'Maybe the most important thing that you have to do after you install the application is to make sure all the cron jobs are set properly. This is very important since without the cron jobs, the application will not be able to send any email at all, or to do maintenance cleanup and a lot other tasks. <br /><br />
You can find a list with all the cron jobs that you have to add <a href="[BACKEND_URL]/misc/cron-jobs-list" target="_blank">here</a> and if you have any issue setting them up, you can reach out for help <a href="https://forum.mailwizz.com/threads/what-are-the-cron-jobs-that-i-have-to-add.12/" target="_blank">here</a>.  If you are not sure what cron jobs are, we have you covered, read more about them <a href="https://forum.mailwizz.com/threads/what-cron-jobs-are-why-do-i-need-to-add-them-and-how.3/" target="_blank">here</a>.' => 'Das Wichtigste nach der Installation: Richte alle Cronjobs richtig ein. Ohne Cronjobs versendet die Anwendung keine einzige E-Mail, räumt nicht auf und erledigt viele weitere Aufgaben nicht. <br /><br />
Eine Liste aller Cronjobs, die du anlegen musst, findest du <a href="[BACKEND_URL]/misc/cron-jobs-list" target="_blank">hier</a>. Klappt die Einrichtung nicht, bekommst du <a href="https://forum.mailwizz.com/threads/what-are-the-cron-jobs-that-i-have-to-add.12/" target="_blank">hier</a> Hilfe. Was Cronjobs überhaupt sind, liest du <a href="https://forum.mailwizz.com/threads/what-cron-jobs-are-why-do-i-need-to-add-them-and-how.3/" target="_blank">hier</a>.',
        'When you first installed the application, you were asked to create a customer account.<br />
In case you haven\'t done so, please go ahead and <a href="[BACKEND_URL]/customers/create" target="_blank">create one</a>.<br />
When using [APP_NAME], the customers are the ones that manage the email lists, campaigns, templates and so on.' => 'Bei der Installation wurdest du gebeten, ein Kundenkonto anzulegen.<br />
Hast du das noch nicht getan, <a href="[BACKEND_URL]/customers/create" target="_blank">leg jetzt eins an</a>.<br />
In [APP_NAME] verwalten die Kunden die Listen, Kampagnen, Vorlagen und vieles mehr.',
        '<a href="[BACKEND_URL]/delivery-servers" target="_blank">Delivery servers</a> are needed in order to send out all the emails from the application.<br />
Even if it\'s about sending a confirmation email, an email campaign, a test email,<br />
you need a delivery server to actually make the delivery.<br /><br />
[APP_NAME] comes with support for any SMTP server out there, PHP\'s built-in mail function and sendmail. Also it integrates with services like Sparkpost, MailGun, Amazon SES, SendGrid, ElasticEmail and much more in order to make sure you are not limited into using just a single service but you have a wide array of options.<br />
You can use either of them, or all of them together.<br />
[APP_NAME] gives you total flexibility for this.' => '<a href="[BACKEND_URL]/delivery-servers" target="_blank">Versandserver</a> verschicken alle E-Mails der Anwendung.<br />
Ob Bestätigungs-E-Mail, Kampagne oder Test-E-Mail:<br />
Für die Zustellung brauchst du immer einen Versandserver.<br /><br />
[APP_NAME] unterstützt jeden SMTP-Server, die eingebaute mail-Funktion von PHP und sendmail. Dazu kommen Dienste wie SparkPost, Mailgun, Amazon SES, SendGrid, Elastic Email und viele mehr, sodass du aus vielen Möglichkeiten wählen kannst.<br />
Du kannst einen davon nutzen oder alle zusammen.<br />
[APP_NAME] lässt dir dabei freie Hand.',
        'You like it or not, when you start sending emails, not all your addresses will be valid and when sending emails to invalid email addresses, these emails will return to you in order to notify you that the given email address is not valid anymore. In order for [APP_NAME] to be able to catch these emails and take proper actions against them, you need to use a feature called <a href="[BACKEND_URL]/bounce-servers" target="_blank">bounce servers</a>.<br /><br />
Bounce servers are actually regular email boxes that are used by [APP_NAME] in order to catch the returning emails and take proper actions. After creating a bounce server, make sure you associate it with a delivery server, otherwise bounce processing will not work.<br /><br />
Please note that <a href="[BACKEND_URL]/delivery-servers" target="_blank">delivery servers </a>of type web api do not need bounce servers. The bounces are processed automatically through webhooks.' => 'Sobald du E-Mails versendest, sind manche Adressen ungültig. E-Mails an solche Adressen kommen zurück und melden dir, dass die Adresse nicht mehr gültig ist. Damit [APP_NAME] diese E-Mails abfängt und passend darauf reagiert, brauchst du <a href="[BACKEND_URL]/bounce-servers" target="_blank">Bounce-Server</a>.<br /><br />
Bounce-Server sind ganz normale Postfächer, über die [APP_NAME] die zurückkommenden E-Mails abfängt und verarbeitet. Verknüpfe jeden Bounce-Server mit einem Versandserver, sonst werden Bounces nicht verarbeitet.<br /><br />
<a href="[BACKEND_URL]/delivery-servers" target="_blank">Versandserver </a>der Art Web-API brauchen keine Bounce-Server. Dort werden Bounces automatisch über Webhooks verarbeitet.',
        'Everytime when the Spam button is pressed by one of your subscribers, the email provider the subscriber belongs to, will send a notification related to that event.  In order to receive such notifications, you should subscribe for such notifications at the email provider.<br /><a href="https://www.port25.com/list-of-current-feedback-loops-offered-at-isps/" target="_blank">Here</a> you can find a list with email providers and their feedback loop subscribe process. <br /><br />
However, most email providers will also send the notifications at one of these 3 addresses: abuse@domain.com, postmaster@domain.com and fbl@domain.com. <br />
In order for [APP_NAME] to process these notifications, you need to add <a href="[BACKEND_URL]/feedback-loop-servers" target="_blank">feedback loop </a>servers for each email address, either for the one you subscribed at the email provider, or for the 3 listed above.<br /><br />
Please note that when sending only via <a href="[BACKEND_URL]/delivery-servers" target="_blank">delivery servers</a> of type web api you don\'t need to setup <a href="[BACKEND_URL]/feedback-loop-servers" target="_blank">feedback loop servers</a> since these are automatically processed via webhooks.' => 'Drückt ein Abonnent auf „Spam“, schickt sein E-Mail-Anbieter eine Meldung dazu. Um solche Meldungen zu bekommen, meldest du dich beim jeweiligen Anbieter dafür an.<br /><a href="https://www.port25.com/list-of-current-feedback-loops-offered-at-isps/" target="_blank">Hier</a> findest du eine Liste von E-Mail-Anbietern und wie du dich für ihren Feedback-Loop anmeldest. <br /><br />
Die meisten Anbieter schicken die Meldungen außerdem an eine dieser drei Adressen: abuse@domain.com, postmaster@domain.com und fbl@domain.com. <br />
Damit [APP_NAME] diese Meldungen verarbeitet, legst du für jede dieser Adressen einen <a href="[BACKEND_URL]/feedback-loop-servers" target="_blank">Feedback-Loop</a>-Server an, entweder für die Adresse, die du beim Anbieter hinterlegt hast, oder für die drei oben genannten.<br /><br />
Versendest du nur über <a href="[BACKEND_URL]/delivery-servers" target="_blank">Versandserver</a> der Art Web-API, brauchst du keine <a href="[BACKEND_URL]/feedback-loop-servers" target="_blank">Feedback-Loop-Server</a>, weil diese Meldungen automatisch über Webhooks verarbeitet werden.',
        'By default, [APP_NAME] uses <a href="[BACKEND_URL]/settings/cron" target="_blank">delivery settings</a> that will be fine for most of people. However, if you need, you can properly adjust them in order to get a higher delivery speed. Please be aware that wrong delivery settings can cause a lot of issues, including the fact that some ISP\'s will blacklist your sending ip addresses if you are sending too fast.<br /><br />
You can read more about how delivery settings work <a href="https://forum.mailwizz.com/threads/understanding-email-delivery-settings-and-how-they-impact-performance.1595/" target="_blank">here</a>.' => '[APP_NAME] nutzt standardmäßig <a href="[BACKEND_URL]/settings/cron" target="_blank">Versandeinstellungen</a>, die für die meisten passen. Bei Bedarf passt du sie an, um schneller zu versenden. Falsche Versandeinstellungen können viele Probleme verursachen, etwa dass manche Provider deine Versand-IP-Adressen sperren, wenn du zu schnell sendest.<br /><br />
Wie die Versandeinstellungen funktionieren, liest du <a href="https://forum.mailwizz.com/threads/understanding-email-delivery-settings-and-how-they-impact-performance.1595/" target="_blank">hier</a>.',
        'If you decide to use [APP_NAME] to provide email services to your own customers, then you have to <a href="[BACKEND_URL]/settings/monetization" target="_blank">enable the monetization module</a>. Once the module is enabled, you will be able to create <a href="[BACKEND_URL]/customers/groups/index" target="_blank">customer groups</a>, assign them to <a href="[BACKEND_URL]/price-plans/index" target="_blank">price plans</a>, <a href="[BACKEND_URL]/payment-gateways/index" target="_blank">enable and setup payment extensions</a>, define <a href="[BACKEND_URL]/currencies/index" target="_blank">currencies</a>, <a href="[BACKEND_URL]/promo-codes/index" target="_blank">promo codes</a> and <a href="[BACKEND_URL]/taxes/index" target="_blank">taxes</a>.<br /><br />
Please note that when you create customer groups, the default settings will be inherit from <a href="[BACKEND_URL]/settings/customers/common" target="_blank">customer settings</a>. This allows you to set some base settings for all customers, then in customer groups you can simply adjust them depending on the group permissions.' => 'Möchtest du mit [APP_NAME] E-Mail-Dienste für eigene Kunden anbieten, <a href="[BACKEND_URL]/settings/monetization" target="_blank">aktiviere das Monetarisierungsmodul</a>. Danach kannst du <a href="[BACKEND_URL]/customers/groups/index" target="_blank">Kundengruppen</a> anlegen, sie <a href="[BACKEND_URL]/price-plans/index" target="_blank">Tarifen</a> zuordnen, <a href="[BACKEND_URL]/payment-gateways/index" target="_blank">Zahlungserweiterungen aktivieren und einrichten</a> sowie <a href="[BACKEND_URL]/currencies/index" target="_blank">Währungen</a>, <a href="[BACKEND_URL]/promo-codes/index" target="_blank">Gutscheincodes</a> und <a href="[BACKEND_URL]/taxes/index" target="_blank">Steuern</a> festlegen.<br /><br />
Neue Kundengruppen übernehmen ihre Standardwerte aus den <a href="[BACKEND_URL]/settings/customers/common" target="_blank">Kundeneinstellungen</a>. So legst du Grundeinstellungen für alle Kunden fest und passt sie in den Kundengruppen je nach Rechten an.',
        '[APP_NAME] is highly <a href="https://forum.mailwizz.com/categories/extend.15/" target="_blank">extensible</a> and flexible. You can extend it using a <a href="http://codecanyon.net/user/twisted1919/portfolio?ref=twisted1919" target="_blank">high number of extensions</a> for payments, backup, email validation and so on, you can alter the look of it by either using <a href="[BACKEND_URL]/settings/customization" target="_blank">customizations</a> or <a href="https://forum.mailwizz.com/forums/themes/" target="_blank">custom themes</a> and you can <a href="https://forum.mailwizz.com/forums/translations/" target="_blank">translate it</a> in your language.' => '[APP_NAME] ist sehr <a href="https://forum.mailwizz.com/categories/extend.15/" target="_blank">erweiterbar</a> und flexibel. Mit einer <a href="http://codecanyon.net/user/twisted1919/portfolio?ref=twisted1919" target="_blank">großen Zahl an Erweiterungen</a> ergänzt du Zahlungen, Sicherungen, E-Mail-Prüfung und mehr. Das Aussehen änderst du über <a href="[BACKEND_URL]/settings/customization" target="_blank">Anpassungen</a> oder <a href="https://forum.mailwizz.com/forums/themes/" target="_blank">eigene Designs</a>, und du kannst die Anwendung <a href="https://forum.mailwizz.com/forums/translations/" target="_blank">übersetzen</a>.',
        'While [APP_NAME] is running, it saves a lot of logs in order for you to see what is happening under the hood, which means in case something goes wrong, these logs are also extremely useful for debugging purposes.<br /><br />You can view the <a href="[BACKEND_URL]/misc/campaigns-delivery-logs" target="_blank">campaigns delivery logs</a> which record every emails sent out by any campaign, the <a href="[BACKEND_URL]/misc/campaigns-bounce-logs" target="_blank">campaigns bounce logs</a> which stores data related to bounces, <br />the <a href="[BACKEND_URL]/campaign-abuse-reports" target="_blank">campaigns abuse reports</a> that store information when a subscriber fills in an abuse form,<br />the <a href="[BACKEND_URL]/transactional-emails/index" target="_blank">transactional emails logs</a> which hold information about the transactional emails,<br /><a href="[BACKEND_URL]/misc/delivery-servers-usage-logs" target="_blank">delivery servers usage logs</a> which record absolutely all the emails sent out by the <a href="[BACKEND_URL]/delivery-servers/index" target="_blank">delivery servers</a>,<br />the <a href="[BACKEND_URL]/misc/application-log" target="_blank">application log</a> which stores various events that happen when the application runs,<br />and also a detailed history with all <a href="[BACKEND_URL]/misc/guest-fail-attempts" target="_blank">failed login attempts</a>.' => 'Während [APP_NAME] läuft, schreibt es viele Protokolle. Darin siehst du, was im Hintergrund passiert, und wenn etwas schiefgeht, helfen sie bei der Fehlersuche.<br /><br />Du findest die <a href="[BACKEND_URL]/misc/campaigns-delivery-logs" target="_blank">Versandprotokolle der Kampagnen</a> mit jeder E-Mail, die eine Kampagne verschickt hat, die <a href="[BACKEND_URL]/misc/campaigns-bounce-logs" target="_blank">Bounce-Protokolle der Kampagnen</a> mit den Daten zu Bounces, <br />die <a href="[BACKEND_URL]/campaign-abuse-reports" target="_blank">Missbrauchsmeldungen zu Kampagnen</a>, die festhalten, wenn ein Abonnent ein Missbrauchsformular ausfüllt,<br />die <a href="[BACKEND_URL]/transactional-emails/index" target="_blank">Protokolle der Transaktions-E-Mails</a> mit Angaben zu den Transaktions-E-Mails,<br />die <a href="[BACKEND_URL]/misc/delivery-servers-usage-logs" target="_blank">Nutzungsprotokolle der Versandserver</a> mit wirklich allen E-Mails, die die <a href="[BACKEND_URL]/delivery-servers/index" target="_blank">Versandserver</a> verschickt haben,<br />das <a href="[BACKEND_URL]/misc/application-log" target="_blank">Protokoll der Anwendung</a> mit Ereignissen während des Betriebs<br />und einen ausführlichen Verlauf aller <a href="[BACKEND_URL]/misc/guest-fail-attempts" target="_blank">fehlgeschlagenen Anmeldeversuche</a>.',
        'Using [APP_NAME], you will be able to create <a href="[CUSTOMER_URL]/lists/index" target="_blank">email lists</a>, customize them entirely, add subscribers to them, <a href="[CUSTOMER_URL]/campaigns/index" target="_blank">create and send campaigns</a> and enjoy a very detailed stats area for each of your campaigns.<br />
Let\'s get started!' => 'Mit [APP_NAME] legst du <a href="[CUSTOMER_URL]/lists/index" target="_blank">Listen</a> an, passt sie ganz nach deinen Wünschen an, trägst Abonnenten ein, <a href="[CUSTOMER_URL]/campaigns/index" target="_blank">legst Kampagnen an und versendest sie</a> und bekommst zu jeder Kampagne eine sehr ausführliche Statistik.<br />
Los geht\'s!',
        'In order to start sending email campaign, you should start by creating your <a target="_blank" href="[CUSTOMER_URL]/lists/index">first email list</a>. Your email list identifies you as a sender, it contains your information and allows you to take various decisions related to your subscribers.<br />
Each list is totally separate, which means you can customize each list as you wish, including subscribers, custom forms/pages and custom fields.' => 'Bevor du Kampagnen versendest, legst du deine <a target="_blank" href="[CUSTOMER_URL]/lists/index">erste Liste</a> an. Die Liste weist dich als Absender aus, enthält deine Angaben und bestimmt, wie du mit deinen Abonnenten umgehst.<br />
Jede Liste steht für sich. Du passt jede einzeln an, mit eigenen Abonnenten, Formularen, Seiten und benutzerdefinierten Feldern.',
        'Once your email list is created, next step is to start importing your subscribers into the list.<br />
In order to do so, just click on your list title from <a href="[CUSTOMER_URL]/lists/index" target="_blank">lists area</a>,<br />
then click on the Tools box, followed by the Import box.<br />
You will be allowed to import from a csv file, a text file or from another database.<br />
It is that simple!' => 'Steht deine Liste, importierst du als Nächstes deine Abonnenten.<br />
Klick dazu im <a href="[CUSTOMER_URL]/lists/index" target="_blank">Listenbereich</a> auf den Namen deiner Liste,<br />
dann auf den Kasten „Werkzeuge“ und danach auf „Import“.<br />
Du kannst aus einer CSV-Datei, einer Textdatei oder einer anderen Datenbank importieren.<br />
So einfach ist das!',
        'Finally, after your list is created and you have added your subscribers into it,<br />
it\'s time to create <a href="[CUSTOMER_URL]/campaigns/create" target="_blank">your first campaign</a>.<br />
You will be able to select the <a href="[CUSTOMER_URL]/lists/index" target="_blank">list</a> you want to use for sending and optionally, a segment from the list.<br />
You can add a new template just for the campaign itself or use an <a href="[CUSTOMER_URL]/templates/index" target="_blank">existing one</a>.<br />
Make sure you test all campaigns before actually sending them, this is crucial. If you want to test your campaign spam score, feel free to use this <a href="http://www.mail-tester.com/" target="_blank">tool</a>.<br />
Once you see everything looks good, send your campaign and enjoy very detailed, real time statistics.' => 'Ist deine Liste angelegt und sind Abonnenten eingetragen,<br />
legst du <a href="[CUSTOMER_URL]/campaigns/create" target="_blank">deine erste Kampagne</a> an.<br />
Du wählst die <a href="[CUSTOMER_URL]/lists/index" target="_blank">Liste</a> für den Versand und auf Wunsch ein Segment daraus.<br />
Du kannst eine neue Vorlage nur für diese Kampagne anlegen oder eine <a href="[CUSTOMER_URL]/templates/index" target="_blank">vorhandene</a> nutzen.<br />
Teste jede Kampagne vor dem Versand, das ist entscheidend. Den Spam-Wert deiner Kampagne kannst du mit diesem <a href="http://www.mail-tester.com/" target="_blank">Werkzeug</a> prüfen.<br />
Passt alles, versende deine Kampagne und verfolge die ausführliche Statistik in Echtzeit.',
        'When creating new campaigns, you will want to use nice looking email templates. <br />
You can use the <a href="[CUSTOMER_URL]/templates/index" target="_blank">templates</a> area to create and/or import your existing templates. If you don\'t have any email template to import or you are not sure how to create one, you can also import one from the <a href="[CUSTOMER_URL]/templates/gallery" target="_blank">templates gallery</a>. You can later use any of these templates for your <a href="[CUSTOMER_URL]/campaigns/index" target="_blank">campaigns</a> and you can even create new templates from the campaigns area for any specific campaign.' => 'Für neue Kampagnen möchtest du ansprechende E-Mail-Vorlagen nutzen. <br />
Im Bereich <a href="[CUSTOMER_URL]/templates/index" target="_blank">Vorlagen</a> legst du Vorlagen an oder importierst vorhandene. Hast du keine eigene Vorlage oder weißt nicht, wie du eine baust, übernimm eine aus der <a href="[CUSTOMER_URL]/templates/gallery" target="_blank">Vorlagengalerie</a>. Jede dieser Vorlagen kannst du später für deine <a href="[CUSTOMER_URL]/campaigns/index" target="_blank">Kampagnen</a> nutzen, und im Kampagnenbereich legst du auch neue Vorlagen für einzelne Kampagnen an.',
      ),
    ),
  ),
);
