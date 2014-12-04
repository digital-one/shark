<?php
//
// Case Studies Post Type related functions.
//

add_action('init', 'create_cpt_casestudies');
add_filter("manage_edit-casestudies_columns", "add_cpt_casestudies_columns");   
add_action("manage_casestudies_posts_custom_column",  "add_cpt_casestudies_custom_columns",10,2); 
//add_action('init', 'add_cpt_casestudies_rewrite_rules');
//add_filter('query_vars', 'add_cpt_casestudies_query_vars');

/*
add_action('admin_init', 'ci_add_cpt_gallery_meta');
add_action('save_post', 'ci_update_cpt_gallery_meta');
*/

if( !function_exists('create_cpt_casestudies') ):
function create_cpt_casestudies(){
	$labels = array(
		'name' => _x('Case Studies', 'post type general name', 'dc_theme'),
		'singular_name' => _x('Case Study', 'post type singular name', 'br_theme'),
		'add_new' => __('New Case Study', 'dc_theme'),
		'add_new_item' => __('Add New Case Study', 'br_theme'),
		'edit_item' => __('Edit Case Study', 'br_theme'),
		'new_item' => __('New Case Study', 'br_theme'),
		'view_item' => __('View Case Study', 'br_theme'),
		'search_items' => __('Search Case Studies', 'br_theme'),
		'not_found' =>  __('No Case Studies Found', 'br_theme'),
		'not_found_in_trash' => __('No case studies found in the trash', 'br_theme'), 
		'parent_item_colon' => __('Parent Case Studies Item:', 'br_theme')
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => __('casestudies', 'br_theme'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'rewrite' => array('slug' => 'case-studies/archive'),
		'menu_position' => 5,
		'taxonomies' => array('casestudies-category'),
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail','post-thumbnails','page-attributes')
		
	);

	register_post_type( 'casestudies' , $args );
}



add_action( 'init', 'cpt_casestudies_taxonomies');


if( !function_exists('cpt_casestudies_taxonomies') ):
function cpt_casestudies_taxonomies() {
	//
	// Create all taxonomies here.
	//
	$labels = array(
		'name' => _x( 'Case Study Categories', 'taxonomy general name', 'dc_theme' ),
		'singular_name' => _x( 'Case Study Category', 'taxonomy singular name', 'dc_theme' ),
		'search_items' =>  __( 'Search Case Study Categories', 'dc_theme' ),
		'all_items' => __( 'All Case Study Categories', 'dc_theme' ),
		'parent_item' => __( 'Parent Case Study Categories', 'dc_theme' ),
		'parent_item_colon' => __( 'Parent Case Study Categories:', 'dc_theme' ),
		'edit_item' => __( 'Edit Case Study Category', 'dc_theme' ), 
		'update_item' => __( 'Update Case Study Category', 'dc_theme' ),
		'add_new_item' => __( 'Add Case Study Category', 'dc_theme' ),
		'new_item_name' => __( 'New Category Name', 'dc_theme' ),
	); 	
	register_taxonomy(
		"casestudies_category", 
		"casestudies", 
		array(
			"hierarchical" => true, 
			"labels" => $labels,
			'rewrite' => array('slug' => 'case-studies/category'),
			'query_var' => true,
                        'public' => true,
                        'publicly_queryable' => true,
                        'exclude_from_search' => FALSE,
		));

}
endif;


function add_cpt_casestudies_columns($columns){
        $columns = array(
           "cb" => "<input type=\"checkbox\" />",
           "title" => "Project",
           "client" => "Client",
           "sector" =>"Categories/Sectors",
           "date" => "Publish Date"
        );  
	return $columns;
}

function add_cpt_casestudies_custom_columns($column,$id){
        global $post;
        switch ($column){
        		case "client":
        		echo get_field('client',$id);
        		break;
				 case "sector":
                 $terms = get_the_terms( $id, 'casestudies_category');
                $list="";
                foreach($terms as $term):
                     if(!empty($list)) $list.=", ";
                     $list.= $term->name;
                endforeach;
                echo $list;
                break;	               
 			}
			} 

function add_cpt_casestudies_rewrite_rules(){ 

add_rewrite_rule('^news-casestudiess/casestudiess/archive/yr/([^/]*)/?', 'index.php?pagename=news-casestudiess/casestudiess&yr=$matches[1]','top');

}

function add_cpt_casestudies_query_vars($public_query_vars) {
	  $public_query_vars[] = "yr";
	return $public_query_vars; 
}

endif;

?>
