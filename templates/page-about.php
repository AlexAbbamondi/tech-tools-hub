<?php
/**
 * Template Name: TTH About
 * Template Post Type: page
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main tth-page tth-page-about">
	<section class="tth-hero">
				<?php if (function_exists("rank_math_the_breadcrumbs")) rank_math_the_breadcrumbs(); ?>

		<div class="inside-article">
			<p class="tth-eyebrow"><?php esc_html_e( 'About the site', 'tech-tools-hub' ); ?></p>
			<h1><?php echo esc_html( get_the_title() ); ?></h1>
			<p class="tth-hero__intro">
				<?php esc_html_e( 'Tech Tool Hub is built to make simple online tools, calculators, and useful resources easy to find and use.', 'tech-tools-hub' ); ?>
			</p>
		</div>
	</section>

	<section class="tth-section">
		<div class="inside-article">
			<div class="tth-page-content">
				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
				?>
			</div>
		</div>
	</section>

	<section class="tth-section">
		<div class="inside-article">
			<h2><?php esc_html_e( 'What You’ll Find Here', 'tech-tools-hub' ); ?></h2>

			<div class="tth-tool-grid">
				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">TOOLS</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'Practical Utilities', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description">
							<?php esc_html_e( 'Simple tools built to solve common tasks without extra clutter or friction.', 'tech-tools-hub' ); ?>
						</p>
					</div>
				</article>

				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">CALC</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'Free Calculators', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description">
							<?php esc_html_e( 'Useful calculators for web, business, productivity, and everyday use.', 'tech-tools-hub' ); ?>
						</p>
					</div>
				</article>

				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">GUIDES</span>
						<h3 class="tth-tool-card__title"><?php esc_html_e( 'Helpful Content', 'tech-tools-hub' ); ?></h3>
						<p class="tth-tool-card__description">
							<?php esc_html_e( 'Roundups, comparisons, and practical content to help users find the right tools.', 'tech-tools-hub' ); ?>
						</p>
					</div>
				</article>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-cta">
		<div class="inside-article">
			<h2><?php esc_html_e( 'Keep Exploring', 'tech-tools-hub' ); ?></h2>
			<p><?php esc_html_e( 'Browse the latest tools, calculators, and resources across the site.', 'tech-tools-hub' ); ?></p>

			<div class="tth-hero__actions">
				<a class="button" href="<?php echo esc_url( home_url( '/tools/' ) ); ?>">
					<?php esc_html_e( 'Browse Tools', 'tech-tools-hub' ); ?>
				</a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();