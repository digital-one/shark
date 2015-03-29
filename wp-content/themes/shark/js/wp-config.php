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
define('DB_NAME', 'db202866_kempstonparkes');

/** MySQL database username */
define('DB_USER', 'db202866');

/** MySQL database password */
define('DB_PASSWORD', 'Kempston123@');

/** MySQL hostname */
define('DB_HOST', 'external-db.s202866.gridserver.com');

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
define('AUTH_KEY',         '(x/rW5hM++.-}!t<(7fFW/;%Iwtg Nt$??|v[*]:<^)p3scqch9gr;h1FjY:i,d5');
define('SECURE_AUTH_KEY',  '_Fxnj@nE|?rnW,qf{XTnF*F:1Uh%zu2Ff6A=u]M56 tk@pljnt2,E,8,pw)+P2Ly');
define('LOGGED_IN_KEY',    'q/}-aF6]?H-_}#PMI|t7s,H:;H!})`iD.F=?~M]ih||g!aEt[(ta(EP~+d./^8Ht');
define('NONCE_KEY',        'Fd<*.v^+c~ZZx:#F)?U6@(zj?JZO|%t+27R.!1VW*::okr-aQL%;37PH*o]%n`jw');
define('AUTH_SALT',        'MPval|BAjGrI*Ys]+;Wn&)t9-/E~0WEg^+zd>FZu}Kc:~hj+s)?#(7 !@?BO]<@w');
define('SECURE_AUTH_SALT', 'DJId|)|~{OM{FK-|D+2|E<g<Itf$FxTM+:>c,tK&GA:9]jtR/_)V]`%+ObrxU -E');
define('LOGGED_IN_SALT',   '~$(;L|AO^I`)-_:[EMT(rJoxqG?1`TP=1Vz,;(+c|!ukj;|5oyB%^rQ7tpnfzoXr');
define('NONCE_SALT',       'Itfnu0:&`G~egaX^+406~M*D!6TI|V49<xS&&WQ]|GT_9xv?aY;eTjAldWWf*-WR');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
