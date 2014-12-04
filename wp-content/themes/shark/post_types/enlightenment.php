<?php
//
// Enlightenment Post Type related functions.
//

add_action('init', 'create_cpt_enlightenment');
add_filter("manage_edit-enlightenment_columns", "add_cpt_enlightenment_columns");   
add_action("manage_enlightenment_posts_custom_column",  "add_cpt_enlightenment_custom_columns",10,2); 
add_action('init', 'add_cpt_enlightenment_rewrite_rules');
add_filter('query_vars', 'add_cpt_enlightenment_query_vars');

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_enlightenment') ):
function create_cpt_enlightenment(){
	$labels = array(
		'name' => _x('Enlightenment', 'post type general name', 'dc_theme'),
		'singular_name' => _x('Article', 'post type singular name', 'br_theme'),
		'add_new' => __('New Article', 'dc_theme'),
		'add_new_item' => __('Add new article', 'br_theme'),
		'edit_item' => __('Edit article', 'br_theme'),
		'new_item' => __('New article', 'br_theme'),
		'view_item' => __('View article', 'br_theme'),
		'search_items' => __('Search articles', 'br_theme'),
		'not_found' =>  __('No articles found', 'br_theme'),
		'not_found_in_trash' => __('No articles found in the trash', 'br_theme'), 
		'parent_item_colon' => __('Parent Article Item:', 'br_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('enlightenment', 'br_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'rewrite' => array('slug' => 'enlightenment/archive'),
		'menu_position' => 5,
		'taxonomies' => array('enlightenment_category'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail','post-thumbnails','page-attributes')
		
	);

	register_post_type( 'enlightenment' , $args );
}



add_action( 'init', 'cpt_enlightenment_taxonomies');


if( !function_exists('cpt_enlightenment_taxonomies') ):
function cpt_enlightenment_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'Enlightenment Category', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'Enlightenment Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search Enlightenment Categories', 'dc_theme' ),
		'all_items' => __( 'All Enlightenment Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent Enlightenment Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent Enlightenment Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit Enlightenment Category', 'dc_theme' ), 
		'update_item' => __( 'Update Enlightenment Category', 'dc_theme' ),
		'add_new_item' => __( 'Add Enlightenment Category', 'dc_theme' ),
		'new_item_name' => __( 'New Enlightenment Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"enlightenment_category", 
		"enlightenment", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'enlightenment/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_enlightenment_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Name",
            "position" => "Position",
           "department" =>"Department",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_enlightenment_custom_columns($column,$id){
        global $post;
        switch ($column){
        	case "position":
        	echo get_field('position',$id);
        	break;
				 case "department":
                 $terms = get_the_terms( $id, 'enlightenment_category');
                $list="";
                foreach($terms as $term):
                     if(!empty($list)) $list.=", ";
                     $list.= $term->name;
                endforeach;
                echo $list;
                break;	               
 			}
			} 

function add_cpt_enlightenment_rewrite_rules(){ 

add_rewrite_rule('^enlightenment/archive/pge/([^/]*)/?', 'index.php?pagename=enlightenment&pge=$matches[1]','top');

}

function add_cpt_enlightenment_query_vars($public_query_vars) {
	  $public_query_vars[] = "pge";
	return $public_query_vars; 
}

endif;

?>
