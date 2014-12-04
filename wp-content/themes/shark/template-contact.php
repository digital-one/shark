<?php /* Template Name: Contact */ ?>
<?php get_header()?>
<div id="contact" class="section" data-anchor="<?php echo $post->post_name ?>" data-title="">
<section class="page-title white">
<div><h1><?php echo $post->post_title ?></h1><h2 class="underline"><?php echo get_field('sub_heading',$post->ID) ?></h2></div>
</section>
<?php
$location = get_field('office_location',$post->ID);
    $office_lat  = $location['lat'];
    $office_lng  = $location['lng'];
?>
 <section id="map" class="banner" data-lat="<?php echo $office_lat ?>" data-lng="<?php echo $office_lng ?>">map</section>   
<section class="content blue"><div class="column-wrap">
<?php
if(get_field('columns',$post->ID)):
while(the_repeater_field('columns',$post->ID)): 
?>
<div class="column"><h3><?php echo get_sub_field('column_heading') ?></h3><?php echo do_shortcode(get_sub_field('column_content')) ?></div>
<?php endwhile; ?>
<?php endif; ?>
</div></section>
</div>
</div>
<?php get_footer()?>