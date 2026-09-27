<?php
// German texts for the MailWizz table "list_page_type".
// mode "whole": the field is replaced when its whole value equals the English text.
// mode "fragment": every occurrence of the English piece inside the field is replaced.
// Whitespace differences are ignored when matching. Tags must stay the same.

return array (
  'table' => 'list_page_type',
  'rules' => 
  array (
    0 => 
    array (
      'field' => 'name',
      'mode' => 'whole',
      'pairs' => 
      array (
        'Subscribe form' => 'Anmeldeformular',
        'Pending subscribe' => 'Anmeldung ausstehend',
        'Subscription confirmed' => 'Anmeldung bestätigt',
        'Update Profile' => 'Profil bearbeiten',
        'Unsubscribe form' => 'Abmeldeformular',
        'Unsubscribe confirmation' => 'Abmeldung bestätigt',
        'Subscribe confirm email' => 'Bestätigungsmail zur Anmeldung',
        'Unsubscribe confirm email' => 'Bestätigungsmail zur Abmeldung',
        'Welcome email' => 'Willkommensmail',
        'Subscription confirmed approval' => 'Anmeldung bestätigt, Freigabe ausstehend',
        'Subscription confirmed approval email' => 'E-Mail zur Freigabe der Anmeldung',
      ),
    ),
    1 => 
    array (
      'field' => 'description',
      'mode' => 'whole',
      'pairs' => 
      array (
        'When the user will reach the subscription form, they will see this page .' => 'Diese Seite sehen Besucher, wenn sie das Anmeldeformular öffnen.',
        'After the user will submit the subscription form, they will see this page.' => 'Diese Seite sehen Besucher, nachdem sie das Anmeldeformular abgeschickt haben.',
        'After the user will click the confirmation link from within the email, they will see this page.' => 'Diese Seite sehen Besucher, nachdem sie auf den Bestätigungslink in der E-Mail geklickt haben.',
        'This page will contain all the elements the subscription form contains, the only difference is the heading message.' => 'Diese Seite enthält dieselben Felder wie das Anmeldeformular, nur mit einem anderen Hinweistext.',
        'This is the form the user will see when following the unsubscribe link.' => 'Dieses Formular sehen Abonnenten, wenn sie dem Abmeldelink folgen.',
        'When the user clicks on the unsubscribe link from within the email, they will see this page.' => 'Diese Seite sehen Abonnenten, nachdem sie auf den Abmeldelink in der E-Mail geklickt haben.',
        'The email the user receives with the confirmation link' => 'Die E-Mail mit dem Bestätigungslink zur Anmeldung',
        'The email the user receives with the confirmation link to unsubscribe' => 'Die E-Mail mit dem Bestätigungslink zur Abmeldung',
        'The email the user receives after they successfully subscribe into the list' => 'Die E-Mail, die Abonnenten nach der erfolgreichen Anmeldung bekommen',
        'After the user will click the confirmation link from within the email, if the list requires confirm approval, they will see this page.' => 'Diese Seite sehen Besucher nach dem Klick auf den Bestätigungslink, wenn die Liste eine Freigabe verlangt.',
        'The email the user receives after their subscription is approved.' => 'Die E-Mail, die Abonnenten nach der Freigabe ihrer Anmeldung bekommen.',
      ),
    ),
    2 => 
    array (
      'field' => 'content',
      'mode' => 'fragment',
      'pairs' => 
      array (
        'We\'re happy you decided to subscribe to our email list.' => 'Schön, dass du dich für unsere Liste anmelden möchtest.',
        'Please take a few seconds and fill in the list details in order to subscribe to our list.' => 'Bitte nimm dir kurz Zeit und füll die Felder aus, um dich anzumelden.',
        'You will receive an email to confirm your subscription, just to be sure this is your email address.' => 'Du bekommst eine E-Mail, mit der du deine Anmeldung bestätigst. So stellen wir sicher, dass die E-Mail-Adresse dir gehört.',
        'Please check your email address in order to confirm your subscription.' => 'Bitte sieh in dein Postfach und bestätige deine Anmeldung.',
        'Congratulations, your subscription is now complete and awaiting approval.' => 'Glückwunsch, deine Anmeldung ist abgeschlossen und wartet auf Freigabe.',
        'Once the approval process is done, you will get a confirmation email with further instructions.' => 'Sobald sie freigegeben ist, bekommst du eine Bestätigungsmail mit allen weiteren Schritten.',
        'Congratulations, your subscription is now complete.' => 'Glückwunsch, deine Anmeldung ist abgeschlossen.',
        'You can always update your profile by visiting the following url:' => 'Deine Angaben kannst du jederzeit über diesen Link ändern:',
        '<a href="[UPDATE_PROFILE_URL]">Update profile</a>' => '<a href="[UPDATE_PROFILE_URL]">Profil bearbeiten</a>',
        'Use this form to update your profile information.' => 'Mit diesem Formular änderst du deine Angaben.',
        'We\'re sorry to see you go, but hey, no hard feelings, hopefully we will see you back one day.' => 'Schade, dass du gehst. Vielleicht sehen wir uns ja irgendwann wieder.',
        'Please fill in your email address in order to unsubscribe from the list.' => 'Bitte gib deine E-Mail-Adresse ein, um dich von der Liste abzumelden.',
        'You will receive an email to confirm your unsubscription, just to make sure this is not an accident or somebody else tries to unsubscribe you.' => 'Du bekommst eine E-Mail, mit der du die Abmeldung bestätigst. So stellen wir sicher, dass die Abmeldung wirklich von dir kommt.',
        'You were successfully removed from the [LIST_NAME] list.' => 'Du bist von der Liste [LIST_NAME] abgemeldet.',
        'Hopefully you will come back one day.' => 'Vielleicht kommst du ja irgendwann wieder.',
        'Having doubts?' => 'Doch anders entschieden?',
        'Please click <a href="[SUBSCRIBE_URL]">here</a> in order to subscribe again to the list.' => 'Klick <a href="[SUBSCRIBE_URL]">hier</a>, um dich wieder anzumelden.',
        'Please click <a href="[SUBSCRIBE_URL]" style="color:#008ca9;text-decoration:none">here</a> in order to complete your subscription.' => 'Bitte klick <a href="[SUBSCRIBE_URL]" style="color:#008ca9;text-decoration:none">hier</a>, um deine Anmeldung abzuschließen.',
        'Please click <a href="[UNSUBSCRIBE_URL]" style="color:#008ca9;text-decoration:none">here</a> in order to unsubscribe.' => 'Bitte klick <a href="[UNSUBSCRIBE_URL]" style="color:#008ca9;text-decoration:none">hier</a>, um dich abzumelden.',
        'If for any reason you cannot access the link, please copy the following url into your browser address bar:' => 'Falls sich der Link nicht öffnen lässt, kopiere diese Adresse in die Adresszeile deines Browsers:',
        'Thank you for subscribing into [LIST_NAME] email list.' => 'Danke für deine Anmeldung zur Liste [LIST_NAME].',
        'You can update your information at any time by clicking <a href="[UPDATE_PROFILE_URL]" style="color:#008ca9;text-decoration:none">here</a>.' => 'Deine Angaben kannst du jederzeit <a href="[UPDATE_PROFILE_URL]" style="color:#008ca9;text-decoration:none">hier</a> ändern.',
        'Congratulations, <br />Your subscription into [LIST_NAME] email list is now approved.' => 'Glückwunsch, <br />deine Anmeldung zur Liste [LIST_NAME] ist freigegeben.',
        'Thank you.' => 'Danke.',
        'Thanks.' => 'Danke.',
        'All rights reserved' => 'Alle Rechte vorbehalten',
      ),
    ),
  ),
);
