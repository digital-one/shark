<?php get_header() ?>
<!-- home -->
<?php
$src="";
if(get_field('background_images')):
$images = get_field('background_images',$post->ID);
$min=0;
$max=count($images)-1;
$index = rand($min,$max);
$image_id = $images[$index]['slide_image'];
list($src,$w,$h) = wp_get_attachment_image_src($image_id,'homepage-bg');
$src = getRetinaSrc($src);
endif;
?>
<div id="home" class="section" data-anchor="home" data-title="" style="background-image:url('<?php echo $src ?>');">
    <div class="bg-overlay"></div>
    <div class="caption">
        <div>
    <h2 class="underline"><?php echo get_field('caption',$post->ID) ?></h2>
    <a href="" class="button"><?php echo get_field('button_label',$post->ID)?></a>
</div>
</div>
<a class="scroll">Scroll</a>
</div>
<!--/home-->
<?php get_footer() ?>