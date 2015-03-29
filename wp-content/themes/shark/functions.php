<?php 

ini_set('zlib.output_handler', '');


// load widgets
get_template_part('widgets/widget_signpost');
get_template_part('widgets/widget_scroller');
get_template_part('widgets/widget_staff_login');
get_template_part('widgets/widget_need_help');
get_template_part('widgets/widget_featured_event');
get_template_part('widgets/widget_featured_news');
get_template_part('widgets/widget_welcome');
get_template_part('widgets/widget_rate_service');
get_template_part('widgets/widget_banner');
get_template_part('widgets/widget_service_search');
get_template_part('widgets/widget_service_categories');
get_template_part('widgets/widget_archive');

// includes
get_template_part('functions/sidebars');
get_template_part('functions/options');
get_template_part('functions/image-sizes');
get_template_part('functions/menus');
// get_template_part('functions/retina-images');
get_template_part('functions/svg-support');
get_template_part('functions/post-types');
get_template_part('functions/enqueue-post-scripts');
get_template_part('functions/enqueue-admin-scripts');
get_template_part('functions/shortcodes');

add_editor_style('css/layout.css');
add_editor_style('css/editor-style.css');

//AJAX

function ajax_get_pages(){
    if( isset($_GET['action'])&& $_GET['action'] == 'ajax_get_pages'):
    //get child pages
     //die($_GET['url']);

    $first_load = $_GET['firstLoad'];
    $front_id = get_option('page_on_front');
    $output_pages=array();
   // $single_page=0;
/*
if($page_id==$front_id && $_GET['url']!=home_url()): //catch single pages routing through homepage
$single_page=1;
endif;
//hack to get hash working when home url is called
list ($url) = explode('#', $_GET['url']);
if(rtrim($url, "/") == home_url()):
      $page_id=$front_id;
    endif;

//if(!$first_load){
       $output_pages[0] = $_GET['url'];
//}
      // if($page_id==0) $page_id=$front_id;
      // die('pageid='.$page_id);
    if($page_id and !$single_page): //if url is a page (not a taxonomy,archive etc) get sub pages
*/
$args = array(
    'post_type' => 'page',
    'numberposts' => -1,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC'
    );
//if($first_load) $args['exclude'] = $front_id; 

 if($pages = get_posts($args)):
      foreach($pages as $page):
        $output_pages[] = get_permalink($page->ID);
        endforeach;
endif;
echo json_encode($output_pages);

die();
endif;
}

add_action('init', 'ajax_get_pages');




add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction( $content ) {
   
  return $content .= '<p>Upload jpg image 800x1200 pixels (portrait) or 1200x800 pixels (landscape) @72dpi</p>';

}



//update custom post type archive to output correct permalink

function my_custom_post_type_archive_where($where,$args){      $post_type  = isset($args['post_type'])  ? $args['post_type']  :'post';      $where ="WHERE post_type = '$post_type' AND post_status = 'publish'";    return $where;  }

add_filter('getarchives_where','my_custom_post_type_archive_where',10,2);

add_filter( 'get_archives_link', function( $html ) {
    if( is_admin() ) // Just in case, don't run on admin side
        return $html;

    // $html is '<li><a href='http://example.com/hello-world'>Hello world!</a></li>'
    $html = str_replace( home_url(), home_url().'/media-latest-news/latest-news/archive', $html );
    return $html;
});






class subMenu extends Walker_Nav_Menu {
    function end_el(&$output, $item, $depth=0, $args=array()) {
    if( $item->ID == 50 ){

      $healthcare_args = array(
        'parent'      => 36,
        'orderby'     => 'name', 
        'order'       => 'ASC',
        'hide_empty'  => true
  );
$output.='<div class="sub-menu">';
if($healthcare_cats = get_terms( 'casestudies_category', $healthcare_args)):
$output.='<h5>Healthcare:</h5><ul>';
foreach($healthcare_cats as $term):
$output.='<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
  endforeach;
  $output.='</ul>';
endif;
    $other_args = array(
        'parent'      => 8,
        'orderby'     => 'name', 
        'order'       => 'ASC',
        'exclude'     => 36,
        'hide_empty'  => true
      );
    if($other_cats = get_terms( 'casestudies_category', $other_args)):
      $output.='<h5>Other:</h5><ul>';
      foreach($other_cats as $term):
$output.='<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
  endforeach;
      $output.='</ul>';
      endif;
    $output .= "</div></li>\n";  
    }
  }
}


?>