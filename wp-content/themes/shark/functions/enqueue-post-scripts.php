<?php
//enqueue jquery

if (!is_admin()) add_action("wp_enqueue_scripts", "enqueue_post_scripts", 11);


function enqueue_post_scripts() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

?>