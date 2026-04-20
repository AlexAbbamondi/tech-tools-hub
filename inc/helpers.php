<?php
/**
 * Helper utilities used by templates and shortcodes.
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'tth_get_estimated_read_time' ) ) {
	/**
	 * Estimate reading time from content word count.
	 *
	 * @param string $content Raw content string.
	 * @param int    $wpm     Words per minute baseline.
	 * @return int
	 */
	function tth_get_estimated_read_time( $content, $wpm = 225 ) {
		$word_count = str_word_count( wp_strip_all_tags( (string) $content ) );
		$wpm        = max( 100, absint( $wpm ) );

		return max( 1, (int) ceil( $word_count / $wpm ) );
	}
}

if ( ! function_exists( 'tth_get_tool_link' ) ) {
	/**
	 * Resolve a permalink for a tool item.
	 *
	 * @param int $post_id Post ID.
	 * @return string
	 */
	function tth_get_tool_link( $post_id ) {
		$link = get_permalink( $post_id );
		return $link ? $link : home_url( '/' );
	}
}

if ( ! function_exists( 'tth_get_tool_excerpt' ) ) {
	/**
	 * Get a trimmed excerpt for tool cards.
	 *
	 * @param WP_Post|int|null $post   Post object or ID.
	 * @param int              $length Number of words.
	 * @return string
	 */
	function tth_get_tool_excerpt( $post = null, $length = 24 ) {
		$post = get_post( $post );

		if ( ! $post ) {
			return '';
		}

		$source = has_excerpt( $post ) ? $post->post_excerpt : $post->post_content;
		return wp_trim_words( wp_strip_all_tags( $source ), absint( $length ), '...' );
	}
}

if ( ! function_exists( 'tth_render_basic_calculator' ) ) {
	/**
	 * Render simple calculator markup used in templates and shortcode output.
	 *
	 * @return string
	 */
	function tth_render_basic_calculator() {
		ob_start();
		?>
		<form class="tth-calculator" data-calculator>
			<div class="tth-calculator__row">
				<label for="tth-calc-a"><?php esc_html_e( 'Value A', 'tech-tools-hub' ); ?></label>
				<input id="tth-calc-a" name="a" type="number" step="any" required>
			</div>
			<div class="tth-calculator__row">
				<label for="tth-calc-op"><?php esc_html_e( 'Operation', 'tech-tools-hub' ); ?></label>
				<select id="tth-calc-op" name="op">
					<option value="+">+</option>
					<option value="-">-</option>
					<option value="*">x</option>
					<option value="/">/</option>
				</select>
			</div>
			<div class="tth-calculator__row">
				<label for="tth-calc-b"><?php esc_html_e( 'Value B', 'tech-tools-hub' ); ?></label>
				<input id="tth-calc-b" name="b" type="number" step="any" required>
			</div>
			<div class="tth-calculator__actions">
				<button type="submit"><?php esc_html_e( 'Calculate', 'tech-tools-hub' ); ?></button>
			</div>
			<p class="tth-calculator__result" role="status" aria-live="polite"></p>
		</form>
		<?php
		return ob_get_clean();
	}
}
