/**
 * Custom scripts needed for the colorpicker, image button selectors,
 * and navigation tabs.
 */

jQuery(document).ready(function($) {

	// Loads the color pickers
	$('.of-color').wpColorPicker();

	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');
	});

	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();

	// Loads tabbed sections if they exist
	if ( $('.nav-tab-wrapper').length > 0 ) {
		options_framework_tabs();
	}

	function options_framework_tabs() {

		var $group = $('.group'),
			$navtabs = $('.nav-tab-wrapper a'),
			active_tab = '';

		// Hides all the .group sections to start
		$group.hide();

		// Find if a selected tab is saved in localStorage
		if ( typeof(localStorage) != 'undefined' ) {
			active_tab = localStorage.getItem('active_tab');
		}

		// If active tab is saved and exists, load it's .group
		if ( active_tab != '' && $(active_tab).length ) {
			$(active_tab).fadeIn();
			$(active_tab + '-tab').addClass('nav-tab-active');
		} else {
			$('.group:first').fadeIn();
			$('.nav-tab-wrapper a:first').addClass('nav-tab-active');
		}

		// Bind tabs clicks
		$navtabs.click(function(e) {

			e.preventDefault();

			// Remove active class from all tabs
			$navtabs.removeClass('nav-tab-active');

			$(this).addClass('nav-tab-active').blur();

			if (typeof(localStorage) != 'undefined' ) {
				localStorage.setItem('active_tab', $(this).attr('href') );
			}

			var selected = $(this).attr('href');

			$group.hide();
			$(selected).fadeIn();

		});
	}

var nums = jQuery("#numsection").val();
		jQuery(".toggle_title h3").addClass("toggleTitle");
		jQuery(".toggle_title").each( function( index ){
			jQuery( "#section-sectiontitle"+(index+1)+", #section-sectioncontent"+(index+1)+", #section-menutitle"+(index+1)+", #section-sectionbgcolor"+(index+1)+", #section-sectionbgimage"+(index+1)+", #section-hidesec"+(index+1)+", #section-sectionclass"+(index+1) ).wrapAll( "<div class=\'toggle_wrapper\' />");
		});
		jQuery(".toggle_title h3").click( function(){
			jQuery(this).parent().next().slideToggle();
		});
});