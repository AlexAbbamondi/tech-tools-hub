<?php
/**
 * Template Name: TTH Tool
 * Template Post Type: page
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$current_page_id    = get_the_ID();
$current_page_title = get_the_title();
$current_page_slug  = get_post_field( 'post_name', $current_page_id );
$parent_page_id     = wp_get_post_parent_id( $current_page_id );

/**
 * Tool icon label based on slug/category.
 */
$tool_icon = 'TOOL';

if ( $parent_page_id ) {
	$parent_slug = get_post_field( 'post_name', $parent_page_id );

	switch ( $parent_slug ) {
		case 'seo-tools':
			$tool_icon = 'SEO';
			break;

		case 'dev-tools':
			$tool_icon = 'DEV';
			break;

		case 'image-tools':
			$tool_icon = 'IMG';
			break;

		case 'text-tools':
			$tool_icon = 'TEXT';
			break;

		case 'productivity-tools':
			$tool_icon = 'PROD';
			break;
	}
}

/**
 * Related tools from same parent category.
 */
$related_tools = array();

if ( $parent_page_id ) {
	$related_tools = get_pages(
		array(
			'parent'      => $parent_page_id,
			'post_status' => 'publish',
			'sort_column' => 'menu_order,post_title',
			'exclude'     => array( $current_page_id ),
			'number'      => 3,
		)
	);
}
?>

<main id="primary" class="site-main tth-page tth-page-tool tth-page-tool-<?php echo esc_attr( $current_page_slug ); ?>">

	<section class="tth-hero">
			<?php if (function_exists("rank_math_the_breadcrumbs")) rank_math_the_breadcrumbs(); ?>

		<div class="inside-article">
			<?php if ( $parent_page_id ) : ?>
				<p class="tth-eyebrow">
					<a href="<?php echo esc_url( get_permalink( $parent_page_id ) ); ?>">
						<?php echo esc_html( get_the_title( $parent_page_id ) ); ?>
					</a>
				</p>
			<?php endif; ?>

			<h1><?php echo esc_html( $current_page_title ); ?></h1>

			<p class="tth-hero__intro">
				<?php
				if ( has_excerpt() ) {
					echo esc_html( get_the_excerpt() );
				} else {
					esc_html_e( 'Use this free online tool to quickly complete common tasks and workflows.', 'tech-tools-hub' );
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
				?>
			</div>
		</div>
	</section>

	<section class="tth-section">
		<div class="inside-article">
			<div class="tth-tool-shell">
				<div class="tth-tool-shell__header">
					<span class="tth-tool-card__icon"><?php echo esc_html( $tool_icon ); ?></span>
					<h2><?php esc_html_e( 'Tool', 'tech-tools-hub' ); ?></h2>
				</div>

				<div class="tth-tool-shell__body">
					<?php
					switch ( $current_page_slug ) {

						case 'word-counter':
							get_template_part( 'template-parts/tools/word-counter' );
							break;

						case 'image-aspect-ratio-calculator':
							get_template_part( 'template-parts/tools/image-aspect-ratio-calc' );
							break;

						case 'json-formatter':
							get_template_part( 'template-parts/tools/json-formatter' );
							break;

                        case 'serp-snippet-preview-tool':
                            get_template_part( 'template-parts/tools/serp-snippet-preview-tool' );
                            break;

						case 'html-css-javascript-minifier':
							get_template_part( 'template-parts/tools/code-minifier' );
							break;

						case 'reading-time-calculator':
							get_template_part( 'template-parts/tools/reading-time-calculator' );
							break;

						case 'meta-tag-generator':
							get_template_part( 'template-parts/tools/meta-tag-generator' );
							break;

						case 'image-dimension-checker':
							get_template_part( 'template-parts/tools/image-dimension-checker' );
							break;

						case 'password-generator':
							get_template_part( 'template-parts/tools/password-generator' );
							break;

						case 'color-contrast-checker':
							get_template_part( 'template-parts/tools/color-contrast-checker' );
							break;

						case 'base64-encoder':
							get_template_part( 'template-parts/tools/base64-encoder' );
							break;

						case 'text-case-converter':
							get_template_part( 'template-parts/tools/text-case-converter' );
							break;

						case 'robots-txt-generator':
							get_template_part( 'template-parts/tools/robots-txt-generator' );
							break;
							
						case 'pomodoro-timer':
							get_template_part( 'template-parts/tools/pomodoro-timer' );
							break;
						

						default:
							?>
							<div class="tth-tool-placeholder">
								<p><?php esc_html_e( 'This tool is still being built. Check back soon.', 'tech-tools-hub' ); ?></p>
							</div>
							<?php
							break;
					}
					?>
				</div>
			</div>
		</div>
	</section>

	<section class="tth-section">
		<div class="inside-article">
			<h2><?php esc_html_e( 'How to Use This Tool', 'tech-tools-hub' ); ?></h2>

			<div class="tth-page-content">
				<p><?php esc_html_e( 'Enter your information into the tool above and review the results instantly. Most tools update in real time or after clicking a button.', 'tech-tools-hub' ); ?></p>
			</div>
		</div>
	</section>

	<?php if ( ! empty( $related_tools ) ) : ?>
		<section class="tth-section">
			<div class="inside-article">
				<h2><?php esc_html_e( 'Related Tools', 'tech-tools-hub' ); ?></h2>

				<div class="tth-tool-grid">
					<?php foreach ( $related_tools as $tool_page ) : ?>
						<article class="tth-tool-card">
							<a class="tth-tool-card__link" href="<?php echo esc_url( get_permalink( $tool_page->ID ) ); ?>">
								<span class="tth-tool-card__icon"><?php echo esc_html( $tool_icon ); ?></span>

								<h3 class="tth-tool-card__title">
									<?php echo esc_html( $tool_page->post_title ); ?>
								</h3>

								<p class="tth-tool-card__description">
									<?php echo esc_html( wp_trim_words( wp_strip_all_tags( $tool_page->post_content ), 18 ) ); ?>
								</p>
							</a>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>

<?php
get_footer();