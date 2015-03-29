<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_products_next_previous.php 6912 2007-09-02 02:23:45Z drbyte $
 */

/*
 WebMakers.com Added: Previous/Next through categories products
 Thanks to Nirvana, Yoja and Joachim de Boer
 Modifications: Linda McGrath osCommerce@WebMakers.com
*/

?>
<div class="navNextPrevWrapper centeredContent">
<?php
// only display when more than 1
  if ($products_found_count > 1) {
?>
<p class="navNextPrevCounter"><?php echo (PREV_NEXT_PRODUCT); ?><?php echo ($position+1 . "/" . $counter); ?></p>
<div class="navNextPrevList prev"><a href="<?php echo zen_href_link(zen_get_info_page($previous), "cPath=$cPath&products_id=$previous"); ?>"><?php echo $previous_image . $previous_button; ?></a></div>

<!--<div class="navNextPrevList"><a href="<?php echo zen_href_link(FILENAME_DEFAULT, "cPath=$cPath"); ?>"><?php echo zen_image_button(BUTTON_IMAGE_RETURN_TO_PROD_LIST, BUTTON_RETURN_TO_PROD_LIST_ALT); ?></a></div>-->

<?php
  if ($flag_show_product_info_tell_a_friend == 1) { ?>
<div class="navNextPrevList tell_a_friend"><?php echo ($flag_show_product_info_tell_a_friend == 1 ? '<a href="' . zen_href_link(FILENAME_TELL_A_FRIEND, 'products_id=' . $_GET['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_TELLAFRIEND, BUTTON_TELLAFRIEND_ALT) . '</a>' : ''); ?></div>
<?php
  }
?>

<div class="navNextPrevList next"><a href="<?php echo zen_href_link(zen_get_info_page($next_item), "cPath=$cPath&products_id=$next_item"); ?>"><?php echo  $next_item_button . $next_item_image; ?></a></div>
<?php
  }
?>
<div style="clear:both;"></div>
</div>