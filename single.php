<?php
/**
 * Single blog post template.
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main tth-page tth-single-post">

	<?php
	while ( have_posts() ) :
		the_post();

		$categories = get_the_category();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'tth-article' ); ?>>

			<header class="tth-article-hero">
				<div class="inside-article">

					<?php if ( ! empty( $categories ) ) : ?>
						<p class="tth-eyebrow">
							<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
								<?php echo esc_html( $categories[0]->name ); ?>
							</a>
						</p>
					<?php endif; ?>

					<h1 class="tth-article-title"><?php the_title(); ?></h1>

					<div class="tth-article-meta">
						<span><?php echo esc_html( get_the_date() ); ?></span>

						<?php if ( get_the_author() ) : ?>
							<span><?php esc_html_e( 'By', 'tech-tools-hub' ); ?> <?php the_author(); ?></span>
						<?php endif; ?>

						<?php
						$reading_time = ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 );
						if ( $reading_time > 0 ) :
							?>
							<span>
								<?php
								printf(
									esc_html(
										_n(
											'%s min read',
											'%s min read',
											$reading_time,
											'tech-tools-hub'
										)
									),
									esc_html( $reading_time )
								);
								?>
							</span>
						<?php endif; ?>
					</div>

					<?php if ( has_excerpt() ) : ?>
						<p class="tth-article-excerpt">
							<?php echo esc_html( get_the_excerpt() ); ?>
						</p>
					<?php endif; ?>

				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="tth-article-featured-image">
					<?php the_post_thumbnail( 'large' ); ?>
				</div>
			<?php endif; ?>

			<section class="tth-section tth-article-section">
				<div class="inside-article tth-article-layout">

					<div class="tth-article-content-wrap">

						<div class="tth-article-content entry-content">
							<?php
							the_content();

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tech-tools-hub' ),
									'after'  => '</div>',
								)
							);
							?>
						</div>

						<footer class="tth-article-footer">
							<?php
							$tags = get_the_tags();

							if ( $tags ) :
								?>
								<div class="tth-article-tags">
									<span><?php esc_html_e( 'Tagged:', 'tech-tools-hub' ); ?></span>

									<?php foreach ( $tags as $tag ) : ?>
										<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>">
											<?php echo esc_html( $tag->name ); ?>
										</a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<nav class="tth-post-navigation" aria-label="<?php esc_attr_e( 'Post navigation', 'tech-tools-hub' ); ?>">
								<div class="tth-post-navigation__prev">
									<?php previous_post_link( '%link', '&larr; %title' ); ?>
								</div>

								<div class="tth-post-navigation__next">
									<?php next_post_link( '%link', '%title &rarr;' ); ?>
								</div>
							</nav>
						</footer>

					</div>

					<aside class="tth-article-sidebar" aria-label="<?php esc_attr_e( 'Article Sidebar', 'tech-tools-hub' ); ?>">

						<div class="tth-sidebar-card">
							<h2><?php esc_html_e( 'Explore Categories', 'tech-tools-hub' ); ?></h2>

							<ul class="tth-category-list">
								<?php
								wp_list_categories(
									array(
										'title_li'   => '',
										'hide_empty' => true,
										'depth'      => 1,
									)
								);
								?>
							</ul>
						</div>

						<div class="tth-sidebar-card tth-sidebar-card--cta">
							<h2><?php esc_html_e( 'Need a quick tool?', 'tech-tools-hub' ); ?></h2>

							<p><?php esc_html_e( 'Browse useful generators, calculators, and utilities built for everyday tech tasks.', 'tech-tools-hub' ); ?></p>

							<a class="button" href="<?php echo esc_url( home_url( '/tools/' ) ); ?>">
								<?php esc_html_e( 'View Tools', 'tech-tools-hub' ); ?>
							</a>
						</div>

					</aside>

				</div>
			</section>

		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();