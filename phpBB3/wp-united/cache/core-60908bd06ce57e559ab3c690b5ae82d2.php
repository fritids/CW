<?php

 if(!defined('IN_PHPBB')){exit();}

?><?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define('DB_NAME', 'cwtest_');

/** MySQL database username */
define('DB_USER', 'cwmysqluser');

/** MySQL database password */
define('DB_PASSWORD', 'RIB86wap#GLYPH');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Qhmv3M)uqX?^lr^WVtmc-Sq{(p}KS#(_JYJ3]G<sWGO89JrSg8HZR;jO@}6u&@;B');
define('SECURE_AUTH_KEY',  '4&UN;}?oJBSLDxfb)Xi~u9znb-Us^};$,9CyV+S$XHQNk7hKv)i|uN-):cm-#@eD');
define('LOGGED_IN_KEY',    ')n|*+tj;3|22pgDo^nkxF@Fl|w{K`H=L(<rZz8wjld:C*Nu gFAc@ohZM[4s/9B&');
define('NONCE_KEY',        'ijon0Iy8V<oO?QfU p:#w/_W1<|7d6,a@L+Isd6f-3kQv4ZXy-]>g7ax+y:d{y9K');
define('AUTH_SALT',        '{1x5=0uTLw:|,+bIE?=-?xsiQl9)}o-LwXw(!5<S^F5e >}-G-r9{y]f7ef7VV1m');
define('SECURE_AUTH_SALT', '5dFU?enc5iY(6!ABFJ>>8,c& d f2-3tLt=Llj|:$)TF|8u=h*,*[!Qa<<9L+qwz');
define('LOGGED_IN_SALT',   '2$}_&aLz01E>_gZfNS8tu-y{1re>0nsIrP>L#M3zp7ljl0j6*b(8Gy@<iy7 RX6&');
define('NONCE_SALT',       'h;nEQ -OF2^:d39?d%WYRYeR/e!)yRv-6a%g&M-#{>jyiLWkg3vD^C_7+YFd`JUA');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cw_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);
define('WP_MEMORY_LIMIT', '120M');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
?><?php
/**
 * Used to set up and fix common variables and include
 * the WordPress procedural and class library.
 *
 * Allows for some configuration in wp-config.php (see default-constants.php)
 *
 * @package WordPress
 */

/**
 * Stores the location of the WordPress directory of functions, classes, and core content.
 *
 * @since 1.0.0
 */
define( 'WPINC', 'wp-includes' );

// Include files required for initialization.
require( ABSPATH . WPINC . '/load.php' );
require( ABSPATH . WPINC . '/default-constants.php' );
require( ABSPATH . WPINC . '/version.php' );

// Set initial default constants including WP_MEMORY_LIMIT, WP_DEBUG, WP_CONTENT_DIR and WP_CACHE.
wp_initial_constants( );

// Disable magic quotes at runtime. Magic quotes are added using wpdb later in wp-settings.php.
set_magic_quotes_runtime( 0 );
@ini_set( 'magic_quotes_sybase', 0 );

// Set default timezone in PHP 5.
if ( function_exists( 'date_default_timezone_set' ) )
	date_default_timezone_set( 'UTC' );

// Turn register_globals off.
wp_unregister_GLOBALS();

// Ensure these global variables do not exist so they do not interfere with WordPress.
unset( $wp_filter, $cache_lastcommentmodified );

// Standardize $_SERVER variables across setups.
wp_fix_server_vars();

// Check for the required PHP version and for the MySQL extension or a database drop-in.
wp_check_php_mysql_versions();

// Check if we have recieved a request due to missing favicon.ico
wp_favicon_request();

// Check if we're in maintenance mode.
wp_maintenance();

// Start loading timer.
timer_start();

// Check if we're in WP_DEBUG mode.
wp_debug_mode();

// For an advanced caching plugin to use. Uses a static drop-in because you would only want one.
if ( WP_CACHE )
	WP_DEBUG ? include( WP_CONTENT_DIR . '/advanced-cache.php' ) : @include( WP_CONTENT_DIR . '/advanced-cache.php' );

// Define WP_LANG_DIR if not set.
wp_set_lang_dir();

// Load early WordPress files.
require( ABSPATH . WPINC . '/compat.php' );
require( ABSPATH . WPINC . '/functions.php' );
require( ABSPATH . WPINC . '/class-wp.php' );
require( ABSPATH . WPINC . '/class-wp-error.php' );
require( ABSPATH . WPINC . '/plugin.php' );

