<?php declare(strict_types=1);
if (!defined('MW_PATH')) {
    exit('No direct script access allowed');
}

/**
 * German translation for the MailWizz category "cron_jobs" (du form).
 * Source: https://github.com/brightcolor/mailwizz-deutsch
 */
return array (
  'Campaigns sender, runs each minute.' => 'Kampagnen-Sender, läuft jede Minute.',
  'Queue handler, runs each minute.' => 'Warteschlangen-Handler, läuft jede Minute.',
  'Transactional email sender, runs once at 2 minutes.' => 'Transaktionaler E-Mail-Sender, läuft einmal alle 2 Minuten.',
  'Bounce handler, runs once at 10 minutes.' => 'Bounce-Handler, läuft einmal alle 10 Minuten.',
  'Feedback loop handler, runs once at 20 minutes.' => 'Feedback-Loop-Handler, läuft einmal alle 20 Minuten.',
  'Delivery/Bounce processor, runs once at 3 minutes.' => 'Zustellungs-/Bounce-Prozessor, läuft einmal alle 3 Minuten.',
  'Various tasks, runs each hour.' => 'Verschiedene Aufgaben, läuft jede Stunde.',
  'Daily cleaner, runs once a day.' => 'Täglicher Reiniger, läuft einmal am Tag.',
);
