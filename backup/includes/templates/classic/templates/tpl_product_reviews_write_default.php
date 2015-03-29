<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_product_reviews_write_default.php 4365 2006-09-03 19:16:58Z wilt $
 */
?>
<div class="centerColumn" id="reviewsWrite">
<h1 id="ReviewDefaultHeading">Write a review for <?php echo $products_name; ?></h1>
<div id="review_header">
	<p><?php echo SUB_TITLE_FROM , zen_output_string_protected($customer->fields['customers_firstname'] . ' ' . $customer->fields['customers_lastname']); ?></p>
	<p>&nbsp;</p>
</div>

<?php echo zen_draw_form('product_reviews_write', zen_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'action=process&products_id=' . $_GET['products_id'], 'SSL'), 'post', 'onsubmit="return checkForm(product_reviews_write);"'); ?>
<!--bof Main Product Image -->
      <?php
        if (zen_not_null($products_image)) {
    ?>
  <div id="reviewWriteMainImage" class="centeredContent back"><?php
        	/**
 * display the main product image
        	 */
   require($template->get_template_dir('/tpl_modules_main_product_image.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_main_product_image.php'); ?>
</div>
<?php
  //} else {
  ?>

<?php
        }
      ?>
<!--eof Main Product Image-->


<h1 id="reviewsWriteHeading"><?php echo $products_name; ?></h1>

<h2 id="reviewsWritePrice"><?php echo $products_price; ?></h2>

<div class="forward">
<div id="reviewsWriteProductPageLink" class="buttonRow"><?php echo '<a href="' . zen_href_link(zen_get_info_page($_GET['products_id']), zen_get_all_get_params()) . '">' . zen_image_button(BUTTON_IMAGE_GOTO_PROD_DETAILS , BUTTON_GOTO_PROD_DETAILS_ALT) . '</a>'; ?></div>
<div id="reviewsWriteProductPageLink" class="buttonRow"><?php echo '<a href="' . zen_href_link(FILENAME_REVIEWS) . '">' . zen_image_button(BUTTON_IMAGE_REVIEWS, BUTTON_REVIEWS_ALT) . '</a>'; ?></div>
</div>

<div id="reviewsWriteReviewsRate" class="center"><?php echo SUB_TITLE_RATING; ?></div>

<br class="clearBoth" />

<?php if ($messageStack->size('review_text') > 0) echo $messageStack->output('review_text'); ?>



<div class="ratingRow">

<p class="radio">
<span><?php echo zen_draw_radio_field('rating', '1', '', 'id="rating-1"'); ?></span>
<span><?php echo zen_draw_radio_field('rating', '2', '', 'id="rating-2"'); ?></span>
<span><?php echo zen_draw_radio_field('rating', '3', '', 'id="rating-3"'); ?></span>
<span><?php echo zen_draw_radio_field('rating', '4', '', 'id="rating-4"'); ?></span>
<span><?php echo zen_draw_radio_field('rating', '5', '', 'id="rating-5"'); ?></span>
</p>

<p>
<?php echo '<label class="" for="rating-1">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_ONE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_ONE, OTHER_REVIEWS_RATING_STARS_ONE_ALT) . '</label> '; ?>

<?php echo '<label class="" for="rating-2">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_TWO, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_TWO, OTHER_REVIEWS_RATING_STARS_TWO_ALT) . '</label>'; ?>

<?php echo '<label class="" for="rating-3">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_THREE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_THREE, OTHER_REVIEWS_RATING_STARS_THREE_ALT) . '</label>'; ?>

<?php echo '<label class="" for="rating-4">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_FOUR, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_FOUR, OTHER_REVIEWS_RATING_STARS_FOUR_ALT) . '</label>'; ?>

<?php echo '<label class="" for="rating-5">' . zen_image($template->get_template_dir(OTHER_IMAGE_REVIEWS_RATING_STARS_FIVE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . OTHER_IMAGE_REVIEWS_RATING_STARS_FIVE, OTHER_REVIEWS_RATING_STARS_FIVE_ALT) . '</label>'; ?>
</p>

<p class="text">
<span>1/5</span>
<span>2/5</span>
<span>3/5</span>
<span>4/5</span>
<span>5/5</span>
</p>

</div>

<div id="textAreaReviews" for="review-text"><?php echo SUB_TITLE_REVIEW; ?></div>
<?php echo zen_draw_textarea_field('review_text', 60, 5, '', 'id="review-text"'); ?>

    <div class="buttonRow forward"><br /><?php echo zen_image_submit(BUTTON_IMAGE_SUBMIT, BUTTON_SUBMIT_ALT); ?></div>
<br class="clearBoth" />

<div id="reviewsWriteReviewsNotice" class="notice"><?php echo TEXT_NO_HTML . (REVIEWS_APPROVAL == '1' ? '<br />' . TEXT_APPROVAL_REQUIRED: ''); ?></div>
</form>
</div>
