<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=product_info.<br />
 * Displays details of a typical product
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_product_info_display.php 5369 2006-12-23 10:55:52Z drbyte $
 */
 //require(DIR_WS_MODULES . '/debug_blocks/product_info_prices.php');
?>
<div class="centerColumn" id="productGeneral">

<!--bof Form start-->
<?php echo zen_draw_form('cart_quantity', zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params(array('action')) . 'action=add_product'), 'post', 'enctype="multipart/form-data"') . "\n"; ?>
<!--eof Form start-->

<?php if ($messageStack->size('product_info') > 0) echo $messageStack->output('product_info'); ?>


<!--bof Category Icon -->
<?php if ($module_show_categories != 0) {?>
<?php
/**
 * display the category icons
 */
require($template->get_template_dir('/tpl_modules_product_icon_display.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_product_icon_display.php'); ?>
<?php } ?>
<!--eof Category Icon -->


<!--bof Prev/Next top position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 1 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<?php
/**
 * display the product previous/next helper
 */
require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
<?php } ?>
<!--eof Prev/Next top position-->

<!--bof Main Product Image -->
<?php
  if (zen_not_null($products_image)) {
  ?>
<?php
/**
 * display the main product image
 */
   require($template->get_template_dir('/tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php'); ?>
<?php
  }
?>
<!--eof Main Product Image-->

<!--bof Product Name-->
<h1 id="productName" class="productGeneral"><?php echo $products_name; ?></h1>
<!--eof Product Name-->

<!--bof Product Price block -->
<h2 id="productPrices" class="productGeneral">
<?php
// base price
  if ($show_onetime_charges_description == 'true') {
    $one_time = '<span >' . TEXT_ONETIME_CHARGE_SYMBOL . TEXT_ONETIME_CHARGE_DESCRIPTION . '</span><br />';
  } else {
    $one_time = '';
  }
  echo $one_time . ((zen_has_product_attributes_values((int)$_GET['products_id']) and $flag_show_product_info_starting_at == 1) ? TEXT_BASE_PRICE : '') . zen_get_products_display_price((int)$_GET['products_id']);
?></h2>
<!--eof Product Price block -->


<!--bof Product description -->
<?php if ($products_description != '') { ?>
<div id="productDescription" class="productGeneral biggerText"><?php echo stripslashes($products_description); ?></div>
<?php } ?>
<!--eof Product description -->


<!--bof free ship icon  -->
<?php if(zen_get_product_is_always_free_shipping($products_id_current) && $flag_show_product_info_free_shipping) { ?>
<div id="freeShippingIcon">Free postage &amp; packing on this item...!</div>
<?php } ?>
<!--eof free ship icon  -->

<br class="clearBoth" />

<!--bof Attributes Module -->
<?php
  if ($pr_attr->fields['total'] > 0) {
?>
<?php
/**
 * display the product atributes
 */
  require($template->get_template_dir('/tpl_modules_attributes.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_attributes.php'); ?>
<?php
  }
?>
<!--eof Attributes Module -->


<!--bof Add to Cart Box -->
<?php
if (CUSTOMERS_APPROVAL == 3 and TEXT_LOGIN_FOR_PRICE_BUTTON_REPLACE_SHOWROOM == '') {
  // do nothing
} else {
?>
            <?php
    $display_qty = (($flag_show_product_info_in_cart_qty == 1 and $_SESSION['cart']->in_cart($_GET['products_id'])) ? '<p>' . PRODUCTS_ORDER_QTY_TEXT_IN_CART . $_SESSION['cart']->get_quantity($_GET['products_id']) . '</p>' : '');
            if ($products_qty_box_status == 0 or $products_quantity_order_max== 1) {
              // hide the quantity box and default to 1
              $the_button = '<input type="hidden" name="cart_quantity" value="1" />' . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            } else {
              // show the quantity box
    $the_button ='<h4>' . PRODUCTS_ORDER_QTY_TEXT . '</h4><input type="text" name="cart_quantity" value="' . (zen_get_buy_now_qty($_GET['products_id'])) . '" maxlength="6" size="4" />' . zen_get_products_quantity_min_units_display((int)$_GET['products_id']) . zen_draw_hidden_field('products_id', (int)$_GET['products_id']) . zen_image_submit(BUTTON_IMAGE_IN_CART, BUTTON_IN_CART_ALT);
            }
    $display_button = zen_get_buy_now_button($_GET['products_id'], $the_button);
  ?>
  <?php if ($display_qty != '' or $display_button != '') { ?>
    <div id="cartAdd">
    <?php
      echo $display_qty;
      echo $display_button;
            ?>
          </div>
		  <div class="clearBoth"></div>
  <?php } // display qty and button ?>
<?php } // CUSTOMERS_APPROVAL == 3 ?>
<!--eof Add to Cart Box-->

<!--bof Product details list  -->
<?php if ( (($flag_show_product_info_model == 1 and $products_model != '') or ($flag_show_product_info_weight == 1 and $products_weight !=0) or ($flag_show_product_info_quantity == 1) or ($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name))) ) { ?>
<ul id="productDetailsList" class="floatingBox back">
  <?php echo (($flag_show_product_info_model == 1 and $products_model !='') ? '<li>' . TEXT_PRODUCT_MODEL . $products_model . '</li>' : '') . "\n"; ?>
  <?php echo (($flag_show_product_info_weight == 1 and $products_weight !=0) ? '<li>' . TEXT_PRODUCT_WEIGHT .  $products_weight . TEXT_PRODUCT_WEIGHT_UNIT . '</li>'  : '') . "\n"; ?>
  <?php echo (($flag_show_product_info_quantity == 1) ? '<li>' . $products_quantity . TEXT_PRODUCT_QUANTITY . '</li>'  : '') . "\n"; ?>
  <?php echo (($flag_show_product_info_manufacturer == 1 and !empty($manufacturers_name)) ? '<li>' . TEXT_PRODUCT_MANUFACTURER . $manufacturers_name . '</li>' : '') . "\n"; ?>
</ul>
<br class="clearBoth" />
<?php
  }
?>
<!--eof Product details list -->


<!--bof Quantity Discounts table -->
<?php
  if ($products_discount_type != 0) { ?>
<?php
/**
 * display the products quantity discount
 */
 require($template->get_template_dir('/tpl_modules_products_quantity_discounts.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_products_quantity_discounts.php'); ?>
<?php
  }
?>
<!--eof Quantity Discounts table -->

<!--bof Additional Product Images -->
<?php
/**
 * display the products additional images
 */
  require($template->get_template_dir('/tpl_modules_additional_images.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_additional_images.php'); ?>
<!--eof Additional Product Images -->

<!--bof Prev/Next bottom position -->
<?php if (PRODUCT_INFO_PREVIOUS_NEXT == 2 or PRODUCT_INFO_PREVIOUS_NEXT == 3) { ?>
<?php
/**
 * display the product previous/next helper
 */
 require($template->get_template_dir('/tpl_products_next_previous.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_products_next_previous.php'); ?>
<?php } ?>
<!--eof Prev/Next bottom position -->

<!--bof Tell a Friend button
<?php
  if ($flag_show_product_info_tell_a_friend == 1) { ?>
<div id="productTellFriendLink" class="buttonRow forward"><?php echo ($flag_show_product_info_tell_a_friend == 1 ? '<a href="' . zen_href_link(FILENAME_TELL_A_FRIEND, 'products_id=' . $_GET['products_id']) . '">' . zen_image_button(BUTTON_IMAGE_TELLAFRIEND, BUTTON_TELLAFRIEND_ALT) . '</a>' : ''); ?></div>
<?php
  }
?>
eof Tell a Friend button -->

<!--bof Reviews button and count
<?php
  if ($flag_show_product_info_reviews == 1) {
    // if more than 0 reviews, then show reviews button; otherwise, show the "write review" button
    if ($reviews->fields['count'] > 0 ) { ?>
<div id="productReviewLink" class="buttonRow back"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS, zen_get_all_get_params()) . '">' . zen_image_button(BUTTON_IMAGE_REVIEWS, BUTTON_REVIEWS_ALT) . '</a>'; ?></div>
<br class="clearBoth" />
<p class="reviewCount"><?php echo ($flag_show_product_info_reviews_count == 1 ? TEXT_CURRENT_REVIEWS . ' ' . $reviews->fields['count'] : ''); ?></p>
<?php } else { ?>
<div id="productReviewLink" class="buttonRow back"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array())) . '">' . zen_image_button(BUTTON_IMAGE_WRITE_REVIEW, BUTTON_WRITE_REVIEW_ALT) . '</a>'; ?></div>
<br class="clearBoth" />
<?php
  }
}
?>
eof Reviews button and count -->


<!--bof Product date added/available-->
<?php
  if ($products_date_available > date('Y-m-d H:i:s')) {
    if ($flag_show_product_info_date_available == 1) {
?>
  <p id="productDateAvailable" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_AVAILABLE, zen_date_long($products_date_available)); ?></p>
<?php
    }
  } else {
    if ($flag_show_product_info_date_added == 1) {
?>
      <p id="productDateAdded" class="productGeneral centeredContent"><?php echo sprintf(TEXT_DATE_ADDED, zen_date_long($products_date_added)); ?></p>
<?php
    } // $flag_show_product_info_date_added
  }
