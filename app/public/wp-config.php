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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ggqcGcjtxLhZOEqsmuLggDEXKixzPaGEFgFM/F90fxgdE37Wio16B53u6hHRtmhBk2jco+VeaXawGRUkKEYlTg==');
define('SECURE_AUTH_KEY',  'YDq568cKYcSoymtxKkK93Fa29iFfYqI+nJJIhn3y/Qo7HkyJ3CGpjy1vhS6RtCOIM8CZC5vXBt1gq7SzGaokXA==');
define('LOGGED_IN_KEY',    'UvK0ioPujlQsfRDB/Z3WZbF7lRvYJGf423hUPP27DBFFtFSqPjs9PQzzLRmLqR3+uScPnQ+1V19PrZ0K/hc5Zg==');
define('NONCE_KEY',        'DbOzd2GxT5DdlNROt/nnjT9B9EGuhzaoz+ruu51HD5QyfHDO4qVIFSLwg6dDl3Ncpk9gl/vt/dyl0tdo3xrZCw==');
define('AUTH_SALT',        'TtKank3/vXfUnVeuqu0Dy1l8QRzIVcf6lRy0eFAmoVSz0+y8+bQUG+aoY/bpreG5+mmBVFcTAXJc4BRkU0maIA==');
define('SECURE_AUTH_SALT', 'G059vMFyXmlOoFLo9OR9MDIAbGEQVs1qAp5n68CTNS9G+4SXChJy0HI1iq1mrhEA8F460foUKYvo5ezUuuXmkQ==');
define('LOGGED_IN_SALT',   '3OxJWyAE253qNp+iNJ+9cnyxyFUY5PTsjEtflx2Dl7vkmeo3gHcaPS7zTwwBU2NqZJaGip3rJH72Uo88qbepuw==');
define('NONCE_SALT',       'wui7fxW4QCznmeO+l30Z0min6rHdoCj3Lm5c9X05Rji/pcDqUeo+ZPR/tJUDVflmxxwJonjinmFKTNM9TwLV/g==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
