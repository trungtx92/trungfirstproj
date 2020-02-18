<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_5kzup' );

/** MySQL database username */
define( 'DB_USER', 'trungtx92' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Chungtrung1!!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define('AUTH_KEY', '_V[u1G8p6j+*q77yW|P[i;BN*0J(iO0:+mB/3Q@Dd1DumD_d@NW~@!*nDC75x(k@');
define('SECURE_AUTH_KEY', '_|Vem0CE8/:2@2L4IQ)R3QdN90e5PV:_UcD0rC90+eP[1k[:0Twbb8YiHo2|V3b2');
define('LOGGED_IN_KEY', 'X(4RJ@hu5-E5s%WnDn]DS597fYO6+5B#eVopZ9i]a[D|N2N@&M0OxDGRy]6W-Z43');
define('NONCE_KEY', 'aRW1vCo)111f7:qz4~8B8%kxyr_h44]0VE]UaGAjgzlmNk0U*OVr|0T)t/;S0d:5');
define('AUTH_SALT', 'tqX((o45|84(70w6Q*PbaVPD|/|9b3eMY2Mh5~t+*791t2R&wC2wwG2Ggf@F5X2|');
define('SECURE_AUTH_SALT', '[9Y050;-1Fb9I~|MuF0Dc5@64L902:m0FZJC(l7!1n6OOI4l+s8-~2:-NLJCBxp#');
define('LOGGED_IN_SALT', '/50127qU&8hTq|0eoU*L;!81pXrZjQ*+(1NdVAwb2+ntD%5h6vRJ+T:/9!~y:@*+');
define('NONCE_SALT', 'RKhsH0I1zdlA3HHG(J&768P/1d)[zV15j~tc/VDO9x91;77FVZv79%WPatR767(H');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'Cb3WDeWA1_';


define('WP_ALLOW_MULTISITE', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
