<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: header_php.php,v 1.3 2007/06/07 00:00:00 DrByteZen Exp $
//
  require(DIR_WS_MODULES . 'require_languages.php');
  $breadcrumb->add(NAVBAR_TITLE);

  $error = false;
  $band_name = '';
  $band_genre = '';
  $band_country = '';
  $band_state = '';
  $band_city = '';
  $contact1_firstname = '';
  $contact1_lastname = '';
  $contact1_phone = '';
  $contact1_email = '';
  $contact2_firstname = '';
  $contact2_lastname = '';
  $contact2_phone = '';
  $contact2_email = '';
  $payable_to = '';
  $mailing_address1 = '';
  $mailing_address2 = '';
  $mailing_city = '';
  $mailing_state = '';
  $mailing_zipcode = '';
  $mailing_country = '';
  $comments = '';


  if (isset($_GET['action']) && ($_GET['action'] == 'send')) {
    $band_name = zen_db_prepare_input($_POST['band_name']);
    $band_genre = zen_db_prepare_input($_POST['band_genre']);
    $band_country = zen_db_prepare_input($_POST['band_country']);
    $band_state = zen_db_prepare_input($_POST['band_state']);
    $band_city = zen_db_prepare_input($_POST['band_city']);
    $contact1_firstname = zen_db_prepare_input($_POST['contact1_firstname']);
    $contact1_lastname = zen_db_prepare_input($_POST['contact1_lastname']);
    $contact1_phone = zen_db_prepare_input($_POST['contact1_phone']);
    $contact1_email = zen_db_prepare_input($_POST['contact1_email']);
    $contact2_firstname = zen_db_prepare_input($_POST['contact2_firstname']);
    $contact2_lastname = zen_db_prepare_input($_POST['contact2_lastname']);
    $contact2_phone = zen_db_prepare_input($_POST['contact2_phone']);
    $contact2_email = zen_db_prepare_input($_POST['contact2_email']);
//  $payable_to = zen_db_prepare_input($_POST['payable_to']);
//  $mailing_address1 = zen_db_prepare_input($_POST['mailing_address1']);
//  $mailing_address2 = zen_db_prepare_input($_POST['mailing_address2']);
//  $mailing_city = zen_db_prepare_input($_POST['mailing_city']);
//  $mailing_state = zen_db_prepare_input($_POST['mailing_state']);
//  $mailing_zipcode = zen_db_prepare_input($_POST['mailing_zipcode']);
//  $mailing_country = zen_db_prepare_input($_POST['mailing_country']);
    $comments = zen_db_prepare_input(strip_tags($_POST['comments']));

    if (!zen_validate_email($contact1_email))  {
      $error = true;
      $messageStack->add('band_signup', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
      }
    if (!zen_not_null($band_name))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the band_name');
      }
    if (!zen_not_null($band_genre))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the band_genre');
      }
    if (!zen_not_null($band_country))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the band_country');
      }
    if (!zen_not_null($band_state))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the band_state');
      }
    if (!zen_not_null($band_city))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the band_city');
      }
    if (!zen_not_null($contact1_firstname))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the contact1_firstname');
      }
    if (!zen_not_null($contact1_lastname))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the contact1_lastname');
      }
    if (!zen_not_null($contact1_phone))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the contact1_phone');
      }
