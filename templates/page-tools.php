<?php
/**
 * Template Name: TTH Tools Directory
 * Template Post Type: page
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main tth-page tth-page-tools">
	<section class="tth-section">
		<div class="inside-article">
			<h1><?php the_title(); ?></h1>
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div>
	</section>

	<section class="tth-section">
		<div class="inside-article">
			<h2><?php esc_html_e( 'All Tools', 'tech-tools-hub' ); ?></h2>
			<div class="tth-tool-grid">
				<?php
				$tool_pages = get_pages(
					array(
						'child_of'   => get_the_ID(),
						'sort_column'=> 'menu_order,post_title',
						'post_status'=> 'publish',
					)
				);

				if ( ! empty( $tool_pages ) ) :
					foreach ( $tool_pages as $tool_page ) :
						set_query_var( 'tth_tool_title', $tool_page->post_title );
						set_query_var( 'tth_tool_description', tth_get_tool_excerpt( $tool_page, 20 ) );
						set_query_var( 'tth_tool_url', tth_get_tool_link( $tool_page->ID ) );
						set_query_var( 'tth_tool_icon', 'TOOL' );
						get_template_part( 'template-parts/tool-card' );
					endforeach;
				else :
					?>
					<p><?php esc_html_e( 'No child pages found. Add tool pages under this page to populate the directory.', 'tech-tools-hub' ); ?></p>
					<?php
				endif;
				?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
