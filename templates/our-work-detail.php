 <?php include_once('header.php') ?>
<div id="work-single" class="section scrollable" data-anchor="" data-title="">
  
<section class="page-title">
<div><h1><img src="images/new-ivory.jpg" alt="new ivory" /></h1></div>
</section>
<div class="content">
<section id="challenge" class="intro white"><h3>the challenge</h3><h4 class="underline">lets set the scene</h4><p>Lorem ipsum, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu </p>
</section>
<section id="background">
<div class="half column"><div class="cell half-height pink"><div class="inner"><div><h5 class="underline">background</h5><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit ation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div></div></div><div class="cell half-height blue" style="background-image:url('images/new-ivory-bg-sub-image.jpg');"><div class="inner"><div></div></div></div></div>
<div class="half column"><div class="cell" style="background-image:url('images/new-ivory-bg-main-image.jpg');"><div class="inner"></div></div></div>
    </section>
    <section id="result" class="intro white"><h3>result</h3><h4 class="underline">well, did it work?</h4>
       
        <nav  id="categories" role="navigation"><ul><li><a href="" class="tooltip" title="Brand Strategy">Brand Strategy</a></li><li><a href="" class="print tooltip" title="Print">Print</a></li><li><a href="" class="direct-marketing tooltip" title="Direct Marketing">Direct Marketing</a></li></ul></nav>
<p>Lorem ipsum, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu </p>
        <nav id="social-share">
<span>Share this</span>
<ul><li><a href=""></a></li>
    <li><a href="" class="twitter"></a></li>
    <li><a href="" class="email"></a></li>
</ul>
</nav>
</section>
<section id="">
<div class="half column"><div class="cell" style="background-image:url('images/new-ivory-image-3.jpg');"></div></div>
<div class="half column"><div class="cell" style="background-image:url('images/new-ivory-image-4.jpg');"></div></div>
<div class="column"><div class="cell" style="background-image:url('images/new-ivory-image-5.jpg');"></div></div>
    </section>
<footer id="challenge" class="intro orange"><h3>fantastic work, really impressed</h3><h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit ation</h4><a href="" class="button">Start your project</a>
</footer>
   </div>
</div>
<!--Scripts-->
<!-- Load jQuery from Google CDN -->
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<!-- Load jQuery from a local copy if loading from Google fails -->
<script>window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.10.1.min.js"><\/script>')</script>
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/jquery.gmap.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/scripts.js"></script>
<script>
$(function(){
    if($('#enlightenment').length){
var msnry = new Masonry( '#enlightenment', {
  itemSelector: 'li'
});
}
if($('#map').length){
$('#map').gmap({
    markers: [{'latitude': 53.6925016,'longitude': -1.8210985,'name': 'Shark Design &amp; Marketing','content': '83 Princes Street,<br />Edinburgh, EH2 2ER'}],
    markerFile:  'http://shark.localhost/images/marker.png',
    markerWidth:77,
    markerHeight:52,
    markerAnchorX:38,
    markerAnchorY:52
})
}

});
</script>
    </body>
    </html>