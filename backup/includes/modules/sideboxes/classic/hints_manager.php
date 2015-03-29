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
// test if box should display
$page_query = $db->Execute("select hints_id, hints_image, hints_title, hints_text, date_added  from " . TABLE_HINTS_MANAGER . " where status = 1 order by rand(), hints_title limit " . MAX_DISPLAY_HINTS_TITLES ."");
if ($page_query->RecordCount()>0) {
      $title =  BOX_HEADING_HINTS_MANAGER;
      $box_id =  hints_manager;
      $rows = 0;
      while (!$page_query->EOF) {
        $rows++;
        $page_query_list[$rows]['id'] = $page_query->fields['hints_id'];
        $page_query_list[$rows]['name']  = $page_query->fields['hints_title'];
        $page_query_list[$rows]['story']  = $page_query->fields['hints_text'];
		$page_query_list[$rows]['image'] = $page_query->fields['hints_image'];

        $page_query->MoveNext();
      }
      $left_corner = false;
      $right_corner = false;
      $right_arrow = false;
      $title_link = false;
      require($template->get_template_dir('tpl_hints_manager.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_hints_manager.php');
      require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);
    }
?>