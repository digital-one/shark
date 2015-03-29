<?php
/**
 * Common Template - tpl_header.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_header.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_header = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_header.php 4813 2006-10-23 02:13:53Z drbyte $
 */
?>

<?php
  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (isset($_GET['error_message']) && zen_not_null($_GET['error_message'])) {
  echo htmlspecialchars(urldecode($_GET['error_message']));
  }
  if (isset($_GET['info_message']) && zen_not_null($_GET['info_message'])) {
   echo htmlspecialchars($_GET['info_message']);
} else {

}
?>


<!--bof-header logo and navigation display-->
<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>
		<div id="top_bk"></div>
		<div id="header">
			<h1><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . '<span>Swimbabes</span>' . '</a>'; ?></h1>
			<!--<div id="top_navi">
				<ul>
					<li class="first">About Us</li>
					<li>Pool Finder</li>
					<li>Gallery</li>
					<li>Testemonials</li>
					<li class="last">Opportunities</li>
				</ul>
			</div>-->
			<div id="account_box">
				<p class="account"><strong>My Account</strong></p>
				<p class="login">
<?php if ($_SESSION['customer_id']) { ?>
    <a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a>
<?php
      } else {
        if (STORE_STATUS == '0') {
?>
    <a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="<?php echo zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CREATE_ACCOUNT; ?></a>
<?php } } ?>
				</p>
			</div>
			<div id="basket_box">
				<p class="account">
<?php if ($_SESSION['cart']->count_contents() != 0) { ?>
    <a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><?php echo HEADER_TITLE_CART_CONTENTS; ?></a>
    <span><a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CHECKOUT; ?></a></span>
<?php
      } else {
        if (STORE_STATUS == '0') {
?>
	Shopping Bag:<span>Check out</span>
<?php } } ?>
				</p>
				<p class="login">
<strong>
<?php
if ($_SESSION['cart']->count_contents() != 0) $items = $_SESSION['cart']->count_contents();
else {$items = "0";}
?>
<? echo $items; ?>
</strong> 

<?php
if ($_SESSION['cart']->count_contents() == 1) $items_text = "item";
else {$items_text = "items";}
?>
<? echo $items_text; ?>

in your basket 

<strong>
<?php
if ($_SESSION['cart']->count_contents() != 0) $totals = $currencies->format($_SESSION['cart']->show_total());
else {$totals = "&pound;0.00";}
?>
<? echo $totals; ?>
</strong>
				</p>
			</div>
			<div class="top_left_corner"></div>
			<div class="top_right_corner"></div>
		</div>

<div id="headerWrapper">
	<div class="left_drop"></div>
	<div class="right_drop"></div>
<!--eof-branding display-->

<!--eof-header logo and navigation display-->

<!--bof-optional categories tabs navigation display-->
<?php require($template->get_template_dir('tpl_modules_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_categories_tabs.php'); ?>
<!--eof-optional categories tabs navigation display-->

<!--bof-header ezpage links-->
<?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
<?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
<?php } ?>
<!--eof-header ezpage links-->
</div>
<?php } ?>