<?php
/**
 * Template Name: TTH Calculator
 * Template Post Type: page
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main tth-page tth-page-calculator">
	<section class="tth-section">
		<div class="inside-article">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<h1><?php the_title(); ?></h1>
				<div class="tth-calculator-content">
					<?php the_content(); ?>
				</div>
				<div class="tth-calculator-wrap">
					<?php
					if ( function_exists( 'tth_render_basic_calculator' ) ) {
						echo tth_render_basic_calculator(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>
				</div>
				<?php
			endwhile;
			?>
		</div>
	</section>
</main>

<?php
get_footer();