?>
<!--eof Product date added/available -->

<!--bof Product URL -->
<?php
  if (zen_not_null($products_url)) {
    if ($flag_show_product_info_url == 1) {
?>
    <p id="productInfoLink" class="productGeneral centeredContent"><?php echo sprintf(TEXT_MORE_INFORMATION, zen_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($products_url), 'NONSSL', true, false)); ?></p>
<?php
    } // $flag_show_product_info_url
  }
?>
<!--eof Product URL -->


<!-- 1st review list -->
<?php
// Get product id
$product_id = $_GET['products_id'] ;


// Query the reviews
$query  = "SELECT `customers_name` , `reviews_rating` , `reviews_id` , `customers_id` 
FROM `reviews` 
WHERE `products_id` = '$product_id'
AND `status` = '1' ORDER BY reviews_id ASC";

$result = mysql_query($query);
$num = mysql_numrows($result);

$i=0;
while ($i < $num) {
$reviews_id =mysql_result($result,$i,"reviews_id");
$customers_name =mysql_result($result,$i,"customers_name");
$customers_id =mysql_result($result,$i,"customers_id");
$reviews_rating =mysql_result($result,$i,"reviews_rating");
++$i;
}

// Query the customers name
$query4  = "SELECT `entry_firstname` , `entry_city` FROM `address_book` WHERE `customers_id` = '$customers_id' ";
$result4 = mysql_query($query4);

