<?php
/**
 * Displays the main blog index.
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$paged = max( 1, get_query_var( 'paged' ), get_query_var( 'page' ) );
?>

<main id="primary" class="site-main tth-page tth-blog-hub">

	<section class="tth-hero tth-blog-hero">
		<div class="inside-article">
			<p class="tth-eyebrow"><?php esc_html_e( 'Tech Tools Hub Blog', 'tech-tools-hub' ); ?></p>

			<h1><?php esc_html_e( 'Guides, tips, and tool recommendations', 'tech-tools-hub' ); ?></h1>

			<p class="tth-hero__intro">
				<?php esc_html_e( 'Explore practical tutorials, productivity tips, software comparisons, and helpful resources for getting more out of modern tech tools.', 'tech-tools-hub' ); ?>
			</p>
		</div>
	</section>

	<section class="tth-section tth-blog-layout-section">
		<div class="inside-article tth-blog-layout">

			<div class="tth-blog-main">

				<?php if ( 1 === $paged ) : ?>
					<?php
					$featured_query = new WP_Query(
						array(
							'post_type'           => 'post',
							'posts_per_page'      => 1,
							'ignore_sticky_posts' => false,
						)
					);
					?>

					<?php if ( $featured_query->have_posts() ) : ?>
						<div class="tth-featured-post">
							<p class="tth-featured-post__label"><?php esc_html_e( 'Featured Article', 'tech-tools-hub' ); ?></p>

							<?php
							while ( $featured_query->have_posts() ) :
								$featured_query->the_post();
								?>

								<article <?php post_class( 'tth-featured-post__card' ); ?>>
									<a class="tth-featured-post__image" href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( 'large' ); ?>
										<?php else : ?>
											<div class="tth-post-card__placeholder">
												<?php esc_html_e( 'Tech Tools Hub', 'tech-tools-hub' ); ?>
											</div>
										<?php endif; ?>
									</a>

									<div class="tth-featured-post__content">
										<div class="tth-post-card__meta">
											<span><?php echo esc_html( get_the_date() ); ?></span>
											<?php
											$category = get_the_category();
											if ( ! empty( $category ) ) :
												?>
												<span><?php echo esc_html( $category[0]->name ); ?></span>
											<?php endif; ?>
										</div>

										<h2 class="tth-featured-post__title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>

										<p class="tth-featured-post__excerpt">
											<?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?>
										</p>

										<a class="button" href="<?php the_permalink(); ?>">
											<?php esc_html_e( 'Read Article', 'tech-tools-hub' ); ?>
										</a>
									</div>
								</article>

							<?php endwhile; ?>
						</div>

						<?php wp_reset_postdata(); ?>
					<?php endif; ?>
				<?php endif; ?>

				<div class="tth-blog-section-heading">
					<h2><?php esc_html_e( 'Latest Articles', 'tech-tools-hub' ); ?></h2>
					<p><?php esc_html_e( 'Fresh posts, guides, and tool breakdowns.', 'tech-tools-hub' ); ?></p>
				</div>

				<?php if ( have_posts() ) : ?>

					<div class="tth-post-grid">
						<?php
						while ( have_posts() ) :
							the_post();
							?>

							<article <?php post_class( 'tth-post-card' ); ?>>
								<a class="tth-post-card__image" href="<?php the_permalink(); ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( 'medium_large' ); ?>
									<?php else : ?>
										<div class="tth-post-card__placeholder">
											<?php esc_html_e( 'Article', 'tech-tools-hub' ); ?>
										</div>
									<?php endif; ?>
								</a>

								<div class="tth-post-card__content">
									<div class="tth-post-card__meta">
										<span><?php echo esc_html( get_the_date() ); ?></span>
										<?php
										$category = get_the_category();
										if ( ! empty( $category ) ) :
											?>
											<span><?php echo esc_html( $category[0]->name ); ?></span>
										<?php endif; ?>
									</div>

									<h3 class="tth-post-card__title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>

									<p class="tth-post-card__excerpt">
										<?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?>
									</p>

									<a class="tth-post-card__read-more" href="<?php the_permalink(); ?>">
										<?php esc_html_e( 'Read more', 'tech-tools-hub' ); ?>
									</a>
								</div>
							</article>

						<?php endwhile; ?>
					</div>

					<div class="tth-pagination">
						<?php
						the_posts_pagination(
							array(
								'mid_size'  => 1,
								'prev_text' => esc_html__( 'Previous', 'tech-tools-hub' ),
								'next_text' => esc_html__( 'Next', 'tech-tools-hub' ),
							)
						);
						?>
					</div>

				<?php else : ?>

					<div class="tth-empty-state">
						<h2><?php esc_html_e( 'No posts found', 'tech-tools-hub' ); ?></h2>
						<p><?php esc_html_e( 'Check back soon for new articles.', 'tech-tools-hub' ); ?></p>
					</div>

				<?php endif; ?>

			</div>

			<aside class="tth-blog-sidebar" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'tech-tools-hub' ); ?>">

				<div class="tth-sidebar-card">
					<h2><?php esc_html_e( 'Categories', 'tech-tools-hub' ); ?></h2>

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

				<div class="tth-sidebar-card">
					<h2><?php esc_html_e( 'Popular Tools', 'tech-tools-hub' ); ?></h2>

					<ul class="tth-sidebar-links">
						<li><a href="<?php echo esc_url( home_url( '/tools/' ) ); ?>"><?php esc_html_e( 'All Tools', 'tech-tools-hub' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/suggest-a-tool/' ) ); ?>"><?php esc_html_e( 'Suggest a Tool', 'tech-tools-hub' ); ?></a></li>
					</ul>
				</div>

				<div class="tth-sidebar-card tth-sidebar-card--cta">
					<h2><?php esc_html_e( 'Have a tool idea?', 'tech-tools-hub' ); ?></h2>

					<p><?php esc_html_e( 'Recommend a useful app, calculator, or generator for us to add.', 'tech-tools-hub' ); ?></p>

					<a class="button" href="<?php echo esc_url( home_url( '/suggest-a-tool/' ) ); ?>">
						<?php esc_html_e( 'Suggest a Tool', 'tech-tools-hub' ); ?>
					</a>
				</div>

			</aside>

		</div>
	</section>

</main>

<?php
get_footer();