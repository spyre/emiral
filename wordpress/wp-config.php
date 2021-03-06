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
define('DB_NAME', 'wp2');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1234');

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
define('AUTH_KEY',         '>P>}`5^fQ&${/EN+I&iAWEZ~/K%avAsy EH_S[_?d?%L}rkxrv%^7*VANWC&Upyk');
define('SECURE_AUTH_KEY',  'IvT7L[j7A{Fo3za}jZQO|R+QkxIAc%+8TvpJy%0@+pf0z4i YhP0wchU1xdZ?1rC');
define('LOGGED_IN_KEY',    '77J57O#_`[^G9t*vtqM7K9BKZ5CD6V<mYYvsHKXp>.V fYK?W~Zpr`o@ NmT9_+8');
define('NONCE_KEY',        'Lz,Cip~H}(HF#D&.&MkW(/l+NG:`;Mfz[_+4h?oc:-TN$(L]|C/l[ih_@# x3,Tv');
define('AUTH_SALT',        '3m7?_H]$lgpdt?_~(4ONMaaND4ibjr<K#mKiYv1SQ+k6[nNpUf M2Oo2b2hN1;g^');
define('SECURE_AUTH_SALT', ':2Yx>p]Ap;p5V8N+?>f.}cs{kfvW2KM%sXFyj}/[3ogGpZ8cJwioC7A3myJp|D`a');
define('LOGGED_IN_SALT',   '@z1[//.bC7@Nt45*{M?Av;SV3^yi2)S9m`#x*[>%/?{16nEaftlMjzq05=jWtfKG');
define('NONCE_SALT',       've4`Vq9WC7PU$|`UpO#5Ly^./fJ~%XMT!6Un1@367i@r65sm9ZWCO@()W>;3gTJh');

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
