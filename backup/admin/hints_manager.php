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
  require('includes/application_top.php');
  $action = (isset($_GET['action']) ? $_GET['action'] : '');
  if (zen_not_null($action)) {
    switch ($action) {
      case 'setflag':
        if ( ($_GET['flag'] == '0') || ($_GET['flag'] == '1') ) {
          zen_set_hints_status($_GET['bID'], $_GET['flag']);
          $messageStack->add_session(SUCCESS_PAGE_STATUS_UPDATED, 'success');
        } else {
          $messageStack->add_session(ERROR_UNKNOWN_STATUS_FLAG, 'error');
        }
        zen_redirect(zen_href_link(FILENAME_HINTS_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $_GET['bID']));
        break;
      case 'insert':
      case 'update':
        if (isset($_POST['hints_id'])) $hints_id = zen_db_prepare_input($_POST['hints_id']);
        $hints_title = zen_db_prepare_input($_POST['hints_title']);
        $hints_url = zen_db_prepare_input($_POST['hints_url']);
		$hints_name = zen_db_prepare_input($_POST['hints_name']);
		$hints_mail = zen_db_prepare_input($_POST['hints_mail']);
        $hints_text = zen_db_prepare_input($_POST['hints_text']);
        $page_error = false;
        if (empty($hints_title)) {
          $messageStack->add(ERROR_PAGE_TITLE_REQUIRED, 'error');
          $page_error = true;
        }
        if (empty($hints_text)) {
        }
        if ($page_error == false) {
          $sql_data_array = array('hints_title' => $hints_title,
		                          'hints_url' => $hints_url,
		  						  'hints_name' => $hints_name,
		  						   'hints_mail' => $hints_mail,
                                   'hints_text' => $hints_text,
								   'date_added' => 'now()');
          if ($action == 'insert') {
            $insert_sql_data = array('status' => '1');
            $sql_data_array = array_merge($sql_data_array, $insert_sql_data);
            zen_db_perform(TABLE_HINTS_MANAGER, $sql_data_array);	
            $hints_id = zen_db_insert_id();
            $messageStack->add_session(SUCCESS_PAGE_INSERTED, 'success');
          } elseif ($action == 'update') {
            zen_db_perform(TABLE_HINTS_MANAGER, $sql_data_array, 'update', "hints_id = '" . (int)$hints_id . "'");
            $messageStack->add_session(SUCCESS_PAGE_UPDATED, 'success');
          }
 
 
 
 if ($hints_image = new upload('hints_image')) {
          $hints_image->set_destination(DIR_FS_CATALOG_IMAGES . $_POST['img_dir']);
          if ($hints_image->parse() && $hints_image->save()) {
            $hints_image_name = $_POST['img_dir'] . $hints_image->filename;
          }
          if ($hints_image->filename != 'none' && $hints_image->filename != '') {
            $db->Execute("update " . TABLE_HINTS_MANAGER . "
                          set hints_image = '" . $hints_image_name . "'
                          where hints_id = '" . (int)$hints_id . "'");
          } else {

            if ($hints_image->filename != '' || $_POST['image_delete'] == 1) {
//		  if ($testimonials_image->filename == 'none') {
              $db->Execute("update " . TABLE_HINTS_MANAGER . "
                            set hints_image = ''
                            where hints_id = '" . (int)$hints_id . "'");
            }
          }
        }
 
 
 
 
          zen_redirect(zen_href_link(FILENAME_HINTS_MANAGER, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'bID=' . $hints_id));
        } else {
          $action = 'new';
        }
        break;
      case 'deleteconfirm':
        $hints_id = zen_db_prepare_input($_GET['bID']);
        $db->Execute("delete from " . TABLE_HINTS_MANAGER . " where hints_id = '" . (int)$hints_id . "'");
        $messageStack->add_session(SUCCESS_PAGE_REMOVED, 'success');
        zen_redirect(zen_href_link(FILENAME_HINTS_MANAGER, 'page=' . $_GET['page']));
        break;
    }
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<link rel="stylesheet" type="text/css" href="includes/cssjsmenuhover.css" media="all" id="hoverJS">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script type="text/javascript">
  <!--
  function init()
  {
    cssjsmenu('navbar');
    if (document.getElementById)
    {
      var kill = document.getElementById('hoverJS');
      kill.disabled = true;
    }
  if (typeof _editor_url == "string") HTMLArea.replaceAll();
  }
  // -->
</script>
<?php if (HTML_EDITOR_PREFERENCE=="FCKEDITOR") require(DIR_WS_INCLUDES.'fckeditor.php'); ?>
<?php if (HTML_EDITOR_PREFERENCE=="HTMLAREA")  require(DIR_WS_INCLUDES.'htmlarea.php'); ?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onLoad="init()">
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo zen_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
<?php
  if ($action == 'new') {
    $form_action = 'insert';

    $parameters = array('hints_title' => '',
	                    '$hints_url' => '',    
						'hints_name' => '',
	                    'hints_mail' => '',
						'hints_image' => '',
                        'hints_text' => '',
                        'status' =>'');

    $bInfo = new objectInfo($parameters);

    if (isset($_GET['bID'])) {
      $form_action = 'update';

      $bID = zen_db_prepare_input($_GET['bID']);

      $page_query = "select * from " . TABLE_HINTS_MANAGER . " where hints_id = '" . $_GET['bID'] . "'";
      $page = $db->Execute($page_query);
      $bInfo->objectInfo($page->fields);
    } elseif (zen_not_null($_POST)) {
      $bInfo->objectInfo($_POST);
    }
?>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo zen_draw_form('new_page', FILENAME_HINTS_MANAGER, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . 'action=' . $form_action, 'post', 'enctype="multipart/form-data"'); if ($form_action == 'update') echo zen_draw_hidden_field('hints_id', $bID); ?>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main"><?php echo TEXT_HINTS_NAME; ?></td>
            <td class="main"><?php echo zen_draw_input_field('hints_name', $bInfo->hints_name, '', true); ?></td>
          </tr>
		  <tr>
            <td class="main"><?php echo TEXT_HINTS_MAIL; ?></td>
            <td class="main"><?php echo zen_draw_input_field('hints_mail', $bInfo->hints_mail, '', true); ?></td>
          </tr>
		  <tr>
            <td class="main"><?php echo TEXT_HINTS_URL; ?></td>			
            <td class="main"><?php echo zen_draw_input_field('hints_url', zen_not_null($bInfo->hints_url) ? $bInfo->hints_url : 'http://', 'maxlength="255"', true); ?></td>		
          </tr>
		   <tr>
            <td class="main"><?php echo TEXT_HINTS_TITLE; ?></td>
            <td class="main"><?php echo zen_draw_input_field('hints_title', $bInfo->hints_title, '', true); ?></td>
          </tr>

          <tr>
            <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td valign="top" class="main"><?php echo TEXT_HINTS_HTML_TEXT; ?></td>
            <td class="main">
				<?php if ($_SESSION['html_editor_preference_status']=="FCKEDITOR") {
                $oFCKeditor = new FCKeditor('hints_text') ;
                $oFCKeditor->Value = $bInfo->hints_text ;
                $oFCKeditor->Width  = '700' ;
                $oFCKeditor->Height = '500' ;
//                $oFCKeditor->Create() ;
                $output = $oFCKeditor->CreateHtml() ; echo $output;
					} else { // using HTMLAREA or just raw "source"
					echo zen_draw_textarea_field('hints_text', 'soft', '100%', '40', $bInfo->hints_text, '', true);
					} ?>


</td>
          </tr>
		  
		  
    <?php
     if (($bInfo->hints_image) != ('')) {
   ?>
           <tr>
            <td valign="top" class="main"><?php echo TEXT_INFO_CURRENT_IMAGE; ?></td>
			<td class="main"><?php echo $bInfo->hints_image; ?></td>
          </tr>
<?php
}
?> 

           <tr>
            <td valign="top" class="main"><?php echo TEXT_INFO_PAGE_IMAGE; ?></td>
			<td class="main"><?php echo zen_draw_file_field('hints_image'); ?></td>
          </tr>

		  <tr>
			<td class="main"><?php echo TEXT_IMAGES_HINTS_DELETE; ?></td>
            <td class="main"><?php echo zen_draw_radio_field('image_delete', '0', $off_image_delete) . '&nbsp;' . TABLE_HEADING_NO . ' ' . zen_draw_radio_field('image_delete', '1', $on_image_delete) . '&nbsp;' . TABLE_HEADING_YES; ?></td>
			</tr>

		  
          <tr>
            <td colspan="2"><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo zen_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td colspan="2" class="main" align="left" valign="top" nowrap><?php echo (($form_action == 'insert') ? zen_image_submit('button_insert.gif', IMAGE_INSERT) : zen_image_submit('button_update.gif', IMAGE_UPDATE)). '&nbsp;&nbsp;<a href="' . zen_href_link(FILENAME_HINTS_MANAGER, (isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : '') . (isset($_GET['bID']) ? 'bID=' . $_GET['bID'] : '')) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
          </tr>
        </table></td>
      </form></tr>
<?php
  } else {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow" width="100%">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_HINTS; ?></td>
				<td class="dataTableHeadingContent"><?php echo TABLE_HEADING_NAME; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_MAIL; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_DATE_ADDED; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent"></td>
                <td class="dataTableHeadingContent"></td>
              </tr>

<?php
    $hints_query_raw = "select hints_id, hints_title, hints_name, hints_mail, status, date_added from " . TABLE_HINTS_MANAGER . " order by date_added DESC, hints_title";
    $hints_split = new splitPageResults($_GET['page'], MAX_DISPLAY_SEARCH_RESULTS, $hints_query_raw, $hints_query_numrows);
    $Hints = $db->Execute($hints_query_raw);

while (!$Hints->EOF) {
     if ((!isset($_GET['bID']) || (isset($_GET['bID']) && ($_GET['bID'] == $Hints->fields['hints_id']))) && !isset($bInfo) && (substr($action, 0, 3) != 'new')) {
        $bInfo_array = array_merge($Hints->fields);
        $bInfo = new objectInfo($bInfo_array);
      }
      if (isset($bInfo) && is_object($bInfo) && ($Hints->fields['hints_id'] == $bInfo->hints_id)) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link(FILENAME_HINTS_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $Hints->fields['hints_id']) . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . zen_href_link(FILENAME_HINTS_MANAGER, 'Hints=' . $_GET['page'] . '&bID=' . $Hints->fields['hints_id']) . '\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo '<a href="javascript:popupImageWindow(\'' . FILENAME_POPUP_IMAGE . '?page=' . $Hints->fields['hints_id'] . '\')">' . zen_image(DIR_WS_IMAGES . 'icon_popup.gif', 'View Page') . '</a>&nbsp;' . $Hints->fields['hints_title']; ?></td>
                 <td class="dataTableContent" align="left"><?php echo $Hints->fields['hints_name']; ?></td>
				<td class="dataTableContent" align="left"><?php echo $Hints->fields['hints_mail']; ?></td>
                <td class="dataTableContent"><?php echo $Hints->fields['date_added']; ?></td>
                <td class="dataTableContent" align="center">
<?php
      if ($Hints->fields['status'] == '1') {
        echo zen_image(DIR_WS_IMAGES . 'icon_status_green.gif', 'Active', 10, 10) . '&nbsp;&nbsp;<a href="' . zen_href_link(FILENAME_HINTS_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $Hints->fields['hints_id'] . '&action=setflag&flag=0') . '">' . zen_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', 'Set Inactive', 10, 10) . '</a>';
      } else {
        echo '<a href="' . zen_href_link(FILENAME_HINTS_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $Hints->fields['hints_id'] . '&action=setflag&flag=1') . '">' . zen_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', 'Set Active', 10, 10) . '</a>&nbsp;&nbsp;' . zen_image(DIR_WS_IMAGES . 'icon_status_red.gif', 'Inactive', 10, 10);
      }
?></td>
                <td class="dataTableContent" align="right"></td>
                <td class="dataTableContent" align="right"></td>
              </tr>
<?php

 $Hints->MoveNext();
    }
?>
                  <tr>
                    <td class="smallText" valign="top"><?php echo $hints_split->display_count($hints_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $_GET['page'], TEXT_DISPLAY_NUMBER_OF_HINTS); ?></td>
                    <td class="smallText" align="right"><?php echo $hints_split->display_links($hints_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $_GET['page'], zen_get_all_get_params(array('page', 'info', 'x', 'y', 'lID'))); ?></td>
                  </tr>


              <tr>
                <td colspan="5"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td align="right" colspan="2"><?php echo '<a href="' . zen_href_link(FILENAME_HINTS_MANAGER, 'action=new') . '">' . zen_image_button('button_new_file.gif', IMAGE_NEW_PAGE) . '</a>'; ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
<?php
  $heading = array();
  $contents = array();
  switch ($action) {
    case 'delete':
      $heading[] = array('text' => '<b>' . $bInfo->hints_title . '</b>');

      $contents = array('form' => zen_draw_form('Hints', FILENAME_HINTS_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $bInfo->hints_id . '&action=deleteconfirm'));
      $contents[] = array('text' => TEXT_INFO_DELETE_INTRO);
      $contents[] = array('text' => '<br /><b>' . $bInfo->hints_title . '</b>');
      if ($bInfo->hints_image) $contents[] = array('text' => '<br />' . zen_draw_checkbox_field('delete_image', 'on', true) . ' ' . TEXT_INFO_DELETE_IMAGE);
      $contents[] = array('align' => 'center', 'text' => '<br />' . zen_image_submit('button_delete.gif', IMAGE_DELETE) . '&nbsp;<a href="' . zen_href_link(FILENAME_HINTS_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $_GET['bID']) . '">' . zen_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    default:
      if (is_object($bInfo)) {
        $heading[] = array('text' => '<b>' . $bInfo->hints_title . '</b>');

        $contents[] = array('align' => 'center', 'text' => '<br /><br /><a href="' . zen_href_link(FILENAME_HINTS_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $bInfo->hints_id . '&action=new') . '">' . zen_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . zen_href_link(FILENAME_HINTS_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $bInfo->hints_id . '&action=delete') . '">' . zen_image_button('button_delete.gif', IMAGE_DELETE) . '</a><br /><br /><br />');

        if ($bInfo->date_scheduled) $contents[] = array('text' => '<br />' . sprintf(TEXT_HINTS_SCHEDULED_AT_DATE, zen_date_short($bInfo->date_scheduled)));

        if ($bInfo->expires_date) {
          $contents[] = array('text' => '<br />' . sprintf(TEXT_HINTS_EXPIRES_AT_DATE, zen_date_short($bInfo->expires_date)));
        } elseif ($bInfo->expires_impressions) {
          $contents[] = array('text' => '<br />' . sprintf(TEXT_HINTS_EXPIRES_AT_IMPRESSIONS, $bInfo->expires_impressions));
        }

        if ($bInfo->date_status_change) $contents[] = array('text' => '<br />' . sprintf(TEXT_HINTS_STATUS_CHANGE, zen_date_short($bInfo->date_status_change)));
      }
      break;
  }

  if ( (zen_not_null($heading)) && (zen_not_null($contents)) ) {
    echo '            <td width="25%" valign="top">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '            </td>' . "\n";
  }
?>
          </tr>
        </table></td>
      </tr>
<?php
  }
?>
    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>