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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '64tM~UyZ@m/7j+~kU*CC9U1-[lQrCw:[M$qjGTP(C/eCj3^<[av_UX.33m.Eo+!Q' );
define( 'SECURE_AUTH_KEY',   ']loprOjMh~H}ZQ-11X(Yh0q^kFme]KB&Je*Urgd{p{Hb3I2>_GXZcI&^vPpw:MTW' );
define( 'LOGGED_IN_KEY',     '[7qp#E)QA2QeP</E{,2pa}UX=z}WCyC-;xDy^)g$oV8){Z)3LBs$C=W~*f[]s/,t' );
define( 'NONCE_KEY',         'wSdw<A.s1,sR3d<|=1baKqXhhyPA9F =wFu6*W?{:~&yKze,i[:U0g<gV ~PbeFU' );
define( 'AUTH_SALT',         'C;v5g+@_K.eb+v/H>Qo5O<wvL}(i!]V?08#/<8E)mz4_^ZGwtH7:uNC!MbsWtcDD' );
define( 'SECURE_AUTH_SALT',  'pTtLONns[Fk>7 xj`J[Ruto0:uRyqOV]g8!Q<u,A9T`+6CtbEtwr}VJDXR8$aeC^' );
define( 'LOGGED_IN_SALT',    'hyKF5m&^a8b{stol7`K4=#W2M^z5);#EwJ!dC-9?]^wkm&*t;Mm7+Tn2|PI.U^`(' );
define( 'NONCE_SALT',        'By>Zs_CCxj5Rj`S<3kNAYA$[A4TE4b-|{4SZQb2^6f.a<RQCd:]? ZC:1A0tCn;|' );
define( 'WP_CACHE_KEY_SALT', 'VGne`(];n7(^</]Mz@!wo-{:IM) =Ae_2/_+~4NNVjN[woLr7?@ZWz^(?DSFd:9g' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
