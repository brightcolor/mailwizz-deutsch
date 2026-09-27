<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "ai_assistant" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'AI Assistant' => 'KI-Assistent',
  'Topics' => 'Themen',
  'View topics' => 'Themen ansehen',
  'Topic' => 'Thema',
  'Subject' => 'Betreff',
  'Prompt' => 'Prompt',
  'Create new topic' => 'Neues Thema anlegen',
  'The subject will appear when starting a new conversation.' => 'Der Betreff erscheint, wenn eine neue Unterhaltung beginnt.',
  'This is the prompt that will always be sent as context for the conversation.' => 'Diesen Prompt bekommt jede Unterhaltung als Kontext mitgeschickt.',
  'Chat GPT 3.5 turbo' => 'Chat GPT 3.5 Turbo',
  'Chat GPT 4' => 'ChatGPT 4',
  'Text completion DaVinci 003' => 'Textvervollständigung DaVinci 003',
  'Enabled for customers' => 'Für Kunden aktiviert',
  'Customers use system OpenAI account' => 'Kunden nutzen das OpenAI-Konto des Systems',
  'Customers add own OpenAI account' => 'Kunden hinterlegen ein eigenes OpenAI-Konto',
  'Provide AI Assistant only for these customer groups' => 'KI-Assistent nur für diese Kundengruppen anbieten',
  'Secret key' => 'Geheimer Schlüssel',
  'Model' => 'Modell',
  'Max tokens' => 'Maximale Tokens',
  'Temperature' => 'Temperatur',
  'Frequency penalty' => 'Häufigkeitsstrafe',
  'Presence penalty' => 'Präsenzstrafe',
  'Stop' => 'Stopp',
  'The access secret key for OpenAI API' => 'Der geheime Zugangsschlüssel für die OpenAI-API',
  'Whether the customers can use this feature' => 'Ob Kunden diese Funktion nutzen können',
  'Whether customer can use the system OpenAI account if they don\'t have their own account' => 'Ob Kunden ohne eigenes Konto das OpenAI-Konto des Systems nutzen können',
  'Whether customer can add their own OpenAI account' => 'Ob Kunden ein eigenes OpenAI-Konto hinterlegen können',
  'The maximum number of tokens to generate in the completion. The token count of your prompt plus max_tokens cannot exceed the models context length. Most models have a context length of 2048 tokens (except for the newest models, which support 4096). We limited this to 2000 to make sure there are enough tokens for the response.' => 'Die maximale Zahl an Tokens für die Antwort. Tokens deines Prompts plus max_tokens dürfen die Kontextlänge des Modells nicht überschreiten. Die meisten Modelle haben eine Kontextlänge von 2048 Tokens, die neuesten 4096. Die Grenze liegt bei 2000, damit genug Tokens für die Antwort bleiben.',
  'What sampling temperature to use, between 0 and 2. Higher values like 0.8 will make the output more random, while lower values like 0.2 will make it more focused and deterministic. We generally recommend altering this or top_p but not both.' => 'Welche Sampling-Temperatur verwendet werden soll, zwischen 0 und 2. Höhere Werte wie 0,8 machen die Ausgabe zufälliger, während niedrigere Werte wie 0,2 sie fokussierter und deterministischer machen. Wir empfehlen im Allgemeinen, dies oder top_p zu ändern, aber nicht beides.',
  'Number between -2.0 and 2.0. Positive values penalize new tokens based on their existing frequency in the text so far, decreasing the models likelihood to repeat the same line verbatim. See more information about frequency and presence penalties.' => 'Zahl zwischen -2,0 und 2,0. Positive Werte bestrafen neue Tokens nach ihrer bisherigen Häufigkeit im Text. Das Modell wiederholt dann seltener dieselbe Zeile wörtlich. Mehr dazu findest du bei den Erklärungen zu Frequency und Presence Penalty.',
  'Number between -2.0 and 2.0. Positive values penalize new tokens based on whether they appear in the text so far, increasing the models likelihood to talk about new topics. See more information about frequency and presence penalties.' => 'Zahl zwischen -2,0 und 2,0. Positive Werte bestrafen neue Tokens, die im bisherigen Text schon vorkommen. Das Modell spricht dann eher über neue Themen. Mehr dazu findest du bei den Erklärungen zu Frequency und Presence Penalty.',
  'Up to 4 sequences where the API will stop generating further tokens. The returned text will not contain the stop sequence.' => 'Bis zu 4 Sequenzen, bei denen die API die Generierung weiterer Tokens stoppt. Der zurückgegebene Text enthält die Stoppsequenz nicht.',
  'Customers' => 'Kunden',
  'Here are some resources that might help you creating better prompts: {url}' => 'Diese Quellen helfen dir, bessere Prompts zu schreiben: {url}',
  'Assigned to' => 'Zugewiesen an',
  'Conversation' => 'Unterhaltung',
  'Customer' => 'Kunde',
  'GPT-5.6 Luna' => 'GPT-5.6 Luna',
  'GPT-5.6 Sol' => 'GPT-5.6 Sol',
  'GPT-5.6 Terra' => 'GPT-5.6 Terra',
  'Message' => 'Nachricht',
  'Name' => 'Name',
  'Request' => 'Anfrage',
  'Response' => 'Antwort',
  'Response settings' => 'Einstellungen für Antworten',
  'The maximum number of output tokens to generate in the response. GPT-5.6 models support up to 128000 output tokens, but much smaller values are usually enough for short assistant replies.' => 'Die höchste Zahl an Ausgabe-Tokens pro Antwort. GPT-5.6-Modelle unterstützen bis zu 128000 Ausgabe-Tokens; für kurze Antworten des Assistenten reichen meist deutlich kleinere Werte.',
  'The maximum number of output tokens to generate in the response. GPT-5.6 models support up to 128000 output tokens. The default is 4096 so tool calls that need larger payloads, such as template creation, do not truncate so easily.' => 'Die höchste Zahl an Ausgabe-Tokens pro Antwort. GPT-5.6-Modelle unterstützen bis zu 128000 Ausgabe-Tokens. Die Vorgabe ist 4096, damit Werkzeugaufrufe mit größeren Daten, etwa beim Anlegen einer Vorlage, seltener abgeschnitten werden.',
  'Update topic' => 'Thema bearbeiten',
);
