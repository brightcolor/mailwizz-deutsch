<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "ai_assistant_ext" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'Open AI settings' => 'OpenAI-Einstellungen',
  'Conversation max tokens limit is reached.' => 'Die Unterhaltung hat die Höchstzahl an Tokens erreicht.',
  'New conversation' => 'Neue Unterhaltung',
  'No tool executor is available for "{name}".' => 'Für „{name}“ steht kein Werkzeug zur Ausführung bereit.',
  'Please set the secret key' => 'Bitte hinterlege den geheimen Schlüssel.',
  'Requested conversation does not exist.' => 'Die angefragte Unterhaltung gibt es nicht.',
  'Something went wrong. Could not save response from the AI' => 'Die Antwort der KI ließ sich nicht speichern.',
  'Something went wrong. Empty response from the AI' => 'Die KI hat eine leere Antwort geliefert.',
  'Something went wrong. Empty response text from the AI' => 'Die KI hat eine Antwort ohne Text geliefert.',
  'Something went wrong. No response from the AI' => 'Die KI hat nicht geantwortet.',
  'Something went wrong. The AI exceeded the allowed number of tool calls.' => 'Die KI hat mehr Werkzeugaufrufe gestellt als erlaubt.',
  'Something went wrong. {error}' => 'Etwas ist schiefgelaufen: {error}',
  'The AI requested a tool call without a valid identifier.' => 'Die KI hat einen Werkzeugaufruf ohne gültige Kennung angefordert.',
  'The AI requested tool "{name}" with invalid arguments. Raw arguments: {arguments}' => 'Die KI hat das Werkzeug „{name}“ mit ungültigen Argumenten angefordert. Argumente im Rohformat: {arguments}',
  'The conversation could not be deleted' => 'Die Unterhaltung ließ sich nicht löschen.',
);
