<?
$pagetitle ="Shark Design & Marketing Ltd" ;
$pagedescription = "description" ;
$pagekeywords = "keywords" ;

$as_wwa = "" ;
$as_ks = "" ;
$as_wwd = "" ;

$cs_one = "" ;
$cs_two = "" ;
$cs_three = "" ; 
$cs_four = "" ;
$cs_five = "" ;
$cs_archive = "" ;

$p_branding = "" ;
$p_digital = "" ;
$p_literature = "style='color:#85c7ee;'" ;
$p_ls = "" ;

$new_moo = "<script type='text/javascript' src='scripts/mootools.js'></script>" ;

include 'include/header.php' ;
?>
	<div id="left_cont" style="position:relative;">
   
<div id="slideshowContainer" class="slideshowContainer" style="position:relative;z-index:10;">

		</div>

<div id="buttons_on">
	<div id="navi_gallery">
		<p id="prev"><a href="#" onclick="show.previous(); return false;"><</a></p>
		<p id="play_stop"><a href="#" onclick="show.play(); return false;">P</a><a href="#" onclick="show.stop(); return false;">S</a></p>
		<p id="next"><a href="#" onclick="show.next(); return false;">></a></p>
	</div>

		<div id="show_one"><a href="#" onclick="javascript:showHideItems_lb('buttons_on','buttons_off')">-</a></div>

</div>


<div id="buttons_off">
		<div id="show_one"><a href="#" onclick="javascript:showHideItems_lb('buttons_on','buttons_off')">+</a></div>
</div>


			<div id="thumbnails">
		  <a href="image/Ask1-Lit.jpg" class="slideshowThumbnail" style="display:none;"><img id="0" src="image/Ask1-Lit.jpg" border="0" /></a>
		  <a href="image/Ask2-Lit.jpg" class="slideshowThumbnail" style="display:none;"><img id="1" src="image/Ask2-Lit.jpg" border="0" /></a>
		  <a href="image/Ask3-Lit.jpg" class="slideshowThumbnail" style="display:none;"><img id="2" src="image/Ask3-Lit.jpg" border="0" /></a>
		  <a href="image/Ask4-Lit.jpg" class="slideshowThumbnail" style="display:none;"><img id="3" src="image/Ask4-Lit.jpg" border="0" /></a>
		  <a href="image/Ask5-Lit.jpg" class="slideshowThumbnail" style="display:none;"><img id="4" src="image/Ask5-Lit.jpg" border="0" /></a>
		  <a href="image/Ask6-Lit.jpg" class="slideshowThumbnail" style="display:none;"><img id="5" src="image/Ask6-Lit.jpg" border="0" /></a>
		  <a href="image/Ravenscliffe1-Lit.jpg" class="slideshowThumbnail" style="display:none;"><img id="6" src="image/Ravenscliffe1-Lit.jpg" border="0" /></a>
		  <a href="image/Ravenscliffe2-Lit.jpg" class="slideshowThumbnail" style="display:none;"><img id="7" src="image/Ravenscliffe2-Lit.jpg" border="0" /></a>
		  <a href="image/Ravenscliffe3-Lit.jpg" class="slideshowThumbnail" style="display:none;"><img id="8" src="image/Ravenscliffe3-Lit.jpg" border="0" /></a>
		
		  </div>
		


<script type="text/javascript">
           window.addEvent('domready',function(){
            var obj = {
               wait: 3000,
               effect: 'fade',
               duration: 1000,
               loop: true,
               thumbnails: true,
               backgroundSlider: true,
               
               onClick: function(i){var a = new Array()
            a[0] = "http://www.somesite.co.uk"
            a[1] = "http://www.somesite.co.uk"
            a[2] = "http://www.somesite.co.uk"
            a[3] = "http://www.somesite.co.uk"
            a[4] = "http://www.somesite.co.uk"
            a[5] = "http://www.somesite.co.uk"
            window.location = a[i]
         }

            }
            show = new SlideShow('slideshowContainer','slideshowThumbnail',obj);
            show.play();
         });
</script>


		<h3 class="page_header"><img src="image/navi_l.gif" alt="Portfolio" border="0"><span>Portfolio</span></h3>

		<p>Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature </p>

		<p>Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature Literature </p>

        <br>

		<br>

		<p><a href="#">Click here to see the Shark! portfolio</a></p>

		<p><a href="#">Click here to see the most recent Shark! case studies</a></p>
	</div>
	
<?
include 'include/footer.php' ;
?>