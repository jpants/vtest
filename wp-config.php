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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vtest' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Hgst|[7D}U}.071y|.:t>]Y`jf2i.%6D!4zs^[m;Nzoxwh<<k5dP tEKSqKP:#xs' );
define( 'SECURE_AUTH_KEY',  '47lmZys*K&kR+H?cc;ibZrd~^+Pj.?`4]anc^}/MG=Dt^7^j3RD,#>0AgFT??It%' );
define( 'LOGGED_IN_KEY',    '}SbePwPX$l_h.!`0P<nOT/;m2N`R7f2_n&T|4Sd%uo07-jn0|XsJtL;-`U3GeO[x' );
define( 'NONCE_KEY',        '[Qh?q:8g^8((?0l?^V=llx7v) -7E:1s?y Q_R)[Bjr^|@=U(m#@U;J0aV5%]5<h' );
define( 'AUTH_SALT',        '11iuXrOlF* 4|yHC/yted;/8wvgE#p-BcEX~XN7fWno5cOn}CVRJ4;CqvTGyU0H[' );
define( 'SECURE_AUTH_SALT', 'nl@vz?C@0Y8t~dv|hNuoSzqk,:/<,F=c5&kRKw,&|&r]x8gv$zze%$+RT^}O 8+p' );
define( 'LOGGED_IN_SALT',   'IV@<6$Q@*O)/Hv4fPGQ^sN7nuq#Ubt[x})Uu!XV:p^wR=9[~: jN%.i_$<%7l1g(' );
define( 'NONCE_SALT',       'EA;Da^Zw1rFJ6m{m8q0qFZ1+ )h>-7{)v,FwR3`M2%uH/>IcQ,!|D9&IO-Ja4;wF' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
