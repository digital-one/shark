<?php get_header() ?>
<div class="section" data-anchor="<?php echo $post->post_name ?>" data-title="<?php wp_title()?>">
	<!-- title -->
<section class="page-title white">
<div><h1><?php echo $post->post_title ?></h1><h2 class="underline"><?php echo get_field('sub_heading',$post->ID) ?></h2></div>
</section> 
<!-- /title -->
<?php
list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'page-letterbox-image');
$src = getRetinaSrc($src);
?>
<!-- banner -->
<section class="banner" style="background-image:url('<?php echo $src ?>');"></section>   
<!-- /banner -->
<!-- content -->
<section class="content blue">
    <div class="column-wrap">
    <?php
if(get_field('columns',$post->ID)):
while(the_repeater_field('columns',$post->ID)): 
?>
<div class="column"><h3><?php echo get_sub_field('column_heading') ?></h3><?php echo do_shortcode(get_sub_field('column_content')) ?></div>
<?php endwhile; ?>
<?php endif; ?>
</div></section>
<!-- /content -->
</div>
<?php get_footer() ?>