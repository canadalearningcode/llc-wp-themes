jQuery(window).bind('scroll', function() {
	var skt_white_scroll = jQuery(window).width();
	if( skt_white_scroll > 979 ){
		var navHeight = jQuery( window ).height() - 0;
		if (jQuery(window).scrollTop() > navHeight) {
			jQuery('.header').addClass('fixed');
		}else {
			jQuery('.header').removeClass('fixed');
		}
	}
});

jQuery(document).ready( function(){
	var skt_white_skill = jQuery(window).width();

	// skill bar script
	jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
	
	// team info display script
	if(skt_white_skill > 939){
		jQuery('.team-info .info').hide();
		jQuery('.team-info').mouseenter( function() {
			jQuery(this).find('.info').slideDown();
		}).mouseleave( function(){
			jQuery(this).find('.info').slideUp();
		});
	}else{
		jQuery('.team-info .info').show();
	}

	
	// accordion
    jQuery('.accordion-box .acc-content').hide();
    jQuery('.accordion-box h2:first').addClass('active').next().show();
    jQuery('.accordion-box h2').click(function(){
        if( jQuery(this).next().is(':hidden') ) {
            jQuery('.accordion-box h2').removeClass('active').next().slideUp();
            jQuery(this).toggleClass('active').next().slideDown();
        }
        return false; // Prevent the browser jump to the link anchor
    });
	
	// Tabs
	jQuery('ul.tabs > br').remove();
	jQuery('.tabs-wrapper').append(jQuery('.tabs li div'));
	jQuery('.tabs li:first a').addClass('defaulttab selected');
	jQuery('.tabs a').click(function(){
		switch_tabs(jQuery(this));
	});
	switch_tabs(jQuery('.defaulttab'));
	function switch_tabs(obj) {
		jQuery('.tab-content').hide();
		jQuery('.tabs a').removeClass("selected");
		var id = obj.attr("rel");
		jQuery('#'+id).show();
		obj.addClass("selected");
	}

	// Content Toggle
    jQuery(".slide_toggle_content").hide();
    jQuery("h3.slide_toggle").toggle(function(){
	    jQuery(this).addClass("clicked");
	}, function () {
	    jQuery(this).removeClass("clicked");
    });
    jQuery("h3.slide_toggle").click(function(){
		jQuery(this).next(".slide_toggle_content").slideToggle();
    });

});


// NAVIGATION CALLBACK
var skt_white_nav = jQuery(window).width();
jQuery(document).ready(function() { 
	jQuery(".nav li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	})
	jQuery(".toggleMenu").click(function(e) { 
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".nav").slideToggle('fast');
	});
	skt_white_adjustMenu();
})

// navigation orientation resize callbak
jQuery(window).bind('resize orientationchange', function() {
	skt_white_nav = jQuery(window).width();
	skt_white_adjustMenu();
});

var skt_white_adjustMenu = function() {
	if (skt_white_nav < 979) {
		jQuery(".toggleMenu").css("display", "block");
		if (!jQuery(".toggleMenu").hasClass("active")) {
			jQuery(".nav").hide();
		} else {
			jQuery(".nav").show();
		}
		jQuery(".nav li").unbind('mouseenter mouseleave');
	} else {
		jQuery(".toggleMenu").css("display", "none");
		jQuery(".nav").show();
		jQuery(".nav li").removeClass("hover");
		jQuery(".nav li a").unbind('click');
		jQuery(".nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
		});
	}
}

jQuery(window).scroll(function() {
		jQuery('.services').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("pulse");
			}
		});
		
		jQuery('.contact-button').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeIn");
			}
		});
		
		jQuery('.message-thumb').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInLeftBig");
			}
		});
		
		jQuery('.message-desc').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInRightBig");
			}
		});
		
		jQuery('.news-box').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInDown");
			}
		});
		
		jQuery('.testimonial-box').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInUp");
			}
		});
		
		jQuery('.stat').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("zoomInLeft");
			}
		});
		
		jQuery('.team-desc').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInLeft");
			}
		});
		
		jQuery('.team-div').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("fadeInRight");
			}
		});
		
		jQuery('.signup-newsletter').each(function(){
		var imagePos = jQuery(this).offset().top;

		var topOfWindow = jQuery(window).scrollTop();
			if (imagePos < topOfWindow+400) {
				jQuery(this).addClass("zoomIn");
			}
		});
		
	});
	
jQuery(document).ready(function() {
        if( jQuery( '#slider' ).length > 0 ){
        jQuery('.nivoSlider').nivoSlider({
                        effect:'fade',
                        animSpeed: 500,
                        pauseTime: 3000,
                        startSlide: 0,
    });
        }
});