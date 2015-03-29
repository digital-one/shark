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
// $Id: tpl_testimonials_default.php 277 2004-09-10 23:03:52Z wilt $
//
?>
<div class="centerColumn" id="testimonialDefault">

<?php echo HEADING_TITLE; ?>

<!--<?php if (DEFINE_HINTS_STATUS >= '1' and DEFINE_HINTS_STATUS <= '2') { ?>
<div id="pageThreeMainContent">
<?php require($define_page); ?>
</div>
<?php } ?>-->


<?php
  $hints_query_raw = "select * from " . TABLE_HINTS_MANAGER . " where status = 1 order by date_added DESC, hints_title";
  $hints_split = new splitPageResults($hints_query_raw, MAX_DISPLAY_ALL_HINTS);

  if (($hints_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>


<div id="productsListingTopNumber" class="navSplitPagesResult back"><?php echo $hints_split->display_count(TEXT_DISPLAY_NUMBER_OF_HINTS_MANAGER_ITEMS); ?></div>


<div id="productsListingListingTopLinks" class="navSplitPagesLinks forward"><?php echo TEXT_RESULT_PAGE . ' ' . $hints_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page'))); ?></div>
<br />
<br class="clearBoth" />


<?php
  } // split page
?>
<?php
    $hints = $db->Execute($hints_split->sql_query);
    while (!$hints->EOF) {
	$date_published = $hints->fields['date_added'];
?>
<div id="hints">
<div class="back"><b><a href="<?php echo zen_href_link(FILENAME_HINTS_MANAGER, 'hints_id=' . $hints->fields['hints_id']);?>"><?php echo $hints->fields['hints_title'];?></a></b></div>
    
<div class="forward">
<?php if (DISPLAY_HINTS_DATE_PUBLISHED == 'true') { echo zen_date_long($date_published); } ?>
</div>
<br class="clearBoth" />

   <?php
   if (($hints->fields[hints_image]) != ('')) {
     $hints_image = DIR_WS_IMAGES . $hints->fields[hints_image];
?>
<div id="hintImage">
<?php echo '<a href="' . $hints->fields['hints_url'] . '" target="_blank">' . zen_image($hints_image). '</a>'; ?>
</div>
   <?php
   }
?>

<div class="hint"><?php echo   substr($hints->fields['hints_text'],0,210);  ?>...<br /><br /><a href="<?php echo zen_href_link(FILENAME_HINTS_MANAGER, 'hints_id=' . $hints->fields['hints_id']);?>">Read the full article</a></div>

<!--<div class="back"><?php echo HINTS_BY_TEXT; ?><?php echo $hints->fields['hints_name'];?></div>-->

<div class="clearBoth" /><div>
<hr />
<br />
</div>
<?php
      $hints->MoveNext();
      }
?>

<?php
  if (($hints_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>

<!--<div id="productsListingTopNumber" class="navSplitPagesResult back"><?php echo $hints_split->display_count(TEXT_DISPLAY_NUMBER_OF_HINTS_MANAGER_ITEMS); ?></div>

<div id="productsListingListingTopLinks" class="navSplitPagesLinks forward"><?php echo TEXT_RESULT_PAGE . ' ' . $hints_split->display_links(MAX_DISPLAY_PAGE_LINKS, zen_get_all_get_params(array('page', 'info', 'x', 'y', 'main_page'))); ?></div>-->

<?php
  } // split page
?>
<br class="clearBoth" />
<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
<!--<div class="buttonRow forward"><a href="<?php echo zen_href_link(FILENAME_HINTS_ADD, '', 'SSL'); ?>"><?php echo zen_image_button(BUTTON_IMAGE_HINTS, BUTTON_HINTS_ADD_ALT); ?></a></div>-->

<br class="clearBoth" />
</div>