// Found out how many rows are in the database
$num4 = mysql_numrows($result4);

$i=0;
while ($i < $num4) {
$entry_firstname =mysql_result($result4,$i,"entry_firstname");
$entry_city =mysql_result($result4,$i,"entry_city");
++$i;
}


// Query the reviews_description
$query2  = "SELECT `reviews_text` FROM `reviews_description` WHERE `reviews_id` = '$reviews_id' ";
$result2 = mysql_query($query2);

// Found out how many rows are in the database
$num2 = mysql_numrows($result2);

$i=0;
while ($i < $num2) {
$reviews_text =mysql_result($result2,$i,"reviews_text");
++$i;
}

// Query the total rating

$sql = "SELECT SUM(reviews_rating) AS sum_points FROM `reviews` WHERE `products_id` = '$product_id' AND `status` = '1'";
$result3 = mysql_query($sql) or die(mysql_error());
$i = mysql_fetch_array($result3);

$average = round($i['sum_points'] / $num);


if ($average =="1") $bubble_image ="1_bubbles.gif";
else if ($average =="2") $bubble_image ="2_bubbles.gif";
else if ($average =="3") $bubble_image ="3_bubbles.gif";
else if ($average =="4") $bubble_image ="4_bubbles.gif";
else if ($average =="5") $bubble_image ="5_bubbles.gif";
else $bubble_image ="0_bubbles.gif";

if ($entry_firstname =="") $entry_firstname ="Name";
else $entry_firstname = $entry_firstname;

if ($entry_city =="") $entry_city ="Location";
else $entry_city = $entry_city;

$reviews_text_short = substr($reviews_text,0,180);

if ($reviews_text_short =="") $reviews_text_short ="This product currently has no reviews! If you'd like to write one please click 'Write a review' below and share your product views with other swimbabes customers";
else $reviews_text_short = $reviews_text_short;
?>



<div id="review_centre">
	<h3>Review Centre</h3>
	<div class="left">
		<p><? echo $reviews_text_short; ?>...</p>
		<p class="name"><strong><? echo $entry_firstname; ?>, <? echo $entry_city; ?></strong></p>
		<p class="link"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS, zen_get_all_get_params()) . '">'; ?>Read more reviews &raquo;</a></p>
		<p class="link"><?php echo '<a href="' . zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, zen_get_all_get_params(array())) . '">';?>Write a review &raquo;</a></p>
	</div>
	<div class="right">
		<img src="images/<? echo $bubble_image; ?>" alt="bubbles" width="100px" height="100px">
		<p><? echo $average; ?>/5 average</p>
	</div>
	<div style="clear:both;"></div>
</div>




<!-- 1st review list -->


<!-- cross sell module-->
<?php
      require($template->get_template_dir('tpl_modules_xsell_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_xsell_products.php');
?>
<!-- cross sell module-->


<!--bof also purchased products module-->
<!--<?php require($template->get_template_dir('tpl_modules_also_purchased_products.php', DIR_WS_TEMPLATE, $current_page_base,'templates'). '/' . 'tpl_modules_also_purchased_products.php');?>-->
<!--eof also purchased products module-->

<!--bof Form close-->
</form>
<!--bof Form close-->
</div>