var isTouchDevice = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isTouchDevice.Android() || isTouchDevice.BlackBerry() || isTouchDevice.iOS() || isTouchDevice.Opera() || isTouchDevice.Windows());
    }
};


$(function(){

//------------- Globals -------------

var isMobile, isTablet, 
	$fullPageActive = false,
	$initFullPageJS = false,
	$pageCache = [],
	$loadedObjs = [],
	$loadedPages = 0,
	$totalPages = 0,
	$pages=[],
	$firstLoad=true,
	$homeLoaded=false,
	$container;

	//tooltip variables
	var $mouseX, $mouseY, $tooltipX, $tooltipY,
	$tooltip  =  $('<div>', { class: "tooltip-pointer"}),
	$offsetX=0, $offsetY=0;

	//sector panel variables
	var $handles = $('#sectors .handle'),
	$items = $('#sectors li.item'),
	$close = $('#sectors a.close');


//------------- Parallax -------------


parallaxTitle = function(){
	//console.log('parallax')
var $title =  $('#work-single .page-title');
windowScroll = $(this).scrollTop();
$title.css({
	'margin-top' : -(windowScroll/3)+"px"//,
	//'opacity' : 1-(windowScroll/250)
	});
}

initParallax = function(){
$(window).on('scroll',function() {
	if(!isTouchDevice.any()){
		 parallaxTitle();
	}
    })
}

//------------- Parallax -------------

initMap = function(){
if($('#map').length){
	var $lat = $('#map').attr('data-lat'),
		$lng = $('#map').attr('data-lng');
$('#map').gmap({
        markers: [{'latitude': $lat,'longitude': $lng}],
        markerFile: '/wp-content/themes/shark/images/marker.png',
        markerWidth:77,
        markerHeight:52,
        markerAnchorX:37,
        markerAnchorY:52
    });
}
}

//------------- Masonry -------------

morePostsClick = function(e){
	e.preventDefault();
	$('a.more-posts').off('click', morePostsClick);
	var $url = $(this).attr('href'),
	$element = '#posts',
	$this = $(this);
	$(this).addClass('loading');

	    $.get($url).done(function(data){
	    		$('a.more-posts').on('click', morePostsClick);
	    	$(this).removeClass('loading');
              var $obj = $(data).find($element);
              var $btn = $(data).find('.more-posts');
             // $this.replaceWith($btn);
            $this.attr('href',$btn.attr('href')); //update the paging link
             $this.attr('class',$btn.attr('class'));
           		var $items = $obj.children();

               $container.append($items).masonry('appended',$items);
         });
}

initMasonry = function(){
	//if($('#enlightenment').length){
		$container = $('#posts'); //masonry element
    $container.masonry({
      itemSelector: 'li',
      isAnimated: !Modernizr.csstransitions
    });
	$('a.more-posts').on('click', morePostsClick);
//}	
}

//------------- Tooltip -------------

refreshTooltipPosition = function(){
	$tooltipX = $mouseX - $offsetX;
	$tooltipY = $mouseY - $offsetY;
	$tooltip.css({
		left: $tooltipX+'px',
 		top: $tooltipY+'px'
	})
}

initTooltip = function(){
$(document).on( "mousemove", function( event ) {
	$mouseX = event.pageX;
	$mouseY = event.pageY;
	refreshTooltipPosition();
});

 $('.tooltip').on('mouseenter',function(){

 	$('body').prepend($tooltip);	
 	$('.tooltip-pointer').text($(this).attr('title'));
 	$offsetX = $tooltip.outerWidth()/2;
 	$offsetY = $tooltip.outerHeight() +20;
 	refreshTooltipPosition();
 })
$('.tooltip').on('mouseleave',function(){
	$tooltip.remove();
});
}

//------------- Sector panel -------------


resetSectorMenu = function(e){
	e.preventDefault();
	hideSectorClose();
	var $activeIndex = $items.index($('#sectors li.item.active')),
		$move = $activeIndex*20,
		$item = $('#sectors li.item').eq($activeIndex);

		$('.main,aside',$item).animate({
			opacity:0
		},100,function(){
			$item.animate({
		left: $move+'%'
	},200,"easeOutQuad",function(){
		//done;
		$items.not($item).fadeIn(200);
		
		$item.removeClass('active');
		$('.handle',$item).addClass('hover');
		activateSectorClick();
	})
		})
}

showSectorClose = function(){
	$close.animate({
		top:'-60px'
	},100,"easeOutQuad",function(){
	$close.off('click',resetSectorMenu).on('click',resetSectorMenu);	
			
	})
}
hideSectorClose = function(){
	$close.animate({
		top:0
	},200,"easeOutQuad",function(){
	})
}
activateSectorClick  = function(){
	$handles.on('click',function(e){
	destroySectorClick();
	showSectorClose();
	var $parent = $(this).parent('li');
	var $position = $parent.position();
	//console.log($position)
	$parent.addClass('active');
	$('.handle',$parent).removeClass('hover');
	$items.not($parent).fadeOut(100);
	$parent.animate({
		left:'0%'
	},200,"easeOutQuad",function(){
		$('.main, aside',$parent).animate({
			opacity: 1
		},200)
	})
})
	}
destroySectorClick = function(){
	$handles.off('click');
}
		
activateMobileSectorClick = function(){
	$handles.off('click').on('click',function(e){
		e.preventDefault();
		var $parent = $(this).parent('li');
		if($parent.hasClass('active')){
			$parent.removeClass('active');
			$('.main,aside',$parent).hide();
		}else{
			$parent.addClass('active');
			$('.main,aside',$parent).show();
		}
		})
}

//------------- Navigation -------------

changeMenuState = function(index){

var $options = $('#nav li'),
	$highlight = $('#nav .highlight'),
	$currentOption = $options.eq(index-1);

	$options.removeClass('current-menu-item'),
	$currentOption.addClass('current-menu-item');
	var $currentPos = $currentOption.position();

	$highlight.animate({
		top: $currentPos.top+'px'
	},200,"easeOutQuad",function(){
		//callback
	})
}

mobileNavClickAction = function(e){
		e.preventDefault();
		var $header = $(this).parent('header');
		if($(this).hasClass('active')){
		$('#nav').hide();
		$header.removeClass('expanded');
		$(this).removeClass('active');
	} else {
		$header.addClass('expanded');
		$('#nav').show();
		$(this).addClass('active');
	}
}
tabletNavClickAction = function(e){
		e.preventDefault();
		if($(this).hasClass('active')){
		$(this).removeClass('active');
		$('#nav').hide();
		$('#header').animate({
		width: '50px'
	},200,"easeOutQuad",function(){
		//finished
	})
	$('#page-wrap, #work-single .page-title').animate({
		'left':'0'
	},200,"easeOutQuad",function(){
		//finished
	})
	} else {
		$(this).addClass('active');
	$('#header').animate({
		width: '190px'
	},200,"easeOutQuad",function(){
		$('#nav').fadeIn(300);
	})
	$('#page-wrap, #work-single .page-title').animate({
		'left':'140px'
	},200,"easeOutQuad",function(){

	})
	}
}
activateTabletMenu = function(){
	$('a#mobile-menu').off('click').on('click',tabletNavClickAction);
}
activateMobileMenu = function(){
	$('a#mobile-menu').off('click').on('click',mobileNavClickAction);
}

//------------- Load pages -------------



loadContent = function(url,push){
	if(push) history.pushState({}, '', url); //push the url
	if(location.pathname=='/') url=null
	console.log(location.pathname);
	

	if(url==null){ //on homepage

		if($homeLoaded){
		//homepage already been loaded so grab HTML from cache
		$.each($pageCache, function( key, obj) {
			if(obj.home==1)  $loadedObjs.push(obj.html);
		})
		renderPages();
		} else {
			//get homepage content with AJAX
	  $.ajax({
    url:"?action=ajax_get_pages",
    dataType: 'json',
    data: { firstLoad: $firstLoad} ,
    timeout: 10000,
    timeout: 1000,
    success: function(data) {
    //loadPages(data);
    $homeLoaded=true;
	loadedObjs = [];
	$pages = data;
	$totalPages = data.length;
	//console.log($totalPages);
    $loadedPages = 0;
    //$pages = pages;
    loadPage($pages[0],true); //load the first page
	},
    error: function(XMLHttpRequest, textStatus, errorThrown) {
        $('main').removeClass('loading');
        $('#overlay').remove();
        loader('hide');
    },
    complete: function(xhr, textStatus) {
    } 
    }); 
	}
	 } else {
	 	//load only the requested url (not homepage)
	 	if(!$firstLoad){
	 	$totalPages=1;
	 	loadPage(url,false);
	 } else {
	 	initPageScripts();
	 }
	 }
}
loadPage = function(url,home){
	var $ajaxLoad=true;
	//console.log('load '+url);

if($pageCache.length>0){ 
$.each($pageCache, function( key, obj) {
	if(obj.url == url){ //page is in cache, get the HTML
        $ajaxLoad=false;
		$loadedObjs.push(obj.html);
		$loadedPages++;
		if($loadedPages< $totalPages){
             var $url = $pages[$loadedPages];
             loadPage($url,home);
             } else {
                 renderPages();
             }
        }
    })
}	
//page isnt in cache, so make AJAX call
		if($ajaxLoad){
     		$.get(url).done(function(data){
			var $page = $(data).find('.section');
              $loadedObjs.push($page);
              $pageCache.push({home: home, url: url, html: $page}); //push page data to cache
              $loadedPages++;
              if($loadedPages < $totalPages){
              	//console.log('load '+$loadedPages)
             var $url = $pages[$loadedPages];
             loadPage($url,home);
             } else {
                 renderPages();
             }
               
        	 });
     }

	}

/*
 if($loadedPages++ < $totalPages){
             var $url = $pages[$loadedPages];
             loadPage($url,home);
             } else {
                 renderPages();
             }
             */


renderPages = function(){
	if($initFullPageJS) $.fn.fullpage.destroy('all');
    	if(!$firstLoad) $('main').empty();
    	for(i=0;i<$loadedObjs.length;i++){
            $('main').append($loadedObjs[i])
        }
        $loadedObjs = [];
   		initPageScripts();
   		activateFullPage();
}

initPageScripts = function(){
	initMap(); //init map
	initMasonry(); //init masonry
	initTooltip(); //init tooltip
	activateSectorClick(); //init sector panel
	initParallax(); //init parallax
}



//------------- fullpage js -------------


activateFullPage = function(){
//full page scroll
if($('.fullpage').length && !$fullPageActive){

	 var $sections = $('.section'),
       $anchors = [];
      
        $sections.each(function(){
        $anchors.push($(this).attr('data-anchor'));
        });
        console.log($anchors);
	
	$('.fullpage').fullpage({
		verticalCentered: false,
		resize : false,
		scrollingSpeed: 1100,
		easing: 'easeInOutQuart',
		navigation: false,
		slidesNavigation: true,
		slidesNavPosition: 'bottom',
		loopBottom: false,
		loopTop: false,
		loopHorizontal: true,
		autoScrolling: scroll,
		scrollOverflow: true,
		paddingTop: '0',
		paddingBottom: '0',
		normalScrollElementTouchThreshold: 10,
		keyboardScrolling: true,
		touchSensitivity: 30,
		continuousVertical: false,
		animateAnchor: true,
		anchors: $anchors,
    		onLeave: function(index, nextIndex, direction){
         		changeMenuState(nextIndex);
         	}
    	});
 	$fullPageActive = true;
}
}

destroyFullPage = function(){
	if($fullPageActive){
		$.fn.fullpage.destroy('all');
	}
}


//------------- History -------------

activateHistoryActions = function(){
	//console.log('activate history');
	initPopState();
	initHistoryLinks();
	//convertNavLinksToHash();
	

	loadContent(location.href, true);
}

destroyHistoryActions = function(){
	$('body').off('click','.push-link',sendPushLink);
}


convertNavLinksToHash = function(){
  var $links = $('#nav a');
    $links.each(function(){
    var $href = $(this).attr('href');
    //remove trailing slash
    $href =  $href.replace(/\/$/,"");
    $url = $href.split("/");
    if($url.length>2){
        $url[$url.length-1] = '#'+$url[$url.length-1];
    }
    $url = $url.join('/');
    $(this).attr('href',$url);
    })
  }


sendPushLink = function(e){

  e.preventDefault()
  	console.log('push link')
  $this = $(e.currentTarget);
  url = $this.attr('href');
console.log(url);
  loadContent(url,true);
}

initHistoryLinks = function(){
	$('body').on('click','.push-link, #nav a',sendPushLink);
}

initPopState = function(){
 window.onpopstate = function (event){ 
 	console.log('pop state')
 	 if ($firstLoad){
		$firstLoad = false;
	} else {
	if (event.state != null){
// there is something in the history state for this entry, so we go ahead and load it
// but we pass in false so that it doesn't write another entry over it...
loadContent(location.href,false);
}else{
// if there is nothing in the state (either first load or returning to a page that was a first load)
// then we tell it not to load the ajax, but instead just load the default content
loadContent(null,false);
}
} 
}
}
/*
window.onpopstate = function(event) {
  if(event.state==null){
	} else {
    var $url = location.href.replace(location.hash,'');
    if($url==$home_url){
         $url = $home_url;
    }
    getPages($url);
	}
};
}
*/

//------------- Init Site -------------



refreshPage = function(){
	isMobile = $(window).width() < 660;
	isTablet = $(window).width() > 659 && $(window).width() < 989;

	if(!isMobile && Modernizr.history){
		activateHistoryActions();

	} else {
		destroyHistoryActions();
	}
	if(!isMobile){ //what we do panel
		activateSectorClick();
	} else {
		activateMobileSectorClick();
	}
	if(isMobile){
		activateMobileMenu();
	}
	if(isTablet){
		activateTabletMenu();
	}
}



refreshPage();
$(window).on('resize',refreshPage);

}) 	//end on document load
