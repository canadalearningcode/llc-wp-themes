// JavaScript Document

        jQuery("#header-bottom-shape").click(function(){
            if ( jQuery( ".show_hide_header" ).is( ":hidden" ) ) {
                jQuery( ".show_hide_header" ).slideDown("slow");
            } else {
                jQuery( ".show_hide_header" ).slideUp("slow");
            }
            jQuery( this ).toggleClass('showDown');
        });
        jQuery( "#site-nav li:last" ).addClass("noBottomBorder");
        jQuery( "#site-nav li:parent" ).find('ul.sub-menu').parent().addClass("haschild");
