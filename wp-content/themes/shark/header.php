<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title() ?></title> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
        
        <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr-min.js"></script>
<![endif]-->
        <!--[if lte IE 9]>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        <?php wp_head() ?>
    </head>
    <body>
    <div id="page-wrap" class="page-wrap" <?php if(is_single()): ?> class="show-controls"<?php endif ?>>
   
      <nav class="controls duplicate"></nav>

        <h1 id="home-link"><img src="<?php echo get_template_directory_uri(); ?>/images/shark.svg" alt="Shark Design" /></h1>
                <header id="header">

     <a href="" id="mobile-menu">Menu</a>           
<nav id="nav">

<?php
  wp_nav_menu( array(
        'menu'=>'Main Navigation',
        'container' => false, 
        'fallback_cb' => 'wp_page_menu'//,
        //'walker' => new subMenu()
        //'menu_class' => 'inline',
        //'link_after' => '<span></span>'
        )
    );
    ?>
<!--
<ul>
<li class="current-menu-item"><a href="">Home</a></li>
<li><a href="/~sharkdesignco/">Who we are</a></li>
<li><a href="/~sharkdesignco/">What we do</a></li>
<li><a href="/~sharkdesignco/">Our work</a></li>
<li><a href="/~sharkdesignco/">Get in touch</a></li>
<li><a href="/~sharkdesignco/">Enlightenment</a></li>
</ul>
-->
<div class="highlight"></div>
</nav>
<section id="contacts">
<nav class="social">
<ul><li><a href="" class="facebook">Facebook</a></li>
    <li><a href="" class="twitter">Twitter</a></li>   
    <li><a href="" class="linkedin">Linkedin</a></li>
    <li><a href="" class="email">Email</a></li>
</ul>
</nav>
<small><a href="tel:01422376446">01422 376446</a>
<a href="mailto:enquiries@sharkdesign.co.uk">enquiries@sharkdesign.co.uk</a></small>
</section>
        </header>
    
  <!--/header-->
      

           
  <!--main-->
  <main id="fullpage">
