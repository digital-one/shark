<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="stylesheet" href="css/layout.css" />
        <link rel="stylesheet" href="js/slick/slick.css" />
        <script src="js/modernizr.js"></script>
<!--[if (gte IE 6)&(lte IE 8)]>
<script src="js/selectivizr-min.js"></script>
<![endif]-->
        <!--[if lte IE 9]>
          <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <div id="page-wrap">
        <header id="header">
        <h1 id="home-link"><img src="images/shark.svg" alt="Shark Design" /></h1>
        <!--<a id="home-link" href="">Shark Design</a>-->
    </header>
  <?php include_once('sidebar.php'); ?>
<div class="section scrollable" data-anchor="" data-title="">
<section class="page-title white">
<div><h1>Enlightenment</h1><h2 class="underline">a collection of inspiration</h2></div>
</section>
<section class="content">
<ul id="enlightenment">
    <li><figure><img src="images/enlightenment-image-1.jpg" /></figure><figcaption><h4>Interesting title of post</h4><p>adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ore magna aliqua <a href="">minim veniamquis</a></p></figcaption></li>
    <li><figure><img src="images/enlightenment-image-2.jpg" /></figure><figcaption><h4>Interesting title of post</h4><p>adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ore magna aliqua minim veniamquis</p></figcaption></li>
    <li><figure><img src="images/enlightenment-image-3.jpg" /></figure><figcaption><h4>Interesting title of post</h4><p>adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ore magna aliqua minim veniamquis</p></figcaption></li>
    <li><figure><img src="images/enlightenment-image-4.jpg" /></figure><figcaption><h4>Interesting title of post</h4><p>adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ore magna aliqua minim veniamquis</p></figcaption></li>
    <li><figure><img src="images/enlightenment-image-5.jpg" /></figure><figcaption><h4>Interesting title of post</h4><p>adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ore magna aliqua minim veniamquis</p></figcaption></li>
    <li><figure><img src="images/enlightenment-image-6.jpg" /></figure><figcaption><h4>Interesting title of post</h4><p>adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ore magna aliqua minim veniamquis</p></figcaption></li>
    <li><figure><img src="images/enlightenment-image-7.jpg" /></figure><figcaption><h4>Interesting title of post</h4><p>adipisicing elit, sed do eiusmod tempor incididunt ut labore et dol ore magna aliqua minim veniamquis</p></figcaption></li>
</ul>
    content</section>
</div>
</div>
<!-- Load jQuery from Google CDN -->
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<!-- Load jQuery from a local copy if loading from Google fails -->
<script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.10.1.min.js"><\/script>')</script>
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/jquery.gmap.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script>
$(function(){
    if($('#enlightenment').length){
var msnry = new Masonry( '#enlightenment', {
  itemSelector: 'li'
});
}
});
</script>
    </body>
    </html>