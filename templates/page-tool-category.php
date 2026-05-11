<?php
/**
 * Template Name: TTH Tool Category
 * Template Post Type: page
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

/**
 * Current page info.
 */
$current_page_id    = get_the_ID();
$current_page_title = get_the_title();
$current_page_slug  = get_post_field( 'post_name', $current_page_id );

/**
 * Pull child pages under the current category page.
 */
$tool_pages = get_pages(
	array(
		'parent' => $current_page_id,
		'post_status' => 'publish',
		'sort_column' => 'menu_order,post_title',
	)
);
?>

<main id="primary" class="site-main tth-page tth-page-category tth-page-category-<?php echo esc_attr( $current_page_slug ); ?>">


<section class="tth-hero">
		<?php if (function_exists("rank_math_the_breadcrumbs")) rank_math_the_breadcrumbs(); ?>

		<div class="inside-article">
			<p class="tth-eyebrow"><?php esc_html_e( 'Tool category', 'tech-tools-hub' ); ?></p>
			<h1><?php echo esc_html( $current_page_title ); ?></h1>

			<p class="tth-hero__intro">
				<?php
				switch ( $current_page_slug ) {
					case 'seo-tools':
						esc_html_e( 'Free SEO tools for metadata, content optimization, SERP previews, keyword workflows, and more.', 'tech-tools-hub' );
						break;

					case 'dev-tools':
						esc_html_e( 'Simple developer tools for formatting, encoding, debugging, calculations, and everyday coding tasks.', 'tech-tools-hub' );
						break;

					case 'image-tools':
						esc_html_e( 'Free image tools for resizing, compressing, converting, and working with dimensions and ratios.', 'tech-tools-hub' );
						break;

					case 'text-tools':
						esc_html_e( 'Useful text tools for counting, formatting, converting, cleaning, and organizing content.', 'tech-tools-hub' );
						break;

					case 'productivity-tools':
						esc_html_e( 'Productivity tools to help you manage tasks, time, and workflows efficiently.', 'tech-tools-hub' );
						break;

					default:
						esc_html_e( 'Browse useful tools and resources in this category.', 'tech-tools-hub' );
						break;
				}
				?>
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

				$category_guide_template = 'template-parts/category-guides/' . $current_page_slug;

				if ( locate_template( $category_guide_template . '.php' ) ) {
					get_template_part( $category_guide_template );
				}
				?>
			</div>
		</div>
	</section>

	<section class="tth-section">
		<div class="inside-article">
			<h2><?php esc_html_e( 'Available Tools', 'tech-tools-hub' ); ?></h2>

			<div class="tth-tool-grid">
				<?php if ( ! empty( $tool_pages ) ) : ?>
					<?php foreach ( $tool_pages as $tool_page ) : ?>
						<article class="tth-tool-card">
							<a class="tth-tool-card__link" href="<?php echo esc_url( get_permalink( $tool_page->ID ) ); ?>">
								<span class="tth-tool-card__icon">
									<?php
									switch ( $current_page_slug ) {
										case 'seo-tools':
											echo esc_html( 'SEO' );
											break;

										case 'dev-tools':
											echo esc_html( 'DEV' );
											break;

										case 'image-tools':
											echo esc_html( 'IMG' );
											break;

										case 'text-tools':
											echo esc_html( 'TEXT' );
											break;

										case 'productivity-tools':
											echo esc_html( 'PROD' );
											break;

										default:
											echo esc_html( 'TOOL' );
											break;
									}
									?>
								</span>

								<h3 class="tth-tool-card__title">
									<?php echo esc_html( $tool_page->post_title ); ?>
								</h3>

								<p class="tth-tool-card__description">
									<?php echo esc_html( wp_trim_words( wp_strip_all_tags( $tool_page->post_content ), 20 ) ); ?>
								</p>
							</a>
						</article>
					<?php endforeach; ?>
				<?php else : ?>
					<p><?php esc_html_e( 'No tools have been added to this category yet. Add child pages under this page to populate the grid.', 'tech-tools-hub' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="tth-section tth-section-cta">
		<div class="inside-article">
			<h2><?php esc_html_e( 'Browse More Tools', 'tech-tools-hub' ); ?></h2>
			<p><?php esc_html_e( 'Explore more categories, calculators, and free utilities across the site.', 'tech-tools-hub' ); ?></p>

			<div class="tth-hero__actions">
				<a class="button" href="<?php echo esc_url( home_url( '/tools/' ) ); ?>">
					<?php esc_html_e( 'View All Tools', 'tech-tools-hub' ); ?>
				</a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();