<?php
/**
 * The base configuration for WordPress
 *
 * Docker-based local development config: reads DB credentials from
 * environment variables injected by docker-compose.yml.
 *
 * @package WordPress
 */

// ** Database settings - pulled from Docker environment ** //
define( 'DB_NAME', getenv( 'DB_NAME' ) ?: 'wordpress' );
define( 'DB_USER', getenv( 'DB_USER' ) ?: 'wordpress' );
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) ?: '' );
define( 'DB_HOST', getenv( 'DB_HOST' ) ?: 'db' );
define( 'DB_CHARSET', 'utf8mb4' );
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 */
define( 'AUTH_KEY',         'pj6NjSCxUskZgZEctfdJ3ALSIfJlDor5lrKw6wJl7FcZ1PXnZnc3sYJe3lgCQyJ' );
define( 'SECURE_AUTH_KEY',  'X8wsev8eJgDv5KYS8Y1T6vAk7Do65ncZkKuN8KAyDKN0pz8pbbiVVsMHREYW6' );
define( 'LOGGED_IN_KEY',    '8ynyzfa5zLWwUH1rf310rlvsDtICPFYcV0NOzLDlB5nOeafTjZ2RAsNuELmpio' );
define( 'NONCE_KEY',        'cXFMAlZQN3Q6UNfSGarxQFNcBkAX6ripxuj5nNUzyOUD4usKcK81udKklr6DsF' );
define( 'AUTH_SALT',        '4ADbOpJEY9d1ajdgHgZZlKCzGaI3CXEFRNt0jn66VeTFfUa0p01VmNQA1hIHOV' );
define( 'SECURE_AUTH_SALT', 'aHeEli2VCVvR3473oSnpZK0kepLpKScHb3I6PhtygXQZj9MiR6F2VJpCKjMG2JX' );
define( 'LOGGED_IN_SALT',   'zDYQGsSpmHFZTrcJt1BvCsKnpCoJFwWrUlCYcZYjlEDZaphg4JEOwy1kplhU' );
define( 'NONCE_SALT',       'pM9nDVUNEZxdFNNbsctdqzUs0mCwv9Y1IBt8wrq2SRvaK9ZwKee2RRZAESluid' );

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
