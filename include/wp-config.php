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
define('DB_NAME', 'a7703758_sushi');

/** MySQL database username */
define('DB_USER', 'a7703758_root');

/** MySQL database password */
define('DB_PASSWORD', 'q1w2e3r4t5y6');

/** MySQL hostname */
define('DB_HOST', 'mysql6.000webhost.com');

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
define('AUTH_KEY',         '{GkZ[7pn(95X_2kdBl}<QB/{TbR^FSLGve<L@c~dg$z0zO*hx6Fu1%56/CWL%ct^');
define('SECURE_AUTH_KEY',  'zq|9|AZ(NmvPW^ e_F>`~(6%re/3`x{{9m:rdc.F+K /<|:c9!USI1@^6|Zm%/wQ');
define('LOGGED_IN_KEY',    'v0T])guX3%(v Y{BDAGuAz#Xrv[4W-@k!lBMNFg]GwLKR6=G.$yUbSgt|0j>U(L)');
define('NONCE_KEY',        'E|NM=<saE?4iSFxF3D|kM<FeS=,&4|XN|n UW2^Elssc|wX ?+7fhUa3,`!eJ#C$');
define('AUTH_SALT',        'b^S7(uQNqKl+M<]6=f9MI-{fS8>M$@;A)$.K2kDUcW7 3dJ%:^302bg@|aHaz<nx');
define('SECURE_AUTH_SALT', 'o,++Ogpnjw?9np[`O@@5}oQ =*nGobM:q9qYN^RbJ)j5<Eke*P4<|f=.ieUO9DG3');
define('LOGGED_IN_SALT',   'rb |]of4-_.Ie1Lzn8JXuSo]C:~n?}Jb*{WC]sOxp<{kTJ[_kPTHRm_`HRS+Z~[%');
define('NONCE_SALT',       '}C5Ch{2iS b dh;9l:?h>9o#O::+k%w>0OAo9pJ&.En`?-Ur 4piV~U}J[:R%~3|');

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
