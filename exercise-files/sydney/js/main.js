
;(function($) {

   'use strict'

    var testMobile;
    var isMobile = {
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
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

	var heroSection = function() {
		// Background slideshow
		(function() {
			if ( $( "#slideshow" ).length ) {
				$('#slideshow').superslides({
					play: $('#slideshow').data('speed'),
					animation: 'fade',
					pagination: false
				});
			}
		})();
		// Text slider
		(function() {
			if ( $( ".text-slider" ).length ) {
				$('.text-slider').flexslider({
					animation: "slide",
					selector: ".slide-text li",
					controlNav: false,
					directionNav: false,
					slideshowSpeed: $('.text-slider').data('speed'),
					animationSpeed : 700,
					slideshow : $('.text-slider').data('slideshow'),
					touch: true,
					useCSS: false,
				});
			}
		})();

		$(function() {
		  $('a[href*=#]:not([href=#],.wc-tabs a)').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top - 70
		        }, 1000);
		        return false;
		      }
		    }
		  });
		});
	};

	var responsiveMenu = function() {
		var	menuType = 'desktop';

		$(window).on('load resize', function() {
			var currMenuType = 'desktop';

			if ( matchMedia( 'only screen and (max-width: 1024px)' ).matches ) {
				currMenuType = 'mobile';
			}

			if ( currMenuType !== menuType ) {
				menuType = currMenuType;

				if ( currMenuType === 'mobile' ) {
					var $mobileMenu = $('#mainnav').attr('id', 'mainnav-mobi').hide();
					var hasChildMenu = $('#mainnav-mobi').find('li:has(ul)');

					$('#header').find('.header-wrap').after($mobileMenu);
					hasChildMenu.children('ul').hide();
					hasChildMenu.children('a').after('<span class="btn-submenu"></span>');
					$('.btn-menu').removeClass('active');
				} else {
					var $desktopMenu = $('#mainnav-mobi').attr('id', 'mainnav').removeAttr('style');

					$desktopMenu.find('.submenu').removeAttr('style');
					$('#header').find('.col-md-10').append($desktopMenu);
					$('.btn-submenu').remove();
				}
			}
		});

		$('.btn-menu').on('click', function() {
			$('#mainnav-mobi').slideToggle(300);
			$(this).toggleClass('active');
		});

		$(document).on('click', '#mainnav-mobi li .btn-submenu', function(e) {
			$(this).toggleClass('active').next('ul').slideToggle(300);
			e.stopImmediatePropagation()
		});
	}

	var panelsStyling = function() {	
		$(".panel-row-style").each( function() {
			if ($(this).data('hascolor')) {
				$(this).find('h1,h2,h3,h4,h5,h6,a,.fa, div, span').css('color','inherit');
			}
			if ($(this).data('hasbg')) {
				$(this).append( '<div class="overlay"></div>' );
			}			
		});
	};

	var scrolls = function() {
		testMobile = isMobile.any();
		if (testMobile == null) {
			$(".panel-row-style, .slide-item").parallax("50%", 0.3);
		}
	};

	var rollAnimation = function() {
		$('.orches-animation').each( function() {
		var orElement = $(this),
			orAnimationClass = orElement.data('animation'),
			orAnimationDelay = orElement.data('animation-delay'),
			orAnimationOffset = orElement.data('animation-offset');

			orElement.css({
				'-webkit-animation-delay':  orAnimationDelay,
				'-moz-animation-delay':     orAnimationDelay,
				'animation-delay':          orAnimationDelay
			});
		
			orElement.waypoint(function() {
				orElement.addClass('animated').addClass(orAnimationClass);
			},{ triggerOnce: true, offset: orAnimationOffset });
		});
	};

	var goTop = function() {
		$(window).scroll(function() {
			if ( $(this).scrollTop() > 800 ) {
				$('.go-top').addClass('show');
			} else {
				$('.go-top').removeClass('show');
			}
		}); 

		$('.go-top').on('click', function() {
			$("html, body").animate({ scrollTop: 0 }, 1000);
			return false;
		});
	};

	var testimonialCarousel = function(){
		if ( $().owlCarousel ) {
			$('.roll-testimonials').owlCarousel({
				navigation : false,
				pagination: true,
				responsive: true,
				items: 1,
				itemsDesktop: [3000,1],
				itemsDesktopSmall: [1400,1],
				itemsTablet:[970,1],
				itemsTabletSmall: [600,1],
				itemsMobile: [360,1],
				touchDrag: true,
				mouseDrag: true,
				autoHeight: true,
				autoPlay: $('.roll-testimonials').data('autoplay')
			});
		}
	};

	var progressBar = function() {
		$('.progress-bar').on('on-appear', function() {
			$(this).each(function() {
				var percent = $(this).data('percent');

				$(this).find('.progress-animate').animate({
					"width": percent + '%'
				},3000);

				$(this).parent('.roll-progress').find('.perc').addClass('show').animate({
					"width": percent + '%'
				},3000);
			});
		});
	};

 	var headerFixed = function() {
			var headerFix = $('.site-header').offset().top;
			$(window).on('load scroll', function() {
				var y = $(this).scrollTop();
				if ( y >= headerFix) {
					$('.site-header').addClass('fixed');
				} else {
					$('.site-header').removeClass('fixed');
				}
				if ( y >= 107 ) {
					$('.site-header').addClass('float-header');
				} else {
					$('.site-header').removeClass('float-header');
				}
			});
	};

	var counter = function() {
		$('.roll-counter').on('on-appear', function() {
			$(this).find('.numb-count').each(function() {
				var to = parseInt($(this).attr('data-to')), speed = parseInt($(this).attr('data-speed'));
				$(this).countTo({
					to: to,
					speed: speed				
				});
			});
		}); //counter
	};

	var detectViewport = function() {
		$('[data-waypoint-active="yes"]').waypoint(function() {
			$(this).trigger('on-appear');
		}, { offset: '90%', triggerOnce: true });

		$(window).on('load', function() {
			setTimeout(function() {
				$.waypoints('refresh');
			}, 100);
		});
	};

	var teamCarousel = function(){
		if ( $().owlCarousel ) {
			$(".panel-grid-cell .roll-team").owlCarousel({
				navigation : false,
				pagination: true,
				responsive: true,
				items: 3,
				itemsDesktopSmall: [1400,3],
				itemsTablet:[970,2],
				itemsTabletSmall: [600,1],
				itemsMobile: [360,1],
				touchDrag: true,
				mouseDrag: true,
				autoHeight: false,
				autoPlay: false,
			}); // end owlCarousel
		} // end if
	};

    var responsiveVideo= function(){
	  $(document).ready(function(){
	    $("body").fitVids();
	  });
    };

	var projectEffect = function() {
		var effect = $('.project-wrap').data('portfolio-effect');
	
		$('.project-item').children('.item-wrap').addClass('orches-animation');

		$('.project-wrap').waypoint(function(direction) {
			$('.project-item').children('.item-wrap').each(function(idx, ele) {
				setTimeout(function() {
					$(ele).addClass('animated ' + effect);
				}, idx * 150);
			});
		}, { offset: '75%' });
	};

	var socialMenu = function() {
	    $('.widget_fp_social a').attr( 'target','_blank' );
	};

    var removePreloader = function() {
		$('.preloader').css('opacity', 0);
		setTimeout(function(){$('.preloader').hide();}, 600);	
    }

	// Dom Ready
	$(function() {
		heroSection();
		headerFixed();
		testimonialCarousel();
		teamCarousel();
		counter();
		progressBar();
		detectViewport();
		responsiveMenu();
		responsiveVideo();
		rollAnimation();
		panelsStyling();
		scrolls();
		projectEffect();
		socialMenu();
		goTop();
		removePreloader();
   	});
})(jQuery);