<?php
/**
 * Reusable tool card partial.
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title       = get_query_var( 'tth_tool_title', __( 'Tool', 'tech-tools-hub' ) );
$description = get_query_var( 'tth_tool_description', __( 'Tool description goes here.', 'tech-tools-hub' ) );
$url         = get_query_var( 'tth_tool_url', home_url( '/' ) );
$icon        = get_query_var( 'tth_tool_icon', 'TT' );
?>

<article class="tth-tool-card">
	<a class="tth-tool-card__link" href="<?php echo esc_url( $url ); ?>">
		<span class="tth-tool-card__icon"><?php echo esc_html( $icon ); ?></span>
		<h3 class="tth-tool-card__title"><?php echo esc_html( $title ); ?></h3>
		<p class="tth-tool-card__description"><?php echo esc_html( $description ); ?></p>
	</a>
</article>
