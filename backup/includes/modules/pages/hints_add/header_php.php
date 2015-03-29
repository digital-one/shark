<?php
require(DIR_WS_MODULES . 'require_languages.php');
require(DIR_WS_FUNCTIONS . 'hints.php');


  //require('includes/application_top.php');
if (REGISTERED_HINTS == 'true'){
  if (!$_SESSION['customer_id']) {
    $_SESSION['navigation']->set_snapshot();
    zen_redirect(zen_href_link(FILENAME_LOGIN, '', 'SSL'));
  }
}


  $process = false;
  if (isset($HTTP_POST_VARS['action']) && ($HTTP_POST_VARS['action'] == 'process')) {
    
        $hints_id = zen_db_prepare_input($_POST['hints_id']);
        $hints_title = zen_db_prepare_input($_POST['hints_title']);
        $hints_name = zen_db_prepare_input($_POST['hints_name']);
        $hints_mail = zen_db_prepare_input($_POST['hints_mail']);
		
        $hints_text = zen_db_prepare_input($_POST['hints_text']);
		
  $process = true;
  $error = false;
      if ($hints_title == '') {
        $error = true;
        $messageStack->add('new_hint', 'Hints Title Required!');
      }
	  if ($hints_name == '') {
        $error = true;
        $messageStack->add('new_hint', 'Hints Name Required!');
      }
	  if ($hints_mail == '') {
        $error = true;
        $messageStack->add('new_hint', 'Hints Email Required!');
      }
      if ($hints_text == '') {
          $error = true;
          $messageStack->add('new_hint', 'Hints Details Required!');
      }
    if ($error == false) {

          $sql_data_array = array('hints_title' => $hints_title,
                                  'hints_name' => $hints_name,
                                  'hints_mail' => $hints_mail,
								  'hints_show_email' => $hints_show_email,
                                  'hints_text' => $hints_text);

          
            $insert_sql_data = array('date_added' => 'now()',
                                     'status' => '0');
            $sql_data_array = array_merge($sql_data_array, $insert_sql_data);
            zen_db_perform(TABLE_HINTS_MANAGER, $sql_data_array);
            $hints_id = zen_db_insert_id();
            $messageStack->add_session(SUCCESS_HINTS_INSERTED, 'success');
 
 
 // build the message content
     
	  $name = $hints_name;
      $email_text = sprintf(EMAIL_GREET_NONE, $name);
      $html_msg['EMAIL_GREETING'] = str_replace('\n','',$email_text);


      // initial welcome
      $email_text .=  EMAIL_WELCOME;
	  $html_msg['EMAIL_WELCOME'] = str_replace('\n','',EMAIL_WELCOME);
      // add in regular email welcome text
      $email_text .= "\n\n" . EMAIL_TEXT . EMAIL_CONTACT . EMAIL_GV_CLOSURE;
	  $html_msg['EMAIL_MESSAGE_HTML']  = str_replace('\n','',EMAIL_TEXT);
	  $html_msg['EMAIL_CONTACT_OWNER'] = str_replace('\n','',EMAIL_CONTACT);
	  $html_msg['EMAIL_CLOSURE']       = nl2br(EMAIL_GV_CLOSURE);

// include create-account-specific disclaimer
      $email_text .= "\n\n" . sprintf(EMAIL_DISCLAIMER_NEW_CUSTOMER, STORE_OWNER_EMAIL_ADDRESS). "\n\n";
	  $html_msg['EMAIL_DISCLAIMER'] = sprintf(EMAIL_DISCLAIMER_NEW_CUSTOMER, '<a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">'. STORE_OWNER_EMAIL_ADDRESS .' </a>');
// send welcome email
   zen_mail($name, $hints_mail, EMAIL_SUBJECT, $email_text, STORE_NAME, EMAIL_FROM, $html_msg, 'Hints_add');
   
   ////SEND ADMIN EMAIL
   
   zen_mail($name, STORE_OWNER_EMAIL_ADDRESS, EMAIL_OWNER_SUBJECT, EMAIL_OWNER_TEXT, STORE_NAME, EMAIL_FROM, $html_msg, 'Hints_add');
	 
// send additional emails
      if (SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO_STATUS == '1' and SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO !='') {
        if ($_SESSION['customer_id']) {
          $account_query = "select customers_firstname, customers_lastname, customers_email_address
                            from " . TABLE_CUSTOMERS . "
                            where customers_id = '" . (int)$_SESSION['customer_id'] . "'";

          $account = $db->Execute($account_query);
        }
	   $extra_info=email_collect_extra_info($name,$email_address, $account->fields['customers_firstname'] . ' ' . $account->fields['customers_lastname'] , $account->fields['customers_email_address'] );
       $html_msg['EXTRA_INFO'] = $extra_info['HTML'];
       zen_mail('', SEND_EXTRA_CREATE_ACCOUNT_EMAILS_TO, SEND_EXTRA_HINTS_ADD_SUBJECT . ' ' . EMAIL_SUBJECT,
             $email_text . $extra_info['TEXT'], STORE_NAME, EMAIL_FROM, $html_msg, 'welcome_extra');
      }
 
 
 
	  
//////////////

      zen_redirect(zen_href_link(FILENAME_HINTS_ADD, 'action=success'));

}
  }
  ///////////////////

    if($_SESSION['customer_id']) {
      $check_customer = $db->Execute("select customers_id, customers_firstname, customers_lastname, customers_password, customers_email_address, customers_default_address_id from " . TABLE_CUSTOMERS . " where customers_id = '" . $_SESSION['customer_id'] . "'");
      $email= $check_customer->fields['customers_email_address'];
      $name= $check_customer->fields['customers_firstname'] . ' ' . $check_customer->fields['customers_lastname'];
  }

  // include template specific file name defines
$define_page = zen_get_file_directory(DIR_WS_LANGUAGES . $_SESSION['language'] . '/html_includes/', FILENAME_DEFINE_HINTS_ADD, 'false');

    $breadcrumb->add(NAVBAR_TITLE);
?>