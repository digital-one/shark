<?php /* Template Name: Our Work */ ?>
<?php get_header() ?>
<div class="section page" id="<?php echo $post->post_name ?>" data-anchor="<?php echo $post->post_name ?>" data-title="<?php wp_title()?>">
  <!-- title -->
<section class="page-title white">
  <div class="vcenter">
<div><h1><?php echo $post->post_title ?></h1><h2 class="underline"><?php echo get_field('sub_heading',$post->ID)?></h2></div>
</div>
</section>
<!-- /title -->
<?php
    $args = array(
          'post_type' => 'casestudies',
          'orderby' => 'menu_order',
          'order' => 'ASC',
          'post_status' => 'publish',
          'numberposts' => 6
        );
    if($items = get_posts($args)):
?>
<!-- featured work -->
    <ul id="featured-work">
        <?php foreach($items as $item): ?>
        <?php
            list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID),'portfolio-tn');
            //$src = getRetinaSrc($src);
            ?>
     <li><figure><div class="bg"  style="background-image:url('<?php echo $src ?>');"></div><figcaption><a href="<?php echo get_permalink($item->ID) ?>" class="push-link"><div><h3><?php echo get_field('client',$item->ID) ?></h3><h4><?php echo strtolower($item->post_title)?></h4><span class="button">Read more</span></div></a></figcaption></figure></li>
 <?php endforeach ?>
</ul>
<!-- /featured work -->
<?php endif ?>
</div>
<?php get_footer() ?>