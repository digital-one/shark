<?php
function social_links_shortcode( $atts, $content = null ) {
   return '<nav class="social">
<ul><li><a href="https://www.facebook.com/Sharkdesign1" target="_blank" class="facebook">Facebook</a></li>
    <li><a href="https://twitter.com/Sharkdesign1" target="_blank" class="twitter">Twitter</a></li>   
    <li><a href="https://www.linkedin.com/company/shark-design-and-marketing" target="_blank" class="linkedin">Linkedin</a></li>
</ul>
</nav>';
}

add_shortcode( 'social-links', 'social_links_shortcode' );

?>