<?php
/**
 * Testimonial Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_page_3_default.php 3254 2006-03-25 17:34:04Z ajeh $
 */
?>

<div class="centerColumn" id="testimonialDefault">

<?php echo HEADING_ADD_TITLE;  ?>

<?php echo zen_draw_form('new_hint', zen_href_link(FILENAME_HINTS_ADD, '', 'SSL'), 'post', 'onSubmit="return check_form(new_hint);"') . zen_draw_hidden_field('action', 'process'); ?>

<?php if (CONTACT_US_STORE_NAME_ADDRESS== '1') { ?>
<address><?php echo nl2br(STORE_NAME_ADDRESS); ?></address>
<?php } ?>

<?php
  if (isset($_GET['action']) && ($_GET['action'] == 'success')) {
?>

<br class="clearBoth" />
<div class="mainContent success"><?php echo HINTS_SUCCESS; ?></div>

<?php
  } else {
?>

<?php if (DEFINE_HINTS_STATUS >= '1' and DEFINE_HINTS_STATUS <= '2') { ?>
<div id="pageThreeMainContent">
<?php require($define_page); ?>
</div>
<?php } ?>

<?php if ($messageStack->size('new_hint') > 0) echo $messageStack->output('new_hint'); ?>

<div class="content">
<fieldset>
<legend><?php echo TABLE_HEADING_HINTS; ?></legend>     
<div class="alert forward"><?php echo FORM_REQUIRED_INFORMATION; ?></div>
<br class="clearBoth" />

<fieldset id="personal">
<legend><?php echo CATEGORY_CONTACT; ?></legend>

<label class="inputLabel" for="hints_name"><?php echo TEXT_HINTS_NAME; ?></label>
<?php echo zen_draw_input_field('hints_name', $name, $tInfo->hints_name, 'id="hints_name"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="hints_mail"><?php echo TEXT_HINTS_EMAIL; ?></label>
<?php echo zen_draw_input_field('hints_mail', $email, $tInfo->hints_mail, 'id="hints_mail"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />
</fieldset>

<fieldset id="write">
<legend><?php echo TABLE_HEADING_HINTS_DESCRIPTION; ?></legend>

<label class="inputLabel" for="hints_title"><?php echo TEXT_HINTS_TITLE; ?></label>
<?php echo zen_draw_input_field('hints_title', $tInfo->hints_title, '', true, 'id="hints_title"') . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?>
<br class="clearBoth" />

<label class="inputLabel" for="hints_text"><?php echo TEXT_HINTS_HTML_TEXT . '<span class="alert">' . ENTRY_REQUIRED_SYMBOL . '</span>'; ?></label>
<?php echo zen_draw_textarea_field('hints_text', '30', '7', '', 'id="hints_text"'); ?>
<br class="clearBoth" />
</fieldset>
<br class="clearBoth" />
<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT_HINTS, BUTTON_HINTS_SUBMIT_ALT); ?></div>
</fieldset>
<?php
  }
?>
</div>
</form>
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) .'</a>'; ?></div>
<br class="clearBoth" />
</div>
