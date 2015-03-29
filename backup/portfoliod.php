<?
$pagetitle ="Shark Design &amp; Marketing Ltd - Portfolio - Digital" ;
$pagedescription = "Shark! is a Yorkshire based design and marketing agency specialising in branding, design for print, marketing strategy, and web design & development." ;
$pagekeywords = "shark!, shark, graphic, design, creative, marketing, branding, digital, logo, strategy, web, website, e-commerce, SEO, advertising, agency, agencies, new media, online, poster, take one, flyer, folder, mailing, mail pack, mail shot, POS, brochure, signage." ;

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
$p_digital = "style='color:#ffffff;'" ;
$p_dfp = "" ;
$p_ls = "" ;

$git_contactus = "" ;
$git_newsletter = "" ;

$new_moo = "<script type='text/javascript' src='scripts/mootools.js'></script>" ;

include 'include/header.php' ;
?>
	<div id="left_cont" style="position:relative;">
   
	<div id="slideshowContainer" class="slideshowContainer" style="position:relative;z-index:10;"><span></span></div>

	<div id="buttons_on">
		<div id="navi_gallery">
			<div id="prev"><a href="#" onclick="javascript:show.previous(); return false;"></a></div>
			<div id="play_stop"><a href="#" onclick="javascript:show.stop(); return false;" class="play"></a><a href="#" onclick="javascript:show.play(); return false;" class="pause"></a></div>
			<div id="next"><a href="#" onclick="javascript:show.next(); return false;"></a></div>
		</div>
	</div>

	<div id="thumbnails">
		  <a href="image/Gateways-Digital.jpg" class="slideshowThumbnail"><img id="a" src="image/Gateways-Digital.jpg" width="20" height="20" style="border:0;" alt="Gateways Digital" /></a>
		  <a href="image/Goldcrest-Digital.jpg" class="slideshowThumbnail"><img id="b" src="image/Goldcrest-Digital.jpg" width="20" height="20" style="border:0;" alt="Goldcrest Digital" /></a>
		  <a href="image/IndustriaMed-Digital.jpg" class="slideshowThumbnail"><img id="c" src="image/IndustriaMed-Digital.jpg" width="20" height="20" style="border:0;" alt="Industria Med Digital" /></a>
		  <a href="image/Select-Digital.jpg" class="slideshowThumbnail"><img id="d" src="image/Select-Digital.jpg" width="20" height="20" style="border:0;" alt="Select Digital" /></a>
		  <a href="image/Swimbabes-Digital.jpg" class="slideshowThumbnail"><img id="e" src="image/Swimbabes-Digital.jpg" width="20" height="20" style="border:0;" alt="Swimbabes Digital" /></a>
		  <a href="image/TF-Digital.jpg" class="slideshowThumbnail"><img id="f" src="image/TF-Digital.jpg" width="20" height="20" style="border:0;" alt="Thomas Fisher Digital" /></a>
		  <a href="image/TO-Digital.jpg" class="slideshowThumbnail"><img id="g" src="image/TO-Digital.jpg" width="20" height="20" style="border:0;" alt="Thomas Owen Digital" /></a>
		  <a href="image/WL-Digital.jpg" class="slideshowThumbnail" ><img id="h" src="image/WL-Digital.jpg" width="20" height="20" style="border:0;" alt="W&amp;L Digital" /></a>
		  <a href="image/WLemail-Digital.jpg" class="slideshowThumbnail" ><img id="i" src="image/WLemail-Digital.jpg"  width="20" height="20" style="border:0;" alt="W&amp;L Email Digital" /></a>
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
         }

            }
            show = new SlideShow('slideshowContainer','slideshowThumbnail',obj);
            show.play();
         });
</script>

	
		<h3 class="page_header slideshow_fix"><img src="image/navi_d.gif" alt="Digital" style="border:0;" /><span>Digital</span></h3>

		<p>In an ever changing environment, you need to know that the agency you work with understands the medium. The Shark! in-house web team have an exceptional track record in digital media and our specialist knowledge includes static, content managed and E-Commerce websites, eMarketing solutions, Search Engine Optimization and keyword analysis.</p>

		<p>You can see a brief glimpse of some of the digital work we have created but click on the links below to visit some of our websites.</p>

		<p><a href="http://www.goldcrestchemicals.co.uk/" title="Goldcrest Chemicals" onclick="window.open(this.href); return false;">Goldcrest Chemicals</a><br />
		Shark services - CMS web site design and build, SEO, product movies &amp; photography.</p>
		<p><a href="http://www.selectconstruction.co.uk/" title="Select Group Yorkshire" onclick="window.open(this.href); return false;">Select Group Yorkshire</a><br />
		Shark services - Static web site design and build, Photography, and copywriting.</p>
		<p><a href="http://www.wlprint.co.uk/Home.aspx" title="Waddington &amp; Ledger" onclick="window.open(this.href); return false;">Waddington &amp; Ledger</a><br />
		Shark services - CMS web site design and build, galleries, and flash banner.</p>
		<p><a href="http://www.gatewaysschool.co.uk/" title="Gateways School" onclick="window.open(this.href); return false;">Gateways School</a><br />
		Shark services - CMS web site design and build, unique folding menu, student blog, event calendar, and photography.</p>
		<!--<p><a href=".php" title="Swimbabes" onclick="window.open(this.href); return false;">Swimbabes</a><br />
		Shark services – CMS e-commerce website, SEO, bespoke design and build.</p>-->

        <br />

		<br />


	</div>
	
<?
include 'include/footer.php' ;
?>