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
define( 'DB_NAME', 'i8235382_wp2' );

/** MySQL database username */
define( 'DB_USER', 'i8235382_wp2' );

/** MySQL database password */
define( 'DB_PASSWORD', 'E.0Zl8aywUynUIO4Uom41' );

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
define('AUTH_KEY',         'DC21i8lzYCy863ucYwLFpwt7PGaUKYyzMIWR5xffZIlnhykjLRxC7i4uEOp1zVDM');
define('SECURE_AUTH_KEY',  '2606Eu6k0ylhK1ekZ3spz53T2QWdUppC2A3S3D4ru7QSyVD9dWxb1soETuaiJHKI');
define('LOGGED_IN_KEY',    'wiPwPlWgeglMj8WFPA5cRwIXm2fxqGxgHsGkrkfikE3ZiNek2lQTtUfCQ3u88oIo');
define('NONCE_KEY',        'k2SfZoKEAxIY0e7DCX4ySDDy4ycDvIsVd6QbDT8Q1072qP6x6OyuuNHtlQmChVMr');
define('AUTH_SALT',        'dMH8ZcH6SuDeJaD3OZtDZCTib5LuHAZbeoxxbnL8HpPGDF2PMQs0fFToegVQX3jO');
define('SECURE_AUTH_SALT', 'jtY9CofSIRwN5SkfIKROqKie7W5jc4ubVlu4Qao2PJxnzvNb4b7jJwpjxwUGJZcS');
define('LOGGED_IN_SALT',   'DIpmusc0unnv8gFCjinUTD90NpmkScAZeR3i2w0o79LHBP7CdOWdXa54WHbzlK1u');
define('NONCE_SALT',       'XBR2fN7HJHQoJi4YbILy2kO1TxbULh7hvcrojqv0GxnE3Jrxr0oMyrDH8H46Uucj');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


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
