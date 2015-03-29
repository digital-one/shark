<?
$pagetitle ="Shark Design &amp; Marketing Ltd" ;
$pagedescription = "description" ;
$pageShark = "Shark, Design, Marketing, Communications, Group, Agency, 
Direct Marketing, Digital, New media, branding, campaigns, media channels, brand, identity, literature, packaging, exhibition stand, website, e-business, solution" ;

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

include 'includes/header.php' ;
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
		  <a href="images/Gateways-Digital.jpg" class="slideshowThumbnail"><img id="a" src="images/Gateways-Digital.jpg" width="20" height="20" style="border:0;" alt="Gateways Digital" /></a>
		  <a href="images/Goldcrest-Digital.jpg" class="slideshowThumbnail"><img id="b" src="images/Goldcrest-Digital.jpg" width="20" height="20" style="border:0;" alt="Goldcrest Digital" /></a>
		  <a href="images/IndustriaMed-Digital.jpg" class="slideshowThumbnail"><img id="c" src="images/IndustriaMed-Digital.jpg" width="20" height="20" style="border:0;" alt="Industria Med Digital" /></a>
		  <a href="images/Select-Digital.jpg" class="slideshowThumbnail"><img id="d" src="images/Select-Digital.jpg" width="20" height="20" style="border:0;" alt="Select Digital" /></a>
		  <a href="images/Swimbabes-Digital.jpg" class="slideshowThumbnail"><img id="e" src="images/Swimbabes-Digital.jpg" width="20" height="20" style="border:0;" alt="Swimbabes Digital" /></a>
		  <a href="images/TF-Digital.jpg" class="slideshowThumbnail"><img id="f" src="images/TF-Digital.jpg" width="20" height="20" style="border:0;" alt="Thomas Fisher Digital" /></a>
		  <a href="images/TO-Digital.jpg" class="slideshowThumbnail"><img id="g" src="images/TO-Digital.jpg" width="20" height="20" style="border:0;" alt="Thomas Owen Digital" /></a>
		  <a href="images/WL-Digital.jpg" class="slideshowThumbnail" ><img id="h" src="images/WL-Digital.jpg" width="20" height="20" style="border:0;" alt="W&amp;L Digital" /></a>
		  <a href="images/WLemail-Digital.jpg" class="slideshowThumbnail" ><img id="i" src="images/WLemail-Digital.jpg"  width="20" height="20" style="border:0;" alt="W&amp;L Email Digital" /></a>
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

	
		<h3 class="page_header slideshow_fix"><img src="images/navi_d.gif" alt="Digital" style="border:0;" /><span>Digital</span></h3>

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
include 'includes/footer.php' ;
?>