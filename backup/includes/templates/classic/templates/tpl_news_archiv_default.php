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
// | Do Not Remove: Coded for Zen-Cart by geeks4u.com                     |
// | Dedicated to Memory of Amelita "Emmy" Abordo Gelarderes		  |
// +----------------------------------------------------------------------+
// $Id: tpl_more_news_default.php,v 1.2 2004/08/26
//
?>
<?php 
$languages_id = zen_db_prepare_input((int)$_SESSION['languages_id']);
$news_box_query = $db->Execute("select n.box_news_id, nc.languages_id, 
                                nc.news_title, nc.news_content, n.more_news_page, n.news_added_date, n.news_start_date
								from " . TABLE_BOX_NEWS_CONTENT . " nc, " . TABLE_BOX_NEWS . " n
								where n.box_news_id = nc.box_news_id and nc.languages_id = " . $languages_id . " and n.news_status = 1 and now() >= n.news_start_date 
								order by n.news_start_date desc, n.news_added_date desc");


  $newsInfo = TEXT_NO_NEWS_FOR_LANGUAGE;

?>

<div class="centerColumn" id="moreNewsDefault">

<h1 id="newsArchivHeading"><?php echo HEADING_TITLE; ?></h1>
<?php
if ($news_box_query->RecordCount() >= 1) { ?>
<table border="0" width="100%" cellspacing="0" cellpadding="0" id="newsArchivTable">
  <!--<tr>
    <th scope="col" id="newsArchivTitleHeading"><?php echo NEWS_ARCHIVE_HEADING_TITLE; ?></th>
    <th scope="col" id="newsArchivDateHeading"><?php echo NEWS_ARCHIV_HEADING_START_DATE; ?></th>
  </tr>-->
<?php
    $row = 0;
    while (!$news_box_query->EOF) {
      $row++;
      if (($row / 2) == floor($row / 2)) {
        echo '  <tr>';
      } else {
        echo '  <tr>';
      }
	$news_title_lenth = strlen($news_box_query->fields['news_title']);


	echo 	'<td><p class="date">' . zen_date_short($news_box_query->fields['news_start_date']) . '</p>'  .
			'<h4><a href="' . zen_href_link('more_news&news_id=' . $news_box_query->fields['box_news_id'], '', 'NONSSL') . '">' . $news_box_query->fields['news_title'] . '</a></h4>' . 
          	'<p>' . substr(strip_tags($news_box_query->fields['news_content']),$news_title_lenth+2,195) . '...</p>' .
         	'<p class="link"><a href="' . zen_href_link('more_news&news_id=' . $news_box_query->fields['box_news_id'], '', 'NONSSL') . '">' . 'Click here to read the full story' . '</a>...</p></td>'  .
         	'</tr>';
      $news_box_query->MoveNext();
    };
?>
</table>
<?php } else {
echo TEXT_NO_NEWS_FOR_LANGUAGE;
} ?>

<!--<div class="buttonRow back"><?php echo zen_back_link() . zen_image_button(BUTTON_IMAGE_BACK, BUTTON_BACK_ALT) . '</a>'; ?></div>-->