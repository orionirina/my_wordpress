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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'my_wordpress' );

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
define( 'AUTH_KEY',         'r+@?f@v%U)~*iZ21E$J68I+`qIPo|r*]RTmnPKghh)N5$c>NWX1J-v-|xOBcw}pC' );
define( 'SECURE_AUTH_KEY',  ')=Vb3)Fx?SId&IPu?3D)K?|%VC@Vk8+FOj&=1.vA)890t-_D)TO|mFeG+NTF&<NB' );
define( 'LOGGED_IN_KEY',    '_f*)s:Guj,vu$v.=.LWF5 ubD?y}`vvydb1YN>}@g5c/Ayp4o]|jO&_A .NdLDh7' );
define( 'NONCE_KEY',        'LEj29UB[t.3fLjN;Nb_a]MnWD|55w(;TKi).SCd6GFpBk$}%b)PmtbLmO{dh5QFx' );
define( 'AUTH_SALT',        '@^o1u(R=}5>SqqT#,19Y+#cx;CW%#,aK~G9Y4YlrNVU2}6zr9Le,2IR+Tx/poc.B' );
define( 'SECURE_AUTH_SALT', 'MYa?=sK&+g;5Z;>Z%Qn]F?abfpLb2*}Aes_i$RGhA6B}!LdJ.#x5`8F-Xt>Pbkq]' );
define( 'LOGGED_IN_SALT',   'Kr_t/Ix@W3qYaMJ;JnqHt1i-9>VFr@eS&Q9~5:(J`PWDZl.2c~^YyJ[]rNwo84-w' );
define( 'NONCE_SALT',       'yjP^sT+ :6${DJRdG@&CyHHaua4+aYLclan`B{dFxyLN,~O)v::kfq;c.^^j8JI(' );

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

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
