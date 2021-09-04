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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', '$Mhm0139089' );

/** MySQL hostname */
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
define('AUTH_KEY',         '~8w+p%+,>:E%rh~}wN*oEO/(|9[*tS*WO#>C~Dn$VT#Sx}mY:do}4hU~BLcI$Hb.');
define('SECURE_AUTH_KEY',  'r5DNxUMUMv23-?d=~;>|}CYL*]xYGMbUZ{>nu~kWBT#U]z:fok>6/F?xMn@9]m,Y');
define('LOGGED_IN_KEY',    '1Iv)r3;$M|y$alu$S{?/{(+yY/Ob7Y:Qc$X%GUdw|I[=HR(jX<:VMu-zaNCj.o(F');
define('NONCE_KEY',        'a?nw.dEm]r:X]O>W)Yt`|nw[]TT1]wVwKlUre0 4(*H@vHI 1Myqe1sWt}3]|f`8');
define('AUTH_SALT',        '/+kC|k?Z!vervnj@D=j==NYq,Mo9Bf!q62GaX,,EN+C7l>.FY.<n[1=ZHB&IVM&f');
define('SECURE_AUTH_SALT', 'jM+_+]8r#|Y%z>|*<kz!!`w!#y]a-lS<X&[j--VC;Mq@7X+]oN>NI|O^1/y/C%c~');
define('LOGGED_IN_SALT',   'DZ,vs-v@*=+MJ+(NDhTk>_5bb$,on<#zON=+wi!0nTjQ}!-Y&h?=-x9rUMl&[3~1');
define('NONCE_SALT',       '>@h/ _Dge?b[Uzcx2MO$%o#(!1J.|}_WhSJOD~Y>>tvB#F@p;nxVjLdF-q>.Ux+j');
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
