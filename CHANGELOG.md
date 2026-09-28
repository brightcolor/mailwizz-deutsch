# Changelog

Alle nennenswerten Änderungen an Erweiterung und Textpaket. Versionen nach [Semantic Versioning](https://semver.org/lang/de/).

## [1.0.1] – 2026-09-28

### Behoben

- Die Übersicht der Erweiterung zeigt den letzten Abgleich und den letzten GitHub-Abruf in der Zeitzone des angemeldeten Benutzers.
- Der Konsolenbefehl `deutsch-sync` gibt seinen Bericht ohne die UTC-Uhrzeit aus, die MailWizz sonst vor jede Zeile setzt.

## [1.0.0] – 2026-09-27

### Neu

- Erweiterung „Deutsch“ für MailWizz 3.0 und neuer.
- Textpaket mit 6.821 Übersetzungen in Du-Form nach einem festen Glossar, einschließlich der Statuswerte, Autoresponder-Auslöser und Rechtenamen der Benutzergruppen, die MailWizz zur Laufzeit zusammensetzt.
- Formularmeldungen, Blätterleiste und Upload-Meldungen des Frameworks auf Deutsch.
- Übersetzte Inhalte: 42 Hinweise leerer Seiten, 16 Folien der Einführungstour, 11 Vorlagen für Listenseiten, 28 System-Mails.
- Abgleich im stündlichen Cronjob und direkt nach MailWizz-Updates: fehlende, englische und veraltete Übersetzungen werden ergänzt, eigene Übersetzungen erkannt, geschützt und wiederhergestellt.
- Liste „Offene Texte“ mit Übersetzung direkt im Adminbereich; fehlende Texte werden beim Aufruf erfasst, nach Updates wird zusätzlich der Code durchsucht.
- Neue Fassungen des Textpakets über GitHub, geprüft per SHA-256; jeder Eintrag muss dieselben Platzhalter, Tags und Links wie der englische Text haben.
- Konsolenbefehl `deutsch-sync` mit Probelauf.
- Alle Einstellungen im Adminbereich mit Grenzen, Prüfung und Hinweisen.
