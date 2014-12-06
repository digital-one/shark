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
    <div class="column"><h3>A Friendly Bunch</h3><p>Lorem ipsum, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p></div>
    <div class="column"><h3>Full of passion</h3><p>Lorem ipsum, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p></div>
    <div class="column"><h3>We love a challenge</h3><p>Lorem ipsum, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad </p></div>
</div></section>
<!-- /content -->
</div>
<?php get_footer() ?>