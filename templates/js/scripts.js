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

var isMobile, isTabletMenu, isMobileMenu,
	$fullPageActive = false;


parallaxTitle = function(){
	console.log('parallax')
var $title =  $('#work-single .page-title');
windowScroll = $(this).scrollTop();
$title.css({
	'margin-top' : -(windowScroll/3)+"px"//,
	//'opacity' : 1-(windowScroll/250)
	});
}

$(window).on('scroll',function() {
	if(!isTouchDevice.any()){
		 parallaxTitle();
	}
    })


//mobile menu


//tooltip

var $mouseX, $mouseY, $tooltipX, $tooltipY,
	$tooltip  =  $('<div>', { class: "tooltip-pointer"}),
	$offsetX=0, $offsetY=0;

refreshTooltipPosition = function(){
	$tooltipX = $mouseX - $offsetX;
	$tooltipY = $mouseY - $offsetY;
	$tooltip.css({
		left: $tooltipX+'px',
 		top: $tooltipY+'px'
	})
}
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

//what we do
var $handles = $('#sectors .handle'),
	$items  =$('#sectors li.item'),
	$close = $('#sectors a.close');

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
	
	//$('#sectors li.active').
}
$close.on('click',resetSectorMenu);

showSectorClose = function(){
	$close.animate({
		top:'-60px'
	},100,"easeOutQuad",function(){
		
			
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
	killSectorClick();
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
killSectorClick = function(){
	$handles.off('click');
}
		
activateMobileSectorClick = function(){
	$handles.off('click').on('click',function(e){
		e.preventDefault();
		var $parent = $(this).parent('li');
		$parent.addClass('active');
		$('.handle',$parent).removeClass('hover');
		$('.main,aside',$parent).show();
	})
}

//menu

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
resetMobileNav = function(){

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
activateHistoryActions = function(){
	activateFullPage();
}
killHistoryActions = function(){
	if($fullPageActive){
		$.fn.fullpage.destroy('all');
	}
}
updateMenuActions = function(){
	isMobile = $(window).width() < 660;
	isTabletMenu = $(window).width() > 659 && $(window).width() < 769;
	isMobileMenu = $(window).width() < 660;
	if(!isMobile && Modernizr.history){
		activateHistoryActions();
	} else {
		killHistoryActions();
	}
	if(!isMobile){ //what we do panel
		activateSectorClick();
	} else {
		activateMobileSectorClick();
	}
	if(isMobileMenu){
		activateMobileMenu();
	}
	if(isTabletMenu){
		activateTabletMenu();
	}
}

activateFullPage = function(){
//full page scroll
if($('.fullpage').length){
 $('.fullpage').fullpage({
        verticalCentered: false,
        resize : false,
        scrollOverflow: true,
        autoScrolling: scroll,
        //css3: true,
		paddingTop: '0',
		paddingBottom: '0',
        normalScrollElementTouchThreshold: 15,
        touchSensitivity: 30,
        keyboardScrolling: true,
        scrollingSpeed: 1000,
		easing: 'easeInQuart',
       // anchors: $anchors,
    onLeave: function(index, nextIndex, direction){
         changeMenuState(nextIndex);
         }
    });
 	$fullPageActive = true;
}

$links = $('#nav a');
$links.on('click',function(e){
	e.preventDefault();
	var $index = $links.index($(this));
	 $.fn.fullpage.moveTo($index+1, 0);
})

$('.caption .button').on('click',function(e){
	e.preventDefault();
	 $.fn.fullpage.moveTo(4, 0);
})
}

updateMenuActions();

$(window).on('resize',updateMenuActions);

}) 	//end on document load


