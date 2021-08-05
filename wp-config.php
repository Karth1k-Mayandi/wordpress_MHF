<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mhf' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'U$vnZ-P;-+T&roRxXu ;d{EY`Mo~!/=MOZ+V p$Uhc_&pzKQKb?W$K stD! ^Lvp' );
define( 'SECURE_AUTH_KEY',  '2KKYJma>s`t+drmhm%a$H&C/%Pt5rT1+Zb>$_|/GOq]Ylgpy/~]ymFjdp`%QjasA' );
define( 'LOGGED_IN_KEY',    '8]Sn[o5N0I<D|iDy%;.sZ3xA^bW]*-J.@`uvUtf|GTMOKMg:v3XzTVvyZKwCxn|C' );
define( 'NONCE_KEY',        '|P)ZM Lu23ls|ZIp!A !n:Rm8B[gUq/zpn2ETw}u,C/DDyhYpR%lS^OF}=_=++M)' );
define( 'AUTH_SALT',        ']Ipwi;lPUhrm}ah+#ABA@O!w7T*n/u5(ZII60MYK_~eBg`Re3K,9Nyz3WL4hHwl/' );
define( 'SECURE_AUTH_SALT', '^[2h$y=iv.F1oPFwTV0<#nKswjc7/sX:;b+Ij&n}m~h(7#U:@;rg/C@.ur(/Q[,Y' );
define( 'LOGGED_IN_SALT',   ':M6!5_)|Aa`rdO?VL@+a]8l?~9cO6pRX&h[@<EBTESCFyNvN:@cr},FI};!9.R@[' );
define( 'NONCE_SALT',       'tI!B#$GN-DU(sfh%&kOeH(9x$,K*4B PMD{2qx8m-{#{Anjbp3rx$IH4Qqsw6LV~' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
