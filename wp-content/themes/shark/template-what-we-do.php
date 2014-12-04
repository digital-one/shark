<?php /* Template Name: What We Do */ ?>
<?php get_header() ?>
<div id="" class="section" data-anchor="<?php echo $post->post_name ?>" data-title=""> 
<section class="page-title white">
<div><h1><?php echo $post->post_title ?></h1><h2 class="underline"><?php echo get_field('sub_heading',$post->ID) ?></h2></div>
</section>
<?php
list($src,$w,$h) = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'page-letterbox-image');
$src = getRetinaSrc($src);
?>
 <section class="banner" style="background-image:url('<?php echo $src ?>');"></section>   
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
<div class="handle hover"><div><img src="<?php echo $src ?>" alt="<?php echo $term->name ?>" /><h3><?php echo $term->name ?></h3><h4 class="underline"><?php echo get_field('sub_heading',$term) ?></h4></div></div>
<div class="main"><p><?php echo $term->description ?></p><a href="" class="button">Read Case Study</a></div><aside><ul><li>Market Analysis</li><li>Predatory Thinking</li></ul></aside>
</li>
<?php $c++; ?>
<?php endforeach; ?>
</ul>
<?php endif?>
</nav>
    </section>
</div>
</div>
<?php get_footer() ?>