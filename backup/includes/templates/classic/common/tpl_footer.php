<?php
/**
 * Common Template - tpl_footer.php
 *
 * this file can be copied to /templates/your_template_dir/pagename<br />
 * example: to override the privacy page<br />
 * make a directory /templates/my_template/privacy<br />
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_footer.php<br />
 * to override the global settings and turn off the footer un-comment the following line:<br />
 * <br />
 * $flag_disable_footer = true;<br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_footer.php 4821 2006-10-23 10:54:15Z drbyte $
 */
require(DIR_WS_MODULES . zen_get_module_directory('footer.php'));



// This should be first line of the script:
$zco_notifier->notify('NOTIFY_HEADER_START_SITE_MAP');
/**
 * load language files
 */
require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));
$breadcrumb->add(NAVBAR_TITLE);
// include template specific file name defines
$define_page = zen_get_file_directory(DIR_WS_LANGUAGES . $_SESSION['language'] . '/html_includes/', FILENAME_DEFINE_SITE_MAP, 'false');
/**
 * load the site map class
 */
require DIR_WS_CLASSES . 'site_map.php';
$zen_SiteMapTree = new zen_SiteMapTree;
// This should be last line of the script:
$zco_notifier->notify('NOTIFY_HEADER_END_SITE_MAP');



?>


<?php
if (!isset($flag_disable_footer) || !$flag_disable_footer) {
?>

<!--bof-navigation display -->
<div id="navSuppWrapper">
			<div id="footer">
				<ul>
					<li class="top">General Information</li>
					<li><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a></li>

<?php if (EZPAGES_STATUS_FOOTER == '1' or (EZPAGES_STATUS_FOOTER == '2' and (strstr(EXCLUDE_ADMIN_IP_FOR_MAINTENANCE, $_SERVER['REMOTE_ADDR'])))) { ?>
<?php require($template->get_template_dir('tpl_ezpages_bar_footer.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_footer.php'); ?>
<?php } ?>
				</ul>
				<?php echo $zen_SiteMapTree->buildTree(); ?>
				<!--<ul>
					<li class="top"><a href="">Swimbabes</a></li>
					<li><a href="">Swimbabe lessons</a></li>
					<li><a href="">Find a pool</a></li>
					<li><a href="">Urchin Rock gallery</a></li>
					<li><a href="">Testimonials</a></li>
					<li><a href="">Careers</a></li>
					<li><a href="">Courses</a></li>
					<li><a href="">Photo shoots</a></li>
					<li><a href="">Swimbabes clothing</a></li>
					<li><a href="">Swim Kits</a></li>
					<li><a href="">Swim Nappy</a></li>
					<li><a href="">Baby wetsuits</a></li>
					<li><a href="">Kids wetsuits</a></li>
					<li><a href="">Boys and girls swimwear</a></li>
					<li><a href="">Youth swimwear</a></li>
					<li><a href="">Water confidence games</a></li>
					<li><a href="">Armbands and floats</a></li>
					<li><a href="">Swim goggles and caps</a></li>
					<li><a href="">Bags</a></li>
					<li><a href="">Towels and robes</a></li>
				</ul>
				<ul>
					<li class="top"><a href="">Puddlebabes</a></li>
					<li><a href="">Kids wellies</a></li>
					<li><a href="">Rain macs</a></li>
					<li><a href="">Umbrellas</a></li>
					<li><a href="">Splash suits</a></li>
					
				</ul>
				<ul>
					<li class="top"><a href="">Snowbabes</a></li>
					<li><a href="">Rainsuits</a></li>
					<li><a href="">Sunglasses</a></li>
				</ul>
				<ul>
					<li class="top"><a href="">Travelbabes</a></li>
					<li><a href="">Trendy bags</a></li>
					<li><a href="">Useful kits</a></li>
					<li><a href="">Holiday kits</a></li>
				</ul>
				<ul>
					<li class="top"><a href="">Beachbabes</a></li>
					<li><a href="">Sun protection</a></li>
					<li><a href="">Beach towels</a></li>
					<li><a href="">Beach essentials</a></li>
				</ul>-->
				<ul>
					<li class="top"><?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT_EDIT, '', 'SSL') . '">Account Information</a>'; ?></li>
					<li><?php echo '<a href="' . zen_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">My Account</a>'; ?></li>
					<li><a href="index_new.php?main_page=login">Login / Register</a></li>
					<li><?php echo '<a href="' . zen_href_link(FILENAME_SHOPPING_CART) . '">Shopping Bag</a>'; ?></li>
					<li><?php echo '<a href="' . zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '">Check out</a>'; ?></li>
					<li><?php echo '<a href="' . zen_href_link(FILENAME_PRIVACY) . '">Privacy Policy</a>'; ?></li>
					<li><a href="index_new.php?main_page=page&id=2">Terms &amp; Conditions</a></li>
				</ul>
				<br style="clear:both;">
			</div>
</div>
<!--eof-navigation display -->

<!--bof-ip address display -->
<?php
if (SHOW_FOOTER_IP == '1') {
?>
<div id="siteinfoIP"><?php echo TEXT_YOUR_IP_ADDRESS . '  ' . $_SERVER['REMOTE_ADDR']; ?></div>
<?php
}
?>
<!--eof-ip address display -->

<!--bof-banner #5 display -->
<?php
  if (SHOW_BANNERS_GROUP_SET5 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET5)) {
    if ($banner->RecordCount() > 0) {
?>
<div id="bannerFive" class="banners"><?php echo zen_display_banner('static', $banner); ?></div>
<?php
    }
  }
?>
<!--eof-banner #5 display -->

<!--bof- site copyright display -->
<div id="siteinfoLegal" class="legalCopyright"><?php echo FOOTER_TEXT_BODY; ?></div>
<!--eof- site copyright display -->

<?php
} // flag_disable_footer
?>