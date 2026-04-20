<?php
/**
 * Theme shortcodes.
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'tth_shortcode_year' ) ) {
	/**
	 * Output the current year.
	 *
	 * Usage: [tth_year]
	 *
	 * @return string
	 */
	function tth_shortcode_year() {
		return esc_html( gmdate( 'Y' ) );
	}
}
add_shortcode( 'tth_year', 'tth_shortcode_year' );

if ( ! function_exists( 'tth_shortcode_tool_card' ) ) {
	/**
	 * Render a reusable tool card template part.
	 *
	 * Usage: [tool_card title="Name" description="Summary" url="https://example.com"]
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	function tth_shortcode_tool_card( $atts ) {
		$atts = shortcode_atts(
			array(
				'title'       => __( 'Tool', 'tech-tools-hub' ),
				'description' => __( 'Tool description goes here.', 'tech-tools-hub' ),
				'url'         => home_url( '/' ),
				'icon'        => 'TT',
			),
			$atts,
			'tool_card'
		);

		set_query_var( 'tth_tool_title', sanitize_text_field( $atts['title'] ) );
		set_query_var( 'tth_tool_description', sanitize_text_field( $atts['description'] ) );
		set_query_var( 'tth_tool_url', esc_url_raw( $atts['url'] ) );
		set_query_var( 'tth_tool_icon', sanitize_text_field( $atts['icon'] ) );

		ob_start();
		get_template_part( 'template-parts/tool-card' );
		return ob_get_clean();
	}
}
add_shortcode( 'tool_card', 'tth_shortcode_tool_card' );

if ( ! function_exists( 'tth_shortcode_calculator' ) ) {
	/**
	 * Render the calculator widget.
	 *
	 * Usage: [tth_calculator]
	 *
	 * @return string
	 */
	function tth_shortcode_calculator() {
		return function_exists( 'tth_render_basic_calculator' ) ? tth_render_basic_calculator() : '';
	}
}
add_shortcode( 'tth_calculator', 'tth_shortcode_calculator' );
