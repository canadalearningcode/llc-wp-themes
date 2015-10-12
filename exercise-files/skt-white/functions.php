<?php
/**
 * SKT White functions and definitions
 *
 * @package SKT White
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

function skt_white_custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'skt_white_custom_excerpt_length', 999 );


if ( ! function_exists( 'skt_white_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_white_setup() {

	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'skt-white', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_image_size( 'homepage-thumb',240,145,true );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'skt-white' ),
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // skt_white_setup
add_action( 'after_setup_theme', 'skt_white_setup' );


function skt_white_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'skt-white' ),
		'description'   => __( 'Appears on blog page sidebar', 'skt-white' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'skt_white_widgets_init' );

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once get_template_directory() . '/inc/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );


function skt_white_font_url(){
		$font_url = '';
		
		/* Translators: If there are any character that are
		* not supported by Roboto, translate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on', 'Roboto font:on or off','skt-white');
		
		/* Translators: If there are any character that are not
		* supported by Open sans, trsnalate this to off, do not
		* translate into your own language.
		*/
		$open_sans = _x('on','Open Sans:on or off','skt-white');
		
		/* Translators: If there has any character that are not supported 
		*  by Roboto Condensed, translate this to off, do not translate
		*  into your own language.
		*/
		$roboto_condensed = _x('on','Roboto Condensed:on or off','skt-white');
		
		if('off' !== $roboto || 'off' !== $open_sans || 'off' !== $roboto_condensed){
			$font_family = array();
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}
			
			if('off' !== $open_sans){
				$font_family[] = 'Open Sans:300,400,600,700';
			}
			
			if('off' !== $roboto_condensed){
				$font_family[] = 'Roboto Condensed:300,400,700,800';
			}
			
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}

function skt_white_scripts() {
	wp_enqueue_style('skt-white-font', skt_white_font_url(), array());
	wp_enqueue_style( 'skt-white-basic-style', get_stylesheet_uri() );
	wp_enqueue_style('skt-white-responsive-tyle', get_template_directory_uri().'/css/theme-responsive.css');
	wp_enqueue_style( 'skt-white-editor-style', get_template_directory_uri().'/editor-style.css' );
	wp_enqueue_style( 'skt-white-base-style', get_template_directory_uri().'/css/style_base.css' );
	if ( (of_get_option('innerpageslider', true) != 'hide') || is_home() || is_front_page() ) { 
		wp_enqueue_script( 'skt-white-nivo-scripts', get_template_directory_uri().'/js/jquery.nivo.slider.js', array('jquery') );
		wp_enqueue_style( 'skt-white-nivo-style', get_template_directory_uri().'/css/nivo-slider.css' );
	}
	wp_enqueue_style( 'skt-white-prettyphoto-style', get_template_directory_uri().'/css/prettyPhoto.css' );
	wp_enqueue_script( 'skt-white-customscripts', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'skt-white-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.js', array('jquery') );
	wp_enqueue_script( 'skt-white-lightbox', get_template_directory_uri() . '/js/lightbox.js', array('jquery') );
	wp_enqueue_style( 'skt-white-animation-style', get_template_directory_uri().'/css/animation.css' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_white_scripts' );

function skt_white_ie_stylesheet(){
	global $wp_styles;
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('skt-white-ie', get_template_directory_uri().'/css/ie.css', array('skt-white-style'));
	$wp_styles->add_data('skt-white-ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','skt_white_ie_stylesheet');


// add ie conditional html5 to header
function skt_white_add_ie_html5() {
global $is_IE;
if ($is_IE)
echo '<!--[if lt IE 9]>';
echo '<script src="'.get_template_directory_uri().'/js/html5.js"></script>';
echo '<![endif]-->';
}
add_action('wp_head', 'skt_white_add_ie_html5');


function skt_white_custom_head_codes() { 
	if ( function_exists('of_get_option') ){
			
		echo "<style>";
		if ( of_get_option('colorscheme', true) != '' ) {
			echo '.top-bar a, .contact-banner a, input.search-submit, .post-password-form input[type=submit], .icon:hover, .newsletter-form input[type="submit"], .pagination ul li .current, .pagination ul li a:hover{background-color:'. esc_html( of_get_option('colorscheme', '#00a8ff') ) .';}';
		}
		if( of_get_option('colorscheme',true) != ''){
			echo ".header .header-inner .nav ul li a:hover, .newsletter h2 span, .recent-post li span, .phone-no strong, a{color:".of_get_option('colorscheme','#00a8ff')."}";
		}
		if( of_get_option('colorscheme',true) != ''){
			echo ".more:hover{background:".of_get_option('colorscheme','#00a8ff')." url(".get_template_directory_uri()."/images/white-arrow.png) no-repeat scroll center center}";
		}
		if ( of_get_option('colorscheme', true) != '' ) {
			echo '.client_banner .client img:hover{border-color:'. esc_html( of_get_option('colorscheme', '#00a8ff') ) .';}';
		}
		
		echo "</style>";
	}
}
//add_action('wp_head', 'skt_white_custom_head_codes');


function skt_white_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><div><ul>';
		echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
		if ( $page_format ) {
			foreach ( $page_format as $page ) {
				echo "<li>".$page."</li>";
		}
		}
		echo '</ul></div></div>';
	
}

function skt_white_favicon(){
	if( of_get_option('favicon',true) != '')
	{
    	echo "<link rel='icon' type='image/x-icon' href=".esc_url( of_get_option('favicon', true) )." />";
    
	}
}
add_action('wp_head','skt_white_favicon');

add_action('admin_enqueue_scripts', 'skt_white_optionsframework_custom_scripts');
	function skt_white_optionsframework_custom_scripts( $hook ) {
    if ( 'appearance_page_white-options' != $hook ) {
        return;
    }
    wp_enqueue_script( 'skt-white-option-script', get_template_directory_uri().'/js/optionframework-custom.js' );
}
	

// custom javascript for head
function skt_white_hook_custom_javascript(){
	wp_enqueue_script('skt_white_cus', get_template_directory_uri().'/js/hook-custom-script.js');	
}
add_action('wp_enqueue_scripts','skt_white_hook_custom_javascript');

// get_the_content format text
function skt_white_get_the_content_format( $str ){
	$raw_content = apply_filters( 'skt_white_the_content', $str );
	$content = str_replace( ']]>', ']]&gt;', $raw_content );
	return $content;
}
// the_content format text
function skt_white_the_content_format( $str ){
	echo skt_white_get_the_content_format( $str );
}


// remove excerpt more
function skt_white_new_excerpt_more( $more ) {
	return '... ';
}
add_filter('excerpt_more', 'skt_white_new_excerpt_more');

define('SKT_SITE_URL','http://www.sktthemes.net'); 
define('SKT_THEME_URL','http://www.sktthemes.net/themes');
define('SKT_PRO_THEME_URL','http://sktthemes.net/shop/skt-white-pro');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/skt-white-doc/');
define('SKT_DESIGN_BY','Design by <a href="http://www.sktthemes.net" target="_blank">SKT  Themes</a>');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';