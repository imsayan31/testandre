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
define('DB_NAME', 'u975743066_andre');

/** MySQL database username */
define('DB_USER', 'u975743066_andiw');

/** MySQL database password */
define('DB_PASSWORD', '@QCMO2018!');

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
define('AUTH_KEY',         'R4JM*InpWNm%;mJuXM/!>[C|6j.BfP?/9B+j5,Jbrc_10$^h{l6M6qTI,{?s:FFy');
define('SECURE_AUTH_KEY',  'XOFG+EsC@NitKwVQO$iqQO166(&G!;@@xNDr7[2ibm0{dv{B[evj2~Ikn*9~L`lh');
define('LOGGED_IN_KEY',    'm)[2rGeB|N6&.|,Zuxh7-%-,-y7E c<_F<J0fHj/+5@4`59=(s!E9Tt?rYJ$&zgT');
define('NONCE_KEY',        '}r0^c,R 7mwJ@aG`Rq(N;@[!m9,v%pdnt]]sP!&F qyWf:&Ui 4ZEOvOaT#Cude,');
define('AUTH_SALT',        '`AP=Wjpbe>Q:gE8qEn@7I?Wqx(I~!Pdqa]VA:s|Yp7:Z%j/|6<oZqa<]+`%#S/]2');
define('SECURE_AUTH_SALT', 'Xmp -9 UJbtDuVb3T>N=J2SlmrJ.@{*N:lDt_bjfLQEOCtiT)Jx[$v?KnRVqI)kZ');
define('LOGGED_IN_SALT',   'A5UU`<n)xK*}s6ST!K]hphp}v%DMd3tI&M:%@?-~<m/Gn}*[M`Nua}u`hIFa llq');
define('NONCE_SALT',       '$i?7UV~Vs!uG?tbS=/uw`1dd@=-;~9T@n6f`+KuXugcnumj?=0+oaVaWf8|*ihXV');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