/*
    if (!zen_not_null($contact2_firstname))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the contact2_firstname');
      }
    if (!zen_not_null($contact2_lastname))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the contact2_lastname');
      }
    if (!zen_not_null($contact2_phone))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the contact2_phone');
      }
    if (!zen_not_null($contact2_email))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the contact2_email');
      }
*/
/*
    if (!zen_not_null($payable_to))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the payable_to');
      }
    if (!zen_not_null($mailing_address1))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the mailing_address1');
      }
    if (!zen_not_null($mailing_city))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the mailing_city');
      }
    if (!zen_not_null($mailing_state))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the mailing_state');
      }
    if (!zen_not_null($mailing_zipcode))  {
      $error = true;
      $messageStack->add('band_signup', 'Please fill in the mailing_zipcode');
      }
*/
    if (!isset($_POST['termsandconds']) || ($_POST['termsandconds'] != '1')) {
      $error = true;
      $messageStack->add_session('band_signup', 'You must accept our terms and conditions before signups can be processed.', 'error');
    }

   if ($error == false) {

// grab some customer info if logged in
      if(isset($_SESSION['customer_id'])) {
        $check_customer = $db->Execute("select customers_firstname, customers_lastname, customers_email_address from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$_SESSION['customer_id'] . "'");
        $customer_email = $check_customer->fields['customers_email_address'];
        $customer_name = $check_customer->fields['customers_firstname'] . ' ' . $check_customer->fields['customers_lastname'];
      } else {
        $customer_email = 'Not logged in';
        $customer_name = 'Not logged in';
      }

//assemble the email contents:
      $email_text = 'Data Submission: ' . "\n" .
        '------------------------------------------------------' . "\n" .
        'Family Name:' . "\t" . $band_name . "\n" .
        'Childs name (if known):' . "\t" . $band_genre . "\n" .
        'Date of Birth:' . "\t" . $band_country . "\n" .
        'Age:' . "\t" . $band_state . "\n" .
        'Parents name(s):' . "\t" . $band_city . "\n" .
        'Address (line 1):' . "\t" . $contact1_firstname . "\n" .
        'Address (line 2):' . "\t" . $contact1_lastname . "\n" .
        'Address (line 3):' . "\t" . $contact1_phone . "\n" .
        'Email address:' . "\t" . $contact1_email . "\n" .
        'Post code:' . "\t" . $contact2_firstname . "\n" .
        'Home Phone no:' . "\t" . $contact2_phone . "\n" .
//      'contact2_email:' . "\t" . $contact2_email . "\n" .
//      'payable_to:' . "\t" . $payable_to . "\n" .
//      'mailing_address1:' . "\t" . $mailing_address1 . "\n" .
//      'mailing_address2:' . "\t" . $mailing_address2 . "\n" .
//      'mailing_city:' . "\t" . $mailing_city . "\n" .
//      'mailing_state:' . "\t" . $mailing_state . "\n" .
//      'mailing_zipcode:' . "\t" . $mailing_zipcode . "\n" .
        'comments:' . "\t" . $comments . "\n\n" .
        'Where did you hear about us ?:' . "\t" . $contact2_lastname . "\n" .
        '------------------------------------------------------' . "\n" .
        OFFICE_USE . "\t" . "\n" .
        OFFICE_LOGIN_NAME . "\t" . $customer_name . "\n" .
        OFFICE_LOGIN_EMAIL . "\t" . $customer_email . "\n" .
        OFFICE_IP_ADDRESS . "\t" . $_SERVER['REMOTE_ADDR'] . "\n" .
        OFFICE_HOST_ADDRESS . "\t" . gethostbyaddr($_SERVER['REMOTE_ADDR']) . "\n" .
        OFFICE_DATE_TIME . "\t" . date("D M j Y G:i:s T") . "\n" .
        '------------------------------------------------------' . "\n\n" .
      $email_text = zen_output_string_protected($email_text);
      $email_html = nl2br("\n" . $email_text);

//send the email
      zen_mail(STORE_NAME, SEND_TO_ADDRESS, EMAIL_SUBJECT, $email_text, $band_name . ' ' . $band_genre, $contact1_email, array('EMAIL_MESSAGE_HTML' => $email_html), 'band_signup');

      zen_redirect(zen_href_link(FILENAME_BAND_SIGNUP, 'action=success'));
      } //endif $error=false

  } // endif action

// default email and name if customer is logged in
  if(isset($_SESSION['customer_id'])) {
      $check_customer = $db->Execute("select customers_firstname, customers_lastname, customers_email_address from " . TABLE_CUSTOMERS . " where customers_id = '" . $_SESSION['customer_id'] . "'");
      if ($contact1_email == '') $contact1_email = $check_customer->fields['customers_email_address'];
//    if ($contact1_firstname == '') $contact1_firstname = $check_customer->fields['customers_firstname'];
//    if ($contact1_lastname == '') $contact1_lastname = $check_customer->fields['customers_lastname'];
  }

?>