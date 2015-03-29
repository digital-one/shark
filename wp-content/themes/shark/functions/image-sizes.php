<?php
// Theme support
add_theme_support('post-thumbnails');
add_image_size('homepage-bg', 1680, 1080, true);
add_image_size('homepage-bg-mobile',933,600,true);
add_image_size('page-letterbox-image', 1680, 390, true);
add_image_size('page-letterbox-tn', 300, 70, true);
add_image_size('portfolio-tn', 600, 400, true);
add_image_size('enlightenment-tn', 500,2000, false);
add_image_size('portfolio-logo', 500,300, false);
add_image_size('portfolio-logo-tn', 250,150, false);
add_image_size('sector-icon', 88,76, false);
add_image_size('portfolio-column-half-height', 840,610, true);
add_image_size('portfolio-column-half-height-tn', 200,145, true);
add_image_size('portfolio-column-full-height', 840,1220, true);
add_image_size('portfolio-column-full-height-tn', 200,290, true);
add_image_size('portfolio-full-width', 1680,1680, false);
add_image_size('portfolio-full-width-tn', 200,200, false);
set_post_thumbnail_size( 150, 100,true); 

function custom_image_sizes($sizes) {
      unset( $sizes['medium']);
      unset( $sizes['large']);
	 //unset( $sizes['full'] ); // removes full size if needed
$myimgsizes = array(
	"homepage-bg" => __("Homepage Background" ),
  "homepage-bg-mobile" => __("Homepage Background Mobile" ),
  "page-letterbox-image" => __("Page Letterbox Image" ),
  "portfolio-tn" => __("Portfolio Thumbnail" ),
  "page-letterbox-tn" => __("Page Letterbox Thumbnail"),
  "enlightenment-tn" => __("Enlightenment Thumbnail" ),
  "portfolio-logo" => __("Portfolio Logo" ),
  "portfolio-logo-tn" => __("Portfolio Logo Thumbnail" ),
  "sector-icon" => __("Sector Icon" ),
  "portfolio-column-half-height" => __("Portfolio Column Half Height" ),
  "portfolio-column-half-height-tn" => __("Portfolio Column Half Height Thumbnail" ),
  "portfolio-column-full-height" => __("Portfolio Column Full Height" ),
  "portfolio-column-full-height-tn" => __("Portfolio Column Full Height Thumbnail" ),
  "portfolio-full-width" => __("Portfolio Full Width" ),
  "portfolio-full-width-tn" => __("Portfolio Full Width Thumbnail" )
  );
     
       $newimgsizes = array_merge($sizes, $myimgsizes);
	    return $newimgsizes;
}
add_filter('image_size_names_choose', 'custom_image_sizes');

?>