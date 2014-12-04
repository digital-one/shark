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
define('DB_NAME', 'shark');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '-=oxR^|&w Xp|ub;eCMvAkS[#IYy?{gm+-g]|d]0nf|eA.sk>XQIvU>tyslR0TO/');
define('SECURE_AUTH_KEY',  'urzmDy(:cijqA+;!(/@#3z,h|R8!iJ%d~t!lV|Kfo -J4}oleMN~>y^uxe+ivJlb');
define('LOGGED_IN_KEY',    ')NTlb[^Ps;pJI9y;w6.%N6>|Z-qhpD{PvE|sJm,#0xm=2hRoS:r2)V`mx[~w4z+u');
define('NONCE_KEY',        'D5Q6G62m9)VOCi ptD+`u}7f+-)M+lZ)nLo-V@B&>@+aN}*9Ck+Bq=JMCp6`%DZt');
define('AUTH_SALT',        's2wfx1]%nV-Zxd0Ti4zwFYliF8I_A!NuHZR`]qQBde8x^tRv6GS-^G0: }rhv6l-');
define('SECURE_AUTH_SALT', '8Pm;>x;c-Nn6$3K)HLniss%}u$[0==,0uB|n%o+kIZ>QqDf9*h8_to@Fj-7k+5+^');
define('LOGGED_IN_SALT',   'q; :6tj>bMb-+q^m9T~%NTZ7.7am/&IiE$AIu_z~/}OZ|v$?@;_gs_ww+-f:<!M^');
define('NONCE_SALT',       'I`W#KihT<k9 qmHw4lY@zK _qg=~AL&xC3_*azfMU9,t3X!0/LnpUnns6@*PH;?n');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
