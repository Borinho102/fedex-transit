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

// ** Database settings - override via environment variables in Docker ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv( 'WORDPRESS_DB_NAME' ) ?: 'billing_ftdb' );

/** Database username */
define( 'DB_USER', getenv( 'WORDPRESS_DB_USER' ) ?: 'billing_ft_root' );

/** Database password */
define( 'DB_PASSWORD', getenv( 'WORDPRESS_DB_PASSWORD' ) ?: 'F-T@20.26' );

/** Database hostname */
define( 'DB_HOST', getenv( 'WORDPRESS_DB_HOST' ) ?: '193.203.169.34' );

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
define( 'AUTH_KEY',         getenv( 'WORDPRESS_AUTH_KEY' ) ?: 'gcBs12CVAs[$d%#f)vw;a/o6j?#|lZ^vOamdhcl(xCDHOP4{1!Q#C5XX:o`]-Yq<' );
define( 'SECURE_AUTH_KEY',  getenv( 'WORDPRESS_SECURE_AUTH_KEY' ) ?: 'e+T/G8hl7O@5H)V3C(3ej|)n?6xa6%WWT7t**`F3`4*>MwKXSF:os}deRrCR|$cP' );
define( 'LOGGED_IN_KEY',    getenv( 'WORDPRESS_LOGGED_IN_KEY' ) ?: 'H#[uU2a4Q^|gvlbtV;q{17yI@hA`MO4hQliS6v?~Vy0zI]}`eiJOq+UkKr}WP<vj' );
define( 'NONCE_KEY',        getenv( 'WORDPRESS_NONCE_KEY' ) ?: 'mI?Bg)TeAKp@-tgoIxh/Ib:%nAc4N7nAi:aQc&b3tz>IYsiD7?T2QH_KxUELd@A{' );
define( 'AUTH_SALT',        getenv( 'WORDPRESS_AUTH_SALT' ) ?: 'kCRp1&#.=:R4DE0/w}?QB+4qw54*6[d7I`,~zx;;!0n^l&9QAw+z ehI{!rPUhVC' );
define( 'SECURE_AUTH_SALT', getenv( 'WORDPRESS_SECURE_AUTH_SALT' ) ?: 'vSJHmiK`He b8~oPp_GEEMXU_ZE/.`{DLot*g+3YL}6]wVs}..JKJ?.cM)Fi,&b1' );
define( 'LOGGED_IN_SALT',   getenv( 'WORDPRESS_LOGGED_IN_SALT' ) ?: '@K#Q|H87^aGP%LHh<OAGh3.3axcDGWQI$sAS~}}F.jMJdy]ZBA[fwlf3slQ8-y;[' );
define( 'NONCE_SALT',       getenv( 'WORDPRESS_NONCE_SALT' ) ?: '5.{c;XWUT<Gi;}-03)Wpj.6=xWBpc_qQisepZPGp[XX?h]MTSw#yFL g~_~~/S:a' );

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
$table_prefix = getenv( 'WORDPRESS_TABLE_PREFIX' ) ?: 'fedex_';

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



define( 'SURECART_ENCRYPTION_KEY', getenv( 'SURECART_ENCRYPTION_KEY' ) ?: 'H#[uU2a4Q^|gvlbtV;q{17yI@hA`MO4hQliS6v?~Vy0zI]}`eiJOq+UkKr}WP<vj' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
