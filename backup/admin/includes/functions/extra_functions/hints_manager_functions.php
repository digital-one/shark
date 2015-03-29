<?php
function zen_set_hints_status($hints_id, $status) {
global $db;
    if ($status == '1') {
      return $db->Execute("update " . TABLE_HINTS_MANAGER . " set status = '1' where hints_id = '" . $hints_id . "'");
    } elseif ($status == '0') {
      return $db->Execute("update " . TABLE_HINTS_MANAGER . " set status = '0' where hints_id = '" . $hints_id . "'");
    } else {
      return -1;
    }
  }
?>
