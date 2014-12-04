<?php get_header() ?>
<div class="section enlightenment scrollable" data-anchor="<?php echo $post->post_name ?>" data-title="">
<section class="page-title white">
<div><h1><?php echo $post->post_title ?></h1><h2 class="underline"><?php echo get_field('sub_heading',$post->ID) ?></h2></div>
</section>
<section class="content">
    <?php
    $paged = isset($wp->query_vars['pge']) ? $wp->query_vars['pge'] : 1;
    $next_page = $paged+1;

        $args = array(
          'post_type' => 'enlightenment',
          'orderby' => 'date',
          'order' => 'DESC',
          'paged' => $paged,
          'posts_per_page' => 3,
          'post_status' => 'publish'
          );
    $query = new WP_Query($args);
       $max_num_pages = $query->max_num_pages;

//echo 'next page='.$next_page. ' total pages='.$max_num_pages;

    if($items = get_posts($args)):
            ?>
        <ul id="posts">
    <?php foreach($items as $item): ?>
       <?php
list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($item->ID),'enlightenment-tn');
$src = getRetinaSrc($src);
?>
 <li><figure><img src="<?php echo $src ?>" /></figure><figcaption><h4><?php echo $item->post_title ?></h4><?php echo $item->post_content ?></figcaption></li>
<?php endforeach ?>
</ul>

<footer id="posts-footer">
<a href="/enlightenment/archive/pge/<?php echo $next_page ?>" class="button more-posts<?php if($next_page > $max_num_pages): ?> end<?php endif ?>">Load more posts</a>
</footer>
<?php endif ?>
</section>
</div>
</div>
<?php get_footer() ?>