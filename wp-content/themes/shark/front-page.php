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
$image_size = 'homepage-bg';
if ( wp_is_mobile() ):
$image_size = 'homepage-bg-mobile';
endif;
list($src,$w,$h) = wp_get_attachment_image_src($image_id,$image_size);
//$src = getRetinaSrc($src);
endif;
?>
<div id="home" class="section preload-home" data-anchor="home" data-title="<?php wp_title()?>" style="background-image:url('<?php echo $src ?>');">
    <div class="bg-overlay"></div>
    <!-- caption -->
    <div class="caption">
    	<div>
    <h2 class="underline"><?php echo get_field('caption',$post->ID) ?></h2>
    <a href="<?php echo home_url() ?>/#our-work" class="button"><?php echo get_field('button_label',$post->ID)?></a>
</div>
</div>
<!-- /caption -->
<a class="scroll">Scroll to explore</a>
</div>
<!--/home-->
<?php get_footer() ?>