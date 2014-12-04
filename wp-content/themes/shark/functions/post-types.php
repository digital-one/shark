<?php
add_action('after_setup_theme', 'load_custom_post_types');
if( !function_exists('load_custom_post_types')):
function load_custom_post_types(){
	$cpt_files = apply_filters('load_custom_post_type_files', array(
		'post_types/enlightenment',
    	'post_types/case-studies'
	));
	foreach($cpt_files as $cpt_file) get_template_part($cpt_file);
	}
endif;
?>