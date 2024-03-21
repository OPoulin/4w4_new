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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '4w4-op' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'E=VAe$#T%*DGC3)a3b -d|@PrZM#Dksv90{&_qe2f&=pK!N0&d}Vj%4<)Cg(]T=s' );
define( 'SECURE_AUTH_KEY',  'A[8_;2pI>]Ddg[Bd<@`z1gG}Mrn!-i>Z2+Xsn2y2&}QFa}4EV*Ps[P!~8+Sqj4Eu' );
define( 'LOGGED_IN_KEY',    '3b-/R3iD;XV{_Axj[qRc{aXI(Od<pPMs$R6B!TZFL{C[P?|>CUY`21XW`CS92)}<' );
define( 'NONCE_KEY',        ',J|;ikL`R-{z~<`cexL/0F{i:HVs[y,4/)zI0J. {zcaY1pa!C(tI4m.-$tq+(jx' );
define( 'AUTH_SALT',        '!e;o(]pBNaW>;N|iWFVZJPF_I2K#=*k5e61;ZdW.fzQf9zJC0Bih68wIgB~i^n5m' );
define( 'SECURE_AUTH_SALT', '{3dWRJ]o*Pr0Q=3I(B{,B/`N(G1.J7ZY= [tG}-9dz92Gtz45~F%]Flo^qq8j=tG' );
define( 'LOGGED_IN_SALT',   '[W=R9;Se!Ikn1(P}(R+_U-{1;O-<7/]X0yokn4aHWC.]LjJ`5s7&U&K)^ds?FP(p' );
define( 'NONCE_SALT',       '-k a?_N0}t?q0H5S@Pb)Z azy8w3cFgcpscOyL<(%akZ}vIb[|hKion5[v%FDn-B' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
