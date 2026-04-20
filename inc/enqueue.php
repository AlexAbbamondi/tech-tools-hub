<?php
/**
 * Enqueue theme assets.
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'tth_enqueue_assets' ) ) {
	/**
	 * Load parent styles, child styles, and lightweight scripts.
	 *
	 * @return void
	 */
	function tth_enqueue_assets() {
		$theme_version  = ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? (string) time() : TTH_THEME_VERSION;
		$parent_version = wp_get_theme( 'generatepress' )->get( 'Version' );

		wp_enqueue_style(
			'generatepress-parent-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$parent_version
		);

		wp_enqueue_style(
			'tech-tools-hub-style',
			get_stylesheet_uri(),
			array( 'generatepress-parent-style' ),
			$theme_version
		);

		wp_enqueue_style(
			'tech-tools-hub-main',
			TTH_THEME_URI . '/assets/css/main.css',
			array( 'tech-tools-hub-style' ),
			$theme_version
		);

		wp_enqueue_script(
			'tech-tools-hub-main',
			TTH_THEME_URI . '/assets/js/main.js',
			array(),
			$theme_version,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'tth_enqueue_assets', 20 );
