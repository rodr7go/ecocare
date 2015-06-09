<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ecocaremx.com');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'EmMX:<Ry.yap<U;5R-5ixR5X.X8XW{/8VmH9y+|J:0&JG6VJ5lLv4]aFB{AAsQRG');
define('SECURE_AUTH_KEY',  '0kGr-^lAA=|MML3NytfQ}*JXO;w3tPP@cvT$NyEFdMd~97Psf`OydBZf$rB@Lho[');
define('LOGGED_IN_KEY',    '+wa:Ke7.d~gs#Lx3|/UAydBz]$mSYv=g: AGbdF+jGKc@jtO7kpa4q4OG^q+q+]w');
define('NONCE_KEY',        '6:%-)N3QkN*b`l]SK^6SZjA% 5)FnI-_fzD0#!n#b,|F4<nbG6K[z_8oGwU7vL`0');
define('AUTH_SALT',        'r=.KZ}>I[|B4>7Zvb@^we5O11)pC1Y#1#F*3Su5]7W|?t*N.:Gb}&OqFks^.j3K ');
define('SECURE_AUTH_SALT', 'g9nis4B0NL;bt*7nv;^MFC#A4<jwP[g+;B/v?0Njq+&Uohl=Dy<v/>>=-wZd@TR`');
define('LOGGED_IN_SALT',   '-V/khKrT-BMxY,5k8`nG:E^|}I5H~%`#c8I1qW/WzF*Kt[_mASHZ/wck`D9~|xx*');
define('NONCE_SALT',       ' U eGwD%t j<2#)Au46-DBhS:e{ Rr@$2YA9X]$uStP7UD1xu0H5 uyl--(~55t7');

/**#@-*/

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
