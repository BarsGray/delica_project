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
define( 'DB_NAME', 'aspectvrn_delica' );

/** Database username */
define( 'DB_USER', 'aspectvrn_delica' );

/** Database password */
define( 'DB_PASSWORD', 'u9h18QJ9' );

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
define( 'AUTH_KEY',         'V|%_C<Zn:z)*iM5G#{n^:_:K6X}/lAPsI0~-UD:jzoe=pN3$FmukoZLoy<V^IfnT' );
define( 'SECURE_AUTH_KEY',  'dka$^zaN,_p.6m7DYKNA*h5A8N{w0J]Sc@UP)AK*PcY}B$Tl2]gCZSSGZ5z$CIdw' );
define( 'LOGGED_IN_KEY',    'nnse_eyc]Ia:1upkao8<}x7V67UlCYiCM)&Q$M%k|hy~_@iFR]/Jj@Z+MO_P7^J{' );
define( 'NONCE_KEY',        '2J a%g0 z/?([7Jzs+!L+!mTA85Q0W-#^8x/.~x[L+V|=#yAR-laH>bf00ZgxtX|' );
define( 'AUTH_SALT',        'O(,jnmO6La0+C0qW~-]3qi|bGiF/4b5e<SRHG|KCQ_)[pY_+gC;gDj2I))6BJ5xj' );
define( 'SECURE_AUTH_SALT', 'b6dY8ly6)4a}#>sH5]QMcqvUOLeXWS4B()|0}A72jR?a$7qQPTI`LzRa nnvOvs~' );
define( 'LOGGED_IN_SALT',   '~$j&;50lu=-7ZD;s[dCt5=8?MoUrRm|X81k)fb18/BlWv9$FVAngj8S/[asG~<]q' );
define( 'NONCE_SALT',       '-]21lBf,hw(v-C^J]7,VUK1fu822IfwmOj0~-cVDVj>TipM|gV.$~f#^ q/>}:3[' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
