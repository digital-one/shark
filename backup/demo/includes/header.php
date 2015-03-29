<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta name="verify-v1" content="g4WAwiAYcs0uF9dCTcQtgc1AN4D6lfg02lEA7rpCYfY=" />
<link rel="stylesheet" type="text/css" href="includes/Stylesheet.css" title="Style" />
<link href="slideshow/slideshow.css" rel="stylesheet" type="text/css" />
<title><? echo $pagetitle ; ?></title>
<meta name="description" content="<? echo $description ; ?>" />
<meta name="keywords" content="<? echo $keyword ; ?>" />
<meta name="description" content="Shark are a multi-disciplined design &amp; marketing Agency based in Elland, near Huddersfield &amp; Halifax. Generating innovative and effective campaigns across all media channels."/>
<meta name="keywords" content="Shark, Design, Marketing, Communications, Group, Agency, Direct Marketing, Digital, New media, branding, campaigns, media channels, brand, identity, literature, packaging, exhibition stand, website, e-business, solution" />
<meta name="Geography" content="Shark Design &amp; Marketing Ltd, 1st Floor, Unit B3, Lowerfields Close, Elland, HX5 9DX" />
<meta name="Language" content="English" />
<meta http-equiv="Expires" content="never" />
<meta name="Copyright" content="Shark Design &amp; Marketing Ltd" />
<meta name="Designer" content="Shark Design &amp; Marketing Ltd" />
<meta name="Publisher" content="Shark Design &amp; Marketing Ltd" />
<meta name="Revisit-After" content="14 days" />
<meta name="distribution" content="Global" />
<meta name="Robots" content="INDEX,FOLLOW" />
<meta name="city" content="Elland" />
<meta name="country" content="United Kingdom" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link type="text/css" rel="stylesheet" href="includes/styles.css" />
<script src="script/menu.js" type="text/javascript"></script>
<script type="text/javascript" src="scripts/prototype.lite.js"></script>
<script type="text/javascript" src="scripts/moo.fx.js"></script>
<script type="text/javascript" src="scripts/moo.fx.pack.js"></script>
<? echo $new_moo ; ?>
<script type="text/javascript" src="scripts/backgroundSlider.js"></script>
<script type="text/javascript" src="scripts/slideshow.js"></script>
<script type="text/javascript">
function init(){
	var stretchers = document.getElementsByClassName('stretcher');
	var toggles = document.getElementsByClassName('display');
	var myAccordion = new fx.Accordion(
		toggles, stretchers, {opacity: true, height: true, width: true, duration: 900, transition: fx.sineInOut});
	//hash functions
	var found = false;
	toggles.each(function(h3, i){
		var div = Element.find(h3, 'nextSibling');
			if (window.location.href.indexOf(h3.title) > 0) {
				myAccordion.showThisHideOpen(div);
				found = true;
			}
		});
	if (!found) myAccordion.showThisHideOpen(stretchers[0]);
}
</script>

<script type="text/javascript">
function showHideItems_lb(myItem, myImage){

//this is the ID of the hidden item
var myItem = document.getElementById(myItem);

//this is the ID of the hidden item
var myImage = document.getElementById(myImage);


    if (myItem.style.display != "none") {
        //items are currently displayed, so hide them
        myItem.style.display = "none";
        myImage.style.display = "block";
    }
    else {

        //items are currently hidden, so display them
        myItem.style.display = "block";
      myImage.style.display = "none";
    }
}
</script>  
</head>
<body>
<div id="container">
	<div id="header"><h1><a href="index.php" title="Shark Design &amp; Marketing Ltd"><span>Shark Design &amp; Marketing Ltd</span></a></h1>
					<h2><span>Design &amp; Marketing</span></h2></div>