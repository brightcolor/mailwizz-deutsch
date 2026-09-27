<?php
// Former German texts per category and English source text. A translation in
// the database that equals one of these is updated to the current text.

return array (
  'ai_assistant' => 
  array (
    'View topics' => 
    array (
      0 => 'Themen anzeigen',
    ),
    'Prompt' => 
    array (
      0 => 'Eingabeaufforderung',
    ),
    'Create new topic' => 
    array (
      0 => 'Neues Thema erstellen',
    ),
    'The subject will appear when starting a new conversation.' => 
    array (
      0 => 'Der Betreff wird angezeigt, wenn eine neue Unterhaltung gestartet wird.',
    ),
    'This is the prompt that will always be sent as context for the conversation.' => 
    array (
      0 => 'Dies ist die Eingabeaufforderung, die immer als Kontext für die Unterhaltung gesendet wird.',
    ),
    'Customers use system OpenAI account' => 
    array (
      0 => 'Kunden verwenden das System-OpenAI-Konto',
    ),
    'Customers add own OpenAI account' => 
    array (
      0 => 'Kunden fügen eigenes OpenAI-Konto hinzu',
    ),
    'Provide AI Assistant only for these customer groups' => 
    array (
      0 => 'KI-Assistent nur für diese Kundengruppen bereitstellen',
    ),
    'Whether the customers can use this feature' => 
    array (
      0 => 'Ob die Kunden diese Funktion nutzen können',
    ),
    'Whether customer can use the system OpenAI account if they don\'t have their own account' => 
    array (
      0 => 'Ob Kunden das System-OpenAI-Konto nutzen können, wenn sie kein eigenes Konto haben',
    ),
    'Whether customer can add their own OpenAI account' => 
    array (
      0 => 'Ob Kunden ihr eigenes OpenAI-Konto hinzufügen können',
    ),
    'The maximum number of tokens to generate in the completion. The token count of your prompt plus max_tokens cannot exceed the models context length. Most models have a context length of 2048 tokens (except for the newest models, which support 4096). We limited this to 2000 to make sure there are enough tokens for the response.' => 
    array (
      0 => 'Die maximale Anzahl von Tokens, die in der Vervollständigung generiert werden. Die Anzahl der Tokens Ihrer Eingabeaufforderung plus max_tokens darf die Kontextlänge des Modells nicht überschreiten. Die meisten Modelle haben eine Kontextlänge von 2048 Tokens (außer die neuesten Modelle, die 4096 unterstützen). Wir haben dies auf 2000 begrenzt, um sicherzustellen, dass genügend Tokens für die Antwort verfügbar sind.',
    ),
    'Number between -2.0 and 2.0. Positive values penalize new tokens based on their existing frequency in the text so far, decreasing the models likelihood to repeat the same line verbatim. See more information about frequency and presence penalties.' => 
    array (
      0 => 'Zahl zwischen -2,0 und 2,0. Positive Werte bestrafen neue Tokens basierend auf ihrer bisherigen Häufigkeit im Text, wodurch die Wahrscheinlichkeit des Modells verringert wird, dieselbe Zeile wörtlich zu wiederholen. Weitere Informationen zu Häufigkeits- und Präsenzstrafen finden Sie hier.',
    ),
    'Number between -2.0 and 2.0. Positive values penalize new tokens based on whether they appear in the text so far, increasing the models likelihood to talk about new topics. See more information about frequency and presence penalties.' => 
    array (
      0 => 'Zahl zwischen -2,0 und 2,0. Positive Werte bestrafen neue Tokens basierend darauf, ob sie bisher im Text vorkommen, wodurch die Wahrscheinlichkeit des Modells erhöht wird, über neue Themen zu sprechen. Weitere Informationen zu Häufigkeits- und Präsenzstrafen finden Sie hier.',
    ),
    'Here are some resources that might help you creating better prompts: {url}' => 
    array (
      0 => 'Hier sind einige Ressourcen, die Ihnen helfen könnten, bessere Eingabeaufforderungen zu erstellen: {url}',
    ),
  ),
  'ai_assistant_ext' => 
  array (
    'Open AI settings' => 
    array (
      0 => 'Open AI Einstellungen',
    ),
  ),
  'announcements' => 
  array (
    'Are you sure? You will never be able to see this message again after closing it.' => 
    array (
      0 => 'Sind Sie sicher? Sie werden diese Nachricht nie wieder sehen können, nachdem Sie sie geschlossen haben.',
    ),
  ),
  'api' => 
  array (
    'Your IP address is not allowed to access this server.' => 
    array (
      0 => 'Ihre IP-Adresse darf nicht auf diesen Server zugreifen.',
    ),
    'Invalid API request params. Please refer to the documentation.' => 
    array (
      0 => 'Ungültige API-Anfrageparameter. Bitte schlagen Sie in der Dokumentation nach.',
    ),
    'Service Unavailable.' => 
    array (
      0 => 'Dienst nicht verfügbar.',
    ),
    'The subscribers list does not exist.' => 
    array (
      0 => 'Die Abonnentenliste existiert nicht.',
    ),
    'The subscribers list does not have any custom field defined.' => 
    array (
      0 => 'Die Abonnentenliste hat kein benutzerdefiniertes Feld definiert.',
    ),
    'The subscriber does not exist in this list.' => 
    array (
      0 => 'Der Abonnent existiert nicht in dieser Liste.',
    ),
    'Only POST requests allowed for this endpoint.' => 
    array (
      0 => 'Nur POST-Anfragen sind für diesen Endpunkt erlaubt.',
    ),
    'Please provide the subscriber email address.' => 
    array (
      0 => 'Bitte geben Sie die E-Mail-Adresse des Abonnenten an.',
    ),
    'Please provide a valid email address.' => 
    array (
      0 => 'Bitte geben Sie eine gültige E-Mail-Adresse an.',
    ),
    'The subscriber already exists in this list.' => 
    array (
      0 => 'Der Abonnent existiert bereits in dieser Liste.',
    ),
    'This email address is blacklisted.' => 
    array (
      0 => 'Diese E-Mail-Adresse steht auf der schwarzen Liste.',
    ),
    'The field {field} is required by the list but it has not been provided!' => 
    array (
      0 => 'Das Feld {field} wird von der Liste benötigt, wurde jedoch nicht bereitgestellt!',
    ),
    'Unable to save the subscriber!' => 
    array (
      0 => 'Der Abonnent konnte nicht gespeichert werden!',
    ),
    'Please provide the subscribers list.' => 
    array (
      0 => 'Bitte geben Sie die Abonnentenliste an.',
    ),
    'Only PUT requests allowed for this endpoint.' => 
    array (
      0 => 'Nur PUT-Anfragen sind für diesen Endpunkt erlaubt.',
    ),
    'Another subscriber with this email address already exists in this list.' => 
    array (
      0 => 'Ein anderer Abonnent mit dieser E-Mail-Adresse existiert bereits in dieser Liste.',
    ),
    'Only DELETE requests allowed for this endpoint.' => 
    array (
      0 => 'Nur DELETE-Anfragen sind für diesen Endpunkt erlaubt.',
    ),
    'The template does not exist.' => 
    array (
      0 => 'Die Vorlage existiert nicht.',
    ),
    'It does not seem that you have selected an archive.' => 
    array (
      0 => 'Es scheint, dass Sie kein Archiv ausgewählt haben.',
    ),
    'Your archive does not seem to be a valid zip file.' => 
    array (
      0 => 'Ihr Archiv scheint keine gültige ZIP-Datei zu sein.',
    ),
    'Cannot write archive in the temporary location.' => 
    array (
      0 => 'Das Archiv kann nicht im temporären Verzeichnis geschrieben werden.',
    ),
    'The list does not exist.' => 
    array (
      0 => 'Die Liste existiert nicht.',
    ),
    'You have reached the maximum number of allowed lists.' => 
    array (
      0 => 'Sie haben die maximale Anzahl erlaubter Listen erreicht.',
    ),
    'Unable to copy the list.' => 
    array (
      0 => 'Die Liste konnte nicht kopiert werden.',
    ),
    'The campaign does not exist.' => 
    array (
      0 => 'Die Kampagne existiert nicht.',
    ),
    'The subscriber does not exist.' => 
    array (
      0 => 'Der Abonnent existiert nicht.',
    ),
    'The url hash does not exist.' => 
    array (
      0 => 'Der URL-Hash existiert nicht.',
    ),
    'You have reached the maximum number of allowed campaigns.' => 
    array (
      0 => 'Sie haben die maximale Anzahl erlaubter Kampagnen erreicht.',
    ),
    'Please provide a list for this campaign.' => 
    array (
      0 => 'Bitte geben Sie eine Liste für diese Kampagne an.',
    ),
    'Provided list does not exist.' => 
    array (
      0 => 'Die angegebene Liste existiert nicht.',
    ),
    'Provided list segment does not exist.' => 
    array (
      0 => 'Das angegebene Listensegment existiert nicht.',
    ),
    'Provided template does not exist.' => 
    array (
      0 => 'Die angegebene Vorlage existiert nicht.',
    ),
    'Please provide a template for your campaign.' => 
    array (
      0 => 'Bitte geben Sie eine Vorlage für Ihre Kampagne an.',
    ),
    'Unable to copy the campaign.' => 
    array (
      0 => 'Die Kampagne konnte nicht kopiert werden.',
    ),
    'The campaign does not allow marking it as sent!' => 
    array (
      0 => 'Die Kampagne erlaubt es nicht, sie als gesendet zu markieren!',
    ),
    'This campaign cannot be removed now.' => 
    array (
      0 => 'Diese Kampagne kann jetzt nicht entfernt werden.',
    ),
    'The email does not exist.' => 
    array (
      0 => 'Die E-Mail existiert nicht.',
    ),
    'The campaign does not exist!' => 
    array (
      0 => 'Die Kampagne existiert nicht!',
    ),
    'The subscriber does not exist!' => 
    array (
      0 => 'Der Abonnent existiert nicht!',
    ),
    'This subscriber has already been marked as bounced!' => 
    array (
      0 => 'Dieser Abonnent wurde bereits als zurückgesprungen markiert!',
    ),
    'Invalid bounce type!' => 
    array (
      0 => 'Ungültiger Bounce-Typ!',
    ),
    'Customer creation is disabled.' => 
    array (
      0 => 'Die Erstellung von Kunden ist deaktiviert.',
    ),
    'Unable to find the specified country, please double check the spelling!' => 
    array (
      0 => 'Das angegebene Land konnte nicht gefunden werden, bitte überprüfen Sie die Schreibweise!',
    ),
    'Unable to find the specified zone, please double check the spelling!' => 
    array (
      0 => 'Die angegebene Zone konnte nicht gefunden werden, bitte überprüfen Sie die Schreibweise!',
    ),
  ),
  'api_keys' => 
  array (
    'Ip whitelist' => 
    array (
      0 => 'IP-Whitelist',
    ),
    'Ip blacklist' => 
    array (
      0 => 'IP-Blacklist',
    ),
    'My site' => 
    array (
      0 => 'Meine Seite',
    ),
    'This key is used on my site' => 
    array (
      0 => 'Dieser Schlüssel wird auf meiner Seite verwendet',
    ),
    'Update api keys' => 
    array (
      0 => 'API-Schlüssel aktualisieren',
    ),
    'Requested API access has been successfully removed!' => 
    array (
      0 => 'Angeforderter API-Zugang wurde erfolgreich entfernt!',
    ),
    'Your API url is: {url}' => 
    array (
      0 => 'Ihre API-URL lautet: {url}',
    ),
    'A new API access has been added:<br />Key: {key}' => 
    array (
      0 => 'Ein neuer API-Zugang wurde hinzugefügt:<br />Schlüssel: {key}',
    ),
  ),
  'app' => 
  array (
    'Invalid API key. Please refer to the documentation.' => 
    array (
      0 => 'Ungültiger API-Schlüssel. Bitte lesen Sie die Dokumentation.',
    ),
    'Your account must be active in order to use the API.' => 
    array (
      0 => 'Ihr Konto muss aktiv sein, um die API nutzen zu können.',
    ),
    'Your account is not allowed to use the API.' => 
    array (
      0 => 'Ihr Konto darf die API nicht nutzen.',
    ),
    'Your request expired. Please refer to the documentation.' => 
    array (
      0 => 'Ihre Anfrage ist abgelaufen. Bitte lesen Sie die Dokumentation.',
    ),
    'Invalid API request signature. Please refer to the documentation.' => 
    array (
      0 => 'Ungültige API-Anfragesignatur. Bitte lesen Sie die Dokumentation.',
    ),
    'Version {version} is now available for download. Please update your application!' => 
    array (
      0 => 'Version {version} ist jetzt zum Download verfügbar. Bitte aktualisieren Sie Ihre Anwendung!',
    ),
    'Login logs' => 
    array (
      0 => 'Login-Protokolle',
    ),
    'Payment gateways' => 
    array (
      0 => 'Zahlungsgateways',
    ),
    'Price plans' => 
    array (
      0 => 'Preispläne',
    ),
    'Promo codes' => 
    array (
      0 => 'Promo-Codes',
    ),
    'Email box monitors' => 
    array (
      0 => 'E-Mail-Postfach-Monitore',
    ),
    'Sending domains' => 
    array (
      0 => 'Versanddomains',
    ),
    'List page types' => 
    array (
      0 => 'Seitentypen auflisten',
    ),
    'Email blacklist' => 
    array (
      0 => 'E-Mail-Blacklist',
    ),
    'Blacklist monitors' => 
    array (
      0 => 'Blacklist-Monitore',
    ),
    'Block email requests' => 
    array (
      0 => 'E-Mail-Anfragen blockieren',
    ),
    'Themes' => 
    array (
      0 => 'Themen',
    ),
    'Maxmind Database' => 
    array (
      0 => 'Maxmind-Datenbank',
    ),
    'System urls' => 
    array (
      0 => 'System urls File Test DE',
    ),
    'Social links' => 
    array (
      0 => 'Soziale Links',
    ),
    'Miscellaneous' => 
    array (
      0 => 'Verschiedenes',
    ),
    'Campaigns delivery logs' => 
    array (
      0 => 'Kampagnenversandprotokolle',
    ),
    'Campaigns bounce logs' => 
    array (
      0 => 'Kampagnen-Bounce-Protokolle',
    ),
    'Campaigns stats' => 
    array (
      0 => 'Kampagnenstatistiken',
    ),
    'Campaign abuse reports' => 
    array (
      0 => 'Kampagnenmissbrauchsberichte',
    ),
    'Transactional emails' => 
    array (
      0 => 'Transaktionale E-Mails',
    ),
    'Company types' => 
    array (
      0 => 'Unternehmenstypen',
    ),
    'Guest fail attempts' => 
    array (
      0 => 'Fehlgeschlagene Gastversuche',
    ),
    'Cron jobs list' => 
    array (
      0 => 'Cron-Job-Liste',
    ),
    'Cron jobs history' => 
    array (
      0 => 'Cron-Job-Verlauf',
    ),
    'View all' => 
    array (
      0 => 'Alle anzeigen',
    ),
    'Your form has a few errors, please fix them and try again!' => 
    array (
      0 => 'Ihr Formular enthält einige Fehler. Bitte beheben Sie diese und versuchen Sie es erneut!',
    ),
    'Your form has been successfully saved!' => 
    array (
      0 => 'Ihr Formular wurde erfolgreich gespeichert!',
    ),
    'Create new' => 
    array (
      0 => 'Neu erstellen',
    ),
    'The requested page does not exist.' => 
    array (
      0 => 'Die angeforderte Seite existiert nicht.',
    ),
    'This group cannot be removed since it is the default group for registration process' => 
    array (
      0 => 'Diese Gruppe kann nicht entfernt werden, da sie die Standardgruppe für den Registrierungsprozess ist',
    ),
    'This group cannot be removed since it is used for moving customers in when their quota is reached' => 
    array (
      0 => 'Diese Gruppe kann nicht entfernt werden, da sie verwendet wird, um Kunden zu verschieben, wenn ihr Kontingent erreicht ist',
    ),
    'The item has been successfully deleted!' => 
    array (
      0 => 'Das Element wurde erfolgreich gelöscht!',
    ),
    'Your items have been successfully deleted!' => 
    array (
      0 => 'Ihre Elemente wurden erfolgreich gelöscht!',
    ),
    '2FA is not enabled in this system!' => 
    array (
      0 => '2FA ist in diesem System nicht aktiviert!',
    ),
    'Please remove the install directory({dir}) from your application!' => 
    array (
      0 => 'Bitte entfernen Sie das Installationsverzeichnis ({dir}) aus Ihrer Anwendung!',
    ),
    'You are using an outdated version of PHP({v1}) which will not be supported in the near future! Please upgrade PHP to at least version {v2}!' => 
    array (
      0 => 'Sie verwenden eine veraltete Version von PHP ({v1}), die in naher Zukunft nicht mehr unterstützt wird! Bitte aktualisieren Sie PHP auf mindestens Version {v2}!',
    ),
    'Your item has been successfully deleted!' => 
    array (
      0 => 'Ihr Element wurde erfolgreich gelöscht!',
    ),
    'The application log file has been successfully deleted!' => 
    array (
      0 => 'Die Anwendungsprotokolldatei wurde erfolgreich gelöscht!',
    ),
    'Add new' => 
    array (
      0 => 'Neu hinzufügen',
    ),
    'The action has been successfully completed!' => 
    array (
      0 => 'Die Aktion wurde erfolgreich abgeschlossen!',
    ),
    'Your file has been successfully uploaded!' => 
    array (
      0 => 'Ihre Datei wurde erfolgreich hochgeladen!',
    ),
    'Please select a file for upload!' => 
    array (
      0 => 'Bitte wählen Sie eine Datei zum Hochladen aus!',
    ),
    'Your access to this resource is forbidden.' => 
    array (
      0 => 'Ihr Zugriff auf diese Ressource ist verboten.',
    ),
    'Please check your email address.' => 
    array (
      0 => 'Bitte überprüfen Sie Ihre E-Mail-Adresse.',
    ),
    'Your new login info!' => 
    array (
      0 => 'Ihre neuen Login-Informationen!',
    ),
    'Your new login has been successfully sent to your email address.' => 
    array (
      0 => 'Ihr neuer Login wurde erfolgreich an Ihre E-Mail-Adresse gesendet.',
    ),
    'Error {code}!' => 
    array (
      0 => 'Fehler {code}!',
    ),
    'The email address you provided does not seem to be valid.' => 
    array (
      0 => 'Die von Ihnen angegebene E-Mail-Adresse scheint ungültig zu sein.',
    ),
    'There is no item available for export!' => 
    array (
      0 => 'Es gibt kein Element zum Exportieren!',
    ),
    'Invalid request. Please do not repeat this request again.' => 
    array (
      0 => 'Ungültige Anfrage. Bitte wiederholen Sie diese Anfrage nicht erneut.',
    ),
    'Your form contains a few errors, please fix them and try again!' => 
    array (
      0 => 'Ihr Formular enthält einige Fehler. Bitte beheben Sie diese und versuchen Sie es erneut!',
    ),
    'Please note that following sending domains have been disabled because their dkim signature is not valid anymore: {domains}' => 
    array (
      0 => 'Bitte beachten Sie, dass die folgenden Versanddomains deaktiviert wurden, da ihre DKIM-Signatur nicht mehr gültig ist: {domains}',
    ),
    'The email has been successfully resent!' => 
    array (
      0 => 'Die E-Mail wurde erfolgreich erneut gesendet!',
    ),
    'Create' => 
    array (
      0 => 'Erstellen',
    ),
    'Unable to impersonate the customer!' => 
    array (
      0 => 'Der Kunde kann nicht nachgeahmt werden!',
    ),
    'You are using the customer account for {customerName}!' => 
    array (
      0 => 'Sie verwenden das Kundenkonto für {customerName}!',
    ),
    'Reset sending quota' => 
    array (
      0 => 'Sendekontingent zurücksetzen',
    ),
    'Application default' => 
    array (
      0 => 'Standardanwendung',
    ),
    'Your action completed successfully' => 
    array (
      0 => 'Ihre Aktion wurde erfolgreich abgeschlossen',
    ),
    'Your action completed with errors' => 
    array (
      0 => 'Ihre Aktion wurde mit Fehlern abgeschlossen',
    ),
    'Please use with caution!' => 
    array (
      0 => 'Bitte mit Vorsicht verwenden!',
    ),
    'Please use below options only if you know what you are doing. The way your application works and behaves depends on these actions.' => 
    array (
      0 => 'Bitte verwenden Sie die unten stehenden Optionen nur, wenn Sie wissen, was Sie tun. Die Funktionsweise und das Verhalten Ihrer Anwendung hängen von diesen Aktionen ab.',
    ),
    'Remove the PID for send-campaigns cron command!' => 
    array (
      0 => 'Entfernen Sie die PID für den Cron-Befehl send-campaigns!',
    ),
    'Are you sure you need to run this action?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie diese Aktion ausführen müssen?',
    ),
    'I understand, do it!' => 
    array (
      0 => 'Ich verstehe, mach es!',
    ),
    'Remove the PID for bounce-handler cron command!' => 
    array (
      0 => 'Entfernen Sie die PID für den Cron-Befehl bounce-handler!',
    ),
    'Remove the PID for feedback-loop-handler cron command!' => 
    array (
      0 => 'Entfernen Sie die PID für den Cron-Befehl feedback-loop-handler!',
    ),
    'Change the status of stuck campaigns from processing to sending!' => 
    array (
      0 => 'Ändern Sie den Status von festgefahrenen Kampagnen von Verarbeitung zu Versand!',
    ),
    'Change the status of stuck bounce servers from cron-running to active!' => 
    array (
      0 => 'Ändern Sie den Status von festgefahrenen Bounce-Servern von cron-running zu aktiv!',
    ),
    'Change the status of stuck feedback loop servers from cron-running to active!' => 
    array (
      0 => 'Ändern Sie den Status von festgefahrenen Feedback-Loop-Servern von cron-running zu aktiv!',
    ),
    'Change the status of stuck email box monitors from cron-running to active!' => 
    array (
      0 => 'Ändern Sie den Status von festgefahrenen E-Mail-Postfach-Monitoren von cron-running zu aktiv!',
    ),
    'Delete delivery temporary errors' => 
    array (
      0 => 'Lieferfehler vorübergehend löschen',
    ),
    'Are you sure you want to remove the application log?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie das Anwendungsprotokoll entfernen möchten?',
    ),
    'Choose' => 
    array (
      0 => 'Wählen',
    ),
    'I understand, delete it!' => 
    array (
      0 => 'Ich verstehe, lösche es!',
    ),
    'Unarchive' => 
    array (
      0 => 'Archivierung aufheben',
    ),
    'Profile info' => 
    array (
      0 => 'Profilinformationen',
    ),
    'Export profile info' => 
    array (
      0 => 'Profilinformationen exportieren',
    ),
    'Are you sure you want to delete this item? There is no coming back after you do it.' => 
    array (
      0 => 'Sind Sie sicher, dass Sie dieses Element löschen möchten? Es gibt kein Zurück mehr, nachdem Sie es getan haben.',
    ),
    'Create new server' => 
    array (
      0 => 'Neuen Server erstellen',
    ),
    'Blacklist email' => 
    array (
      0 => 'E-Mail auf die Blacklist setzen',
    ),
    'Warning' => 
    array (
      0 => 'Warnung',
    ),
    'Reinstall core templates' => 
    array (
      0 => 'Kernvorlagen neu installieren',
    ),
    'ZipArchive class required in order to unzip the file.' => 
    array (
      0 => 'ZipArchive-Klasse erforderlich, um die Datei zu entpacken.',
    ),
    'Cannot open the archive file.' => 
    array (
      0 => 'Die Archivdatei kann nicht geöffnet werden.',
    ),
    'Cannot create directory "{dirPath}". Make sure the parent directory is writable by the webserver!' => 
    array (
      0 => 'Das Verzeichnis "{dirPath}" kann nicht erstellt werden. Stellen Sie sicher, dass das übergeordnete Verzeichnis vom Webserver beschreibbar ist!',
    ),
    'The directory "{dirPath}" is not writable by the webserver!' => 
    array (
      0 => 'Das Verzeichnis "{dirPath}" ist vom Webserver nicht beschreibbar!',
    ),
    'Mark as sent' => 
    array (
      0 => 'Als gesendet markieren',
    ),
    'Export basic stats' => 
    array (
      0 => 'Grundlegende Statistiken exportieren',
    ),
    'N/A' => 
    array (
      0 => 'N/V',
    ),
    'Backend area' => 
    array (
      0 => 'Backend-Bereich',
    ),
    'Frontend area' => 
    array (
      0 => 'Frontend-Bereich',
    ),
    'Pending confirm' => 
    array (
      0 => 'Bestätigung ausstehend',
    ),
    'Pending active' => 
    array (
      0 => 'Aktivierung ausstehend',
    ),
    'Pending delete' => 
    array (
      0 => 'Löschung ausstehend',
    ),
    'Pending disable' => 
    array (
      0 => 'Deaktivierung ausstehend',
    ),
    'Hidden' => 
    array (
      0 => 'Versteckt',
    ),
    'Your form contains errors, please correct them and try again.' => 
    array (
      0 => 'Ihr Formular enthält Fehler. Bitte korrigieren Sie diese und versuchen Sie es erneut.',
    ),
    'Sort order' => 
    array (
      0 => 'Sortierreihenfolge',
    ),
    'Last updated' => 
    array (
      0 => 'Zuletzt aktualisiert',
    ),
    'Are you sure you want to remove the selected items?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie die ausgewählten Elemente entfernen möchten?',
    ),
    'Run bulk action' => 
    array (
      0 => 'Massenaktion ausführen',
    ),
    'Toggle columns' => 
    array (
      0 => 'Spalten umschalten',
    ),
    'Cannot create temporary directory "{dirPath}". Make sure the parent directory is writable by the webserver!' => 
    array (
      0 => 'Das temporäre Verzeichnis "{dirPath}" kann nicht erstellt werden. Stellen Sie sicher, dass das übergeordnete Verzeichnis vom Webserver beschreibbar ist!',
    ),
    'Cannot find template entry file, usually called index.html' => 
    array (
      0 => 'Die Vorlageneintragsdatei, normalerweise index.html genannt, kann nicht gefunden werden',
    ),
    'The template entry file seems to be empty.' => 
    array (
      0 => 'Die Vorlageneintragsdatei scheint leer zu sein.',
    ),
    'Please provide a suffix when building the hook name!' => 
    array (
      0 => 'Bitte geben Sie ein Suffix an, wenn Sie den Hook-Namen erstellen!',
    ),
    'Suppression lists' => 
    array (
      0 => 'Unterdrückungslisten',
    ),
    'Stats' => 
    array (
      0 => 'Statistiken',
    ),
    'Geo Opens' => 
    array (
      0 => 'Geo-Öffnungen',
    ),
    'Subscriber profile info' => 
    array (
      0 => 'Abonnentenprofilinformationen',
    ),
    'Please wait...' => 
    array (
      0 => 'Bitte warten...',
    ),
    'Share campaign stats' => 
    array (
      0 => 'Kampagnenstatistiken teilen',
    ),
    'Subscribers opens info based on user agent' => 
    array (
      0 => 'Abonnenten-Öffnungsinformationen basierend auf dem User-Agent',
    ),
    'Your form has a few errors. Please fix them and try again!' => 
    array (
      0 => 'Ihr Formular enthält einige Fehler. Bitte beheben Sie diese und versuchen Sie es erneut!',
    ),
    'This form type has been disabled!' => 
    array (
      0 => 'Dieser Formular-Typ wurde deaktiviert!',
    ),
    'Campaigns sent to this subscriber' => 
    array (
      0 => 'Kampagnen, die an diesen Abonnenten gesendet wurden',
    ),
    'Create campaign for this subscriber' => 
    array (
      0 => 'Kampagne für diesen Abonnenten erstellen',
    ),
    'Temporary error, please contact us if this happens too often!' => 
    array (
      0 => 'Vorübergehender Fehler, bitte kontaktieren Sie uns, wenn dies zu oft passiert!',
    ),
    'Bulk action completed successfully!' => 
    array (
      0 => 'Massenaktion erfolgreich abgeschlossen!',
    ),
    'Email delivery is temporary disabled.' => 
    array (
      0 => 'E-Mail-Zustellung ist vorübergehend deaktiviert.',
    ),
    'Are you sure you want to delete this item?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie dieses Element löschen möchten?',
    ),
    'Save changes and create new' => 
    array (
      0 => 'Änderungen speichern und neu erstellen',
    ),
    'View emails' => 
    array (
      0 => 'E-Mails anzeigen',
    ),
    'Save changes and...' => 
    array (
      0 => 'Änderungen speichern und...',
    ),
    'Show matching responders' => 
    array (
      0 => 'Passende Responder anzeigen',
    ),
    'Your current plan, renew it' => 
    array (
      0 => 'Ihr aktueller Plan, erneuern Sie ihn',
    ),
    'Are you sure you want to delete this item? There is no way coming back after you do it.' => 
    array (
      0 => 'Sind Sie sicher, dass Sie dieses Element löschen möchten? Es gibt kein Zurück mehr, nachdem Sie es getan haben.',
    ),
    'Bulk action from source' => 
    array (
      0 => 'Massenaktion aus Quelle',
    ),
    'Please wait, processing...' => 
    array (
      0 => 'Bitte warten, wird verarbeitet...',
    ),
    'Go to login' => 
    array (
      0 => 'Zum Login gehen',
    ),
    'Sync' => 
    array (
      0 => 'Synchronisieren',
    ),
    'Split' => 
    array (
      0 => 'Teilen',
    ),
    'Giveup only' => 
    array (
      0 => 'Nur Aufgeben',
    ),
    'Blacklist only' => 
    array (
      0 => 'Nur Blacklist',
    ),
    'Import from share code' => 
    array (
      0 => 'Aus Freigabecode importieren',
    ),
    'Are you sure you want to remove this item?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie dieses Element entfernen möchten?',
    ),
    'File (queue import)' => 
    array (
      0 => 'Datei (Warteschlangen-Import)',
    ),
    'Please wait, processing your request...' => 
    array (
      0 => 'Bitte warten, Ihre Anfrage wird bearbeitet...',
    ),
    'Your form has a few errors, please fix them and try again.' => 
    array (
      0 => 'Ihr Formular enthält einige Fehler. Bitte beheben Sie diese und versuchen Sie es erneut.',
    ),
    'Email delivery is disabled at the moment, please try again later!' => 
    array (
      0 => 'Die E-Mail-Zustellung ist derzeit deaktiviert, bitte versuchen Sie es später erneut!',
    ),
    'Temporary error, please try again later!' => 
    array (
      0 => 'Vorübergehender Fehler, bitte versuchen Sie es später erneut!',
    ),
    'We are sorry, but we cannot deliver the confirmation email right now!' => 
    array (
      0 => 'Es tut uns leid, aber wir können die Bestätigungs-E-Mail derzeit nicht zustellen!',
    ),
    'Your profile has been successfully updated!' => 
    array (
      0 => 'Ihr Profil wurde erfolgreich aktualisiert!',
    ),
    'Please check your email in order to confirm the request!' => 
    array (
      0 => 'Bitte überprüfen Sie Ihre E-Mail, um die Anfrage zu bestätigen!',
    ),
    'Sign up' => 
    array (
      0 => 'Anmelden',
    ),
    'Block my email' => 
    array (
      0 => 'Meine E-Mail blockieren',
    ),
    'Made easy, finally.' => 
    array (
      0 => 'Endlich einfach gemacht.',
    ),
    'Sign up free' => 
    array (
      0 => 'Kostenlos anmelden',
    ),
    'Using {siteName} you will easily grow your lists, increase conversions, and optimise your audience engagement with beautiful emails and autoresponders, high-converting web forms, list segmentation, and unique delivery tools.' => 
    array (
      0 => 'Mit {siteName} können Sie Ihre Listen einfach erweitern, Konversionen steigern und die Interaktion mit Ihrem Publikum durch schöne E-Mails und Autoresponder, hochkonvertierende Webformulare, Listen-Segmentierung und einzigartige Zustelltools optimieren.',
    ),
    'Send better email' => 
    array (
      0 => 'Bessere E-Mails senden',
    ),
    'Whether you need to sell your products, share some big news, or tell a story, our email template builder makes it easy to create an email marketing campaign that best suit your target audience.' => 
    array (
      0 => 'Egal, ob Sie Ihre Produkte verkaufen, große Neuigkeiten teilen oder eine Geschichte erzählen möchten, unser E-Mail-Vorlagen-Builder macht es einfach, eine E-Mail-Marketing-Kampagne zu erstellen, die am besten zu Ihrer Zielgruppe passt.',
    ),
    'See how you\'re doing' => 
    array (
      0 => 'Sehen Sie, wie Sie abschneiden',
    ),
    '{siteName} reports show you how well you\'re connecting with your audience. You get detailed reports for opens, clicks, unsubscribes, bounces, complains and much more, all shown in a simple and clear way.' => 
    array (
      0 => 'Berichte von {siteName} zeigen Ihnen, wie gut Sie mit Ihrem Publikum in Kontakt treten. Sie erhalten detaillierte Berichte über Öffnungen, Klicks, Abmeldungen, Bounces, Beschwerden und vieles mehr, alles in einer einfachen und klaren Weise dargestellt.',
    ),
    'Get started today with {siteName}, reach your target audience, improve conversions and grow your business.' => 
    array (
      0 => 'Starten Sie noch heute mit {siteName}, erreichen Sie Ihre Zielgruppe, verbessern Sie die Konversionen und wachsen Sie Ihr Geschäft.',
    ),
    'The "{command}" command did not run in the last {num}. Please check your cron jobs and make sure they are properly set!' => 
    array (
      0 => 'Der Befehl "{command}" wurde in den letzten {num} nicht ausgeführt. Bitte überprüfen Sie Ihre Cron-Jobs und stellen Sie sicher, dass sie richtig eingestellt sind!',
    ),
    'Domain blacklist' => 
    array (
      0 => 'Domain-Blacklist',
    ),
    'Queue monitor' => 
    array (
      0 => 'Warteschlangenmonitor',
    ),
    'Campaign info' => 
    array (
      0 => 'Kampagneninformationen',
    ),
    'Enter the message that explains why you disapprove this campaign' => 
    array (
      0 => 'Geben Sie die Nachricht ein, die erklärt, warum Sie diese Kampagne ablehnen',
    ),
    'Please specify a message that is at least {min} characters in length' => 
    array (
      0 => 'Bitte geben Sie eine Nachricht an, die mindestens {min} Zeichen lang ist',
    ),
    'View translations' => 
    array (
      0 => 'Übersetzungen anzeigen',
    ),
    'Create new menu' => 
    array (
      0 => 'Neues Menü erstellen',
    ),
    'Send groups' => 
    array (
      0 => 'Gruppen senden',
    ),
    'Abuse reports' => 
    array (
      0 => 'Missbrauchsberichte',
    ),
    'Please select an option.' => 
    array (
      0 => 'Bitte wählen Sie eine Option.',
    ),
    'Unable to complete the request' => 
    array (
      0 => 'Anfrage konnte nicht abgeschlossen werden',
    ),
    'View settings' => 
    array (
      0 => 'Einstellungen anzeigen',
    ),
    'Reverse proxy' => 
    array (
      0 => 'Reverse-Proxy',
    ),
    'Activate plan' => 
    array (
      0 => 'Plan aktivieren',
    ),
    'Double click to edit' => 
    array (
      0 => 'Doppelklicken zum Bearbeiten',
    ),
    'View notes' => 
    array (
      0 => 'Notizen anzeigen',
    ),
    'Accessing this resource require to impersonate its owner. Proceed?' => 
    array (
      0 => 'Der Zugriff auf diese Ressource erfordert die Nachahmung ihres Besitzers. Fortfahren?',
    ),
    'IP blacklist' => 
    array (
      0 => 'IP-Blacklist',
    ),
    'Landing pages' => 
    array (
      0 => 'Landing-Pages',
    ),
    'Once permissions are enabled, you need to explicitly select which permissions are assigned to this key. If you wish to allow all permissions, simply disable this option. If you wish to only allow a few permissions, enable this option, then select them from the list below.' => 
    array (
      0 => 'Sobald Berechtigungen aktiviert sind, müssen Sie explizit auswählen, welche Berechtigungen diesem Schlüssel zugewiesen werden. Wenn Sie alle Berechtigungen zulassen möchten, deaktivieren Sie einfach diese Option. Wenn Sie nur einige Berechtigungen zulassen möchten, aktivieren Sie diese Option und wählen Sie sie dann aus der Liste unten aus.',
    ),
    'List of IPs allowed to access the API using this key. Separate multiple IPs by a comma. IP ranges accepted' => 
    array (
      0 => 'Liste der IPs, die mit diesem Schlüssel auf die API zugreifen dürfen. Mehrere IPs durch ein Komma trennen. IP-Bereiche werden akzeptiert',
    ),
    'List of IPs denied to access the API using this key. Separate multiple IPs by a comma. IP ranges accepted' => 
    array (
      0 => 'Liste der IPs, die mit diesem Schlüssel keinen Zugriff auf die API haben. Mehrere IPs durch ein Komma trennen. IP-Bereiche werden akzeptiert',
    ),
    'Select none' => 
    array (
      0 => 'Nichts auswählen',
    ),
    'Currently, there is no data to be shown.' => 
    array (
      0 => 'Derzeit sind keine Daten verfügbar.',
    ),
    'remove this page from' => 
    array (
      0 => 'diese Seite entfernen von',
    ),
    'Are you sure you want to remove all items?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie alle Elemente entfernen möchten?',
    ),
    'Missing field name and value' => 
    array (
      0 => 'Feldname und Wert fehlen',
    ),
    'Archive/Unarchive' => 
    array (
      0 => 'Archivieren/Archivierung aufheben',
    ),
    'View campaigns tracking ignore list' => 
    array (
      0 => 'Kampagnen-Tracking-Ignore-Liste anzeigen',
    ),
    'The subscriber executed too many actions in a short period of time, after email delivery' => 
    array (
      0 => 'Der Abonnent hat nach der E-Mail-Zustellung zu viele Aktionen in kurzer Zeit ausgeführt',
    ),
    'Found in the campaign ignore list' => 
    array (
      0 => 'In der Kampagnen-Ignore-Liste gefunden',
    ),
    'The item has been successfully updated!' => 
    array (
      0 => 'Das Element wurde erfolgreich aktualisiert!',
    ),
    'The subscriber executed too many actions in a short period of time' => 
    array (
      0 => 'Der Abonnent hat zu viele Aktionen in kurzer Zeit ausgeführt',
    ),
    'Your IP Address' => 
    array (
      0 => 'Ihre IP-Adresse',
    ),
    'Your email address has been blocked.' => 
    array (
      0 => 'Ihre E-Mail-Adresse wurde blockiert.',
    ),
    'View unsent' => 
    array (
      0 => 'Nicht gesendete anzeigen',
    ),
    'View sent' => 
    array (
      0 => 'Gesendete anzeigen',
    ),
    'Campaigns tracking ignore list' => 
    array (
      0 => 'Kampagnen-Tracking-Ignore-Liste',
    ),
  ),
  'articles' => 
  array (
    'View article categories' => 
    array (
      0 => 'Artikelkategorien anzeigen',
    ),
    'Create new article category' => 
    array (
      0 => 'Neue Artikelkategorie erstellen',
    ),
    'Update article category' => 
    array (
      0 => 'Artikelkategorie aktualisieren',
    ),
    'View zones' => 
    array (
      0 => 'Zonen anzeigen',
    ),
    'View countries' => 
    array (
      0 => 'Länder anzeigen',
    ),
    'View articles' => 
    array (
      0 => 'Artikel anzeigen',
    ),
    'Create new article' => 
    array (
      0 => 'Neuen Artikel erstellen',
    ),
    'Update article' => 
    array (
      0 => 'Artikel aktualisieren',
    ),
    'This article is unpublished, only site admins can see it!' => 
    array (
      0 => 'Dieser Artikel ist unveröffentlicht, nur Seitenadministratoren können ihn sehen!',
    ),
    'All articles filled in under this category' => 
    array (
      0 => 'Alle Artikel, die unter dieser Kategorie eingeordnet sind',
    ),
    'We\'re sorry, but this category doesn\'t have any published article yet!' => 
    array (
      0 => 'Entschuldigung, aber diese Kategorie hat noch keine veröffentlichten Artikel!',
    ),
    'We\'re sorry, but for now there is no published article!' => 
    array (
      0 => 'Entschuldigung, aber derzeit gibt es keine veröffentlichten Artikel!',
    ),
  ),
  'backup_manager' => 
  array (
    'Your PHP version ({v1}) must be greater than {v2} in order for this feature to work!' => 
    array (
      0 => 'Ihre PHP-Version ({v1}) muss größer als {v2} sein, damit diese Funktion funktioniert!',
    ),
    'Please provide proper connection configuration, including hostname, username, password, port, etc!' => 
    array (
      0 => 'Bitte geben Sie eine korrekte Verbindungskonfiguration an, einschließlich Hostname, Benutzername, Passwort, Port usw.!',
    ),
    'The path on this file system where we should store the backups. Please note that your current system user must be able to write there. Also, do not set a path inside your public html folder since doing this will backup the previously made backups!' => 
    array (
      0 => 'Der Pfad auf diesem Dateisystem, in dem die Backups gespeichert werden sollen. Bitte beachten Sie, dass Ihr aktueller Systembenutzer dort schreiben können muss. Legen Sie außerdem keinen Pfad in Ihrem öffentlichen HTML-Ordner fest, da dadurch die zuvor erstellten Backups gesichert werden!',
    ),
    'Please provide proper connection configuration, including the access token!' => 
    array (
      0 => 'Bitte geben Sie eine korrekte Verbindungskonfiguration an, einschließlich des Zugriffstokens!',
    ),
    'Please provide proper connection configuration, including key, secret, region, bucket name, etc!' => 
    array (
      0 => 'Bitte geben Sie eine korrekte Verbindungskonfiguration an, einschließlich Schlüssel, Geheimnis, Region, Bucket-Name usw.!',
    ),
    'Invalid storage path, please supply a valid storage path!' => 
    array (
      0 => 'Ungültiger Speicherpfad, bitte geben Sie einen gültigen Speicherpfad an!',
    ),
    'Unable to create the directory, please check the permissions!' => 
    array (
      0 => 'Das Verzeichnis kann nicht erstellt werden, bitte überprüfen Sie die Berechtigungen!',
    ),
    'The url where the files will be uploaded. Check your spaces settings' => 
    array (
      0 => 'Die URL, unter der die Dateien hochgeladen werden. Überprüfen Sie Ihre Space-Einstellungen',
    ),
    'Please provide proper connection configuration, including key, secret, url, etc!' => 
    array (
      0 => 'Bitte geben Sie eine korrekte Verbindungskonfiguration an, einschließlich Schlüssel, Geheimnis, URL usw.!',
    ),
  ),
  'campaign_activity_map' => 
  array (
    'Opens at once' => 
    array (
      0 => 'Öffnungen auf einmal',
    ),
    'Clicks at once' => 
    array (
      0 => 'Klicks auf einmal',
    ),
    'Unsubscribes at once' => 
    array (
      0 => 'Abmeldungen auf einmal',
    ),
    'Google maps API key' => 
    array (
      0 => 'Google Maps API-Schlüssel',
    ),
    'Whether to show a map with location opens in campaign overview' => 
    array (
      0 => 'Ob eine Karte mit den Standorten der Öffnungen in der Kampagnenübersicht angezeigt werden soll',
    ),
    'Whether to show a map with location clicks in campaign overview' => 
    array (
      0 => 'Ob eine Karte mit den Standorten der Klicks in der Kampagnenübersicht angezeigt werden soll',
    ),
    'How many open records to load at once per ajax call? More records means more memory usage' => 
    array (
      0 => 'Wie viele Öffnungsdatensätze sollen pro Ajax-Aufruf auf einmal geladen werden? Mehr Datensätze bedeuten mehr Speicherverbrauch',
    ),
    'How many click records to load at once per ajax call? More records means more memory usage' => 
    array (
      0 => 'Wie viele Klickdatensätze sollen pro Ajax-Aufruf auf einmal geladen werden? Mehr Datensätze bedeuten mehr Speicherverbrauch',
    ),
    'Whether to show a map with location from where subscribers unsubscribed in campaign overview' => 
    array (
      0 => 'Ob eine Karte mit den Standorten angezeigt werden soll, von denen sich Abonnenten in der Kampagnenübersicht abgemeldet haben',
    ),
    'How many unsubscribe records to load at once per ajax call? More records means more memory usage' => 
    array (
      0 => 'Wie viele Abmeldedatensätze sollen pro Ajax-Aufruf auf einmal geladen werden? Mehr Datensätze bedeuten mehr Speicherverbrauch',
    ),
    'Your google maps API key. It is optional but needed if you go over the free quota assigned by Google' => 
    array (
      0 => 'Ihr Google Maps API-Schlüssel. Er ist optional, aber erforderlich, wenn Sie das von Google zugewiesene kostenlose Kontingent überschreiten',
    ),
    'Campaign activity map' => 
    array (
      0 => 'Kampagnenaktivitätskarte',
    ),
    'Decide whether to show various maps in the campaign overview area.' => 
    array (
      0 => 'Entscheiden Sie, ob verschiedene Karten im Bereich der Kampagnenübersicht angezeigt werden sollen.',
    ),
  ),
  'campaign_reports' => 
  array (
    'View what was sent' => 
    array (
      0 => 'Anzeigen, was gesendet wurde',
    ),
    'Total clicks / Total clicks rate' => 
    array (
      0 => 'Gesamtklicks / Gesamtklickrate',
    ),
    'Clicks to opens rate' => 
    array (
      0 => 'Klick-zu-Öffnungs-Rate',
    ),
    'Click through rate' => 
    array (
      0 => 'Durchklickrate',
    ),
    'Industry avg({industry})' => 
    array (
      0 => 'Branchen-Durchschnitt({industry})',
    ),
    'Total opens / Total opens rate' => 
    array (
      0 => 'Gesamtöffnungen / Gesamtöffnungsrate',
    ),
    'Opens to clicks rate' => 
    array (
      0 => 'Öffnungs-zu-Klick-Rate',
    ),
    'Bounce rate' => 
    array (
      0 => 'Absprungrate',
    ),
    'Hard bounces' => 
    array (
      0 => 'Harte Bounces',
    ),
    'Hard bounces rate' => 
    array (
      0 => 'Rate harter Bounces',
    ),
    'Soft bounces' => 
    array (
      0 => 'Weiche Bounces',
    ),
    'Soft bounces rate' => 
    array (
      0 => 'Rate weicher Bounces',
    ),
    'View campaign reports' => 
    array (
      0 => 'Kampagnenberichte anzeigen',
    ),
    'The campaign {name} has finished sending, here are the stats' => 
    array (
      0 => 'Die Kampagne {name} wurde abgeschlossen, hier sind die Statistiken',
    ),
    'Activity map (click to view)' => 
    array (
      0 => 'Aktivitätskarte (zum Anzeigen klicken)',
    ),
    'Enter full screen' => 
    array (
      0 => 'Vollbildmodus aktivieren',
    ),
    'Exit full screen' => 
    array (
      0 => 'Vollbildmodus verlassen',
    ),
    'Loading page number {pageNumber}...' => 
    array (
      0 => 'Lade Seite Nummer {pageNumber}...',
    ),
    'Done loading records.' => 
    array (
      0 => 'Datensätze wurden geladen.',
    ),
    'Tracking stats' => 
    array (
      0 => 'Tracking-Statistiken',
    ),
    'Export basic stats' => 
    array (
      0 => 'Grundlegende Statistiken exportieren',
    ),
    'Total clicks' => 
    array (
      0 => 'Gesamtklicks',
    ),
    'Total opens' => 
    array (
      0 => 'Gesamtöffnungen',
    ),
    'View details' => 
    array (
      0 => 'Details anzeigen',
    ),
    'View all clicks' => 
    array (
      0 => 'Alle Klicks anzeigen',
    ),
    'View latest clicks' => 
    array (
      0 => 'Neueste Klicks anzeigen',
    ),
    'View top clicks' => 
    array (
      0 => 'Top-Klicks anzeigen',
    ),
    'Sent emails report' => 
    array (
      0 => 'Bericht über gesendete E-Mails',
    ),
    'Unique opens report' => 
    array (
      0 => 'Bericht über eindeutige Öffnungen',
    ),
    'Your reports were successfully deleted!' => 
    array (
      0 => 'Ihre Berichte wurden erfolgreich gelöscht!',
    ),
    'Top clicks report' => 
    array (
      0 => 'Bericht über Top-Klicks',
    ),
    'Latest clicks report' => 
    array (
      0 => 'Bericht über neueste Klicks',
    ),
    'Url clicks report' => 
    array (
      0 => 'Bericht über URL-Klicks',
    ),
    'Forward to a friend report' => 
    array (
      0 => 'Bericht über Weiterleitungen an Freunde',
    ),
    'Abuse reports' => 
    array (
      0 => 'Missbrauchsberichte',
    ),
    'Sent with success' => 
    array (
      0 => 'Erfolgreich gesendet',
    ),
    'Sent success rate' => 
    array (
      0 => 'Erfolgsrate beim Senden',
    ),
    'Send error' => 
    array (
      0 => 'Sende-Fehler',
    ),
    'Send error rate' => 
    array (
      0 => 'Fehlerrate beim Senden',
    ),
    'Unique open rate' => 
    array (
      0 => 'Eindeutige Öffnungsrate',
    ),
    'Bounced back' => 
    array (
      0 => 'Zurückgeprallt',
    ),
    'Hard bounce' => 
    array (
      0 => 'Harter Bounce',
    ),
    'Hard bounce rate' => 
    array (
      0 => 'Rate harter Bounces',
    ),
    'Soft bounce' => 
    array (
      0 => 'Weicher Bounce',
    ),
    'Soft bounce rate' => 
    array (
      0 => 'Rate weicher Bounces',
    ),
    'Total urls for tracking' => 
    array (
      0 => 'Gesamtanzahl der URLs für das Tracking',
    ),
    'Send at' => 
    array (
      0 => 'Gesendet am',
    ),
    'Last updated' => 
    array (
      0 => 'Zuletzt aktualisiert',
    ),
    'Process status' => 
    array (
      0 => 'Prozessstatus',
    ),
    'Sent' => 
    array (
      0 => 'Gesendet',
    ),
    'Bounce type' => 
    array (
      0 => 'Bounce-Typ',
    ),
    'Open times' => 
    array (
      0 => 'Öffnungszeiten',
    ),
    'Campaigns Opens' => 
    array (
      0 => 'Kampagnen-Öffnungen',
    ),
    'View all opens' => 
    array (
      0 => 'Alle Öffnungen anzeigen',
    ),
    'Back to all clicks report' => 
    array (
      0 => 'Zurück zum Bericht über alle Klicks',
    ),
    'Update subscriber' => 
    array (
      0 => 'Abonnent aktualisieren',
    ),
    'Delete subscriber' => 
    array (
      0 => 'Abonnent löschen',
    ),
    'Export success only' => 
    array (
      0 => 'Nur erfolgreiche Exporte',
    ),
    'Export error only' => 
    array (
      0 => 'Nur Fehlerexporte',
    ),
    'Export giveup only' => 
    array (
      0 => 'Nur abgebrochene Exporte',
    ),
    'Export blacklist only' => 
    array (
      0 => 'Nur Blacklist-Exporte',
    ),
    'View all clicks by this subscriber' => 
    array (
      0 => 'Alle Klicks dieses Abonnenten anzeigen',
    ),
    'This report shows all the clicks the url {url} has received but also shows who clicked the url.' => 
    array (
      0 => 'Dieser Bericht zeigt alle Klicks, die die URL {url} erhalten hat, und wer die URL geklickt hat.',
    ),
    'Top clicks' => 
    array (
      0 => 'Top-Klicks',
    ),
    'Are you sure you want to remove these reports? There is no coming back after this!' => 
    array (
      0 => 'Sind Sie sicher, dass Sie diese Berichte entfernen möchten? Dies kann nicht rückgängig gemacht werden!',
    ),
    'View all clicks for this url' => 
    array (
      0 => 'Alle Klicks für diese URL anzeigen',
    ),
    'This report shows all the urls from the email and the number of clicks each url received.' => 
    array (
      0 => 'Dieser Bericht zeigt alle URLs aus der E-Mail und die Anzahl der Klicks, die jede URL erhalten hat.',
    ),
    'View all campaign opens' => 
    array (
      0 => 'Alle Kampagnen-Öffnungen anzeigen',
    ),
    'View unique opens' => 
    array (
      0 => 'Eindeutige Öffnungen anzeigen',
    ),
    'View only unique opens' => 
    array (
      0 => 'Nur eindeutige Öffnungen anzeigen',
    ),
    'This report shows all the unsubscribes for this campaign.' => 
    array (
      0 => 'Dieser Bericht zeigt alle Abmeldungen für diese Kampagne.',
    ),
    'View unique opens only' => 
    array (
      0 => 'Nur eindeutige Öffnungen anzeigen',
    ),
    'View all opens by this subscriber' => 
    array (
      0 => 'Alle Öffnungen dieses Abonnenten anzeigen',
    ),
    'Invalid credentials!' => 
    array (
      0 => 'Ungültige Anmeldedaten!',
    ),
    'Login to view reports' => 
    array (
      0 => 'Anmelden, um Berichte anzuzeigen',
    ),
    'This report shows all the subscribers that were processed in order to receive your email.<br /> It also show if the emails have been sent successfully or not.' => 
    array (
      0 => 'Dieser Bericht zeigt alle Abonnenten, die verarbeitet wurden, um Ihre E-Mail zu erhalten.<br /> Er zeigt auch, ob die E-Mails erfolgreich gesendet wurden oder nicht.',
    ),
    'This report shows the unique opens for this campaign, if a subscriber opens the email twice, you will see it only once and you also will see how many times it was opened.<br /> If you need to see all the opens please click <a href="{href}">here</a>.' => 
    array (
      0 => 'Dieser Bericht zeigt die eindeutigen Öffnungen für diese Kampagne. Wenn ein Abonnent die E-Mail zweimal öffnet, wird sie nur einmal angezeigt, und Sie sehen auch, wie oft sie geöffnet wurde.<br /> Wenn Sie alle Öffnungen sehen möchten, klicken Sie bitte <a href="{href}">hier</a>.',
    ),
  ),
  'common_email_templates' => 
  array (
    'View email templates' => 
    array (
      0 => 'E-Mail-Vorlagen anzeigen',
    ),
    'Create new template' => 
    array (
      0 => 'Neue Vorlage erstellen',
    ),
    'Update template' => 
    array (
      0 => 'Vorlage aktualisieren',
    ),
    'This will delete the core email templates and will reinstall them based on the common template. Are you sure you want to continue?' => 
    array (
      0 => 'Dies wird die Kern-E-Mail-Vorlagen löschen und basierend auf der allgemeinen Vorlage neu installieren. Sind Sie sicher, dass Sie fortfahren möchten?',
    ),
    'Reinstall core templates' => 
    array (
      0 => 'Kernvorlagen neu installieren',
    ),
    'The name of the template, used internally mostly' => 
    array (
      0 => 'Der Name der Vorlage, hauptsächlich intern verwendet',
    ),
    'The subject which will be used for this email' => 
    array (
      0 => 'Der Betreff, der für diese E-Mail verwendet wird',
    ),
    'The email content' => 
    array (
      0 => 'Der E-Mail-Inhalt',
    ),
    'Shows the current date' => 
    array (
      0 => 'Zeigt das aktuelle Datum an',
    ),
    'Shows the current year' => 
    array (
      0 => 'Zeigt das aktuelle Jahr an',
    ),
    'Shows the current month' => 
    array (
      0 => 'Zeigt den aktuellen Monat an',
    ),
    'Shows the current day' => 
    array (
      0 => 'Zeigt den aktuellen Tag an',
    ),
    'Shows the site name' => 
    array (
      0 => 'Zeigt den Namen der Website an',
    ),
  ),
  'console' => 
  array (
    'Start memory' => 
    array (
      0 => 'Startspeicher',
    ),
    'End memory' => 
    array (
      0 => 'Endspeicher',
    ),
    'Memory usage' => 
    array (
      0 => 'Speichernutzung',
    ),
  ),
  'countries' => 
  array (
    'View countries' => 
    array (
      0 => 'Länder anzeigen',
    ),
    'Create new country' => 
    array (
      0 => 'Neues Land erstellen',
    ),
    'Update country' => 
    array (
      0 => 'Land aktualisieren',
    ),
    'Confirm country removal' => 
    array (
      0 => 'Löschung des Landes bestätigen',
    ),
    'Please note that removing this country will also remove every record that depends on it, such as zones, taxes, customer companies, etc!' => 
    array (
      0 => 'Bitte beachten Sie, dass das Entfernen dieses Landes auch alle Datensätze entfernt, die davon abhängen, wie Zonen, Steuern, Kundenunternehmen usw.!',
    ),
    'Are you still sure you want to remove this country? There is no coming back after you do it!' => 
    array (
      0 => 'Sind Sie sich immer noch sicher, dass Sie dieses Land entfernen möchten? Es gibt kein Zurück mehr, nachdem Sie es getan haben!',
    ),
  ),
  'currencies' => 
  array (
    'View currencies' => 
    array (
      0 => 'Währungen anzeigen',
    ),
    'Create new currency' => 
    array (
      0 => 'Neue Währung erstellen',
    ),
    'Update currency' => 
    array (
      0 => 'Währung aktualisieren',
    ),
    'Unrecognized currecy code!' => 
    array (
      0 => 'Nicht erkannter Währungscode!',
    ),
  ),
  'dashboard' => 
  array (
    'Are you sure you want to remove all blacklisted emails?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie alle blockierten E-Mails entfernen möchten?',
    ),
    'Are you sure you want to remove all login logs?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie alle Anmeldeprotokolle entfernen möchten?',
    ),
    'Are you sure you want to remove all blacklist monitors?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie alle Blacklist-Überwachungen entfernen möchten?',
    ),
    'Are you sure you want to remove all suppressed emails?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie alle unterdrückten E-Mails entfernen möchten?',
    ),
    'Are you sure you want to remove all suppressed IPs?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie alle unterdrückten IPs entfernen möchten?',
    ),
  ),
  'html_blocks' => 
  array (
    'Html blocks' => 
    array (
      0 => 'HTML Blöcke',
    ),
    'Customer area footer' => 
    array (
      0 => 'Kundenbereich Fußzeile',
    ),
    'Html shown in footer area of the customers' => 
    array (
      0 => 'HTML, das im Fußbereich der Kunden angezeigt wird',
    ),
  ),
  'ip_blacklist' => 
  array (
    'Please note, the csv file must contain a header with at least the ip_address column.' => 
    array (
      0 => 'Bitte beachten Sie, dass die CSV-Datei eine Kopfzeile mit mindestens der Spalte ip_address enthalten muss.',
    ),
    'Add a new IP to blacklist' => 
    array (
      0 => 'Neue IP zur Blacklist hinzufügen',
    ),
    'Please enter a valid IP address!' => 
    array (
      0 => 'Bitte geben Sie eine gültige IP-Adresse ein!',
    ),
    'Update blacklisted IP' => 
    array (
      0 => 'Schwarze Liste IP aktualisieren',
    ),
  ),
  'languages' => 
  array (
    'View available languages' => 
    array (
      0 => 'Verfügbare Sprachen anzeigen',
    ),
    'Create new language' => 
    array (
      0 => 'Neue Sprache erstellen',
    ),
    'Update language' => 
    array (
      0 => 'Sprache aktualisieren',
    ),
    'Your language pack has been successfully uploaded!' => 
    array (
      0 => 'Ihr Sprachpaket wurde erfolgreich hochgeladen!',
    ),
    'Please select a language pack archive for upload!' => 
    array (
      0 => 'Bitte wählen Sie ein Sprachpaket-Archiv zum Hochladen aus!',
    ),
    'Please note that only zip files are allowed for upload.' => 
    array (
      0 => 'Bitte beachten Sie, dass nur ZIP-Dateien hochgeladen werden dürfen.',
    ),
    'Language packs contain executable PHP files, please check the packs before upload.' => 
    array (
      0 => 'Sprachpakete enthalten ausführbare PHP-Dateien, bitte überprüfen Sie die Pakete vor dem Hochladen.',
    ),
    'Is default language?' => 
    array (
      0 => 'Ist Standardsprache?',
    ),
    'The visible language name to distinct between same language but distinct regions (i.e: between English US and English GB)' => 
    array (
      0 => 'Der sichtbare Sprachname zur Unterscheidung zwischen derselben Sprache, aber unterschiedlichen Regionen (z. B.: zwischen Englisch US und Englisch GB)',
    ),
    '2 letter language code, i.e: en' => 
    array (
      0 => '2-Buchstaben-Sprachcode, z. B.: en',
    ),
    '2 letter region code, i.e: us. Please do not fill this field unless necessary. For most of the cases, the language code is enough' => 
    array (
      0 => '2-Buchstaben-Regionscode, z. B.: us. Bitte füllen Sie dieses Feld nur aus, wenn es notwendig ist. In den meisten Fällen reicht der Sprachcode aus',
    ),
    'Whether this language is the default language for users/customers that have not set a language' => 
    array (
      0 => 'Ob diese Sprache die Standardsprache für Benutzer/Kunden ist, die keine Sprache festgelegt haben',
    ),
    'i.e: English - United States' => 
    array (
      0 => 'z. B.: Englisch - Vereinigte Staaten',
    ),
    'The language directory {dirName} is not valid and was deleted!' => 
    array (
      0 => 'Das Sprachverzeichnis {dirName} ist ungültig und wurde gelöscht!',
    ),
    'The language "{languageName}" cannot be saved, failure reason: ' => 
    array (
      0 => 'Die Sprache "{languageName}" kann nicht gespeichert werden, Fehlergrund: ',
    ),
    'Duplicate entry for the language and region code combination!' => 
    array (
      0 => 'Doppelter Eintrag für die Kombination aus Sprach- und Regionscode!',
    ),
  ),
  'list' => 
  array (
    'Your mail list does not have any field defined.' => 
    array (
      0 => 'Ihre Mailingliste hat kein definiertes Feld.',
    ),
  ),
  'list_export' => 
  array (
    'Export subscribers from your list' => 
    array (
      0 => 'Abonnenten aus Ihrer Liste exportieren',
    ),
    'Your list has no subscribers to export!' => 
    array (
      0 => 'Ihre Liste enthält keine Abonnenten zum Exportieren!',
    ),
    'Cannot create the storage directory for your export!' => 
    array (
      0 => 'Das Speicherverzeichnis für Ihren Export kann nicht erstellt werden!',
    ),
    'Cannot open the storage file for your export!' => 
    array (
      0 => 'Die Speicherdatei für Ihren Export kann nicht geöffnet werden!',
    ),
    'Successfully added the email "{email}" to the export list.' => 
    array (
      0 => 'Die E-Mail-Adresse "{email}" wurde erfolgreich zur Exportliste hinzugefügt.',
    ),
    'The export is now complete, starting the packing process...' => 
    array (
      0 => 'Der Export ist abgeschlossen, der Verpackungsprozess wird gestartet...',
    ),
    'Packing done, your file will be downloaded now, please wait...' => 
    array (
      0 => 'Verpackung abgeschlossen, Ihre Datei wird jetzt heruntergeladen, bitte warten...',
    ),
    'Please wait, starting another batch...' => 
    array (
      0 => 'Bitte warten, ein weiterer Stapel wird gestartet...',
    ),
    'The export file has been deleted.' => 
    array (
      0 => 'Die Exportdatei wurde gelöscht.',
    ),
    'Export subscribers from your list segment' => 
    array (
      0 => 'Abonnenten aus Ihrem Listen-Segment exportieren',
    ),
    'CSV export progress' => 
    array (
      0 => 'CSV-Exportfortschritt',
    ),
    'From a total of {total} subscribers, so far {totalProcessed} have been processed, {successfullyProcessed} successfully and {errorProcessing} with errors. {percentage} completed.' => 
    array (
      0 => 'Von insgesamt {total} Abonnenten wurden bisher {totalProcessed} verarbeitet, {successfullyProcessed} erfolgreich und {errorProcessing} mit Fehlern. {percentage} abgeschlossen.',
    ),
    'The export process is starting, please wait...' => 
    array (
      0 => 'Der Exportvorgang wird gestartet, bitte warten...',
    ),
  ),
  'list_forms' => 
  array (
    'List embed forms' => 
    array (
      0 => 'Listen-Einbettungsformulare',
    ),
    'Your mail list forms' => 
    array (
      0 => 'Ihre Mailinglistenformulare',
    ),
    'Iframe version' => 
    array (
      0 => 'Iframe-Version',
    ),
    'Please type your email address' => 
    array (
      0 => 'Bitte geben Sie Ihre E-Mail-Adresse ein',
    ),
    'Please note, you will have to style the forms below to match the place where you embed them.<br /> You can create better forms by using the <a href="{sdkHref}" target="_blank">PHP-SDK</a> and connect to the provided api.' => 
    array (
      0 => 'Bitte beachten Sie, dass Sie die untenstehenden Formulare an den Ort anpassen müssen, an dem Sie sie einbetten.<br /> Sie können bessere Formulare erstellen, indem Sie das <a href="{sdkHref}" target="_blank">PHP-SDK</a> verwenden und sich mit der bereitgestellten API verbinden.',
    ),
  ),
  'list_page_types' => 
  array (
    'List page types' => 
    array (
      0 => 'Listenseitentypen',
    ),
    'Update page type' => 
    array (
      0 => 'Seitentyp aktualisieren',
    ),
    'Type' => 
    array (
      0 => 'Typ',
    ),
    'Email subject' => 
    array (
      0 => 'E-Mail-Betreff',
    ),
    'Please note, these pages are the base pages shown in customers area for each list.<br /> The customer has the ability to modify them to fit their needs for any particular list.' => 
    array (
      0 => 'Bitte beachten Sie, dass diese Seiten die Basisseiten sind, die im Kundenbereich für jede Liste angezeigt werden.<br /> Der Kunde hat die Möglichkeit, sie an die Anforderungen einer bestimmten Liste anzupassen.',
    ),
  ),
  'list_pages' => 
  array (
    'Type' => 
    array (
      0 => 'Typ',
    ),
    'Email subject' => 
    array (
      0 => 'E-Mail-Betreff',
    ),
    'The following tag is required but was not found in your content: {tag}' => 
    array (
      0 => 'Das folgende Tag ist erforderlich, wurde jedoch nicht in Ihrem Inhalt gefunden: {tag}',
    ),
    'Select another list page to edit' => 
    array (
      0 => 'Wählen Sie eine andere Listenseite zum Bearbeiten aus',
    ),
    'Your unsubscribe form url is:' => 
    array (
      0 => 'Ihre Abmeldeformular-URL lautet:',
    ),
    'Preview it now!' => 
    array (
      0 => 'Jetzt Vorschau anzeigen!',
    ),
    'Your subscribe form url is:' => 
    array (
      0 => 'Ihre Anmeldeformular-URL lautet:',
    ),
    'Update Profile' => 
    array (
      0 => 'Profil aktualisieren',
    ),
    'Unsubscribe confirmation' => 
    array (
      0 => 'Abmeldebestätigung',
    ),
    'Subscribe confirm email' => 
    array (
      0 => 'Anmeldebestätigungs-E-Mail',
    ),
    'Unsubscribe confirm email' => 
    array (
      0 => 'Abmeldebestätigungs-E-Mail',
    ),
    'Welcome email' => 
    array (
      0 => 'Willkommens-E-Mail',
    ),
    'Subscription confirmed approval' => 
    array (
      0 => 'Bestätigung der Anmeldung genehmigt',
    ),
    'Subscription confirmed approval email' => 
    array (
      0 => 'E-Mail zur Genehmigung der Anmeldebestätigung',
    ),
  ),
  'mailer' => 
  array (
    'System testing mailer, only simulate sending.' => 
    array (
      0 => 'Systemtest-Mailer, nur Versand simulieren.',
    ),
    'A fully compliant mailer.' => 
    array (
      0 => 'Ein vollständig konformer Mailer.',
    ),
  ),
  'menus' => 
  array (
    'View menus' => 
    array (
      0 => 'Menüs anzeigen',
    ),
    'Create new menu' => 
    array (
      0 => 'Neues Menü erstellen',
    ),
    'Items' => 
    array (
      0 => 'Elemente',
    ),
    'Item' => 
    array (
      0 => 'Element',
    ),
    'Label' => 
    array (
      0 => 'Bezeichnung',
    ),
    'Sort order' => 
    array (
      0 => 'Sortierreihenfolge',
    ),
    'Update menu' => 
    array (
      0 => 'Menü aktualisieren',
    ),
  ),
  'messages' => 
  array (
    'View messages' => 
    array (
      0 => 'Nachrichten anzeigen',
    ),
    'Create new message' => 
    array (
      0 => 'Neue Nachricht erstellen',
    ),
    'Update message' => 
    array (
      0 => 'Nachricht aktualisieren',
    ),
    'View message' => 
    array (
      0 => 'Nachricht anzeigen',
    ),
    'All messages were marked as seen!' => 
    array (
      0 => 'Alle Nachrichten wurden als gelesen markiert!',
    ),
    'You have {n} unread messages!' => 
    array (
      0 => 'Sie haben {n} ungelesene Nachrichten!',
    ),
    'See all messages' => 
    array (
      0 => 'Alle Nachrichten anzeigen',
    ),
    'Email "{email}" has requested to be blocked! You can see more details {here}!' => 
    array (
      0 => 'Die E-Mail-Adresse "{email}" hat beantragt, blockiert zu werden! Weitere Details finden Sie {hier}!',
    ),
    'A new abuse report has been created for the campaign "{campaign_name}". Please visit the "<a href="{abuse_reports_url}">Abuse Reports</a>" area to handle it!' => 
    array (
      0 => 'Ein neuer Missbrauchsbericht wurde für die Kampagne "{campaign_name}" erstellt. Bitte besuchen Sie den Bereich "<a href="{abuse_reports_url}">Missbrauchsberichte</a>", um ihn zu bearbeiten!',
    ),
    'A subscriber has been rejected from joining the {list} list because the system was not able to find a suitable delivery server to send the email' => 
    array (
      0 => 'Ein Abonnent wurde daran gehindert, der Liste {list} beizutreten, da das System keinen geeigneten Zustellserver für den Versand der E-Mail finden konnte',
    ),
  ),
  'misc' => 
  array (
    'View campaigns delivery logs' => 
    array (
      0 => 'Kampagnen-Übermittlungsprotokolle anzeigen',
    ),
    'Campaigns delivery logs' => 
    array (
      0 => 'Kampagnen-Übermittlungsprotokolle',
    ),
    'View campaigns bounce logs' => 
    array (
      0 => 'Kampagnen-Bounce-Protokolle anzeigen',
    ),
    'Campaigns bounce logs' => 
    array (
      0 => 'Kampagnen-Bounce-Protokolle',
    ),
    'View campaigns stats' => 
    array (
      0 => 'Kampagnenstatistiken anzeigen',
    ),
    'View delivery servers usage logs' => 
    array (
      0 => 'Nutzungsprotokolle der Zustellserver anzeigen',
    ),
    'Delivery servers usage logs' => 
    array (
      0 => 'Nutzungsprotokolle der Zustellserver',
    ),
    'Delivery temporary errors were successfully deleted!' => 
    array (
      0 => 'Vorübergehende Zustellfehler wurden erfolgreich gelöscht!',
    ),
    'View PHP info' => 
    array (
      0 => 'PHP-Informationen anzeigen',
    ),
    'PHP info' => 
    array (
      0 => 'PHP-Informationen',
    ),
    'View archived logs' => 
    array (
      0 => 'Archivierte Protokolle anzeigen',
    ),
    'View current logs' => 
    array (
      0 => 'Aktuelle Protokolle anzeigen',
    ),
    'Delete delivery temporary errors' => 
    array (
      0 => 'Vorübergehende Zustellfehler löschen',
    ),
    'Are you sure you want to delete the delivery temporary errors? Please note that this will affect running campaigns, continue only if you really know what you are doing!' => 
    array (
      0 => 'Sind Sie sicher, dass Sie die vorübergehenden Zustellfehler löschen möchten? Bitte beachten Sie, dass dies laufende Kampagnen beeinflussen wird. Fahren Sie nur fort, wenn Sie wirklich wissen, was Sie tun!',
    ),
  ),
  'notes' => 
  array (
    'View notes for {name}' => 
    array (
      0 => 'Notizen für {name} anzeigen',
    ),
    'Created by' => 
    array (
      0 => 'Erstellt von',
    ),
    'View notes' => 
    array (
      0 => 'Notizen anzeigen',
    ),
    'Create new note' => 
    array (
      0 => 'Neue Notiz erstellen',
    ),
    'Your note contents. Please keep in mind that it will be encrypted' => 
    array (
      0 => 'Der Inhalt Ihrer Notiz. Bitte beachten Sie, dass er verschlüsselt wird',
    ),
    'Update note' => 
    array (
      0 => 'Notiz aktualisieren',
    ),
    'Create new note for {name}' => 
    array (
      0 => 'Neue Notiz für {name} erstellen',
    ),
    'Update note for {name}' => 
    array (
      0 => 'Notiz für {name} aktualisieren',
    ),
  ),
  'pages' => 
  array (
    'View pages' => 
    array (
      0 => 'Seiten anzeigen',
    ),
    'Create new page' => 
    array (
      0 => 'Neue Seite erstellen',
    ),
    'Update page' => 
    array (
      0 => 'Seite aktualisieren',
    ),
    'This page is inactive, only site admins can see it!' => 
    array (
      0 => 'Diese Seite ist inaktiv, nur Seitenadministratoren können sie sehen!',
    ),
  ),
  'payment_gateway_stripe' => 
  array (
    'Your credit card number seems invalid!' => 
    array (
      0 => 'Ihre Kreditkartennummer scheint ungültig zu sein!',
    ),
    'All your data is sent over a secure connection without touching our server.' => 
    array (
      0 => 'Alle Ihre Daten werden über eine sichere Verbindung gesendet, ohne unseren Server zu berühren.',
    ),
  ),
  'payment_gateway_stripe_subscriptions' => 
  array (
    'Please do not forget to add the webhook url into your Stripe dashboard, this is maybe the most important thing you have to do, without it, customers will not be assigned to customer groups.' => 
    array (
      0 => 'Bitte vergessen Sie nicht, die Webhook-URL in Ihrem Stripe-Dashboard hinzuzufügen. Dies ist möglicherweise das Wichtigste, was Sie tun müssen. Ohne sie werden Kunden nicht Kundengruppen zugewiesen.',
    ),
    'The webhook url that you have to add is: {url}' => 
    array (
      0 => 'Die Webhook-URL, die Sie hinzufügen müssen, lautet: {url}',
    ),
    'Please note that {here} you have a screenshot showing how the webhook has to be added and what event type you must select.' => 
    array (
      0 => 'Bitte beachten Sie, dass Sie {here} einen Screenshot haben, der zeigt, wie der Webhook hinzugefügt werden muss und welchen Ereignistyp Sie auswählen müssen.',
    ),
    'Subscriptions are created on a monthly basis, so please make sure your customer groups sending quota targets the monthly time unit, this is very important.' => 
    array (
      0 => 'Abonnements werden monatlich erstellt. Bitte stellen Sie sicher, dass die Versandquote Ihrer Kundengruppen auf die monatliche Zeiteinheit ausgerichtet ist. Dies ist sehr wichtig.',
    ),
  ),
  'payment_gateway_twocheckout' => 
  array (
    'Please wait, processing your request, this might take a while...' => 
    array (
      0 => 'Bitte warten Sie, Ihre Anfrage wird bearbeitet, dies kann eine Weile dauern...',
    ),
    'All your data is sent over a secure connection without touching our server.' => 
    array (
      0 => 'Alle Ihre Daten werden über eine sichere Verbindung gesendet, ohne unseren Server zu berühren.',
    ),
    'Please go to your {account} and fill in your company info before checking out.' => 
    array (
      0 => 'Bitte gehen Sie zu Ihrem {account} und füllen Sie Ihre Unternehmensinformationen aus, bevor Sie zur Kasse gehen.',
    ),
  ),
  'payment_gateways' => 
  array (
    'Payment gateways' => 
    array (
      0 => 'Zahlungsgateways',
    ),
    'Sort order' => 
    array (
      0 => 'Sortierreihenfolge',
    ),
    'Gateway detail page' => 
    array (
      0 => 'Detailseite des Gateways',
    ),
    'The payment gateways are implemented as extensions, you\'ll want to enable them from the extensions area first and then manage them from here.' => 
    array (
      0 => 'Die Zahlungsgateways werden als Erweiterungen implementiert. Sie sollten sie zuerst im Erweiterungsbereich aktivieren und dann von hier aus verwalten.',
    ),
  ),
  'promo_codes' => 
  array (
    'View promo codes' => 
    array (
      0 => 'Promo-Codes anzeigen',
    ),
    'Promo codes' => 
    array (
      0 => 'Promo-Codes',
    ),
    'Create new promo code' => 
    array (
      0 => 'Neuen Promo-Code erstellen',
    ),
    'Update promo code' => 
    array (
      0 => 'Promo-Code aktualisieren',
    ),
    'Type' => 
    array (
      0 => 'Typ',
    ),
    'Total usage' => 
    array (
      0 => 'Gesamtnutzung',
    ),
    'Customer usage' => 
    array (
      0 => 'Kundennutzung',
    ),
    'The promotional code' => 
    array (
      0 => 'Der Promo-Code',
    ),
    'The type of the promotional code' => 
    array (
      0 => 'Der Typ des Promo-Codes',
    ),
    'The discount received after applying this promotional code' => 
    array (
      0 => 'Der Rabatt, der nach Anwendung dieses Promo-Codes gewährt wird',
    ),
    'The amount of the price plan in order for this promotional code to apply' => 
    array (
      0 => 'Der Betrag des Preisplans, damit dieser Promo-Code gilt',
    ),
    'The maximum number of usages for this promotional code. Set it to 0 for unlimited' => 
    array (
      0 => 'Die maximale Anzahl der Nutzungen für diesen Promo-Code. Auf 0 setzen für unbegrenzt',
    ),
    'How many times a customer can use this promotional code. Set it to 0 for unlimited' => 
    array (
      0 => 'Wie oft ein Kunde diesen Promo-Code nutzen kann. Auf 0 setzen für unbegrenzt',
    ),
    'The start date for this promotional code' => 
    array (
      0 => 'Das Startdatum für diesen Promo-Code',
    ),
    'The end date for this promotional code' => 
    array (
      0 => 'Das Enddatum für diesen Promo-Code',
    ),
  ),
  'queue' => 
  array (
    'View queue tasks' => 
    array (
      0 => 'Warteschlangenaufgaben anzeigen',
    ),
    'Message ID' => 
    array (
      0 => 'Nachrichten-ID',
    ),
  ),
  'recaptcha' => 
  array (
    'Recaptcha' => 
    array (
      0 => 'ReCaptcha',
    ),
    'Additional domains and key pairs' => 
    array (
      0 => 'Zusätzliche Domains und Schlüsselpaaren',
    ),
    'Site key' => 
    array (
      0 => 'Seitenschlüssel',
    ),
    'Secret key' => 
    array (
      0 => 'Geheimschlüssel',
    ),
    'The domain(s) where this key pair will be applied' => 
    array (
      0 => 'Die Domain(s), auf die dieses Schlüsselpaar angewendet wird',
    ),
    'The site key for recaptcha service' => 
    array (
      0 => 'Der Seitenschlüssel für den ReCaptcha-Dienst',
    ),
    'The secret key for recaptcha service' => 
    array (
      0 => 'Der Geheimschlüssel für den ReCaptcha-Dienst',
    ),
    'Enabled for list forms' => 
    array (
      0 => 'Aktiviert für Listenformulare',
    ),
    'Enable for registration' => 
    array (
      0 => 'Für Registrierung aktivieren',
    ),
    'Enable for login' => 
    array (
      0 => 'Für Login aktivieren',
    ),
    'Enable for forgot password' => 
    array (
      0 => 'Für Passwort vergessen aktivieren',
    ),
    'Whether the feature is enabled for list forms' => 
    array (
      0 => 'Ob die Funktion für Listenformulare aktiviert ist',
    ),
    'Whether the feature is enabled for registration' => 
    array (
      0 => 'Ob die Funktion für die Registrierung aktiviert ist',
    ),
    'Whether the feature is enabled for login' => 
    array (
      0 => 'Ob die Funktion für den Login aktiviert ist',
    ),
    'Whether the feature is enabled for forgot password' => 
    array (
      0 => 'Ob die Funktion für Passwort vergessen aktiviert ist',
    ),
    'Enabled for public block email form' => 
    array (
      0 => 'Aktiviert für öffentliches Block-E-Mail-Formular',
    ),
    'Whether the feature is enabled for public block email form' => 
    array (
      0 => 'Ob die Funktion für das öffentliche Block-E-Mail-Formular aktiviert ist',
    ),
  ),
  'search' => 
  array (
    'There are no results matching your search!' => 
    array (
      0 => 'Es gibt keine Ergebnisse, die Ihrer Suche entsprechen!',
    ),
  ),
  'start_pages' => 
  array (
    'Create new page' => 
    array (
      0 => 'Neue Seite erstellen',
    ),
    'Update page' => 
    array (
      0 => 'Seite aktualisieren',
    ),
    'Select icon color' => 
    array (
      0 => 'Symbolfarbe auswählen',
    ),
    'You can use following tags in heading and content:' => 
    array (
      0 => 'Sie können die folgenden Tags in Überschrift und Inhalt verwenden:',
    ),
    'The application where this page applies' => 
    array (
      0 => 'Die Anwendung, auf die sich diese Seite bezieht',
    ),
    'The url route (controller/action) where this page applies, i.e: campaigns/index' => 
    array (
      0 => 'Die URL-Route (Controller/Aktion), auf die sich diese Seite bezieht, z. B.: campaigns/index',
    ),
    'Start by typing a few characters from the icon name' => 
    array (
      0 => 'Beginnen Sie mit der Eingabe einiger Zeichen des Symbolnamens',
    ),
    'Search icon, i.e: envelope' => 
    array (
      0 => 'Symbol suchen, z. B.: Umschlag',
    ),
    'The route does not seem to be valid!' => 
    array (
      0 => 'Die Route scheint nicht gültig zu sein!',
    ),
    'The application/route combo is already taken!' => 
    array (
      0 => 'Die Kombination aus Anwendung und Route ist bereits vergeben!',
    ),
    'Customer base url, useful for links generation.' => 
    array (
      0 => 'Kunden-Basis-URL, nützlich für die Link-Generierung.',
    ),
    'Backend base url, useful for links generation.' => 
    array (
      0 => 'Backend-Basis-URL, nützlich für die Link-Generierung.',
    ),
    'Frontend base url, useful for links generation.' => 
    array (
      0 => 'Frontend-Basis-URL, nützlich für die Link-Generierung.',
    ),
    'Given color code does not seem to be a valid hex code!' => 
    array (
      0 => 'Der angegebene Farbcode scheint kein gültiger Hex-Code zu sein!',
    ),
  ),
  'subscribe_by_email' => 
  array (
    'Before proceeding any further, please read the setup guide located {here}.' => 
    array (
      0 => 'Bevor Sie fortfahren, lesen Sie bitte die Einrichtungsanleitung unter {hier}.',
    ),
  ),
  'support_tickets' => 
  array (
    'This ticket has been assigned to {user} already, replying to it will assign you to the ticket.' => 
    array (
      0 => 'Dieses Ticket wurde bereits {user} zugewiesen. Wenn Sie darauf antworten, wird es Ihnen zugewiesen.',
    ),
    'Select one or more users assigned to respond to tickets for this department. Selected users will receive emails each time a support ticket is created and this department selected. If no user is selected, then all system users will receive emails.' => 
    array (
      0 => 'Wählen Sie einen oder mehrere Benutzer aus, die für die Beantwortung von Tickets in dieser Abteilung zuständig sind. Ausgewählte Benutzer erhalten E-Mails, wenn ein Support-Ticket erstellt und diese Abteilung ausgewählt wird. Wenn kein Benutzer ausgewählt ist, erhalten alle Systembenutzer E-Mails.',
    ),
    'Hello {nameA}, this ticket reply has been posted by {nameB} and requires your attention. Please read the ticket reply content below:' => 
    array (
      0 => 'Hallo {nameA}, diese Ticket-Antwort wurde von {nameB} veröffentlicht und erfordert Ihre Aufmerksamkeit. Bitte lesen Sie den Inhalt der Ticket-Antwort unten:',
    ),
    'You can follow the url below in order to reply to this ticket:' => 
    array (
      0 => 'Sie können dem unten stehenden Link folgen, um auf dieses Ticket zu antworten:',
    ),
    'Hello {nameA}, this ticket has been posted by {nameB} and requires your attention. Please read the ticket content below:' => 
    array (
      0 => 'Hallo {nameA}, dieses Ticket wurde von {nameB} veröffentlicht und erfordert Ihre Aufmerksamkeit. Bitte lesen Sie den Ticket-Inhalt unten:',
    ),
    'Whether rating is enabled and customer are able to rate your replies' => 
    array (
      0 => 'Ob die Bewertung aktiviert ist und Kunden Ihre Antworten bewerten können',
    ),
    'Thank you, your rating has been successfully applied.' => 
    array (
      0 => 'Vielen Dank, Ihre Bewertung wurde erfolgreich abgegeben.',
    ),
  ),
  'suppression_lists' => 
  array (
    'The email address {email} is already in your suppression list!' => 
    array (
      0 => 'Die E-Mail-Adresse {email} befindet sich bereits in Ihrer Sperrliste!',
    ),
    'Please enter a valid email address!' => 
    array (
      0 => 'Bitte geben Sie eine gültige E-Mail-Adresse ein!',
    ),
    'Emails count' => 
    array (
      0 => 'E-Mail-Anzahl',
    ),
    'Suppression list emails' => 
    array (
      0 => 'E-Mails in der Sperrliste',
    ),
    'Suppression lists' => 
    array (
      0 => 'Sperrlisten',
    ),
    'Create new' => 
    array (
      0 => 'Neu erstellen',
    ),
    'Your file does not contain the header with the fields title!' => 
    array (
      0 => 'Ihre Datei enthält nicht die Kopfzeile mit den Feldtiteln!',
    ),
    'Your file has been successfuly imported, from {count} records, {total} were imported!' => 
    array (
      0 => 'Ihre Datei wurde erfolgreich importiert, von {count} Einträgen wurden {total} importiert!',
    ),
    'Unable to move the uploaded file!' => 
    array (
      0 => 'Die hochgeladene Datei kann nicht verschoben werden!',
    ),
    'Your file has been successfully queued for processing and you will be notified when processing is done!' => 
    array (
      0 => 'Ihre Datei wurde erfolgreich zur Verarbeitung eingereiht, und Sie werden benachrichtigt, wenn die Verarbeitung abgeschlossen ist!',
    ),
    'Import from CSV file' => 
    array (
      0 => 'Import aus CSV-Datei',
    ),
    'Please note, the csv file must contain a header with the email column.' => 
    array (
      0 => 'Bitte beachten Sie, dass die CSV-Datei eine Kopfzeile mit der E-Mail-Spalte enthalten muss.',
    ),
    'If unsure about how to format your file, do an export first and see how the file looks.' => 
    array (
      0 => 'Wenn Sie unsicher sind, wie Sie Ihre Datei formatieren sollen, führen Sie zuerst einen Export durch und sehen Sie sich die Datei an.',
    ),
  ),
  'survey' => 
  array (
    'Your survey does not have any field defined.' => 
    array (
      0 => 'Ihre Umfrage hat keine Felder definiert.',
    ),
  ),
  'survey_export' => 
  array (
    'Export responders from your survey segment' => 
    array (
      0 => 'Exportieren Sie Teilnehmer aus Ihrem Umfrage-Segment',
    ),
    'Export responders' => 
    array (
      0 => 'Teilnehmer exportieren',
    ),
    'Your survey has no responders to export!' => 
    array (
      0 => 'Ihre Umfrage hat keine Teilnehmer zum Exportieren!',
    ),
    'Cannot create the storage directory for your export!' => 
    array (
      0 => 'Das Speicherverzeichnis für Ihren Export kann nicht erstellt werden!',
    ),
    'Cannot open the storage file for your export!' => 
    array (
      0 => 'Die Speicherdatei für Ihren Export kann nicht geöffnet werden!',
    ),
    'Successfully added the IP "{ip}" to the export survey.' => 
    array (
      0 => 'Die IP "{ip}" wurde erfolgreich zur Export-Umfrage hinzugefügt.',
    ),
    'The export is now complete, starting the packing process...' => 
    array (
      0 => 'Der Export ist abgeschlossen, der Verpackungsprozess wird gestartet...',
    ),
    'Packing done, your file will be downloaded now, please wait...' => 
    array (
      0 => 'Verpackung abgeschlossen, Ihre Datei wird jetzt heruntergeladen, bitte warten...',
    ),
    'Please wait, starting another batch...' => 
    array (
      0 => 'Bitte warten, ein weiterer Durchlauf wird gestartet...',
    ),
    'The export file has been deleted.' => 
    array (
      0 => 'Die Exportdatei wurde gelöscht.',
    ),
    'CSV export progress' => 
    array (
      0 => 'CSV-Exportfortschritt',
    ),
    'From a total of {total} responders, so far {totalProcessed} have been processed, {successfullyProcessed} successfully and {errorProcessing} with errors. {percentage} completed.' => 
    array (
      0 => 'Von insgesamt {total} Teilnehmern wurden bisher {totalProcessed} verarbeitet, {successfullyProcessed} erfolgreich und {errorProcessing} mit Fehlern. {percentage} abgeschlossen.',
    ),
    'The export process is starting, please wait...' => 
    array (
      0 => 'Der Exportprozess wird gestartet, bitte warten...',
    ),
  ),
  'survey_responders' => 
  array (
    'Your survey responders' => 
    array (
      0 => 'Ihre Umfrageteilnehmer',
    ),
    'Add a new responder to your survey.' => 
    array (
      0 => 'Fügen Sie Ihrer Umfrage einen neuen Teilnehmer hinzu.',
    ),
    'You are not allowed to edit responders at this time!' => 
    array (
      0 => 'Sie dürfen Teilnehmer derzeit nicht bearbeiten!',
    ),
    'Update existing survey responder.' => 
    array (
      0 => 'Vorhandenen Umfrageteilnehmer aktualisieren.',
    ),
    'Your survey responder was successfully deleted!' => 
    array (
      0 => 'Ihr Umfrageteilnehmer wurde erfolgreich gelöscht!',
    ),
    'Sorry, but there are no responders to show right now.' => 
    array (
      0 => 'Entschuldigung, es gibt derzeit keine Teilnehmer anzuzeigen.',
    ),
  ),
  'survey_segments' => 
  array (
    'Operator match' => 
    array (
      0 => 'Operator-Abgleich',
    ),
    'It will be transformed into an empty value' => 
    array (
      0 => 'Es wird in einen leeren Wert umgewandelt',
    ),
    'It will be transformed into the current date/time in the format of Y-m-d H:i:s (i.e: {datetime})' => 
    array (
      0 => 'Es wird in das aktuelle Datum/Uhrzeit im Format Y-m-d H:i:s umgewandelt (z.B.: {datetime})',
    ),
    'It will be transformed into the current date in the format of Y-m-d (i.e: {date})' => 
    array (
      0 => 'Es wird in das aktuelle Datum im Format Y-m-d umgewandelt (z.B.: {date})',
    ),
    'Your mail survey segments' => 
    array (
      0 => 'Ihre E-Mail-Umfrage-Segmente',
    ),
    'Survey segments' => 
    array (
      0 => 'Umfrage-Segmente',
    ),
    ' Survey segments' => 
    array (
      0 => ' Umfrage-Segmente',
    ),
    'You are only allowed to add {num} segment conditions.' => 
    array (
      0 => 'Sie dürfen nur {num} Segmentbedingungen hinzufügen.',
    ),
    'Current segmentation is too deep and loads too slow, please revise your segment conditions!' => 
    array (
      0 => 'Die aktuelle Segmentierung ist zu tief und lädt zu langsam, bitte überarbeiten Sie Ihre Segmentbedingungen!',
    ),
    'Your survey segments' => 
    array (
      0 => 'Ihre Umfrage-Segmente',
    ),
    'Create a new survey segment' => 
    array (
      0 => 'Ein neues Umfrage-Segment erstellen',
    ),
    'Update survey segment' => 
    array (
      0 => 'Umfrage-Segment aktualisieren',
    ),
    'Your survey segment was successfully copied!' => 
    array (
      0 => 'Ihr Umfrage-Segment wurde erfolgreich kopiert!',
    ),
    'Sorry, but there are no responders matching your segment.' => 
    array (
      0 => 'Entschuldigung, aber es gibt keine Teilnehmer, die Ihrem Segment entsprechen.',
    ),
    'Defined conditions:' => 
    array (
      0 => 'Definierte Bedingungen:',
    ),
    'Responders matching your segment:' => 
    array (
      0 => 'Teilnehmer, die Ihrem Segment entsprechen:',
    ),
    'Available value tags' => 
    array (
      0 => 'Verfügbare Wert-Tags',
    ),
    'Following tags can be used as dynamic values. They will be replaced as shown below.' => 
    array (
      0 => 'Die folgenden Tags können als dynamische Werte verwendet werden. Sie werden wie unten gezeigt ersetzt.',
    ),
  ),
  'surveyfields' => 
  array (
    'Are you sure you want to remove this field? There is no coming back from this after you save the changes.' => 
    array (
      0 => 'Sind Sie sicher, dass Sie dieses Feld entfernen möchten? Es gibt kein Zurück mehr, nachdem Sie die Änderungen gespeichert haben.',
    ),
  ),
  'taxes' => 
  array (
    'View taxes' => 
    array (
      0 => 'Steuern anzeigen',
    ),
    'Create new tax' => 
    array (
      0 => 'Neue Steuer erstellen',
    ),
    'Update tax' => 
    array (
      0 => 'Steuer aktualisieren',
    ),
    'Is global' => 
    array (
      0 => 'Ist global',
    ),
    'The zone/state for which this tax applies' => 
    array (
      0 => 'Die Zone/der Staat, für die/das diese Steuer gilt',
    ),
    'How much from the total amount of the order this max means, use a number' => 
    array (
      0 => 'Wie viel vom Gesamtbetrag der Bestellung diese Steuer ausmacht, verwenden Sie eine Zahl',
    ),
    'Whether this tax is global, i.e: applies for customers that don\'t match other taxes' => 
    array (
      0 => 'Ob diese Steuer global ist, d.h. für Kunden gilt, die nicht zu anderen Steuern passen',
    ),
  ),
  'templates' => 
  array (
    'i.e: a@domain.com, b@domain.com, c@domain.com' => 
    array (
      0 => 'z.B.: a@domain.com, b@domain.com, c@domain.com',
    ),
    'From email (optional)' => 
    array (
      0 => 'Von E-Mail (optional)',
    ),
    'i.e: me@domain.com' => 
    array (
      0 => 'z.B.: me@domain.com',
    ),
  ),
  'themes' => 
  array (
    'View themes' => 
    array (
      0 => 'Themen anzeigen',
    ),
    'Themes' => 
    array (
      0 => 'Themen',
    ),
    'Theme settings' => 
    array (
      0 => 'Themen-Einstellungen',
    ),
    'Your theme has been successfully uploaded!' => 
    array (
      0 => 'Ihr Thema wurde erfolgreich hochgeladen!',
    ),
    'Please select a theme archive for upload!' => 
    array (
      0 => 'Bitte wählen Sie ein Themenarchiv zum Hochladen aus!',
    ),
    'The theme "{name}" has been successfully enabled!' => 
    array (
      0 => 'Das Thema "{name}" wurde erfolgreich aktiviert!',
    ),
    'The theme "{name}" has been successfully disabled!' => 
    array (
      0 => 'Das Thema "{name}" wurde erfolgreich deaktiviert!',
    ),
    'The theme "{name}" has been successfully deleted!' => 
    array (
      0 => 'Das Thema "{name}" wurde erfolgreich gelöscht!',
    ),
    'Available themes' => 
    array (
      0 => 'Verfügbare Themen',
    ),
    'Upload theme' => 
    array (
      0 => 'Thema hochladen',
    ),
    'Website' => 
    array (
      0 => 'Webseite',
    ),
    'Theme detail page' => 
    array (
      0 => 'Themen-Detailseite',
    ),
    'Upload theme archive.' => 
    array (
      0 => 'Themenarchiv hochladen.',
    ),
    'Please note that only zip files are allowed for upload.' => 
    array (
      0 => 'Bitte beachten Sie, dass nur ZIP-Dateien hochgeladen werden dürfen.',
    ),
    'Visit website' => 
    array (
      0 => 'Webseite besuchen',
    ),
    'The theme does not exists.' => 
    array (
      0 => 'Das Thema existiert nicht.',
    ),
    'The theme is already enabled.' => 
    array (
      0 => 'Das Thema ist bereits aktiviert.',
    ),
    'Enabling the theme {theme} has failed.' => 
    array (
      0 => 'Das Aktivieren des Themas {theme} ist fehlgeschlagen.',
    ),
    'The theme could not be disabled.' => 
    array (
      0 => 'Das Thema konnte nicht deaktiviert werden.',
    ),
    'The theme cannot be deleted.' => 
    array (
      0 => 'Das Thema kann nicht gelöscht werden.',
    ),
  ),
  'tools' => 
  array (
    'Back to tools' => 
    array (
      0 => 'Zurück zu den Tools',
    ),
    'Sync' => 
    array (
      0 => 'Synchronisieren',
    ),
    'Split' => 
    array (
      0 => 'Teilen',
    ),
    'Sync lists' => 
    array (
      0 => 'Listen synchronisieren',
    ),
    'Split list' => 
    array (
      0 => 'Liste teilen',
    ),
    'Please wait while splitting the {list} list into {num} sublists. This might take a while depending on your list size.' => 
    array (
      0 => 'Bitte warten Sie, während die Liste {list} in {num} Unterlisten aufgeteilt wird. Dies kann je nach Größe der Liste eine Weile dauern.',
    ),
  ),
  'tour' => 
  array (
    'Are you sure? The tour contains valuable information to help you get started. You will not see the tour again if you end it!' => 
    array (
      0 => 'Sind Sie sicher? Die Tour enthält wertvolle Informationen, die Ihnen den Einstieg erleichtern. Sie werden die Tour nicht erneut sehen, wenn Sie sie beenden!',
    ),
    'Close for now' => 
    array (
      0 => 'Für jetzt schließen',
    ),
    'View slideshows' => 
    array (
      0 => 'Diashows anzeigen',
    ),
    'View slides' => 
    array (
      0 => 'Folien anzeigen',
    ),
  ),
  'tracking_domains' => 
  array (
    'View tracking domains' => 
    array (
      0 => 'Tracking-Domains anzeigen',
    ),
    'Create new tracking domain' => 
    array (
      0 => 'Neue Tracking-Domain erstellen',
    ),
    'Update tracking domain' => 
    array (
      0 => 'Tracking-Domain aktualisieren',
    ),
    'Please note, in order for this feature to work this (sub)domain needs a dedicated IP address, otherwise all defined CNAMES for it will point to the default domain on this server.' => 
    array (
      0 => 'Bitte beachten Sie, dass für diese Funktion diese (Sub-)Domain eine dedizierte IP-Adresse benötigt, da andernfalls alle definierten CNAMES darauf auf die Standarddomain auf diesem Server verweisen.',
    ),
    'If you do not use a dedicated IP address for this domain only or you are not sure you do so, do not use this feature!' => 
    array (
      0 => 'Wenn Sie keine dedizierte IP-Adresse ausschließlich für diese Domain verwenden oder sich nicht sicher sind, tun Sie dies nicht, verwenden Sie diese Funktion nicht!',
    ),
    'Please note that because of the way DNS servers work, you need to add a subdomain like tracking.your-domain.com as a DNS CNAME record and point it to {currentDomain}!' => 
    array (
      0 => 'Bitte beachten Sie, dass Sie aufgrund der Funktionsweise von DNS-Servern eine Subdomain wie tracking.ihre-domain.com als DNS-CNAME-Eintrag hinzufügen und auf {currentDomain} verweisen müssen!',
    ),
    'Scheme' => 
    array (
      0 => 'Schema',
    ),
    'tracking.your-domain.com' => 
    array (
      0 => 'tracking.ihre-domain.com',
    ),
    'Please DO NOT SKIP validation unless you are 100% sure you know what you are doing.' => 
    array (
      0 => 'Bitte überspringen Sie die Validierung NICHT, es sei denn, Sie sind sich zu 100 % sicher, was Sie tun.',
    ),
    'Choose HTTPS only if your tracking domain can also provide a valid SSL certificate, otherwise stick to regular HTTP.' => 
    array (
      0 => 'Wählen Sie HTTPS nur, wenn Ihre Tracking-Domain auch ein gültiges SSL-Zertifikat bereitstellen kann, andernfalls bleiben Sie bei regulärem HTTP.',
    ),
    'Your specified domain name does not seem to be valid!' => 
    array (
      0 => 'Der angegebene Domainname scheint ungültig zu sein!',
    ),
    'Your PHP install does not contain the {function} function needed to query the DNS records!' => 
    array (
      0 => 'Ihre PHP-Installation enthält nicht die {function}-Funktion, die zum Abfragen der DNS-Einträge erforderlich ist!',
    ),
    'Cannot find a valid CNAME record for {domainName}! Remember, the CNAME of {domainName} must point to {currentDomain}!' => 
    array (
      0 => 'Es konnte kein gültiger CNAME-Eintrag für {domainName} gefunden werden! Denken Sie daran, dass der CNAME von {domainName} auf {currentDomain} verweisen muss!',
    ),
    'Verified' => 
    array (
      0 => 'Verifiziert',
    ),
    'Skip verification' => 
    array (
      0 => 'Verifizierung überspringen',
    ),
    'Please DO NOT SKIP verification unless you are 100% sure you know what you are doing.' => 
    array (
      0 => 'Bitte überspringen Sie die Verifizierung NICHT, es sei denn, Sie sind sich zu 100 % sicher, was Sie tun.',
    ),
  ),
  'transactional_emails' => 
  array (
    'View transactional emails' => 
    array (
      0 => 'Transaktions-E-Mails anzeigen',
    ),
    'To email' => 
    array (
      0 => 'An E-Mail',
    ),
    'To name' => 
    array (
      0 => 'An Name',
    ),
    'From email' => 
    array (
      0 => 'Von E-Mail',
    ),
    'From name' => 
    array (
      0 => 'Von Name',
    ),
    'Reply to email' => 
    array (
      0 => 'Antwort an E-Mail',
    ),
    'Reply to name' => 
    array (
      0 => 'Antwort an Name',
    ),
    'Max retries' => 
    array (
      0 => 'Maximale Wiederholungen',
    ),
    'Send at' => 
    array (
      0 => 'Senden um',
    ),
    'This email address is blacklisted!' => 
    array (
      0 => 'Diese E-Mail-Adresse ist auf der Sperrliste!',
    ),
    'Sent' => 
    array (
      0 => 'Gesendet',
    ),
    'Unsent' => 
    array (
      0 => 'Nicht gesendet',
    ),
    'Transactional emails dashboard' => 
    array (
      0 => 'Transaktions-E-Mails-Dashboard',
    ),
    'View unsent transactional emails' => 
    array (
      0 => 'Nicht gesendete Transaktions-E-Mails anzeigen',
    ),
    'View sent transactional emails' => 
    array (
      0 => 'Gesendete Transaktions-E-Mails anzeigen',
    ),
    'View transactional emails cron jobs history' => 
    array (
      0 => 'Cron-Job-Historie der Transaktions-E-Mails anzeigen',
    ),
  ),
  'translate' => 
  array (
    'Enable writing the missing translations in file.' => 
    array (
      0 => 'Fehlende Übersetzungen in Datei schreiben aktivieren.',
    ),
    'Whether to translate extensions too.' => 
    array (
      0 => 'Ob auch Erweiterungen übersetzt werden sollen.',
    ),
    'Translate extension' => 
    array (
      0 => 'Erweiterung übersetzen',
    ),
    'The directory {dirName} must exist and be writable by the web server in order to write the translation files.' => 
    array (
      0 => 'Das Verzeichnis {dirName} muss existieren und vom Webserver beschreibbar sein, um die Übersetzungsdateien zu schreiben.',
    ),
    'Once enabled, the translate extension will start collecting messages from the application and write them in files if the message is missing from file and the application language is other than english.' => 
    array (
      0 => 'Sobald aktiviert, beginnt die Übersetzungserweiterung, Nachrichten aus der Anwendung zu sammeln und in Dateien zu schreiben, wenn die Nachricht in der Datei fehlt und die Anwendungssprache nicht Englisch ist.',
    ),
  ),
  'translations' => 
  array (
    'Message' => 
    array (
      0 => 'Nachricht',
    ),
    'Please make sure you save your changes before navigating away to a different page.' => 
    array (
      0 => 'Bitte stellen Sie sicher, dass Sie Ihre Änderungen speichern, bevor Sie zu einer anderen Seite navigieren.',
    ),
    '{name} translations' => 
    array (
      0 => '{name} Übersetzungen',
    ),
  ),
  'update' => 
  array (
    'Please note that starting with this version update, we deprecated the redis queue feature!' => 
    array (
      0 => 'Bitte beachten Sie, dass mit diesem Versionsupdate die Redis-Queue-Funktion eingestellt wurde!',
    ),
    'Version {version} brings a new cron job that you have to add to run once at 20 minutes. After addition, it must look like: {cron}' => 
    array (
      0 => 'Version {version} bringt einen neuen Cron-Job, den Sie hinzufügen müssen, um einmal alle 20 Minuten ausgeführt zu werden. Nach der Hinzufügung sollte er wie folgt aussehen: {cron}',
    ),
    'Version {version} brings a new cron job that you have to add to run once a day. After addition, it must look like: {cron}' => 
    array (
      0 => 'Version {version} bringt einen neuen Cron-Job, den Sie hinzufügen müssen, um einmal täglich ausgeführt zu werden. Nach der Hinzufügung sollte er wie folgt aussehen: {cron}',
    ),
    'Starting with version {version}, the "process-subscribers" command is no longer needed, please disable it from your crons!' => 
    array (
      0 => 'Ab Version {version} wird der Befehl "process-subscribers" nicht mehr benötigt. Bitte deaktivieren Sie ihn in Ihren Crons!',
    ),
    'Version {version} brings a new cron job that you have to add to run each hour. After addition, it must look like: {cron}' => 
    array (
      0 => 'Version {version} bringt einen neuen Cron-Job, den Sie hinzufügen müssen, um stündlich ausgeführt zu werden. Nach der Hinzufügung sollte er wie folgt aussehen: {cron}',
    ),
    'Version {version} brings a new cron job that you have to add to run once at 2 minutes. After addition, it must look like: {cron}' => 
    array (
      0 => 'Version {version} bringt einen neuen Cron-Job, den Sie hinzufügen müssen, um einmal alle 2 Minuten ausgeführt zu werden. Nach der Hinzufügung sollte er wie folgt aussehen: {cron}',
    ),
    'This version adds new fields for delivery servers and some of them are required. Because of this, all delivery servers have been marked as inactive. Please review the settings and validate the servers once again.' => 
    array (
      0 => 'Diese Version fügt neue Felder für Zustellserver hinzu, von denen einige erforderlich sind. Aus diesem Grund wurden alle Zustellserver als inaktiv markiert. Bitte überprüfen Sie die Einstellungen und validieren Sie die Server erneut.',
    ),
    'Updating to version {version}.' => 
    array (
      0 => 'Aktualisierung auf Version {version}.',
    ),
    'Updated to version {version} successfully.' => 
    array (
      0 => 'Erfolgreich auf Version {version} aktualisiert.',
    ),
    'Updating to version {version} failed with: {message}' => 
    array (
      0 => 'Aktualisierung auf Version {version} fehlgeschlagen mit: {message}',
    ),
    'Congratulations, your application has been successfully updated to version {version}' => 
    array (
      0 => 'Herzlichen Glückwunsch, Ihre Anwendung wurde erfolgreich auf Version {version} aktualisiert',
    ),
    'Please note, depending on your database size it is better to run the command line update tool instead.' => 
    array (
      0 => 'Bitte beachten Sie, dass es je nach Größe Ihrer Datenbank besser ist, das Befehlszeilen-Update-Tool zu verwenden.',
    ),
    'In order to run the command line update tool, you must run the following command from a ssh shell:' => 
    array (
      0 => 'Um das Befehlszeilen-Update-Tool auszuführen, müssen Sie den folgenden Befehl in einer SSH-Shell ausführen:',
    ),
    'Application update' => 
    array (
      0 => 'Anwendungsaktualisierung',
    ),
    'Your current application version is {version}' => 
    array (
      0 => 'Ihre aktuelle Anwendungsversion ist {version}',
    ),
    'The update process will try to update it to version {version}' => 
    array (
      0 => 'Der Aktualisierungsprozess versucht, sie auf Version {version} zu aktualisieren',
    ),
    'Please backup all your data before proceeding and note that the update process might take a while depending on your database size, just wait for it to finish.' => 
    array (
      0 => 'Bitte sichern Sie alle Ihre Daten, bevor Sie fortfahren, und beachten Sie, dass der Aktualisierungsprozess je nach Größe Ihrer Datenbank einige Zeit in Anspruch nehmen kann. Warten Sie einfach, bis er abgeschlossen ist.',
    ),
    'Your application has been moved offline until the update process is done.' => 
    array (
      0 => 'Ihre Anwendung wurde offline geschaltet, bis der Aktualisierungsprozess abgeschlossen ist.',
    ),
    'Start update process' => 
    array (
      0 => 'Aktualisierungsprozess starten',
    ),
  ),
  'users' => 
  array (
    'Invalid login credentials.' => 
    array (
      0 => 'Ungültige Anmeldedaten.',
    ),
    'Unable to login with the given identity!' => 
    array (
      0 => 'Anmeldung mit der angegebenen Identität nicht möglich!',
    ),
    'View users' => 
    array (
      0 => 'Benutzer anzeigen',
    ),
    'Create new user' => 
    array (
      0 => 'Neuen Benutzer erstellen',
    ),
    'You are not allowed to update the master administrator!' => 
    array (
      0 => 'Sie dürfen den Hauptadministrator nicht aktualisieren!',
    ),
    'Update user' => 
    array (
      0 => 'Benutzer aktualisieren',
    ),
    'Update account' => 
    array (
      0 => 'Konto aktualisieren',
    ),
    'User info successfully updated!' => 
    array (
      0 => 'Benutzerdaten erfolgreich aktualisiert!',
    ),
    'Please login' => 
    array (
      0 => 'Bitte anmelden',
    ),
    'Retrieve a new password for your account.' => 
    array (
      0 => 'Ein neues Passwort für Ihr Konto anfordern.',
    ),
    'Update user group' => 
    array (
      0 => 'Benutzergruppe aktualisieren',
    ),
    'Use any authenticator app such as Google Authenticator to scan the QR code below.' => 
    array (
      0 => 'Verwenden Sie eine Authentifizierungs-App wie Google Authenticator, um den untenstehenden QR-Code zu scannen.',
    ),
    'You will then use the authenticator app to generate the code to login in the app.' => 
    array (
      0 => 'Sie verwenden dann die Authentifizierungs-App, um den Code für die Anmeldung in der App zu generieren.',
    ),
    'Sign in to start your session' => 
    array (
      0 => 'Melden Sie sich an, um Ihre Sitzung zu starten',
    ),
    'Go to login' => 
    array (
      0 => 'Zur Anmeldung gehen',
    ),
    'Enter the code generated by the authenticator app' => 
    array (
      0 => 'Geben Sie den von der Authentifizierungs-App generierten Code ein',
    ),
    'Update your account data.' => 
    array (
      0 => 'Aktualisieren Sie Ihre Kontodaten.',
    ),
    'New avatar' => 
    array (
      0 => 'Neuer Avatar',
    ),
    'Confirm email' => 
    array (
      0 => 'E-Mail bestätigen',
    ),
    'Please make sure you scan the QR code in your authenticator application before enabling this feature, otherwise you will be locked out from your account' => 
    array (
      0 => 'Bitte stellen Sie sicher, dass Sie den QR-Code in Ihrer Authentifizierungs-App scannen, bevor Sie diese Funktion aktivieren, da Sie sonst von Ihrem Konto ausgeschlossen werden.',
    ),
    'The avatars storage directory({path}) does not exists and cannot be created!' => 
    array (
      0 => 'Das Speicherverzeichnis für Avatare ({path}) existiert nicht und kann nicht erstellt werden!',
    ),
    'Cannot move the avatar into the correct storage folder!' => 
    array (
      0 => 'Der Avatar kann nicht in den richtigen Speicherordner verschoben werden!',
    ),
    'Reset key' => 
    array (
      0 => 'Schlüssel zurücksetzen',
    ),
    'You are impersonating the customer {customerName}.' => 
    array (
      0 => 'Sie geben sich als Kunde {customerName} aus.',
    ),
    'Please click {linkBack} to logout in order to finish impersonating.' => 
    array (
      0 => 'Bitte klicken Sie auf {linkBack}, um sich abzumelden und die Nachahmung zu beenden.',
    ),
  ),
  'warmup_plans' => 
  array (
    'View plans' => 
    array (
      0 => 'Pläne anzeigen',
    ),
    'Delivery server warmup plan' => 
    array (
      0 => 'Aufwärmplan für Zustellserver',
    ),
    'Sending limit' => 
    array (
      0 => 'Sendelimit',
    ),
    'Sendings count' => 
    array (
      0 => 'Anzahl der Sendungen',
    ),
    'Sending quota type' => 
    array (
      0 => 'Art des Sendekontingents',
    ),
    'Sending increment percentage' => 
    array (
      0 => 'Prozentsatz der Sendeerhöhung',
    ),
    'Sending strategy' => 
    array (
      0 => 'Sendestrategie',
    ),
    'Sending limit type' => 
    array (
      0 => 'Art des Sendelimits',
    ),
    'Are you sure you want to run this action? After you activate the plan, you will be able to edit only its name and description' => 
    array (
      0 => 'Sind Sie sicher, dass Sie diese Aktion ausführen möchten? Nach der Aktivierung des Plans können Sie nur noch den Namen und die Beschreibung bearbeiten',
    ),
    'Update plan' => 
    array (
      0 => 'Plan aktualisieren',
    ),
    'The warmup plan sending limit, meaning the number of emails to be sent. Based on the limit type chosen this number can be the total number of emails sent throughout all the sendings, or the last sending will have that exact number' => 
    array (
      0 => 'Das Sendelimit des Aufwärmplans, also die Anzahl der zu sendenden E-Mails. Basierend auf der gewählten Limitart kann diese Zahl die Gesamtanzahl der E-Mails sein, die über alle Sendungen hinweg gesendet werden, oder die letzte Sendung hat genau diese Zahl',
    ),
    'The warmup plan sendings count. This is the number of generated schedules, based on which the delivery server quota will apply.' => 
    array (
      0 => 'Die Anzahl der Sendungen des Aufwärmplans. Dies ist die Anzahl der generierten Zeitpläne, auf deren Grundlage das Zustellserver-Kontingent angewendet wird.',
    ),
    'The warmup plan sending quota type. The kind of quota against which the generated schedule quota value will be applied. If hourly, we will take into consideration applying the delivery server hourly quota' => 
    array (
      0 => 'Die Art des Sendekontingents des Aufwärmplans. Die Art des Kontingents, gegen das der generierte Zeitplanwert angewendet wird. Wenn stündlich, berücksichtigen wir die Anwendung des stündlichen Kontingents des Zustellservers',
    ),
    'The warmup plan sending increment ratio. If the sending strategy is exponential, this values represents the increment percentage from a schedule to another.' => 
    array (
      0 => 'Das Erhöhungsverhältnis des Aufwärmplans. Wenn die Sendestrategie exponentiell ist, stellt dieser Wert den Erhöhungsprozentsatz von einem Zeitplan zum anderen dar.',
    ),
    'The warmup plan sending strategy. Can be exponential or incremental. For incremental we will use the ratio between sending_limit and sendings_count to calculate the growth factor. Depending on the sending limit type chosen we can send maximum the value of the growth factor per sending (for total) or the growth factor added to the previous sending value per sending (for targeted).' => 
    array (
      0 => 'Die Sendestrategie des Aufwärmplans. Kann exponentiell oder inkrementell sein. Für inkrementell verwenden wir das Verhältnis zwischen Sendelimit und Anzahl der Sendungen, um den Wachstumsfaktor zu berechnen. Abhängig von der gewählten Art des Sendelimits können wir maximal den Wert des Wachstumsfaktors pro Sendung (für gesamt) oder den Wachstumsfaktor, der zum vorherigen Sendewert pro Sendung hinzugefügt wird (für gezielt), senden.',
    ),
    'The warmup plan sending limit type. Based on this selection, we will send either a number of emails calculated throughout all the schedules (total) equal with the sending limit, or the last of the sendings will reach the sending limit value.' => 
    array (
      0 => 'Die Art des Sendelimits des Aufwärmplans. Basierend auf dieser Auswahl senden wir entweder eine Anzahl von E-Mails, die über alle Zeitpläne hinweg berechnet wird (gesamt), gleich dem Sendelimit, oder die letzte der Sendungen erreicht den Wert des Sendelimits.',
    ),
    'Generated warmup plan' => 
    array (
      0 => 'Generierter Aufwärmplan',
    ),
    'Increment' => 
    array (
      0 => 'Erhöhung',
    ),
    'Please note that the last schedule from the series might be the subject to roundings.' => 
    array (
      0 => 'Bitte beachten Sie, dass der letzte Zeitplan der Serie Rundungen unterliegen kann.',
    ),
  ),
  'zii' => 
  array (
    'Please specify the "data" property.' => 
    array (
      0 => 'Bitte geben Sie die Eigenschaft "data" an.',
    ),
    'Please specify the "attributes" property.' => 
    array (
      0 => 'Bitte geben Sie die Eigenschaft "attributes" an.',
    ),
    'Are you sure you want to delete this item?' => 
    array (
      0 => 'Sind Sie sicher, dass Sie dieses Element löschen möchten?',
    ),
  ),
  'zones' => 
  array (
    'View zones' => 
    array (
      0 => 'Zonen anzeigen',
    ),
    'Create new zone' => 
    array (
      0 => 'Neue Zone erstellen',
    ),
    'Update zone' => 
    array (
      0 => 'Zone aktualisieren',
    ),
    'Please note that removing this zone will also remove every record that depends on it, such as taxes, customer companies, etc!' => 
    array (
      0 => 'Bitte beachten Sie, dass das Entfernen dieser Zone auch alle Datensätze entfernt, die davon abhängen, wie Steuern, Kundenunternehmen usw.!',
    ),
    'Are you still sure you want to remove this zone? There is no coming back after you do it!' => 
    array (
      0 => 'Sind Sie sicher, dass Sie diese Zone entfernen möchten? Dies kann nicht rückgängig gemacht werden!',
    ),
  ),
);
