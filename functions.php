<?php
/**
 * Theme bootstrap file.
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'TTH_THEME_VERSION' ) ) {
	define( 'TTH_THEME_VERSION', '1.0.0' );
}

if ( ! defined( 'TTH_THEME_DIR' ) ) {
	define( 'TTH_THEME_DIR', get_stylesheet_directory() );
}

if ( ! defined( 'TTH_THEME_URI' ) ) {
	define( 'TTH_THEME_URI', get_stylesheet_directory_uri() );
}

$tech_tools_hub_includes = array(
	'inc/setup.php',
	'inc/enqueue.php',
	'inc/helpers.php',
	'inc/shortcodes.php',
);

foreach ( $tech_tools_hub_includes as $include_file ) {
	$path = TTH_THEME_DIR . '/' . $include_file;

	if ( file_exists( $path ) ) {
		require_once $path;
	}
}
