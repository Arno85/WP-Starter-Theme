<?php
/**
 * wp_starter_theme functions and definitions
 *
 * @author Arnaud Martin
 * @package wp_starter_theme
 */


//////////////////////////////////////////
//		CONFIG
//////////////////////////////////////////

// Define paths to folders
define ("INCLUDE_PATH", '..' . str_replace(site_url(), '', get_template_directory_uri()) . '/includes/');
define ("DIST_PATH", "/ressources/dist/");


// Get WP current lang
global $lang;
$lang = get_locale();


if(ENVIRONMENT == 'dev'){

	// Remove admin bar
	add_filter('show_admin_bar', '__return_false');

}

	
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */
add_action( 'after_setup_theme', 'wp_starter_theme_setup' );

function wp_starter_theme_setup() {

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Add support for core custom logo.
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}


/**
 * Register widget area.
 *
 */
 function wp_starter_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp_starter_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp_starter_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wp_starter_theme_widgets_init' );


/**
 * Put Wordpress on static page mode when a page named "Home" is created.
 *
 */
$homepage = get_page_by_title('Home');

if ( $homepage )
{
    update_option( 'page_on_front', $homepage->ID );
    update_option( 'show_on_front', 'page' );
}




//////////////////////////////////////////
//		CUSTOM MENU
//////////////////////////////////////////

/**
 * Import any custom menu in `includes/menu` folder
 *
 */
 foreach (glob(INCLUDE_PATH . 'menus/*.php') as $file) {
    include $file;
}




//////////////////////////////////////////
//		CUSTOM POST TYPES
//////////////////////////////////////////

/**
 * Import any custom post types in `includes/post-types` folder
 *
 */
foreach (glob(INCLUDE_PATH . 'post-types/*.php') as $file) {
    include $file;
}




//////////////////////////////////////////
//		SCRIPTS AND STYLES
//////////////////////////////////////////

/**
 * Load Scripts
 *
 */
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

function custom_scripts() {

	$scripts_vendors_path = DIST_PATH . "js/vendors/";	
	$scripts_internals_path = DIST_PATH . "js/internals/";
	
	// Remove Jquery of Wordpress
	wp_deregister_script("jquery");

	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, null, true);
	
	wp_enqueue_script( 'script', get_template_directory_uri() . $scripts_internals_path . 'script.min.js', false, null, true);
	
	//load script only on a specific page (eg : google maps script only on contact page)
	if(is_page_template('templates/contact-template.php')){

	}		
}

/**
 * Load Styles
 *
 */
 add_action( 'wp_enqueue_scripts', 'custom_styles' );

function custom_styles() {

	$styles_path = DIST_PATH . "css/";

	wp_enqueue_style( 'nexus-style', get_template_directory_uri() . $styles_path . 'styles.min.css');
		
}


//////////////////////////////////////////
//		IMAGES
//////////////////////////////////////////

/**
 * Image size supports
 *
 */
 if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('xlarge', 1920, '', true); // Xlarge Thumbnail
    add_image_size('large', 1024, '', true);  // Large Thumbnail
    add_image_size('medium', 680, 383, true); // Medium Thumbnail
    add_image_size('small', 120, '', true);   // Small Thumbnail
}

/**
 * Unable SVG files
 */
add_filter('upload_mimes', 'cc_mime_types');

function cc_mime_types($mimes) {

	$mimes['svg'] = 'image/svg+xml';
	return $mimes;

}


//////////////////////////////////////////
//		OTHERS FUNCTIONS
//////////////////////////////////////////

/**
 * Pretty var_dump 
 * Possibility to set a title, a background-color and a text color to distinguish different var_dump (default grey and white)
 */  
function dump($var, $title="", $background="#EEEEEE", $color="#000000"){

	echo "<pre style='background:$background; color:$color; padding:10px 20px; border:2px inset $color'>";
	echo "<h2>$title</h2>";
	var_dump($var); 
	echo "</pre>";

}


