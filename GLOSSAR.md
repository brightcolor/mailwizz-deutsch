# Glossar

Jeder Begriff wird überall gleich übersetzt. Anrede: **du** (klein), auch in Hinweisen und Fehlermeldungen. `php tools/check.php` meldet die Varianten aus der Spalte „Nicht verwenden“.

## Kernbegriffe

| Englisch | Deutsch | Nicht verwenden |
|---|---|---|
| list, lists | Liste, Listen | Verteiler, List |
| subscriber(s) | Abonnent(en) | Kontakt, Teilnehmer, Subscriber |
| subscribe / subscription | anmelden / Anmeldung | abonnieren, eintragen |
| unsubscribe / unsubscribed | abmelden / abgemeldet, Abmeldung | abbestellen, austragen |
| confirmed / unconfirmed | bestätigt / unbestätigt | |
| opt-in, double opt-in, single opt-in | Opt-in, Double-Opt-in, Single-Opt-in | |
| campaign(s) | Kampagne(n) | Aussendung, Mailing, Campaign |
| recipient(s) | Empfänger | (nur für Empfänger einer Kampagne) |
| template(s) | Vorlage(n) | Template |
| delivery server(s) | Versandserver | Zustellserver, Lieferserver |
| bounce(s), bounce server | Bounce(s), Bounce-Server | Rückläufer |
| hard / soft / internal bounce | Hardbounce / Softbounce / interner Bounce | |
| feedback loop (server) | Feedback-Loop(-Server) | |
| email box monitor | Postfachüberwachung | |
| email blacklist, blacklisted | Sperrliste, gesperrt | Blacklist, schwarze Liste |
| suppression list | Ausschlussliste | Unterdrückungsliste |
| custom field | benutzerdefiniertes Feld | eigenes Feld, Custom Field |
| list fields | Listenfelder | |
| segment(s) | Segment(e) | |
| customer(s), customer group | Kunde(n), Kundengruppe | Customer |
| user(s), user group | Benutzer, Benutzergruppe | Nutzer, User |
| sending domain | Absenderdomain | Versanddomain |
| tracking domain | Tracking-Domain | |
| price plan | Tarif | Preisplan |
| promo code | Gutscheincode | Promo-Code, Aktionscode |
| order | Bestellung | Auftrag |
| payment gateway | Zahlungsanbieter | Payment-Gateway |
| landing page | Landingpage | Landing Page, Zielseite |
| survey, survey responder | Umfrage, Umfrageteilnehmer | |
| email, emails | E-Mail, E-Mails | Email, Mail (allein) |
| email address | E-Mail-Adresse | |
| from name / from email / reply-to | Absendername / Absenderadresse / Antwortadresse | |
| subject | Betreff | |
| open(s), unique opens | Öffnung(en), eindeutige Öffnungen | |
| click(s) | Klick(s) | |
| open rate / click rate | Öffnungsrate / Klickrate | |
| queue | Warteschlange | Queue |
| cron job(s) | Cronjob(s) | |
| API key | API-Schlüssel | API-Key |
| attachment | Anhang | Attachment |
| backend / customer area | Adminbereich / Kundenbereich | Backend |
| dashboard | Dashboard | |

## Status

| Englisch | Deutsch |
|---|---|
| active / inactive | aktiv / inaktiv |
| draft | Entwurf |
| pending | ausstehend |
| pending sending | wartet auf Versand |
| sending | wird versendet |
| sent | versendet |
| processing | in Bearbeitung |
| paused | pausiert |
| blocked | blockiert |
| pending approval | wartet auf Freigabe |

## Aktionen (Knöpfe)

| Englisch | Deutsch |
|---|---|
| Create new / Create | Neu anlegen / Anlegen (z. B. „Neue Liste anlegen“) |
| Save / Save changes | Speichern / Änderungen speichern |
| Update | Aktualisieren |
| Edit / View / Delete | Bearbeiten / Ansehen / Löschen |
| Cancel / Close / Back | Abbrechen / Schließen / Zurück |
| Copy | Kopieren |
| Import / Export | Importieren / Exportieren |
| Search / Filter / Reset | Suchen / Filtern / Zurücksetzen |
| Pause / Resume | Pausieren / Fortsetzen |
| Actions / Options | Aktionen / Optionen |

## Stil

- Du-Form, freundlich und klar. Knöpfe sagen, was passiert.
- Fehlermeldungen: Ursache und nächster Schritt, so wie der englische Text sie nennt.
- Echte Umlaute, deutsche Anführungszeichen „…“.
- Platzhalter (`{name}`, `[LIST_NAME]`, `%s`, `%d`), HTML-Tags und URLs bleiben unverändert.
- Keine unnötigen Gegenüberstellungen („X statt Y“), keine Ausrufezeichen ohne Grund.

## Beim Übersetzen festgelegt

Damit spätere Nachträge dieselben Wörter nutzen.

| Englisch | Deutsch |
|---|---|
| batch | Stapel |
| quota (daily, hourly …) | Kontingent (Tageskontingent, Stundenkontingent …) |
| sending quota | Versandkontingent |
| validate / verify / confirm (Server, Domain) | bestätigen |
| send at / sent / unsent | Versand am / Versendet / Nicht versendet |
| sync | abgleichen |
| bulk action | Sammelaktion |
| mass emails | Rundmails |
| warmup plan | Aufwärmplan |
| header (E-Mail-Kopfzeile) / email header, footer (Vorlage) | Kopfzeile / Kopfbereich, Fußbereich |
| force FROM / Reply-To | Absenderadresse / Antwortadresse erzwingen |
| template tags | Tags |
| themes | Designs |
| avatar | Profilbild |
| Single / Double (Opt-in-Verfahren) | Single (ohne Bestätigung) / Double (mit Bestätigung) |
| Bounce-Arten hard, soft, internal | Hardbounce, Softbounce, Interner Bounce |
| Autoresponder-Auslöser AFTER-SUBSCRIBE usw. | Nach der Anmeldung, Nach einer Profiländerung, Nach dem Öffnen einer Kampagne, Nach dem Versand einer Kampagne |
| Beispieladressen | ich@, du@, newsletter@, reply@meine-firma.de; subdomain.deine-domain.de |

Statuswerte, die MailWizz mit `ucfirst()` ausgibt (Kampagnen, Abonnenten, Aufwärmpläne), stehen groß: „Entwurf“, „Wartet auf Versand“, „Nicht freigegeben“.
