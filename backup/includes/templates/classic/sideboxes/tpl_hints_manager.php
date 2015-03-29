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
//  $Id: testimonials_manager.php 2004-11-19 dave@open-operations.com
//
  $content = '';
  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';
  for ($i=1; $i<=sizeof($page_query_list); $i++) {
  $content .= '<p class="date"><strong><a href="' . zen_href_link(FILENAME_HINTS_MANAGER, 'hints_id=' . $page_query_list[$i]['id']) . '">' . $page_query_list[$i]['name'] . '</a></strong></p>';

if ($page_query_list[$i]['image'] != '') {  
$content .= '<p>' . zen_image(DIR_WS_IMAGES . $page_query_list[$i]['image'], $page_query_list[$i]['name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</p>';  
  }
  if (DISPLAY_HINTS_TRUNCATED_TEXT == 'true') {
    $content .= '<p>' . zen_trunc_string($page_query_list[$i]['story'],HINTS_DESCRIPTION_LENGTH) . '</p>';
  }
  }
  if (DISPLAY_ALL_HINTS_LINK == 'true') {
  $content .= '<p class="link"><a href="' . zen_href_link(FILENAME_ALL_HINTS) . '">' . DISPLAY_ALL_HINTS . '</a></p>';
 }
   if (DISPLAY_ADD_TESTIMONIAL_LINK == 'true') {
  $content .= '<div class="bettertestimonial"><a href="' . zen_href_link(FILENAME_HINTS_ADD) . '">' . ADD_HINTS . '</a></div>';
 }

$content .= '</div>
<div id="card_box">
	<ul>
		<li><img src="../images/cards/logo_ccVisa.gif" alt="Visa" border="0" /></li>
		<li><img src="../images/cards/logo_ccDiscover.gif" alt="Discover" border="0" /></li>
		<li><img src="../images/cards/logo_ccEcheck.gif" alt="Echeck" border="0" /></li>
		<li><img src="../images/cards/logo_ccAmex.gif" alt="Amex" border="0" /></li>
		<li><img src="../images/cards/PayPal_mark_37x23.gif" alt="Pay Pal" border="0" /></li>
		<li class="last"><img src="../images/cards/logo_ccMC.gif" alt="MasterCard" border="0" /></li>
	</ul>
</div>';
?>

