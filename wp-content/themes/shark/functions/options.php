<?php
add_action("admin_menu", "setup_theme_admin_menus");
//enqueue the admin css styles
add_action('admin_enqueue_scripts', 'enqueue_admin_styles');
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');



if (isset($_POST["update_settings"])) {
    save_theme_settings();
}


if( !function_exists('enqueue_admin_styles') ):
function enqueue_admin_styles(){
	wp_enqueue_style('admin-styles');	
	wp_enqueue_style('jquery-ui');
	wp_enqueue_style( 'thickbox' );
	}
endif;

if( !function_exists('enqueue_admin_scripts') ):
	function enqueue_admin_scripts(){
		wp_enqueue_media(); 
		wp_enqueue_script('thickbox');
		wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery-1.10.1.min.js', array('jquery'), 0, true);
		wp_enqueue_script('admin-scripts', get_template_directory_uri().'/js/admin-scripts.js', array('jquery'), 0, true);
	}
endif;

function setup_theme_admin_menus() {
    add_menu_page('Theme settings', 'Theme Settings', 'manage_options', 
        'theme_settings', 'theme_settings_page');
         
    add_submenu_page('theme_settings', 
        'Social Links', 'Social Links', 'manage_options', 
        'social-links', 'theme_social_links_settings'); 
}

function save_theme_settings(){
	$facebook_url = esc_attr($_POST["facebook_url"]);  
	$twitter_url = esc_attr($_POST["twitter_url"]); 
	$linkedin_url = esc_attr($_POST["linkedin_url"]);  
	$site_logo_url = esc_attr($_POST["site_logo_url"]);
	$site_logo_attachment_id = esc_attr($_POST["site_logo_attachment_id"]);
	update_option("facebook_url", $facebook_url);
	update_option("twitter_url", $twitter_url);
	update_option("linkedin_url", $linkedin_url);
	update_option("site_logo_url", $site_logo_url);
	update_option("site_logo_attachment_id", $site_logo_attachment_id);
}
// We also need to add the handler function for the top level menu
function theme_settings_page() {
    echo "Settings page";
}

function theme_social_links_settings(){
	$facebook_url = get_option("facebook_url");
	$twitter_url = get_option("twitter_url");
	$linkedin_url = get_option("linkedin_url");
	$site_logo_url = get_option("site_logo_url");
	$site_logo_attachment_id = get_option('site_logo_attachment_id');
	?>
	<div class="wrap">
        <?php screen_icon('themes'); ?> <h2>Social Links</h2>
 
        <form method="POST" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook_url">
                            Facebook:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="facebook_url" size="46" value="<?php echo $facebook_url;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="twitter_url">
                            Twitter:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="twitter_url" size="46"  value="<?php echo $twitter_url;?>"  />
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row">
                        <label for="linkedin_url">
                            LinkedIn:
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="linkedin_url" size="46" value="<?php echo $linkedin_url;?>"  />
                    </td>
                </tr>
               
                 <tr valign="top">
                    <th scope="row">
                        <label for="upload_image">
                            Logo:
                        </label> 
                    </th>
                   <td>
                   	<?php
                   	$src='';
                   	$display='none';
                   	if($site_logo_attachment_id):
                   		$display="block";
                   		list($src,$w,$h) = wp_get_attachment_image_src($site_logo_attachment_id,'square-tn');
                   		endif;
 
                   	?>
<img src="<?php echo $src ?>" class="attachment-icon" style="display:<?php echo $display?>;" /><br />

                   	<label for="upload_image">
				<input class="attachment-url" type="text" size="36" name="site_logo_url" value="<?php echo $site_logo_url;?>" />
				<input class="attachment-select" type="button" value="Upload Image" />
				<br />Enter an URL or upload an image for the banner.
				</label><input type="hidden" class="attachment-id" name="site_logo_attachment_id" value="<?php echo $site_logo_attachment_id;?>" /></td>
                </tr>
                <tr><td>
    <input type="submit" value="Save settings" class="button-primary"/></td></tr>
            </table>
            <input type="hidden" name="update_settings" value="Y" />
        </form>
    </div>
    <?php
}
?>