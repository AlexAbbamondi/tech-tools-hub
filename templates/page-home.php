<?php
/**
 * Template Name: TTH Home
 * Template Post Type: page
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

function tth_home_render_card_by_slug( $slug, $icon = 'TOOL', $words = 18 ) {
	$page = get_page_by_path( $slug );

	if ( ! $page instanceof WP_Post ) {
		return;
	}

	set_query_var( 'tth_tool_title', $page->post_title );
	set_query_var(
		'tth_tool_description',
		function_exists( 'tth_get_tool_excerpt' ) ? tth_get_tool_excerpt( $page, $words ) : wp_trim_words( wp_strip_all_tags( $page->post_content ), $words )
	);
	set_query_var( 'tth_tool_url', get_permalink( $page->ID ) );
	set_query_var( 'tth_tool_icon', $icon );

	get_template_part( 'template-parts/tool-card' );
}

$latest_posts = get_posts(
	array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
	)
);
?>

<main id="primary" class="site-main tth-page tth-page-home">

	<section class="tth-hero">
		<div class="inside-article">
			<p class="tth-eyebrow">Free online utilities</p>
			<h1>Free Tech Tools & Calculators</h1>
			<p class="tth-hero__intro">
				Use simple online tools for SEO, development, images, text, and productivity. No signup required.
			</p>

			<div class="tth-hero__actions">
				<a class="button" href="<?php echo esc_url( home_url( '/tools/' ) ); ?>">Browse Tools</a>
				<a class="button button-outline" href="<?php echo esc_url( home_url( '/tools/dev-tools/' ) ); ?>">Developer Tools</a>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-categories">
		<div class="inside-article">
			<h2>Browse by Category</h2>

			<div class="tth-tool-grid">
				<?php
				$categories = array(
					array( 'SEO', 'SEO Tools', 'Preview snippets, generate meta tags, and create robots.txt files.', '/tools/seo-tools/' ),
					array( 'DEV', 'Dev Tools', 'Format JSON, minify code, encode Base64, and generate passwords.', '/tools/dev-tools/' ),
					array( 'IMG', 'Image Tools', 'Check dimensions, calculate aspect ratios, and test color contrast.', '/tools/image-tools/' ),
					array( 'TEXT', 'Text Tools', 'Count words, convert case, and calculate reading time.', '/tools/text-tools/' ),
					array( 'TIME', 'Productivity Tools', 'Stay focused with simple productivity utilities.', '/tools/productivity-tools/' ),
				);

				foreach ( $categories as $category ) :
					?>
					<article class="tth-tool-card">
						<a class="tth-tool-card__link" href="<?php echo esc_url( home_url( $category[3] ) ); ?>">
							<span class="tth-tool-card__icon"><?php echo esc_html( $category[0] ); ?></span>
							<h3 class="tth-tool-card__title"><?php echo esc_html( $category[1] ); ?></h3>
							<p class="tth-tool-card__description"><?php echo esc_html( $category[2] ); ?></p>
						</a>
					</article>
					<?php
				endforeach;
				?>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-tools">
		<div class="inside-article">
			<h2>Popular Tools</h2>

			<div class="tth-tool-grid">
				<?php
				tth_home_render_card_by_slug( 'tools/text-tools/word-counter', 'TEXT' );
				tth_home_render_card_by_slug( 'tools/dev-tools/json-formatter', 'DEV' );
				tth_home_render_card_by_slug( 'tools/seo-tools/serp-snippet-preview-tool', 'SEO' );
				tth_home_render_card_by_slug( 'tools/image-tools/image-aspect-ratio-calculator', 'IMG' );
				tth_home_render_card_by_slug( 'tools/dev-tools/html-css-javascript-minifier', 'DEV' );
				tth_home_render_card_by_slug( 'tools/dev-tools/password-generator', 'DEV' );
				?>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-tools">
		<div class="inside-article">
			<h2>SEO Tools</h2>

			<div class="tth-tool-grid">
				<?php
				tth_home_render_card_by_slug( 'tools/seo-tools/serp-snippet-preview-tool', 'SEO' );
				tth_home_render_card_by_slug( 'tools/seo-tools/meta-tag-generator', 'SEO' );
				tth_home_render_card_by_slug( 'tools/seo-tools/robots-txt-generator', 'SEO' );
				?>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-tools">
		<div class="inside-article">
			<h2>Developer Tools</h2>

			<div class="tth-tool-grid">
				<?php
				tth_home_render_card_by_slug( 'tools/dev-tools/json-formatter', 'DEV' );
				tth_home_render_card_by_slug( 'tools/dev-tools/html-css-javascript-minifier', 'DEV' );
				tth_home_render_card_by_slug( 'tools/dev-tools/base64-encoder', 'DEV' );
				tth_home_render_card_by_slug( 'tools/dev-tools/password-generator', 'DEV' );
				?>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-tools">
		<div class="inside-article">
			<h2>Image & Text Tools</h2>

			<div class="tth-tool-grid">
				<?php
				tth_home_render_card_by_slug( 'tools/image-tools/image-aspect-ratio-calculator', 'IMG' );
				tth_home_render_card_by_slug( 'tools/image-tools/image-dimension-checker', 'IMG' );
				tth_home_render_card_by_slug( 'tools/image-tools/color-contrast-checker', 'IMG' );
				tth_home_render_card_by_slug( 'tools/text-tools/word-counter', 'TEXT' );
				tth_home_render_card_by_slug( 'tools/text-tools/reading-time-calculator', 'TEXT' );
				tth_home_render_card_by_slug( 'tools/text-tools/text-case-converter', 'TEXT' );
				?>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-benefits">
		<div class="inside-article">
			<h2>Why Use Tech Tool Hub?</h2>

			<div class="tth-tool-grid">
				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">FREE</span>
						<h3 class="tth-tool-card__title">Free to Use</h3>
						<p class="tth-tool-card__description">No signup, no paywall, and no unnecessary friction.</p>
					</div>
				</article>

				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">FAST</span>
						<h3 class="tth-tool-card__title">Built for Speed</h3>
						<p class="tth-tool-card__description">Lightweight tools designed to load quickly and get to the point.</p>
					</div>
				</article>

				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">EASY</span>
						<h3 class="tth-tool-card__title">Easy to Use</h3>
						<p class="tth-tool-card__description">Clean interfaces without clutter, accounts, or complicated setup.</p>
					</div>
				</article>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $latest_posts ) ) : ?>
		<section class="tth-section tth-section-articles">
			<div class="inside-article">
				<h2>Latest Articles</h2>

				<div class="tth-tool-grid">
					<?php foreach ( $latest_posts as $post ) : ?>
						<article class="tth-tool-card">
							<a class="tth-tool-card__link" href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
								<span class="tth-tool-card__icon">POST</span>
								<h3 class="tth-tool-card__title"><?php echo esc_html( get_the_title( $post->ID ) ); ?></h3>
								<p class="tth-tool-card__description">
									<?php echo esc_html( wp_trim_words( get_the_excerpt( $post->ID ), 18 ) ); ?>
								</p>
							</a>
						</article>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="tth-section tth-section-cta">
		<div class="inside-article">
			<h2>Start Exploring Free Tools</h2>
			<p>Browse simple calculators, utilities, and practical resources built to help you get things done faster.</p>

			<div class="tth-hero__actions">
				<a class="button" href="<?php echo esc_url( home_url( '/tools/' ) ); ?>">Browse All Tools</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();