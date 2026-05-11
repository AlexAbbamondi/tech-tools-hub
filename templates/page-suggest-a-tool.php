<?php
/**
 * Template Name: TTH Suggest a Tool
 * Template Post Type: page
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main tth-page tth-page-suggest-tool">
	<section class="tth-hero">
			<?php if (function_exists("rank_math_the_breadcrumbs")) rank_math_the_breadcrumbs(); ?>

		<div class="inside-article">
			<p class="tth-eyebrow"><?php esc_html_e( 'Submit a recommendation', 'tech-tools-hub' ); ?></p>
			<h1><?php echo esc_html( get_the_title() ); ?></h1>
			<p class="tth-hero__intro">
				<?php esc_html_e( 'Know a useful tool, calculator, or utility we should check out? Send it over for review.', 'tech-tools-hub' ); ?>
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
			<div class="tth-tool-grid">
				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">STEP 1</span>
						<h2 class="tth-tool-card__title"><?php esc_html_e( 'Tell Us the Basics', 'tech-tools-hub' ); ?></h2>
						<p class="tth-tool-card__description">
							<?php esc_html_e( 'Share the tool name, URL, category, and a quick summary of what it does.', 'tech-tools-hub' ); ?>
						</p>
					</div>
				</article>

				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">STEP 2</span>
						<h2 class="tth-tool-card__title"><?php esc_html_e( 'Explain Why It Helps', 'tech-tools-hub' ); ?></h2>
						<p class="tth-tool-card__description">
							<?php esc_html_e( 'Let us know what makes it useful, who it is for, and why it should be featured.', 'tech-tools-hub' ); ?>
						</p>
					</div>
				</article>

				<article class="tth-tool-card">
					<div class="tth-tool-card__link">
						<span class="tth-tool-card__icon">STEP 3</span>
						<h2 class="tth-tool-card__title"><?php esc_html_e( 'We Review It', 'tech-tools-hub' ); ?></h2>
						<p class="tth-tool-card__description">
							<?php esc_html_e( 'Submissions are reviewed for usefulness, quality, and fit. Not every submission will be added.', 'tech-tools-hub' ); ?>
						</p>
					</div>
				</article>
			</div>
		</div>
	</section>

	<section class="tth-section">
		<div class="inside-article">
			<div class="tth-calculator" style="max-width: 100%;">
				<h2><?php esc_html_e( 'Suggest a Tool', 'tech-tools-hub' ); ?></h2>
				<p><?php esc_html_e( 'Place your form shortcode or form block below.', 'tech-tools-hub' ); ?></p>

				<div class="tth-page-form">
					<?php echo do_shortcode( '[tool_submission_form]' ); ?>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();