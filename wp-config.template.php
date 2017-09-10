<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */


/**
 * Set Wordpress multiples environments.
 * Each environments will have their own database connection parameters.
 * The constant "ENVIRONMENT" is accessible everywhere. Can be used to load specific scripts on a specific environment for example.	
 */

// define your environments here with the keyword present in your URL.
$environments = array(
    'dev' => 'localhost',
    'preview' => 'preview',
    'staging' => 'staging'
);

// Get server URL
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];

// Compare URL string to environments array and set one.
foreach ($environments as $key=>$val){
    
    if(strpos($url, $val)){
        define('ENVIRONMENT', $key);
    }
}

// If environment not found , set production as the default environment
if(!defined('ENVIRONMENT')) 
    define('ENVIRONMENT', 'production');

// Set database connection parameters
switch (ENVIRONMENT) {
	// dev environment
	case 'dev':
			define('DB_NAME', 'your_dev_DB_name');
			define('DB_USER', 'your_dev_DB_user');
			define('DB_PASSWORD', 'your_dev_DB_password');
			define('DB_HOST', 'your_dev_DB_host');

			define('WP_DEBUG', true);

			break;
	// preview environment
	case 'preview':
			define('DB_NAME', 'your_preview_DB_name');
			define('DB_USER', 'your_preview_DB_user');
			define('DB_PASSWORD', 'your_preview_DB_password');
			define('DB_HOST', 'your_preview_DB_host');

			define('WP_DEBUG', false);

			break;
	// staging environment
	case 'staging':
			define('DB_NAME', 'your_staging_DB_name');
			define('DB_USER', 'your_staging_DB_user');
			define('DB_PASSWORD', 'your_staging_DB_password');
			define('DB_HOST', 'your_staging_DB_host');

			define('WP_DEBUG', false);

			break;
	// production environment
	default:
			define('DB_NAME', 'your_production_DB_name');
			define('DB_USER', 'your_production_DB_user');
			define('DB_PASSWORD', 'your_production_DB_password');
			define('DB_HOST', 'your_production_DB_host');

			define('WP_DEBUG', false);

			break;
}

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

define('WP_SITEURL'	, $url);
define('WP_HOME'	, $url);

define('WP_AUTO_UPDATE_CORE', false); /* Set true for WP auto-update */



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
 define('AUTH_KEY',         'put your unique phrase here');
 define('SECURE_AUTH_KEY',  'put your unique phrase here');
 define('LOGGED_IN_KEY',    'put your unique phrase here');
 define('NONCE_KEY',        'put your unique phrase here');
 define('AUTH_SALT',        'put your unique phrase here');
 define('SECURE_AUTH_SALT', 'put your unique phrase here');
 define('LOGGED_IN_SALT',   'put your unique phrase here');
 define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_'; // Change that by your own prefix


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
