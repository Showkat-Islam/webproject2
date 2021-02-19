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
define( 'DB_NAME', 'techwvij_wp473' );

/** MySQL database username */
define( 'DB_USER', 'techwvij_wp473' );

/** MySQL database password */
define( 'DB_PASSWORD', '7Cw-s2p)SnK]5[' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'lyiaomz0rqgkbdlgwh1oieqe4fuesj80eyannu5lbq5jeylyifsajwovwpoyhtgw' );
define( 'SECURE_AUTH_KEY',  'ompjrnpggvrmd22rs1agqrylnejpcshj0wfl8zazxw7uwby815dinlkwv7seak4x' );
define( 'LOGGED_IN_KEY',    '6bl1gvsme0r7aozejr5sefjfq07hhogigcizsf8mvonsi8icab8reoxuehc5ggdf' );
define( 'NONCE_KEY',        'oky2fjjak5eymw3ncilng1vngr33xuufjdtoiqrzigrnce5xycfyvndrahw7fgh8' );
define( 'AUTH_SALT',        'mnkuol1xjz1ehe0xpufv06hubdouoaqeoifpgmjbnngqhqifd9k7ftaptr2xkj1g' );
define( 'SECURE_AUTH_SALT', 'r5rulf0jozdma5hiro5t3vkhrxgrzeehyrb6d190tkrsjubb3ketfuecrynh33v3' );
define( 'LOGGED_IN_SALT',   'zprbf8k5a6uivkibsbbrxnj1dbbjzw9gzzyrja1jfzaucvypjooob7edqtcwzzle' );
define( 'NONCE_SALT',       'whcuau4kgrumqt2nshukokl1spnqs3crpjbzlot6ulcptwhuyrqexuzbsv47f9kh' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp2tap_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
