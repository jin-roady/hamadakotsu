/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function

//スライダー設置
function slider() {
	jQuery(function($) {
		$('.slick-box').slick({
		autoplay:true,
		autoplaySpeed: 6000,
		speed: 1000,
		accessibility: true,
		dots: false,

		centerMode: true,
		centerPadding: '60px',
		variableWidth: true,
		arrows: false,
		appendArrows: $('#slide-nav-inner'),

		responsive: [ // ブレイクポイントごとに設定を変更
			{
				breakpoint: 1000,
				settings: {
					centerMode: false,
					centerPadding: '0px',
					variableWidth: false,
				}
      }
    ]

		});
	});
}


function slideshow() {
	jQuery(function($) {
		$('.slick-box-fade').slick({
				fade: true,
				autoplay: true, //オートプレイ
				autoplaySpeed: 3000, //オートプレイの切り替わり時間
				speed: 3000,
				arrows: false,
				pauseOnFocus: false,
				pauseOnHover: false,
				lazyLoad: 'ondemand',
				responsive: [ // ブレイクポイントごとに設定を変更
					{
						breakpoint: 1000,
						settings: {
							centerMode: false,
							centerPadding: '0px',
							variableWidth: false,
						}
          }
        ]
		});
	});
}

//同ページ内アンカースムーススクロール
function smooth() {
	jQuery(function($) {
	   $('*[href^="#"]').click(function() {// # クリック処理
	      var speed = 800;
	      var href= $(this).attr("href");
	      var target = $(href == "#" || href == "" ? 'html' : href);
				var headerHeight = 0;
				if ( $('#sp-nav').is(':visible') ) {
			    headerHeight = $('header').height();
				}
	      var position = target.offset().top - headerHeight - 35;
	      $('body,html').animate({scrollTop:position}, speed, 'swing');
	      return false;
	   });
	});
}

//ToTop
function totop() {
	jQuery(function($) {
		$("#topBtn").hide();
		$(window).on("scroll", function() {
				if ($(this).scrollTop() > 200) {
						$("#topBtn").fadeIn("fast");
				} else {
						$("#topBtn").fadeOut("fast");
				}
		});
	});
}

//スマホ用メニュー
function spnavi() {
	jQuery(function($) {
		$(".nav__icon").on("click", function() {
				$(this).toggleClass("active");
				$("nav ul").slideToggle();
		});
	});
}

//ヘッダ固定
function fixedheader() {
	jQuery(function($) {
		var $main = $('#inner-header'),
				$nav = $('.caption'),
				navHeight = $nav.height() + 14, //ヘッダのborder分を加算
				fixedClass = 'fixed';

		if ( $('#sp-nav').is(':visible') ) {
			$nav.addClass(fixedClass);
			$main.css('margin-top', navHeight);
		}
	});
}


function stopsubmit() {
	jQuery('.wpcf7-form input:not([type="submit"],[type="file"])').on('keydown', function(e){
		var keycode = (e.keyCode ? e.keyCode : e.which);
		// Enter => 13
		if (keycode == 13) {
			return false;
		}
		return true;
	});
}


/*
 * Put all your regular jQuery in here.
*/
jQuery(window).load(function($) {
	fixedheader();
	stopsubmit();
});

jQuery(document).ready(function($) {

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();
	slider();
	slideshow();
	smooth();
	totop();
	spnavi();
	//fixedheader();

}); /* end of as page load scripts */
