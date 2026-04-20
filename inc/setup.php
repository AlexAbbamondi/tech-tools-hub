<?php
/**
 * Theme setup and supports.
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'tth_setup_theme' ) ) {
	/**
	 * Register classic theme features and nav menus.
	 *
	 * @return void
	 */
	function tth_setup_theme() {
		load_child_theme_textdomain( 'tech-tools-hub', TTH_THEME_DIR . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'search-form',
				'gallery',
				'caption',
			)
		);

		register_nav_menus(
			array(
				'primary_tools' => __( 'Primary Tools Menu', 'tech-tools-hub' ),
				'footer_tools'  => __( 'Footer Tools Menu', 'tech-tools-hub' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'tth_setup_theme' );

if ( ! function_exists( 'tth_add_body_classes' ) ) {
	/**
	 * Add a predictable body class for targeted styling.
	 *
	 * @param array $classes Existing body classes.
	 * @return array
	 */
	function tth_add_body_classes( $classes ) {
		$classes[] = 'tth-classic-theme';
		return $classes;
	}
}
add_filter( 'body_class', 'tth_add_body_classes' );