// Include the wpdb class and, if present, a db.php database drop-in.
require_wp_db();

// Set the database table prefix and the format specifiers for database table columns.
wp_set_wpdb_vars();

// Start the WordPress object cache, or an external object cache if the drop-in is present.
wp_start_object_cache();

// Load early WordPress files.
require( ABSPATH . WPINC . '/default-filters.php' );
require( ABSPATH . WPINC . '/pomo/mo.php' );

// Initialize multisite if enabled.
if ( is_multisite() ) {
	require( ABSPATH . WPINC . '/ms-blogs.php' );
	require( ABSPATH . WPINC . '/ms-settings.php' );
} elseif ( ! defined( 'MULTISITE' ) ) {
	define( 'MULTISITE', false );
}

// Stop most of WordPress from being loaded if we just want the basics.
if ( SHORTINIT )
	return false;

// Load the l18n library.
require( ABSPATH . WPINC . '/l10n.php' );

// Run the installer if WordPress is not installed.
wp_not_installed();

// Load most of WordPress.
require( ABSPATH . WPINC . '/class-wp-walker.php' );
require( ABSPATH . WPINC . '/class-wp-ajax-response.php' );
require( ABSPATH . WPINC . '/formatting.php' );
require( ABSPATH . WPINC . '/capabilities.php' );
require( ABSPATH . WPINC . '/query.php' );
require( ABSPATH . WPINC . '/theme.php' );
require( ABSPATH . WPINC . '/user.php' );
require( ABSPATH . WPINC . '/meta.php' );
require( ABSPATH . WPINC . '/general-template.php' );
require( ABSPATH . WPINC . '/link-template.php' );
require( ABSPATH . WPINC . '/author-template.php' );
require( ABSPATH . WPINC . '/post.php' );
require( ABSPATH . WPINC . '/post-template.php' );
require( ABSPATH . WPINC . '/category.php' );
require( ABSPATH . WPINC . '/category-template.php' );
require( ABSPATH . WPINC . '/comment.php' );
require( ABSPATH . WPINC . '/comment-template.php' );
require( ABSPATH . WPINC . '/rewrite.php' );
require( ABSPATH . WPINC . '/feed.php' );
require( ABSPATH . WPINC . '/bookmark.php' );
require( ABSPATH . WPINC . '/bookmark-template.php' );
require( ABSPATH . WPINC . '/kses.php' );
require( ABSPATH . WPINC . '/cron.php' );
require( ABSPATH . WPINC . '/deprecated.php' );
require( ABSPATH . WPINC . '/script-loader.php' );
require( ABSPATH . WPINC . '/taxonomy.php' );
require( ABSPATH . WPINC . '/update.php' );
require( ABSPATH . WPINC . '/canonical.php' );
require( ABSPATH . WPINC . '/shortcodes.php' );
require( ABSPATH . WPINC . '/media.php' );
require( ABSPATH . WPINC . '/http.php' );
require( ABSPATH . WPINC . '/class-http.php' );
require( ABSPATH . WPINC . '/widgets.php' );
require( ABSPATH . WPINC . '/nav-menu.php' );
require( ABSPATH . WPINC . '/nav-menu-template.php' );
require( ABSPATH . WPINC . '/admin-bar.php' );

// Load multisite-specific files.
if ( is_multisite() ) {
	require( ABSPATH . WPINC . '/ms-functions.php' );
	require( ABSPATH . WPINC . '/ms-default-filters.php' );
	require( ABSPATH . WPINC . '/ms-deprecated.php' );
}

// Define constants that rely on the API to obtain the default value.
// Define must-use plugin directory constants, which may be overridden in the sunrise.php drop-in.
wp_plugin_directory_constants( );

// Load must-use plugins.
foreach ( wp_get_mu_plugins() as $mu_plugin ) {
	include_once( $mu_plugin );
}
unset( $mu_plugin );

// Load network activated plugins.
if ( is_multisite() ) {
	foreach( wp_get_active_network_plugins() as $network_plugin ) {
		include_once( $network_plugin );
	}
	unset( $network_plugin );
}

do_action( 'muplugins_loaded' );

if ( is_multisite() )
	ms_cookie_constants(  );

// Define constants after multisite is loaded. Cookie-related constants may be overridden in ms_network_cookies().
wp_cookie_constants( );

// Define and enforce our SSL constants
wp_ssl_constants( );

