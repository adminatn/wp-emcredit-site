<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

//Using environment variables for memory limits
//$wp_memory_limit = (getenv('WP_MEMORY_LIMIT') && preg_match("/^[0-9]+M$/", getenv('WP_MEMORY_LIMIT'))) ? getenv('WP_MEMORY_LIMIT') : '128M';
//$wp_max_memory_limit = (getenv('WP_MAX_MEMORY_LIMIT') && preg_match("/^[0-9]+M$/", getenv('WP_MAX_MEMORY_LIMIT'))) ? getenv('WP_MAX_MEMORY_LIMIT') : '256M';
//** General WordPress memory limit for PHP scripts*/
//define('WP_MEMORY_LIMIT', $wp_memory_limit );

/** WordPress memory limit for Admin panel scripts */
//define('WP_MAX_MEMORY_LIMIT', $wp_max_memory_limit );



//Using environment variables for DB connection information

// ** Database settings - You can get this info from your web host ** //
//$connectstr_dbhost = getenv('DATABASE_HOST');
//$connectstr_dbname = getenv('DATABASE_NAME');
//$connectstr_dbusername = getenv('DATABASE_USERNAME');
//$connectstr_dbpassword = getenv('DATABASE_PASSWORD');

// Using managed identity to fetch MySQL access token
//if (strtolower(getenv('ENABLE_MYSQL_MANAGED_IDENTITY')) === 'true') {
//	try {
//		require_once(ABSPATH . 'class_entra_database_token_utility.php');
//		if (strtolower(getenv('CACHE_MYSQL_ACCESS_TOKEN')) !== 'true') {
//			$connectstr_dbpassword = EntraID_Database_Token_Utilities::getAccessToken();
//		} else {
//			$connectstr_dbpassword = EntraID_Database_Token_Utilities::getOrUpdateAccessTokenFromCache();
//		}
//	} catch (Exception $e) {
//		// An empty string displays a 502 HTTP error page rather than a database connection error page. So, using a dummy string instead.
//		$connectstr_dbpassword = '<dummy-value>';
//		error_log($e->getMessage());
//	}
//}

define( 'DB_NAME', 'wpemcredit_1b503da583_database' );

/** Database username */
define( 'DB_USER', 'xjgjsqltwjatn' );

/** Database password */
define( 'DB_PASSWORD', 'Emcreditatn@2025!' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

$servername = "localhost:3306";
$username = "xjgjsqltwjatn";
$password = "Emcreditatn@2025!";

// Create connection
$mysql_sslconnect = new mysqli($servername, $username, $password);

/** Enabling support for connecting external MYSQL over SSL*/
//$mysql_sslconnect = (getenv('DB_SSL_CONNECTION')) ? getenv('DB_SSL_CONNECTION') : 'true';
//if (strtolower($mysql_sslconnect) != 'false' && !is_numeric(strpos($connectstr_dbhost, "127.0.0.1:3306")) && !is_numeric(strpos(strtolower($connectstr_dbhost), "localhost:3306"))) {
//	define('MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL);
//}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 * You can change these at any point in time to invalidate all existing cookies.This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
	$_SERVER['HTTPS'] = 'on';

$http_protocol='http://';
if (!preg_match("/^localhost(:[0-9])*/", $_SERVER['HTTP_HOST']) && !preg_match("/^127\.0\.0\.1(:[0-9])*/", $_SERVER['HTTP_HOST'])) {
	$http_protocol='https://';
}

//Relative URLs for swapping across app service deployment slots
//define('WP_HOME', $http_protocol . $_SERVER['HTTP_HOST']);
define('WP_HOME', $http_protocol . 'localhost:8085/wp-emcredit-site/');
//define('WP_SITEURL', 'http://' . 'localhost:8085/');
define('WP_CONTENT_URL', '/wp-emcredit-site/wp-content');
//define('DOMAIN_CURRENT_SITE', $_SERVER['HTTP_HOST']);
//define('DOMAIN_CURRENT_SITE', 'http://localhost:8085/wp-emcredit-site/');

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
