<?php /* Template Name: What We Do */ ?>
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
    <nav id="sectors">
        <a class="close">Close</a>
        <?php
        $args = array(
        'hide_empty' => 0
        );
        if($terms = get_terms('casestudies_category',$args)): 
            $c=1;
        ?>
    <ul>
        <?php foreach($terms as $term): ?>
        <?php 
        list($src,$w,$h) = wp_get_attachment_image_src(get_field('white_icon',$term),'sector-icon');
        $src = getRetinaSrc($src);
        ?>
        <li class="item item-<?php echo $c ?>">
<div class="handle hover"><div><img src="<?php echo $src ?>" alt="<?php echo $term->name ?>" /><h3 class="underline"><span><?php echo $term->name ?></span></h3><?php /*<h4 class="underline"><?php echo get_field('sub_heading',$term) ?></h4>*/ ?></div></div>
<div class="main"><p><?php echo $term->description ?></p><a href="" class="button">Read Case Study</a></div><aside>
<?php if(get_field('category_services_rptr', $term)): ?>
    <ul>
<?php while(the_repeater_field('category_services_rptr',$term)): ?>
<li><?php echo get_sub_field('category_service')?></li>
<?php endwhile; ?>
</ul>
<?php endif ?>
</aside> 
</li>
<?php $c++; ?>
<?php endforeach; ?>
</ul>
<?php endif?>
</nav>
    </section>
    <!-- /content -->
</div>
<?php get_footer() ?>