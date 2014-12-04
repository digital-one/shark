<?php get_header() ?>


 <?php
list($src,$w,$h) = wp_get_attachment_image_src(get_field('logo',$post->ID),'portfolio-logo');
$logo_src = getRetinaSrc($src);
?>
<div id="work-single" class="section scrollable" data-anchor="" data-title="">
  <section class="page-title" style="background-color:<?php echo get_field('primary_colour',$post->ID) ?>;">
<div><h1><img src="<?php echo $logo_src ?>" alt="<?php echo get_field('client',$post->ID) ?>" /></h1></div>
</section>
<div class="content">
<section id="challenge" class="intro white"><h3><?php echo get_field('first_section_heading',$post->ID) ?></h3><h4 class="underline"><?php echo get_field('first_section_sub_heading',$post->ID) ?></h4><p><?php echo get_field('first_section_text',$post->ID) ?></p>
</section>
 <?php
list($image1_src,$w,$h) = wp_get_attachment_image_src(get_field('second_section_image_1',$post->ID),'portfolio-column-full-height');
list($image2_src,$w,$h) = wp_get_attachment_image_src(get_field('second_section_image_2',$post->ID),'portfolio-column-half-height');
$image1_src = getRetinaSrc($image1_src);
$image2_src = getRetinaSrc($image2_src);
?>
<section id="background">
<div class="half column"><div class="cell half-height" style="background-color:<?php echo get_field('secondary_colour',$post->ID) ?>;"><div class="inner"><div><h5 class="underline"><?php echo get_field('second_section_heading',$post->ID) ?></h5><p><?php echo get_field('second_section_text',$post->ID) ?></p></div></div></div><div class="cell half-height image blue" style="background-image:url('<?php echo $image2_src ?>');"><div class="inner"><div></div></div></div></div>
<div class="half column"><div class="cell image" style="background-image:url('<?php echo $image1_src ?>');"><div class="inner"></div></div></div>
    </section>
    <section id="result" class="intro white"><h3><?php echo get_field('third_section_heading',$post->ID) ?></h3><h4 class="underline"><?php echo get_field('third_section__sub_heading',$post->ID) ?></h4>
   <?php    
    if($terms = wp_get_post_terms($post->ID, 'casestudies_category')): ?>
          <nav  id="categories" role="navigation"><ul>
     <?php foreach($terms as $term): ?>
     <?php
     list($src,$w,$h) = wp_get_attachment_image_src(get_field('colour_icon',$term),'sector-icon');
     $icon_src = getRetinaSrc($src);
     ?>
 <li><span class="tooltip" title="<?php echo $term->name ?>"><img src="<?php echo $icon_src ?>" alt="<?php echo $term->name ?>" /></span></li>
<?php endforeach ?>
</ul></nav>
<?php endif ?>
<p><?php echo get_field('third_section_text',$post->ID) ?></p>
        <nav id="social-share">
<span>Share this</span>
<ul><li><a href=""></a></li>
    <li><a href="" class="twitter"></a></li>
    <li><a href="" class="email"></a></li>
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
$image1_src = getRetinaSrc($image1_src);
?>
<div class="column"><div class="cell image" style="background-image:url('<?php echo $image1_src ?>');"></div></div>
<?php endif ?>
<?php
if(!empty($image2)): 
list($image2_src,$w,$h) = wp_get_attachment_image_src(get_field('third_section_image_2',$post->ID),'portfolio-full-width');
$image2_src = getRetinaSrc($image2_src);
?>
<div class="column"><div class="cell image" style="background-image:url('<?php echo $image2_src ?>');"></div></div>
<?php endif ?>
    </section>
<footer id="cta" class="intro" style="background-color:<?php echo $colour ?>;"><h3><?php echo get_field('fourth_section_heading',$post->ID) ?></h3><h4><?php echo get_field('fourth_section_text',$post->ID) ?></h4><a href="" class="button push-link">Start your project</a>
</footer>
   </div>
</div>
<?php get_footer() ?>