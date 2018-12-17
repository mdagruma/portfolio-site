var $ = jQuery;
$(document).ready(function() {	
	
	// MOBILE MENU
	mobileMenu();	
	function mobileMenu() {
		$('.btn-mobile-menu').click(function() {	
		
			if($(this).hasClass('active-menu-btn')) {
				closeMenu();
			} else {
				openMenu();
			}
			return false;
		});

		function closeMenu() {
			$('nav.mobile-menu')
				.removeClass('open-menu')
				.addClass('close-menu');
			$('.btn-mobile-menu').removeClass('active-menu-btn');
		}			
		
		function openMenu() {
			$('nav.mobile-menu').addClass('open-menu');
			$('.btn-mobile-menu').addClass('active-menu-btn');
		}
	}
	// END
	

	// MULTIPLE ACCORDIONS (ON LOAD)	
	$('nav.mobile-menu > div > ul > li.menu-item-has-children > a')
		.contents()
		.unwrap()
		.wrap('<span class="expand"></span>');	
		
	$('.expand')
		.next()
		.hide();
	
	// ONLY IN PLACE IF SOMEONE WANTS TO HAVE THE FIRST ACCORDION OPEN
	$('.expanded').each(function() {
		if ($(this).index() === 0 || $(this).is(':first-child')) {
			$(this)
				.next()
				.show();					
		} else {
			$(this).removeClass('expanded');	
		}	
	});
	// END
	
	// ADD 'CONTENT-HERO' CLASS TO FIRST ELEMENT IN ACCORDION DROPDOWN
	$('.expanded-content').each(function() {
		$(this)
			.children()
			.first()
			.addClass('content-hero');
	});
	// END
	

	// RESPONSIVE VIDEO BRANDING
	var allYtVideos = $('iframe[src^="https://www.youtube.com"]');
	var allVimeoVideos = $('iframe[src^="https://player.vimeo.com"]');
	
	// YouTube Query Parameters
	allYtVideos.each(function() {
		$(this).attr({		
			src: $(this).attr('src') + '?autoplay=0&modestbranding=1&autohide=1&showinfo=0&rel=0'
		})
	});
	
	// Vimeo Query Parameters
	allVimeoVideos.each(function() {
		$(this).attr({		
			src: $(this).attr('src') + '?byline=false&portrait=false&title=false'
		})
	});
	// END
		
		
	// ANCHOR TAG SCROLLING	
	$('a.scroll[href^="#"]').click(function() {		
		if ($(this).attr('href') == '#' ) {
			// Do nothing
		} else {
			var thisHref = $(this).attr('href');
			thisHref = thisHref.split('#');
			thisHref = thisHref[1];
			var thisAnchor = $('a[name=' + thisHref + ']');
			var anchorOffset = thisAnchor.offset().top - 20;
			scrollJump(anchorOffset);					
			return false;
		}
	});

	function scrollJump(thisHref) {
		$('html, body').animate({
			scrollTop: thisHref
		}, 500);
	} 
	// END
	
	
	// BACK TO TOP
	backToTop();
	function backToTop() {
		$('.back-to-top').click(function () {
			$('html, body').animate({ scrollTop: 0 }, 'slow');
			return false;
		});
	
		if (!('ontouchstart' in window)) {
			$('.back-to-top').on({
				mouseover: function () {
					$(this).css('opacity', 1);
				},
				mouseout: function () {
					$(this).css('opacity', 0.8);
				}
			});
		}
	
		$(window).on('scroll', function () {
			var windowScroll = $(this).scrollTop();
			var nav = $('header');
			
			if (windowScroll >= nav.offset().top + nav.height()) {
				$('.back-to-top')
					.fadeIn(800);
			} else {
				$('.back-to-top')
					.fadeOut(800);
			}
		});
	}
	// END
	
});

// FUNCTIONS WE DON'T WANT TO RUN ON LOAD

	// MULTIPLE ACCORDIONS	
	var clickEventType = document.ontouchstart !== null ? 'click':'touchstart';
	
	$(document).on(clickEventType, '.expand', function() {		
		if ($(this).hasClass('expanded')) {
			$(this)
				.next()
				.slideUp('fast');
				var contentArea = $(this).next();
				var accordionVideo = $('.video > iframe', contentArea);
				var accordionvideoURL = accordionVideo.attr('src');
				accordionVideo.attr('src', "");
				accordionVideo.attr('src', accordionvideoURL);		
			$(this).removeClass('expanded');		
		} else {
			var thisParent = $(this).parent();
			thisParent
				.children('.expanded')
				.each(function () {
					$(this)
						.next()
						.slideUp('fast');
					var contentArea = $(this).next();
					var accordionVideo = $('.video > iframe', contentArea);
					var accordionvideoURL = accordionVideo.attr('src');
					accordionVideo.attr('src', "");
					accordionVideo.attr('src', accordionvideoURL);
					$(this).removeClass('expanded');
			});
			$(this)
				.next()
				.slideDown('fast', function () {
					var el = $(this);
					scrollToDiv(el); // Reference to scroll function
				});				
			$(this).addClass('expanded');
		}
		return false;
	});
	
	
	// SCROLL FUNCTION	
	function scrollToDiv(element) {
		var offset = element.offset();
		var offsetTop = offset.top - 120;
		$('body, html').animate({
			scrollTop: offsetTop
		}, 500);
	} 
	// END

//END	