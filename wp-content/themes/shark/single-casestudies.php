<?php get_header() ?>


 <?php
list($src,$w,$h) = wp_get_attachment_image_src(get_field('logo',$post->ID),'portfolio-logo');
//$logo_src = getRetinaSrc($src);
$logo_src = $src;
?>
<div id="work-single" class="section scrollable" data-anchor="" data-title="<?php wp_title()?>">

        <?php
//next and prev navigation
    $args = array(
          'post_type' => 'casestudies',
          'orderby' => 'menu_order',
          'post_status' => 'publish',
          'numberposts' => 6
        );
    if($items = get_posts($args)):
      $total = count($items);
    $prev_key=0;
    $next_key=0;
    $this_key=0;
      $first_permalink = get_permalink($items[0]->ID);
      $last_permalink = get_permalink($items[$total-1]->ID);
      $key=0;
      foreach($items as $item):
        if($item->ID == $post->ID):
          $this_key = $key;
          $prev_key = $key-1;
          $next_key = $key+1;
           endif;
        $key++;
        endforeach;
          $prev_permalink = array_key_exists($prev_key, $items) ? get_permalink($items[$prev_key]->ID) : $last_permalink;
          $next_permalink = array_key_exists($next_key, $items) ? get_permalink($items[$next_key]->ID) : $first_permalink;
         
      endif;
        ?>
 <nav class="controls" <?php if(is_single()): ?> class="show"<?php endif ?>><ul><li class="close"><a href="<?php echo home_url() ?>/#our-work" class="close push-link">Close</a></li><li><a href="<?php echo $prev_permalink ?>" class="prev push-link">Previous</a></li><li><a href="<?php echo $next_permalink ?>" class="next push-link">Next</a></li></ul></nav>


  <section class="page-title" style="background-color:<?php echo get_field('primary_colour',$post->ID) ?>;">
    <div class="vcenter"> 
<div><h1><img src="<?php echo $logo_src ?>" alt="<?php echo get_field('client',$post->ID) ?>" /></h1></div>
</div>
</section>
<div class="content">
<section id="challenge" class="intro white"><h3><?php echo get_field('first_section_heading',$post->ID) ?></h3><h4 class="underline"><?php echo get_field('first_section_sub_heading',$post->ID) ?></h4><p><?php echo get_field('first_section_text',$post->ID) ?></p>
</section>
 <?php
list($image1_src,$w,$h) = wp_get_attachment_image_src(get_field('second_section_image_1',$post->ID),'portfolio-column-full-height');
list($image2_src,$w,$h) = wp_get_attachment_image_src(get_field('second_section_image_2',$post->ID),'portfolio-column-half-height');
//$image1_src = getRetinaSrc($image1_src);
//$image2_src = getRetinaSrc($image2_src);
?>
<section id="background">
<div class="half column"><div class="cell half-height" style="background-color:<?php echo get_field('secondary_colour',$post->ID) ?>;"><div class="inner"><div class="vcenter-wrap"><div class="vcenter-inner"><h5 class="underline"><?php echo get_field('second_section_heading',$post->ID) ?></h5><p><?php echo get_field('second_section_text',$post->ID) ?></p></div></div></div></div><div class="cell half-height image blue preload" style="background-image:url('<?php echo $image2_src ?>');"><div class="inner"><div></div></div></div></div>
<div class="half column"><div class="cell image preload-home" style="background-image:url('<?php echo $image1_src ?>');"><div class="inner"></div></div></div>
    </section>
    <section id="result" class="intro white"><h3><?php echo get_field('third_section_heading',$post->ID) ?></h3><h4 class="underline"><?php echo get_field('third_section__sub_heading',$post->ID) ?></h4>
   <?php    
    if($terms = wp_get_post_terms($post->ID, 'casestudies_category')): ?>
          <nav  id="categories" role="navigation"><ul>
     <?php foreach($terms as $term): ?>
     <?php
     list($src,$w,$h) = wp_get_attachment_image_src(get_field('colour_icon',$term),'sector-icon');
     //$icon_src = getRetinaSrc($src);
     $icon_src = $src;
     ?>
 <li><span class="tooltip" title="<?php echo $term->name ?>"><img src="<?php echo $icon_src ?>" alt="<?php echo $term->name ?>" /></span></li>
<?php endforeach ?>
</ul></nav>
<?php endif ?>
<p><?php echo get_field('third_section_text',$post->ID) ?></p>
        <nav id="social-share">
<span>Share this</span>
<ul><li><a href="http://www.facebook.com/share.php?u=<?php echo get_permalink($post->ID)?>&amp;title=<?php echo urlencode($post->post_title)?>" target="_blank">Facebook</a></li>
    <li><a href="http://twitter.com/home?status=<?php echo urlencode($post->post_title)?>+<?php echo get_permalink($post->ID)?>" class="twitter" target="_blank">Twitter</a></li>
    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink($post->ID)?>&amp;title=<?php echo urlencode($post->post_title)?>&amp;source=<?php echo get_permalink($post->ID)?>" class="linkedin" target="_blank">Linkedin</a></li>
</ul>
</nav>
</section>
<section id="images">
<?php
  $image1 = get_field('third_section_image_1',$post->ID);
  $image2 = get_field('third_section_image_2',$post->ID);
  $colour2 = get_field('secondary_colour',$post->ID);
  $colour3 = get_field('third_colour',$post->ID);
  $colour  = !empty($colour3) ? $colour3 : $colour2;
if(!empty($image1)): 
list($image1_src,$w,$h) = wp_get_attachment_image_src(get_field('third_section_image_1',$post->ID),'portfolio-full-width');
//$image1_src = getRetinaSrc($image1_src);
?>
<div class="column">
  <?php
  $video_mp4 = get_field('video_mp4_url',$post->ID);
  $video_webm = get_field('video_webm_url',$post->ID);
  if(!empty($video_mp4)): 
    ?>
 <!--<a class="video-control">Play</a>-->
<video id="shark-video" loop='true' preload="none" controls poster="<?php echo $image1_src ?>">
  <source src="<?php echo $video_mp4 ?>" type="video/mp4">
      <source src="<?php echo $video_webm ?>" type="video/webm">
      <img src="<?php echo $image1_src ?>" title="Your browser does not support HTML5 video">
  </video>
<?php else: ?>
<div class="cell image" style="background-image:url('<?php echo $image1_src ?>');"></div>
<?php endif ?>
  </div>
<?php endif ?>
<?php
if(!empty($image2)): 
list($image2_src,$w,$h) = wp_get_attachment_image_src(get_field('third_section_image_2',$post->ID),'portfolio-full-width');
//$image2_src = getRetinaSrc($image2_src);
?>
<div class="column"><div class="cell image" style="background-image:url('<?php echo $image2_src ?>');"></div></div>
<?php endif ?>
    </section>
<footer id="cta" class="intro" style="background-color:<?php echo $colour ?>;"><h3><?php echo get_field('fourth_section_heading',$post->ID) ?></h3><h4><?php echo get_field('fourth_section_text',$post->ID) ?></h4><a href="mailto:enquiries@sharkdesign.co.uk" class="button">Start your project</a>
</footer>
   </div>
</div>
<?php get_footer() ?>