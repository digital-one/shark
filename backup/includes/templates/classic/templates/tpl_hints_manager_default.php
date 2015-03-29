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

<?php echo HEADING_TITLE;  ?>

<!--<?php if (DEFINE_HINTS_STATUS >= '1' and DEFINE_HINTS_STATUS <= '2') { ?>
<div id="pageThreeMainContent">
<?php require($define_page); ?>
</div>
<?php } ?>-->

<div id="hints">
<div class="back"><?php echo $page_check->fields[hints_title]; ?></div>
    
<div class="forward"><?php if (DISPLAY_HINTS_DATE_PUBLISHED == 'true') { echo zen_date_long($date_published); } ?></div>
<br class="clearBoth" />
   <?php
   if (($page_check->fields[hints_image]) != ('')) {
     $hints_image = DIR_WS_IMAGES . $page_check->fields[hints_image];
?>

<div id="hintImage">
<?php echo '<a href="' . $page_check->fields[hints_url] . '" target="_blank">' . zen_image($hints_image). '</a>'; ?>
</div>

   <?php
   }
?>
<div class="hint"><?php echo $page_check->fields[hints_text]; ?></div>

  
<!--<div class="back"><?php echo HINTS_BY_TEXT; ?> <?php echo $page_check->fields[hints_name];?></div>
<br class="clearBoth" />-->
</div>
<br class="clearBoth" />

<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>
<div class="buttonRow forward"><a href="<?php echo zen_href_link(FILENAME_ALL_HINTS); ?>"><?php echo zen_image_button(BUTTON_IMAGE_VIEW_HINTS, BUTTON_VIEW_HINTS_ALT); ?></a></div>
<br class="clearBoth" />

<!--<div class="buttonRow forward"><a href="<?php echo zen_href_link(FILENAME_HINTS_ADD, '', 'SSL'); ?>"><?php echo zen_image_button(BUTTON_IMAGE_HINTS, BUTTON_HINTS_ADD_ALT); ?></a></div>
<br class="clearBoth" />-->
</div>
