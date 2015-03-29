</main> <!--/main-->
</div><!-- /page wrap -->
</div> 
<?php if(is_front_page()):?><div id="preloader-screen"><span id="logo" class="pulse">Shark Design &amp; Marketing</span></div> <?php endif ?>
<!--scripts-->
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<!-- Load jQuery from a local copy if loading from Google fails -->
<script>window.jQuery || document.write('<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.min.js"><\/script>')</script>
<script src="//maps.google.com/maps/api/js?sensor=true"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.gmap.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/vendors/jquery.easings.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/perfect-scrollbar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fullPage.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/imagesLoaded.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/masonry.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<!--/scripts-->
<?php wp_footer() ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-2334835-8', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>