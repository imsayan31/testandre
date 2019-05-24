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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'andre');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '^Rl=o;)mCZ6k^@G?=CoOm]i9RR_~XjhEQ,CNW0T7X:$LXIv|_hd@=iU.!}TpZg#r');
define('SECURE_AUTH_KEY',  'JPnr+!n5O<b:6VaqRIsfb0M9jeUB;/Nr1,LMk^)Kig<wnQCW( [RIBF[09` (cm;');
define('LOGGED_IN_KEY',    'q=f<qye`}]WqwpCH(8Z )@S.}Q*(a{HVG0v_H:lpY>75Ng1zMr`[q{F p1A0gwfO');
define('NONCE_KEY',        'e(~a(IJ##@GPLika<yA/q[o_8_SR6%*e`<,*Sm>p%gLj`W7#~lJGK#^_CXVE2nN9');
define('AUTH_SALT',        ')S7u!)hrX^iv3XS@V@K8xh~*#Rx4+ob(]$on(YzBidyeBptdJvO&|o,|G]dS_71 ');
define('SECURE_AUTH_SALT', 'KD.L*=OZ*,x,/qV1hj!4:whvi?l%gr+|O$dggU:^9I)F|TW]J9~G*r5G>g1FoSV0');
define('LOGGED_IN_SALT',   '?md0Q~?ljk$5j7I_Ip>W%qP:T;N$`(~ok.GrHP%iRZ]z.X#8qe 2NQRDa&prU]%;');
define('NONCE_SALT',       'vV_Gc3wElOy6/#V .#%[FFcpbP5xq6QZCD[A58,J/~1o=^_xGcwPTv,ow}q_FTlg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'andr_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

define("OTGS_DISABLE_AUTO_UPDATES", true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
