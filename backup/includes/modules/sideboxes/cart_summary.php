<?php
/**
 * cart_summary ("sidebox") - this sidebox can be used to display a summary of the customer's cart content in header or sidebox
 *
 * @package sideboxes
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: cart_summary.php  $
 */

  $item_separator = ($box_id == '') ? '&nbsp;&nbsp;' : '<br />';

  $totalsDisplay = '';
  switch (true) {
    case (SHOW_TOTALS_IN_CART == '1'):
      $totalsDisplay = TEXT_TOTAL_ITEMS . $_SESSION['cart']->count_contents() . $item_separator . TEXT_TOTAL_WEIGHT . $_SESSION['cart']->show_weight() . TEXT_PRODUCT_WEIGHT_UNIT . $item_separator . TEXT_TOTAL_AMOUNT . $currencies->format($_SESSION['cart']->show_total());
      break;
    case (SHOW_TOTALS_IN_CART == '2'):
      $totalsDisplay = TEXT_TOTAL_ITEMS . $_SESSION['cart']->count_contents() . ($_SESSION['cart']->show_weight() > 0 ? $item_separator . TEXT_TOTAL_WEIGHT . $_SESSION['cart']->show_weight() . TEXT_PRODUCT_WEIGHT_UNIT : '') . $item_separator . TEXT_TOTAL_AMOUNT . $currencies->format($_SESSION['cart']->show_total());
      break;
    case (SHOW_TOTALS_IN_CART == '3'):
      $totalsDisplay = TEXT_TOTAL_ITEMS . $_SESSION['cart']->count_contents() . $item_separator . TEXT_TOTAL_AMOUNT . $currencies->format($_SESSION['cart']->show_total());
      break;
  }


  $totalsDisplay_total = '';
  switch (true) {
    case (SHOW_TOTALS_IN_CART == '1'):
      $totalsDisplay_total = TEXT_TOTAL_ITEMS . $_SESSION['cart']->count_contents() . $item_separator . TEXT_TOTAL_WEIGHT . $_SESSION['cart']->show_weight() . TEXT_PRODUCT_WEIGHT_UNIT . $item_separator . TEXT_TOTAL_AMOUNT . $currencies->format($_SESSION['cart']->show_total());
      break;
    case (SHOW_TOTALS_IN_CART == '2'):
      $totalsDisplay_total = TEXT_TOTAL_ITEMS . $_SESSION['cart']->count_contents() . ($_SESSION['cart']->show_weight() > 0 ? $item_separator . TEXT_TOTAL_WEIGHT . $_SESSION['cart']->show_weight() . TEXT_PRODUCT_WEIGHT_UNIT : '') . $item_separator . TEXT_TOTAL_AMOUNT . $currencies->format($_SESSION['cart']->show_total());
      break;
    case (SHOW_TOTALS_IN_CART == '3'):
      $totalsDisplay_total = TEXT_TOTAL_ITEMS . $_SESSION['cart']->count_contents() . $item_separator . TEXT_TOTAL_AMOUNT . $currencies->format($_SESSION['cart']->show_total());
      break;
  }


  $content = $totalsDisplay;
  $content2 = $totalsDisplay_total;



/////////////////////////
// Determine whether displaying as sidebox should be disabled, based on Admin settings under Admin->Configuration->Stock
  $show_shopping_cart_box = true;
  switch (true) {
    case (SHOW_SHOPPING_CART_BOX_STATUS == '0'):
      $show_shopping_cart_box = true;
      break;
    case (SHOW_SHOPPING_CART_BOX_STATUS == '1'):
      if ($_SESSION['cart']->count_contents() > 0 || (isset($_SESSION['customer_id']) && zen_user_has_gv_account($_SESSION['customer_id']) > 0)) {
        $show_shopping_cart_box = true;
      } else {
        $show_shopping_cart_box = false;
      }
      break;
    case (SHOW_SHOPPING_CART_BOX_STATUS == '2'):
      if ( ( ($_SESSION['cart']->count_contents() > 0) || (isset($_SESSION['customer_id']) && zen_user_has_gv_account($_SESSION['customer_id']) > 0) ) && ($_GET['main_page'] != FILENAME_SHOPPING_CART) ) {
        $show_shopping_cart_box = true;
      } else {
        $show_shopping_cart_box = false;
      }
      break;
  }
///////////////////////


  require($template->get_template_dir('tpl_cart_summary.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_cart_summary.php');

  if ($box_id !='' && $show_shopping_cart_box == true) {
    $title = '<label>' . BOX_HEADING_CART_CONTENTS . '</label>';
    $title_link = false;
    require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);
  } else {
    if ($show_shopping_cart_box == true)
    require($template->get_template_dir('tpl_box_header.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_box_header.php');
  }
?>