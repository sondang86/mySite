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

define('WP_HOME','http://moderntechblog.tk/');
define('WP_SITEURL','http://moderntechblog.tk/');


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_foundation');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'training@123');

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
define('AUTH_KEY',         '+vllV}_,$`99?h;3BD4@=f0bbf)-p.$/k/GtMgr;SH<7]`%zOAOZ&pe${wK zAk:');
define('SECURE_AUTH_KEY',  'DJO+dsNg2JO<BBH^!aNA{V!J-)[eBE@;XL][4c*|z|HSi|>O{-{|/%4va!1b3NE ');
define('LOGGED_IN_KEY',    'LiG$f;Mm!ExKTzj(n%M,1#X|/qD-Rn-u%iC`9c~-3oH/oz@4p#AK+6RrM^eS0m#u');
define('NONCE_KEY',        '(zvI^uR]q@3E>MBg^wK`LWEr4AdH`D{sl[N#BS88?f1^TV,iy=G^m-%GY|v-k=0F');
define('AUTH_SALT',        'C lo,ifHlOJfg@]h:%DDCq>>C64:4dA@7V~?9E3N2~j?NYA]H>Cd:DW-$@;Y?TNT');
define('SECURE_AUTH_SALT', '^Pk2?dY(|~%g5!-0s?r~b6f?xkx+evP6[E+GK )Px|3oGv`/Q4v!N;eEK7h$bB%Z');
define('LOGGED_IN_SALT',   '32>v=}PSjfm^6Jdy-noeO%1A/&aRmVN.2*&#IG#oX`87V$/t*Q5[[%0m$BnMg+#A');
define('NONCE_SALT',       ':SXrgb|ns/x|8)|}{>xt[h`a-<-TG+&p$?,=p0$?D-J5X_Jga3,x==7:qzb kW!|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpfoundation_';

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
