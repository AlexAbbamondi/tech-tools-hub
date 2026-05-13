<?php
/**
 * Tools subnav.
 *
 * Expects optional $args['section'].
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$section = $args['section'] ?? '';

$tool_groups = array(
	'dev-tools' => array(
		array(
			'label' => 'JSON Formatter',
			'url'   => '/tools/dev-tools/json-formatter/',
		),
		array(
			'label' => 'Code Minifier',
			'url'   => '/tools/dev-tools/html-css-javascript-minifier/',
		),
		array(
			'label' => 'Base64 Encoder',
			'url'   => '/tools/dev-tools/base64-encoder/',
		),
	),

	'seo-tools' => array(
		array(
			'label' => 'Meta Tag Generator',
			'url'   => '/tools/seo-tools/meta-tag-generator/',
		),
		array(
			'label' => 'Robots.txt Generator',
			'url'   => '/tools/seo-tools/robots-txt-generator/',
		),
		array(
			'label' => 'SERP Snippet Preview Tool',
			'url'   => '/tools/seo-tools/serp-snippet-preview-tool/',
		),
	),

    'image-tools' => array(
		array(
			'label' => 'Color Contrast Checker',
			'url'   => '/tools/image-tools/color-contrast-checker/',
		),
		array(
			'label' => 'Image Aspect Ratio Calculator',
			'url'   => '/tools/image-tools/image-aspect-ratio-calculator/',
		),
		array(
			'label' => 'Image Dimension Checker',
			'url'   => '/tools/image-tools/image-dimension-checker/',
		),
	),

    'text-tools' => array(
		array(
			'label' => 'Reading Time Calculator',
			'url'   => '/tools/text-tools/reading-time-calculator/',
		),
		array(
			'label' => 'Text Case Converter',
			'url'   => '/tools/text-tools/text-case-converter/',
		),
		array(
			'label' => 'Word Counter',
			'url'   => '/tools/text-tools/word-counter/',
		),
	),

    'productivity-tools' => array(
		array(
			'label' => 'Password Generator',
			'url'   => '/tools/productivity-tools/password-generator/',
		),
		array(
			'label' => 'Pomodoro Timer',
			'url'   => '/tools/productivity-tools/pomodoro-timer/',
		),
	),
);

if ( empty( $section ) ) {
	$path = trim( wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ), '/' );

	foreach ( array_keys( $tool_groups ) as $group_slug ) {
		if ( str_contains( $path, 'tools/' . $group_slug ) ) {
			$section = $group_slug;
			break;
		}
	}
}

if ( empty( $section ) || empty( $tool_groups[ $section ] ) ) {
	return;
}

$current_path = trailingslashit( wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) );
?>

<nav class="tth-tools-subnav" aria-label="Tool navigation">
	<ul class="tth-tools-subnav__list">
		<?php foreach ( $tool_groups[ $section ] as $tool ) : ?>
			<?php
			$url       = trailingslashit( $tool['url'] );
			$is_active = $current_path === $url;
			?>
			<li>
				<a
					href="<?php echo esc_url( $tool['url'] ); ?>"
					<?php echo $is_active ? 'aria-current="page"' : ''; ?>
				>
					<?php echo esc_html( $tool['label'] ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>