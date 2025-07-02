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
define( 'AUTH_KEY',          '=)B1U__+RcsT,rj_#FR0}(iyY$iR#b`.Sq)FbYTcy=PA@b<iac4lr>EjflT*LU1x' );
define( 'SECURE_AUTH_KEY',   'c>%}|mVHVGqS2*Nvm8E@|1(TRW(N17Dj%Ag^}n5[F+%LHrlrJ?i1*P+9z(oS~bPu' );
define( 'LOGGED_IN_KEY',     'd:z^0#03fkU0>/no fh5e~AP:MWv0ev;MW?598#7&,^cTJ0~M@?)KhA^a<aS_|:,' );
define( 'NONCE_KEY',         'TH:/mJ1yvm[=f1|2:98S+gy{,&K#i:vEGT}KhDyq;T_J,k$N[,H|mTK$2zOW]1G!' );
define( 'AUTH_SALT',         '36?O>I3p]soW.`m$[VWjiO0MA%:T2 sE!Q7bmP^]/{MER,yhSfa4s:((|Byi~K?M' );
define( 'SECURE_AUTH_SALT',  '=*lsrinKyz+%nMtj1A$l-J>c@/+5}T07@uYaR{ph|E~VmA>fu)G.f,kprwfd`y3o' );
define( 'LOGGED_IN_SALT',    'Q9Q&,#Gr ?!=gz&aa`:C=,M9CW* 3%z7tLdT-Kht/pvBVzGL;o_v}-KkNka#9V!O' );
define( 'NONCE_SALT',        'xr!;<0v&nJ%pbIEto.)5q<|ik=9@d0,k/L#Nh>-GG!O53cD-p%efW8g.`z#?a1;*' );
define( 'WP_CACHE_KEY_SALT', 'aGisKv34|tQrA=dGI(4bh7FruZ*tF<t,qoT([[,U@5x }jQ<,z6JCep]Sq]%/aEu' );


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