// Create common globals.
require( ABSPATH . WPINC . '/vars.php' );

// Make taxonomies and posts available to plugins and themes.
// @plugin authors: warning: these get registered again on the init hook.
create_initial_taxonomies();
create_initial_post_types();

// Register the default theme directory root
register_theme_directory( get_theme_root() );

// Load active plugins.
foreach ( wp_get_active_and_valid_plugins() as $plugin )
	include_once( $plugin );
unset( $plugin );

// Load pluggable functions.
require( ABSPATH . WPINC . '/pluggable.php' );
require( ABSPATH . WPINC . '/pluggable-deprecated.php' );

// Set internal encoding.
wp_set_internal_encoding();

// Run wp_cache_postload() if object cache is enabled and the function exists.
if ( WP_CACHE && function_exists( 'wp_cache_postload' ) )
	wp_cache_postload();

do_action( 'plugins_loaded' );

// Define constants which affect functionality if not already defined.
wp_functionality_constants( );

// Add magic quotes and set up $_REQUEST ( $_GET + $_POST )
wp_magic_quotes();

do_action( 'sanitize_comment_cookies' );

/**
 * WordPress Query object
 * @global object $wp_the_query
 * @since 2.0.0
 */
$GLOBALS['wp_the_query'] =& new WP_Query();

/**
 * Holds the reference to @see $wp_the_query
 * Use this global for WordPress queries
 * @global object $wp_query
 * @since 1.5.0
 */
$GLOBALS['wp_query'] =& $GLOBALS['wp_the_query'];

/**
 * Holds the WordPress Rewrite object for creating pretty URLs
 * @global object $wp_rewrite
 * @since 1.5.0
 */
$GLOBALS['wp_rewrite'] =& new WP_Rewrite();

/**
 * WordPress Object
 * @global object $wp
 * @since 2.0.0
 */
$GLOBALS['wp'] =& new WP();

/**
 * WordPress Widget Factory Object
 * @global object $wp_widget_factory
 * @since 2.8.0
 */
$GLOBALS['wp_widget_factory'] =& new WP_Widget_Factory();

do_action( 'setup_theme' );

// Define the template related constants.
wp_templating_constants(  );

// Load the default text localization domain.
load_default_textdomain();

// Find the blog locale.
$locale = get_locale();
$locale_file = WP_LANG_DIR . "/$locale.php";
if ( is_readable( $locale_file ) )
	require( $locale_file );
unset($locale_file);

// Pull in locale data after loading text domain.
require( ABSPATH . WPINC . '/locale.php' );

/**
 * WordPress Locale object for loading locale domain date and various strings.
 * @global object $wp_locale
 * @since 2.1.0
 */
$GLOBALS['wp_locale'] =& new WP_Locale();

// Load the functions for the active theme, for both parent and child theme if applicable.
if ( TEMPLATEPATH !== STYLESHEETPATH && file_exists( STYLESHEETPATH . '/functions.php' ) )
	include( STYLESHEETPATH . '/functions.php' );
if ( file_exists( TEMPLATEPATH . '/functions.php' ) )
	include( TEMPLATEPATH . '/functions.php' );

do_action( 'after_setup_theme' );

// Load any template functions the theme supports.
require_if_theme_supports( 'post-thumbnails', ABSPATH . WPINC . '/post-thumbnail-template.php' );

register_shutdown_function( 'shutdown_action_hook' );

// Set up current user.
$GLOBALS['wp']->init();

/**
 * Most of WP is loaded at this stage, and the user is authenticated. WP continues
 * to load on the init hook that follows (e.g. widgets), and many plugins instantiate
 * themselves on it for all sorts of reasons (e.g. they need a user, a taxonomy, etc.).
 *
 * If you wish to plug an action once WP is loaded, use the wp_loaded hook below.
 */
do_action( 'init' );

// Check site status
if ( is_multisite() ) {
	if ( true !== ( $file = ms_site_check() ) ) {
		require( $file );
		die();
	}
	unset($file);
}

/**
 * This hook is fired once WP, all plugins, and the theme are fully loaded and instantiated.
 *
 * AJAX requests should use wp-admin/admin-ajax.php. admin-ajax.php can handle requests for
 * users not logged in.
 *
 * @link http://codex.wordpress.org/AJAX_in_Plugins
 *
 * @since 3.0.0
 */
do_action('wp_loaded');
?><?php  // (ABSPATH . 'wp-settings.php');<?php 

?>