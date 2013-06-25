<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wrd_2ogaka3mfh');

/** MySQL database username */
define('DB_USER', 'wrdWudlWo6p');

/** MySQL database password */
define('DB_PASSWORD', 'k1a8BDe5MV');

/** MySQL hostname */
define('DB_HOST', 'benjaminpeterjonesco.ipagemysql.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'DjE4AB8wBcwG9E9NU4HEiIxtVMp34oZHu5pRoPrrMtqcq4UzbbvAjiZ3GQruRwTU');
define('SECURE_AUTH_KEY',  'z4cqQCwPSmzqwwSYxoUNdCaUjr7SXdZETaUoZG3ueekJBoPHHQUa4N4IhCmWeKWk');
define('LOGGED_IN_KEY',    'b6sxDdDzHW4S8op2iHzL0uLLYnNG4HK2NQRm7evbqLMYOQJgwjPjoJ8LtNtVcssZ');
define('NONCE_KEY',        'n94YrFTfP75Pt1zwlmJszvO2VjAp7ggL8U3Gab0kKdNkl8ccVrUQK319L9tYnKze');
define('AUTH_SALT',        '6eQB0QzDEtg2apTldbE5HHCnKA5Qe4oYDprhAgzHQKBS3NW8IKQwZ9vzewWzQblx');
define('SECURE_AUTH_SALT', 'LqTuOZmfveJSKnqdaexAdluxSbtbXAHTM1btUH0Yd9CHGSk9hIwPJ1YKVSKX1yWf');
define('LOGGED_IN_SALT',   'ip3Y7v5dlXCccPPWbAxqwRSlDBptlqSNK88sNcX7Q3LqO8xsMxiTAOS2bgbh9beY');
define('NONCE_SALT',       'mEjjoimWRd6RsS5bjdAvl1nRUzDqr6DIIT2GTHqswkBfycjHd6wttX38T04N9ydX');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
