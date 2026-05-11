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

add_shortcode( 'tool_submission_form', 'tth_tool_submission_form_shortcode' );

function tth_tool_submission_form_shortcode() {
	ob_start();
	?>

	<form class="tth-suggest-tool-form" method="post">
		<div class="tth-calculator__row">
			<label for="tth-tool-name">Tool Name</label>
			<input id="tth-tool-name" name="tool_name" type="text" required>
		</div>

		<div class="tth-calculator__row">
			<label for="tth-tool-url">Tool URL</label>
			<input id="tth-tool-url" name="tool_url" type="url" placeholder="https://example.com">
		</div>

		<div class="tth-calculator__row">
			<label for="tth-tool-category">Category</label>
			<select id="tth-tool-category" name="tool_category">
				<option value="">Select a category</option>
				<option value="SEO Tools">SEO Tools</option>
				<option value="Dev Tools">Dev Tools</option>
				<option value="Image Tools">Image Tools</option>
				<option value="Text Tools">Text Tools</option>
				<option value="Productivity Tools">Productivity Tools</option>
				<option value="Other">Other</option>
			</select>
		</div>

		<div class="tth-calculator__row">
			<label for="tth-tool-description">Why should we add it?</label>
			<textarea id="tth-tool-description" name="tool_description" rows="6" required></textarea>
		</div>

		<div class="tth-calculator__row">
			<label for="tth-your-email">Your Email</label>
			<input id="tth-your-email" name="your_email" type="email" placeholder="optional@example.com">
		</div>

		<div class="tth-tool-actions">
			<button type="submit">Submit Tool Suggestion</button>
		</div>
	</form>

	<?php
	return ob_get_clean();
}