<?php
/*

  $Id: stats_monthly_sales_reports_dhtml, v 1.0 2008/06/23  $																    
                                                     
  By SkipWater <skip@ccssinc.net> 06.23.08
                                                      
  Powered by Zen-Cart (www.zen-cart.com)              
  Portions Copyright (c) 2006 The Zen Cart Team       
                                                      
  Released under the GNU General Public License       
  available at www.zen-cart.com/license/2_0.txt       
  or see "license.txt" in the downloaded zip          

  DESCRIPTION: Builds the link that appears in the    
  Admin navigation dropdown menu.  You should not     
  ever have to edit this file.

*/

?>
<?php
  $za_contents[] = array('text' => BOX_STATS_SALES_TOTALS, 'link' => zen_href_link(FILENAME_STATS_MONTHLY_SALES, '', 'NONSSL'));
?>
