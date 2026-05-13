<?php
/**
 * The template for displaying the footer.
 *
 * @package TechToolsHub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer id="colophon" class="site-footer tth-footer">
	<div class="tth-footer__inner">

		<div class="tth-footer__brand">
			<a class="tth-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>

			<p class="tth-footer__description">
				<?php esc_html_e( 'Simple, useful tech tools for developers, marketers, creators, and everyday users.', 'tech-tools-hub' ); ?>
			</p>
		</div>
		<div class="tth-footer__navs">
			<nav class="tth-footer__nav" aria-label="<?php esc_attr_e( 'Footer Navigation', 'tech-tools-hub' ); ?>">
				<h2 class="tth-footer__heading"><?php esc_html_e( 'Explore', 'tech-tools-hub' ); ?></h2>

				<ul>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'tech-tools-hub' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/tools/' ) ); ?>"><?php esc_html_e( 'Tools', 'tech-tools-hub' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>"><?php esc_html_e( 'Blog', 'tech-tools-hub' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/suggest-a-tool/' ) ); ?>"><?php esc_html_e( 'Suggest a Tool', 'tech-tools-hub' ); ?></a></li>
				</ul>
			</nav>

			<nav class="tth-footer__nav" aria-label="<?php esc_attr_e( 'Legal Navigation', 'tech-tools-hub' ); ?>">
				<h2 class="tth-footer__heading"><?php esc_html_e( 'Site Info', 'tech-tools-hub' ); ?></h2>

				<ul>
					<li><a href="<?php echo esc_url( home_url( '/disclaimer/' ) ); ?>"><?php esc_html_e( 'Disclaimer', 'tech-tools-hub' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/terms-of-use/' ) ); ?>"><?php esc_html_e( 'Terms of Use', 'tech-tools-hub' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'tech-tools-hub' ); ?></a></li>
					<li><a href="<?php echo esc_url( home_url( '/advertising-disclosure/' ) ); ?>"><?php esc_html_e( 'Advertising Disclosure', 'tech-tools-hub' ); ?></a></li>
				</ul>
			</nav>
		</div>
	</div>

	<div class="tth-footer__bottom">
		<p>
			&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
			<?php bloginfo( 'name' ); ?>.
			<?php esc_html_e( 'All rights reserved.', 'tech-tools-hub' ); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>