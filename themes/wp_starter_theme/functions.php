<?php
/**
 * wp_starter_theme functions and definitions
 *
 * @author Arnaud Martin
 * @package wp_starter_theme
 */
use Core\Autoloader;
use Core\ThemeSetup;
use Core\CustomizeDashboard;
use Core\Debug;
use Core\Medias;
use Core\Scripts\EnqueueScripts;
use Core\Scripts\EnqueueStyles;

require_once('core/Autoloader.php');
Autoloader::register();

$debug = new Debug();
ThemeSetup::init();
Medias::init();
CustomizeDashboard::init();

//////////////////////////////////////////
//		CONFIG
//////////////////////////////////////////

// Define paths to folders
define ("INCLUDE_PATH", '..' . str_replace(site_url(), '', get_template_directory_uri()) . '/includes/');
define ("DIST_PATH", "/assets/dist/");

$scripts_internals_path = DIST_PATH . "js/internals/";
$styles_path = DIST_PATH . "css/";


$json = file_get_contents('wp-content/themes/wp_starter_theme/core/scripts/scriptsList.json');
$scriptsList = json_decode($json);
var_dump($scriptsList);


$jsArray = array (
	(object)array (
		handle => 'jquery',
		src => 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
		dependencies => false,
		version => null,
		footer => true,
		condition => null
	),
	(object)array (
		handle => 'main',
		src => get_template_directory_uri() . $scripts_internals_path . 'script.min.js',
		dependencies => false,
		version => null,
		footer => true,
		condition => "return is_page_template('page-templates/home-template.php');"
	)
);

$stylesArray = array (
	(object)array (
		handle => 'main',
		src => get_template_directory_uri() . $styles_path . 'styles.min.css',
		dependencies => false,
		version => null,
		footer => false,
		condition => null
	)
);

new EnqueueScripts($jsArray);
new EnqueueStyles($stylesArray);



