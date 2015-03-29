<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 TRANSITIONAL//EN">
<html>

	<head>
		<title></title>
	</head>
	<body>


	</body>
</html><?php
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
// $Id: tpl_band_signup_default.php,v 1.3 2007/06/07 00:00:00 DrByteZen Exp $
//
?>
<div class="centerColumn" id="bandSignupDefault">

<h1 id="bandSignupDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if ($messageStack->size('band_signup') > 0) echo $messageStack->output('band_signup'); ?>

<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>
<div class="mainContent success"><?php echo TEXT_SUCCESS; ?></div>

<div class="buttonRow"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<?php
  } else {
?>
<?php echo zen_draw_form('band_signup', zen_href_link(FILENAME_BAND_SIGNUP, 'action=send')); ?>

<div id="bandSignupContent" class="content">
<fieldset id="bandSignup-Info">
<p>Please register your interest using this form and we will contact you when a suitable course date is available
(at which time you will be required to complete a full registration form).
</p>
<legend>Please complete the following fields:</legend>
<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clearBoth" />

<label class="inputLabel" for="band_name">Family Name:<span class="alert">*</span></label>
<?php echo zen_draw_input_field('band_name', zen_output_string_protected($band_name), ' size="30" id="band_name"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="band_genre">Childs name (if known):<span class="alert">*</span></label>
<?php echo zen_draw_input_field('band_genre', zen_output_string_protected($band_genre), ' size="30" id="band_genre"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="band_country">Date of Birth:<span class="alert">*</span></label>
<?php echo zen_draw_input_field('band_country', zen_output_string_protected($band_country), ' size="30" id="band_country"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="band_state">Age:<span class="alert">*</span></label>
<?php echo zen_draw_input_field('band_state', zen_output_string_protected($band_state), ' size="30" id="band_state"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="band_city">Parents name (s):<span class="alert">*</span></label>
<?php echo zen_draw_input_field('band_city', zen_output_string_protected($band_city), ' size="30" id="band_city"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="contact1_firstname">Address (line 1):<span class="alert">*</span></label>
<?php echo zen_draw_input_field('contact1_firstname', zen_output_string_protected($contact1_firstname), ' size="30" id="contact1_firstname"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="contact1_lastname">Address (line 2):<span class="alert">*</span></label>
<?php echo zen_draw_input_field('contact1_lastname', zen_output_string_protected($contact1_lastname), ' size="30" id="contact1_lastname"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="contact1_phone">Address (line 3):<span class="alert">*</span></label>
<?php echo zen_draw_input_field('contact1_phone', zen_output_string_protected($contact1_phone), ' size="30" id="contact1_phone"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="contact2_firstname">Post code:</label>
<?php echo zen_draw_input_field('contact2_firstname', zen_output_string_protected($contact2_firstname), ' size="30" id="contact2_firstname"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="contact2_phone">Home Phone no:</label>
<?php echo zen_draw_input_field('contact2_phone', zen_output_string_protected($contact2_phone), ' size="30" id="contact2_phone"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="contact1_email">Email address:<span class="alert">*</span></label>
<?php echo zen_draw_input_field('contact1_email', zen_output_string_protected($contact1_email), ' size="30" id="contact1_email"'); ?>

<div class="clearBoth"></div>

<label class="inputLabel" for="contact2_lastname">Where did you hear about us ?</label>

<select size="1" name="contact2_lastname" id="contact2_lastname">
	<option value="Google">Google</option>
	<option value="Kids in Tow">Kids in Tow</option>
	<option value="For Parents By Parents">For Parents By Parents</option>
	<option value="All for Kids">All for Kids</option>
	<option value="The Best Of..">The Best Of</option>
	<option value="Web search">Web search</option>
	<option value="Chatterbox">Chatterbox</option>
	<option value="NCT">NCT</option>
	<option value="Link">Link</option>
	<option value="Word of mouth">Word of mouth</option>
	<option value="Other" selected="selected">Other</option>
</select>

<div class="clearBoth"></div>

<label for="comments" style="padding:0px;pading-bottom:5px;">Comments</label>
<?php echo zen_draw_textarea_field('comments', 30, 4, zen_output_string_protected($comments), 'id="comments"'); ?>
</fieldset>


<!-- <label class="inputLabel" for="contact2_email">Contact 2 Email:</label>
<?php echo zen_draw_input_field('contact2_email', zen_output_string_protected($contact2_email), ' size="30" id="contact2_email"'); ?>

<label class="inputLabel" for="payable_to">Checks Payable to:</label>
<?php echo zen_draw_input_field('payable_to', zen_output_string_protected($payable_to), ' size="30" id="payable_to"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>

<label class="inputLabel" for="mailing_address1">Mailing Address 1:</label>
<?php echo zen_draw_input_field('mailing_address1', zen_output_string_protected($mailing_address1), ' size="30" id="mailing_address1"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>

<label class="inputLabel" for="mailing_address2">Mailing Address 2:</label>
<?php echo zen_draw_input_field('mailing_address2', zen_output_string_protected($mailing_address2), ' size="30" id="mailing_address2"'); ?>

<label class="inputLabel" for="mailing_city">City:</label>
<?php echo zen_draw_input_field('mailing_city', zen_output_string_protected($mailing_city), ' size="30" id="mailing_city"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>

<label class="inputLabel" for="mailing_state">State:</label>
<?php echo zen_draw_input_field('mailing_state', zen_output_string_protected($mailing_state), ' size="30" id="mailing_state"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>

<label class="inputLabel" for="mailing_country">Country:</label>
<?php echo zen_draw_input_field('mailing_country', zen_output_string_protected($mailing_country), ' size="30" id="mailing_country"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>

<label class="inputLabel" for="mailing_zipcode">Postal/Zip code:</label>
<?php echo zen_draw_input_field('mailing_zipcode', zen_output_string_protected($mailing_zipcode), ' size="30" id="mailing_zipcode"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?> -->




<fieldset id="bandSignup-Conditions" style="display:none;">
<legend>Terms and Conditions</legend>
<?php echo zen_draw_checkbox_field('termsandconds', '1', true, 'id="termsandconds"');?>
<label class="checkboxLabel" for="termsandconds">I have read and agree to the <a href="<?php echo zen_href_link(FILENAME_PAGE_4); ?>" target="_blank">user agreement</a>:</label>
</fieldset>

<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SEND, BUTTON_SEND_ALT); ?></div>
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>

<br class="clearBoth" />
</div>
</form>

<?php
  }
?>
</div>