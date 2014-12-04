<?php
function social_links_shortcode( $atts, $content = null ) {
   return '<nav class="social">
<ul><li><a href="" class="facebook">Facebook</a></li>
    <li><a href="" class="twitter">Twitter</a></li>   
    <li><a href="" class="linkedin">Linkedin</a></li>
</ul>
</nav>';
}

add_shortcode( 'social-links', 'social_links_shortcode' );

?>