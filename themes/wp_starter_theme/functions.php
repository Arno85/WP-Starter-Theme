<?php
/**
 * wp_starter_theme functions and definitions
 *
 * @author Arnaud Martin
 */
use Core\Autoloader;
use Core\Theme\ThemeSetup;
use Core\Theme\CustomizeDashboard;
use Core\Theme\Medias;
use Core\Scripts\EnqueueScript;
use Core\Scripts\EnqueueStyle;
use Core\Debug;

require_once('core/Autoloader.php');
Autoloader::register();

$debug = new Debug();
ThemeSetup::init();
Medias::init();
CustomizeDashboard::init();

//////////////////////////////////////////
//		CONFIG
//////////////////////////////////////////
define ("THEMEURL", get_template_directory_uri());
define ("DIST_PATH", "/assets/dist/");

$scripts_internals_path = DIST_PATH . "js/internals/";
$scripts_vendors_path = DIST_PATH . "js/vendors/";
$styles_path = DIST_PATH . "css/";

//////////////////////////////////////////
//		ENQUEUE CSS
//////////////////////////////////////////
new EnqueueStyle('style', THEMEURL . $styles_path . 'styles.min.css', null, true);

//////////////////////////////////////////
//		ENQUEUE JAVASCRIPT
//////////////////////////////////////////
new EnqueueScript('script', THEMEURL . $scripts_internals_path . 'script.min.js', 'home-template', true, true);
new EnqueueScript('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', null, false, true);

//////////////////////////////////////////
//		MENUS
//////////////////////////////////////////

//////////////////////////////////////////
//		CUSTOM POST TYPES
//////////////////////////////////////////

