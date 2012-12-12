<?php
/*
This is a sample local-config.php file
In it, you *must* include the four main database defines

You may include other settings here that you only want enabled on your local development checkouts
*/

define( 'DB_NAME',			'local_db_name' );
define( 'DB_USER',			'local_db_user' );
define( 'DB_PASSWORD',		'local_db_password' );
define( 'DB_HOST',			'localhost' ); // Probably 'localhost'

define( 'ENV_DOMAIN',		'dev.example.local' );

/**
 * Custom content directory
 * 
 * @see Moving wp-content folder
 * @link http://codex.wordpress.org/Editing_wp-config.php#Moving_wp-content_folder
 */
define( 'WP_CONTENT_DIR',	dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL',	'http://' . $_SERVER['HTTP_HOST'] . '/content' );

/**
 * Forces new hostsnames 
 * 
 *         dev.example.local
 * maintenance.example.local
 *     staging.example.local
 *  production.example.local
 * 
 * @see wp-config.php
 * @link http://codex.wordpress.org/Editing_wp-config.php
 */
define( 'WP_HOME',			'http://dev.example.local' );
define( 'WP_SITEURL',		'http://dev.example.local/wp' );

/**
 * Enabled WP_DEBUG mode
 * @see WP_DEBUG
 * @link http://codex.wordpress.org/Debugging_in_WordPress#WP_DEBUG
 */
define( 'WP_DEBUG',			true );

/**
 * Enable Debug logging to the /content/debug.log file
 * @see SCRIPT_DEBUG
 * @link http://codex.wordpress.org/Debugging_in_WordPress#WP_DEBUG_LOG
 */
define( 'WP_DEBUG_LOG',		true );

/**
 * Enable display of errors and warnings
 * @see SCRIPT_DEBUG
 * @link http://codex.wordpress.org/Debugging_in_WordPress#WP_DEBUG_DISPLAY
 */
define( 'WP_DEBUG_DISPLAY',	true );
@ini_set( 'display_errors',	1 );

/**
 * Saves the database queries to a array
 * @see SCRIPT_DEBUG
 * @link http://codex.wordpress.org/Debugging_in_WordPress#SAVEQUERIES
 */
define( 'SAVEQUERIES',		true );

/**
 * Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
 * @see SCRIPT_DEBUG
 * @link http://codex.wordpress.org/Debugging_in_WordPress#SCRIPT_DEBUG
 */
define( 'SCRIPT_DEBUG',		true );