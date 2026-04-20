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

/**
 * Helper: render a tool card.
 *
 * @param WP_Post $page Page object.
 * @param string  $icon Icon label.
 * @param int     $words Excerpt length.
 * @return void
 */
function tth_home_render_tool_card( $page, $icon = 'TOOL', $words = 18 ) {
	if ( ! $page instanceof WP_Post ) {
		return;
	}

	set_query_var( 'tth_tool_title', $page->post_title );
	set_query_var(
		'tth_tool_description',
		function_exists( 'tth_get_tool_excerpt' ) ? tth_get_tool_excerpt( $page, $words ) : wp_trim_words( $page->post_content, $words )
	);
	set_query_var(
		'tth_tool_url',
		function_exists( 'tth_get_tool_link' ) ? tth_get_tool_link( $page->ID ) : get_permalink( $page->ID )
	);
	set_query_var( 'tth_tool_icon', $icon );

	get_template_part( 'template-parts/tool-card' );
}

/**
 * Featured calculator pages.
 */
$featured_calculators = get_pages(
	array(
		'number'      => 6,
		'post_status' => 'publish',
		'sort_column' => 'menu_order,post_title',
		'meta_key'    => '_wp_page_template',
		'meta_value'  => 'templates/page-calculator.php',
	)
);

/**
 * Featured tool pages.
 * Excludes calculator template pages.
 */
$featured_tools = get_pages(
	array(
		'number'      => 6,
		'post_status' => 'publish',
		'sort_column' => 'menu_order,post_title',
		'meta_query'  => array(
			array(
				'key'     => '_wp_page_template',
				'value'   => 'templates/page-calculator.php',
				'compare' => '!=',
			),
		),
	)
);

/**
 * Latest blog posts.
 */
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
			<p class="tth-eyebrow"><?php esc_html_e( 'Free online utilities', 'tech-tools-hub' ); ?></p>
			<h1><?php echo esc_html( get_the_title() ); ?></h1>
			<p class="tth-hero__intro">
				<?php esc_html_e( 'Simple tech tools, calculators, and practical utilities built to help you work faster.', 'tech-tools-hub' ); ?>
			</p>

			<div class="tth-hero__actions">
				<a class="button" href="<?php echo esc_url( home_url( '/tools/' ) ); ?>">
					<?php esc_html_e( 'Browse Tools', 'tech-tools-hub' ); ?>
				</a>
				<a class="button button-outline" href="<?php echo esc_url( home_url( '/calculators/' ) ); ?>">
					<?php esc_html_e( 'View Calculators', 'tech-tools-hub' ); ?>
				</a>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-categories">
		<div class="inside-article">
			<h2><?php esc_html_e( 'Browse by Category', 'tech-tools-hub' ); ?></h2>

			<div class="tth-tool-grid">
				<article class="tth-tool-card">
					<a class="tth-tool-card__link" href="<?php echo esc_url( home_url( '/calculators/' ) ); ?>">
						<span class="tth-tool-card__icon">CALC</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'Calculators', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description"><?php esc_html_e( 'Fast, free calculators for web, business, finance, and more.', 'tech-tools-hub' ); ?></p>
					</a>
				</article>

				<article class="tth-tool-card">
					<a class="tth-tool-card__link" href="<?php echo esc_url( home_url( '/developer-tools/' ) ); ?>">
						<span class="tth-tool-card__icon">DEV</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'Developer Tools', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description"><?php esc_html_e( 'Simple utilities for coding, formatting, and debugging.', 'tech-tools-hub' ); ?></p>
					</a>
				</article>

				<article class="tth-tool-card">
					<a class="tth-tool-card__link" href="<?php echo esc_url( home_url( '/seo-tools/' ) ); ?>">
						<span class="tth-tool-card__icon">SEO</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'SEO Tools', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description"><?php esc_html_e( 'Useful tools for metadata, content checks, and search optimization.', 'tech-tools-hub' ); ?></p>
					</a>
				</article>

				<article class="tth-tool-card">
					<a class="tth-tool-card__link" href="<?php echo esc_url( home_url( '/text-tools/' ) ); ?>">
						<span class="tth-tool-card__icon">TEXT</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'Text Tools', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description"><?php esc_html_e( 'Quick text utilities for counting, cleaning, and formatting.', 'tech-tools-hub' ); ?></p>
					</a>
				</article>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-calculators">
		<div class="inside-article">
			<h2><?php esc_html_e( 'Featured Calculators', 'tech-tools-hub' ); ?></h2>

			<div class="tth-tool-grid">
				<?php if ( ! empty( $featured_calculators ) ) : ?>
					<?php foreach ( $featured_calculators as $tool_page ) : ?>
						<?php tth_home_render_tool_card( $tool_page, 'CALC', 18 ); ?>
					<?php endforeach; ?>
				<?php else : ?>
					<p><?php esc_html_e( 'No calculator pages found yet. Create pages using the TTH Calculator template.', 'tech-tools-hub' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-tools">
		<div class="inside-article">
			<h2><?php esc_html_e( 'Featured Tools', 'tech-tools-hub' ); ?></h2>

			<div class="tth-tool-grid">
				<?php if ( ! empty( $featured_tools ) ) : ?>
					<?php foreach ( $featured_tools as $tool_page ) : ?>
						<?php tth_home_render_tool_card( $tool_page, 'TOOL', 18 ); ?>
					<?php endforeach; ?>
				<?php else : ?>
					<p><?php esc_html_e( 'Add a few regular tool pages to highlight them here.', 'tech-tools-hub' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-benefits">
		<div class="inside-article">
			<h2><?php esc_html_e( 'Why Use Tech Tools Hub?', 'tech-tools-hub' ); ?></h2>

			<div class="tth-tool-grid">
				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">FREE</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'Free to Use', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description"><?php esc_html_e( 'No signup, no paywall, and no unnecessary friction.', 'tech-tools-hub' ); ?></p>
					</div>
				</article>

				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">FAST</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'Built for Speed', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description"><?php esc_html_e( 'Simple tools designed to load quickly and get to the point.', 'tech-tools-hub' ); ?></p>
					</div>
				</article>

				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">EASY</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'Easy to Use', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description"><?php esc_html_e( 'Clean interfaces without clutter or bloated features.', 'tech-tools-hub' ); ?></p>
					</div>
				</article>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-articles">
		<div class="inside-article">
			<h2><?php esc_html_e( 'Latest Articles', 'tech-tools-hub' ); ?></h2>

			<div class="tth-tool-grid">
				<?php if ( ! empty( $latest_posts ) ) : ?>
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
				<?php else : ?>
					<p><?php esc_html_e( 'No blog posts published yet.', 'tech-tools-hub' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-cta">
		<div class="inside-article">
			<h2><?php esc_html_e( 'Start Exploring Free Tools', 'tech-tools-hub' ); ?></h2>
			<p><?php esc_html_e( 'Browse calculators, utilities, and practical resources built to help you get things done faster.', 'tech-tools-hub' ); ?></p>

			<div class="tth-hero__actions">
				<a class="button" href="<?php echo esc_url( home_url( '/tools/' ) ); ?>">
					<?php esc_html_e( 'Browse All Tools', 'tech-tools-hub' ); ?>
				</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();