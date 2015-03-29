<?php
/*
  $Id: testimonials_add.php,v 1.3 2003/12/08 Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Copyright (c) 2000,2001 The Exchange Project

  Released under the GNU General Public License
  Contributed by http://www.seen-online.co.uk
*/


define('NAVBAR_TITLE', 'Add My Hint');
define('HEADING_ADD_TITLE', '<h1>Add My Hint</h1>');

define('HINTS_SUCCESS', 'Your Hint has been successfully submitted and will be added to our other Hints as soon as we approve it.');

define('HINTS_SUBMIT', 'Submit your Hint using the form below.');


//////////////
define('EMAIL_SUBJECT', 'Your Hints Submission At ' . STORE_NAME . '.' . "\n\n");
define('EMAIL_GREET_NONE', 'Dear %s' . "\n\n");
define('EMAIL_WELCOME', 'Thanks for your Hint submission at <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Your Hint has been successfully submitted at ' . STORE_NAME . '. It will be added to our other Hints as soon as we approve it. You will receive an email about the status of your submittal. If you have not received it within the next 48 hours, please contact us before submitting your Hint again.' . "\n\n");
define('EMAIL_CONTACT', 'For help with your Hint submission, please contact us: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Note:</b> This email address was given to us during a Hint submission. If you have a problem, please send an email to ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_OWNER_SUBJECT', 'Hints submission at ' . STORE_NAME);
define('SEND_EXTRA_HINTS_ADD_SUBJECT', '[HINTS SUBMISSION]');
define('EMAIL_OWNER_TEXT', 'A new Hint was submitted at ' . STORE_NAME . '. It is not yet approved. Please verify thie Hint and activate.' . "\n\n");
define('EMAIL_GV_CLOSURE','Sincerely,' . "\n\n" . STORE_OWNER . "\nStore Owner\n\n". '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'.HTTP_SERVER . DIR_WS_CATALOG ."</a>\n\n");
define('EMAIL_DISCLAIMER_NEW_CUSTOMER', 'This Hint was submitted to us by you or by one of our users. If you did not submit a Hint, or feel that you have received this email in error, please send an email to %s ');


////////////////
define('TABLE_HEADING_HINTS', 'Customer Hint');
define('TABLE_HEADING_HINTS_DESCRIPTION', 'Hint Information');

define('TEXT_INFORMATION', '');

define('TEXT_HINTS_NAME', 'Your Name:');
define('TEXT_HINTS_EMAIL', 'Your Email:');
define('TEXT_HINTS_TITLE', 'Hint Title:');
define('TEXT_HINTS_HTML_TEXT', 'Hint Text');

define('ERROR_UNKNOWN_STATUS_FLAG', 'Error: Unknown status flag.');
define('ERROR_HINTS_TITLE_REQUIRED', 'Error: Hints title required.');
define('ERROR_HINTS_NAME_REQUIRED', 'Error: Hints Name required.');
define('ERROR_HINTS_DESCRIPTION_REQUIRED', 'Error: Hints Description required.');

?>
