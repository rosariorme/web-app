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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'WPCACHEHOME', '' ); //Added by WP-Cache Manager
define('WP_CACHE', false); //Added by WP-Cache Manager
define('DB_NAME', 'emil_ayuzov2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '|7oNZgUA3*_ZNv1JK75qp2LsCFg-MHyaW(EFTD81P!>)DO6=ClN-6mG\`!7pn\`GxH1A/EQ');
define('SECURE_AUTH_KEY',  'V/QI@BlC*!\`w@8/0e>A!3j;OX@|IVZ-Ia$$8M)aX!;FgP54_4;43a?xQPr;jNb>Tno');
define('LOGGED_IN_KEY',    'ySM5?q<</gQolObd97^upmp>zkk-@l:piOSkHjzkl_Q4)8?Pm6bThbTE=JFO^6|Kbc39=lj=JlaB6$q');
define('NONCE_KEY',        'i|NSS8dH/D_Z)fiOoo<0Tqum__CzCUzGPDd//GfZ3=Xg:q4AiQp!bTqnuggfcHV?tPc$ITqziZ=FWriuF0q:-/');
define('AUTH_SALT',        'fvc~vs2lU@;5P5Q5@|)6nQ!<R:w6n5G;s8>F5n=s@NbiqgW1FL46:WBvMA5zPr*lQoBK1u@_~t~gHKb');
define('SECURE_AUTH_SALT', 'p|Xv4^A~(/tlkKdXIo8Nsc|B!V4E\`\`tIg>YK/C//AQ\`PwufrWPeoH@UR*9-Tj@biy\`HW$Ptqm');
define('LOGGED_IN_SALT',   '_C:TdH1T@GmSBf<<jjej<Ms6!IgZ\`(DKY_9iV2lKZ6!_94#4HN5W!b5KHD6R=#m*iWT=@VP(uvsMVu*Nnk1q*>O');
define('NONCE_SALT',       'B|Mfj1tnowUKNRQT^)!\`eU)\`zfRZGns:gYyG0kCgM3<frANMH9w<ytERQ3YTJb;M?QPg\`-j;T?2Fht0O~wU6PCN|');

/**#@-*/
define('AUTOSAVE_INTERVAL', 600 );
define('WP_POST_REVISIONS', 1);
define( 'WP_CRON_LOCK_TIMEOUT', 120 );
define( 'WP_AUTO_UPDATE_CORE', true );
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
//add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'auto_update_theme', '__return_true' );
