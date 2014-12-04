<?php
//add svg support to media uploader
function cc_mime_types( $mimes ){

     $mimes['svg'] = 'image/svg+xml';
     return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


//fix svg display in admin
function fix_svg() {
   echo '<style type="text/css">
         .attachment-post-thumbnail, .acf-image-image {
              width: 100% !important;
              height: auto !important;
         }
         .acf-image-image{
              width: 120px !important;
             
         }
         </style>';
}
add_action('admin_head', 'fix_svg');
?>