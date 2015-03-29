<?php
/**
 * Side Box Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_whats_new.php 6128 2007-04-08 04:53:32Z birdbrain $
 */
  $image_path = $random_whats_new_sidebox_product->fields['products_image'];
  $image_path = substr($image_path, 0 , -4);
  $med_path = "_MED.jpg";

  $content = "";
  $whats_new_box_counter = 0;
  while (!$random_whats_new_sidebox_product->EOF) {
    $whats_new_box_counter++;
    $whats_new_price = zen_get_products_display_price($random_whats_new_sidebox_product->fields['products_id']);
    $content .= '<div class="sideBoxContent centeredContent">';
    $content .= '<a href="' . zen_href_link(zen_get_info_page($random_whats_new_sidebox_product->fields['products_id']), 'cPath=' . zen_get_generated_category_path_rev($random_whats_new_sidebox_product->fields['master_categories_id']) . '&products_id=' . $random_whats_new_sidebox_product->fields['products_id']) . '">';
	$content .= '<img src="images/medium/' . $image_path . $med_path . '" alt="' . $random_whats_new_sidebox_product->fields["products_name"] . '"' . '"/>';
    $content .= '</a>';
	$content .= '<span class="med_overlay"></span>';
    $content .= '</div>';
    $random_whats_new_sidebox_product->MoveNextRandom();
  }
?>
