<?php get_header() ?>
<div id="enlightenment-page" class="section enlightenment scrollable" data-anchor="enlightenment" data-title="<?php wp_title()?>">
  <div class="scroll-area">
  <!-- title -->
<section class="page-title white">
  <div class="vcenter">
<div><h1><?php echo $post->post_title ?></h1><h2 class="underline"><?php echo get_field('sub_heading',$post->ID) ?></h2></div>
</div>
</section>
<!-- /title -->
<!-- content -->
<section class="content">
    <?php
    $paged = isset($wp->query_vars['pge']) ? $wp->query_vars['pge'] : 1;
    $next_page = $paged+1;
  $args = array(
          'post_type' => 'enlightenment',
          'orderby' => 'date',
          'order' => 'DESC',
          'paged' => $paged,
          'posts_per_page' => 4,
          'post_status' => 'publish'
          );
   $query = new WP_Query($args);
     $max_num_pages = $query->max_num_pages;

//echo 'next page='.$next_page. ' total pages='.$max_num_pages;

    if($items = get_posts($args)):
            ?>
          <div id="posts-container">

        <!-- <ul id="posts" class="transitions-enabled infinite-scroll">-->
    <?php foreach($items as $item): ?>
       <?php
list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID),'enlightenment-tn');
//$src = getRetinaSrc($src);
?>
 <div class="item"><figure><img src="<?php echo $src ?>" />

  <?php /*<img  class="lazy"  src="<?php echo $src ?>" /> */ ?></figure><figcaption><h4><?php echo $item->post_title ?></h4><?php echo $item->post_content ?></figcaption></div>
<?php endforeach ?>
<footer id="posts-footer">
<a href="<?php echo home_url() ?>/enlightenment/archive/pge/<?php echo $next_page ?>" class="button more-posts<?php if($next_page > $max_num_pages): ?> end<?php endif ?>">Load more posts</a>
</footer>
</div>





<?php endif ?>
</section>
<!-- /content -->

</div>


<?php get_footer() ?>