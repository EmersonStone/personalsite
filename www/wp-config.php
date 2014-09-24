<?php
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
 
 
 // server/config stuff adapted from http://wordpress.stackexchange.com/questions/52682/best-practice-for-versioning-wp-config-php
 
 /**
 * Define type of server
 *
 * Depending on the type other stuff can be configured
 * Note: Define them all, don't skip one if other is already defined
 */

define('CONFIG_PATH', dirname(ABSPATH)); // cache it for multiple use

// search for config files both in this directory and in parent directory (outside of web server document root)
define(
	'WP_LOCAL_CONFIG', 
		file_exists(CONFIG_PATH . '/config-local.php') ? CONFIG_PATH . '/config-local.php' : 
			(file_exists(CONFIG_PATH . '/../config-local.php') ? CONFIG_PATH . '/../config-local.php' : FALSE)
);
define(
	'WP_DEV_CONFIG',
		file_exists(CONFIG_PATH . '/config-dev.php') ? CONFIG_PATH . '/config-dev.php' :
			(file_exists(CONFIG_PATH . '/../config-dev.php') ? CONFIG_PATH . '/../config-dev.php' : FALSE)
);
define(
	'WP_STAGING_CONFIG',
	file_exists(CONFIG_PATH . '/config-staging.php') ? CONFIG_PATH . '/config-staging.php' :
		(file_exists(CONFIG_PATH . '/../config-staging.php') ? CONFIG_PATH . '/../config-staging.php' : FALSE)
);
define(
	'WP_PRODUCTION_CONFIG',
	file_exists(CONFIG_PATH . '/config-production.php') ? CONFIG_PATH . '/config-production.php' :
		(file_exists(CONFIG_PATH . '/../config-production.php') ? CONFIG_PATH . '/../config-production.php' : FALSE)
);

// Set home & site url.
define('WP_SITEURL', 'http://'.$_SERVER['SERVER_NAME'].'/wordpress');
define('WP_HOME',    'http://'.$_SERVER['SERVER_NAME']);

// Tell WP where wp-content is.
define('WP_CONTENT_DIR', $_SERVER['DOCUMENT_ROOT'].'/wp-content');
define('WP_CONTENT_URL', 'http://'.$_SERVER['SERVER_NAME'].'/wp-content');

// Define our default theme.
//define('WP_DEFAULT_THEME', '');

/**
* Load environment-specific config.
*/

if (WP_LOCAL_CONFIG)
	require WP_LOCAL_CONFIG;
else if (WP_DEV_CONFIG)
	require WP_DEV_CONFIG;
else if (WP_STAGING_CONFIG)
	require WP_STAGING_CONFIG;
else if (WP_PRODUCTION_CONFIG)
	require WP_PRODUCTION_CONFIG;


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
if (!defined('AUTH_KEY'))
	define('AUTH_KEY',         ':s%`C_fSJBS6xVF|%rWB|=R9(_cSGlG/0^`)VM>Sz%};{Y+C0Z0XrbKIM;JJ~IB|');
if (!defined('SECURE_AUTH_KEY'))
	define('SECURE_AUTH_KEY',  '_t#KN+A@cFvswTe|X>iV}~, eF}-#1,8F=JZ(KS8b*,ot/+hbC7]a*%UP!aW--Ut');
if (!defined('LOGGED_IN_KEY'))
	define('LOGGED_IN_KEY',    'G[)/h_R V@k~H!!(oC#La2DtxZNsn+~vL2lOiGk.HWsJ,=XXh?T!xWmp!:3^lkaP');
if (!defined('NONCE_KEY'))
	define('NONCE_KEY',        'pqzW349yHPo *hwYAKIOj{4)F1|{#.Ry)`ap8s@2-Y0V5$?!,-]%f/zG<nF>!e.u');
if (!defined('AUTH_SALT'))
	define('AUTH_SALT',        'v7k*~]]* OY#O?IfFI-Faj_/U,n<^`N!|Mns1nSy&s:Rn`nhC:S)~+T(){TAD75~');
if (!defined('SECURE_AUTH_SALT'))
	define('SECURE_AUTH_SALT', '@|a$5!(+%^(ijT%&~hk_`q-<:f]lK%d]YFw ,iS$4f#3~#KRqo-|3qHDyI,/Fdrf');
if (!defined('LOGGED_IN_SALT'))
	define('LOGGED_IN_SALT',   ',<6D#IZHHLTl$r{)v|#d/],H&%z!><}#N~j]fb5u@_<C-+x<hc9Oii@Mv$M;@;dn');
if (!defined('NONCE_SALT'))
	define('NONCE_SALT',       'tO@|%9^48Uf`&|e@g=%A{9f{Eg.gZ~<)*l:u#*DU({h>1P~g-JtgG,,9#EB<mPc}');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
if (empty($table_prefix)) {
	$table_prefix  = 'wp_';
}


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
if (WP_LOCAL_CONFIG || WP_DEV_CONFIG) {
	define('WP_DEBUG', true);
}
else {
	define('WP_DEBUG', false);
}


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
