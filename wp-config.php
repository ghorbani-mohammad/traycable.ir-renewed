<?php
define( 'WP_CACHE', false );    // Added by WP Rocket.

define( 'WP_MEMORY_LIMIT', '512M' );

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
define('DB_NAME', 'traycable.ir');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'sal13883');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_persian_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'y0S:d<cGOp:=rk/$)Q+v$Mk:$m)<C{0AEfOui=<W,yc]?lptNb*|rD7|wt1(=$w#');
define('SECURE_AUTH_KEY',  'gDZ$F4J3_.yR !j`,tdR910-le}`yJ#unbw-17I1s-:Sk6+YV%D37{V|pdP?N6Qf');
define('LOGGED_IN_KEY',    '.Y@~Yi2>F@Bp|Lg0)m>69tuL@5sb/AU]:>})6r4-x.huiN8cagnB5|vHxQQd=rYS');
define('NONCE_KEY',        '6E6wTDFIA[9`PVnIaG4m(9Cde9{taV9Lu}Cg{J9@50?%VN+*66pwaJK)#|`J#0+Q');
define('AUTH_SALT',        'bWE0%G 9.*77{cb(6t+/Y,Q/j50<&+l-2`a|GFAt-.ha!ZKlJw*-8R-p80.5&r&H');
define('SECURE_AUTH_SALT', '`AWP}a[c.Kvnbe^Dv=_;Uf.@42HME_y8FK)|5bx8=[isU6+b`$seP%aa-N<yp;Q.');
define('LOGGED_IN_SALT',   ';N!0JC8/m?.gqWk?4-mKvek-s*&:lI5m$|]M0>8?Ygo/T<-7t*!|]GEvWGw!+)GD');
define('NONCE_SALT',       'zekaW|i@@nmn.P^/~z0ynoDYL UEe[-%XddTBDpdr:iw{Ko/z$pr/k+MP:f-7U+h');

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
