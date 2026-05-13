<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'tth_enqueue_assets' ) ) {
	function tth_enqueue_assets() {
		$parent_version   = wp_get_theme( 'generatepress' )->get( 'Version' );
		$child_style_path = get_stylesheet_directory() . '/style.css';
		$main_css_path    = get_stylesheet_directory() . '/assets/css/main.min.css';
        $home_css_path    = get_stylesheet_directory() . '/assets/css/home.min.css';
		$main_js_path     = get_stylesheet_directory() . '/assets/js/main.min.js';

		wp_enqueue_style(
			'generatepress-parent-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$parent_version
		);

		wp_enqueue_style(
			'tech-tools-hub-style',
			get_stylesheet_uri(),
			array( 'generatepress-parent-style' ),
			file_exists( $child_style_path ) ? filemtime( $child_style_path ) : null
		);

		wp_enqueue_style(
			'tech-tools-hub-main',
			get_stylesheet_directory_uri() . '/assets/css/main.min.css',
			array( 'tech-tools-hub-style' ),
			file_exists( $main_css_path ) ? filemtime( $main_css_path ) : null
		);

        if ( is_front_page() ) {
			wp_enqueue_style(
				'tech-tools-hub-home',
				get_stylesheet_directory_uri() . '/assets/css/home.min.css',
				array( 'tech-tools-hub-main' ),
				file_exists( $home_css_path ) ? filemtime( $home_css_path ) : null
			);
		}

		wp_enqueue_script(
			'tech-tools-hub-main',
			get_stylesheet_directory_uri() . '/assets/js/main.min.js',
			array(),
			file_exists( $main_js_path ) ? filemtime( $main_js_path ) : null,
			true
		);

		if ( is_page_template( 'templates/page-tool.php' ) ) {
			wp_enqueue_style(
				'tech-tools-hub-tool',
				get_stylesheet_directory_uri() . '/assets/css/tools.min.css',
				array( 'tech-tools-hub-main' ),
				filemtime( get_stylesheet_directory() . '/assets/css/tools.min.css' )
			);
		}

		if ( is_home() || is_archive() || is_search() ) {
			$blog_css_path = get_stylesheet_directory() . '/assets/css/blog.min.css';

			wp_enqueue_style(
				'tech-tools-hub-blog',
				get_stylesheet_directory_uri() . '/assets/css/blog.min.css',
				array( 'tech-tools-hub-main' ),
				file_exists( $blog_css_path ) ? filemtime( $blog_css_path ) : null
			);
		}

		if ( is_singular( 'post' ) ) {
			$single_css_path = get_stylesheet_directory() . '/assets/css/single.min.css';

			wp_enqueue_style(
				'tech-tools-hub-single',
				get_stylesheet_directory_uri() . '/assets/css/single.min.css',
				array( 'tech-tools-hub-main' ),
				file_exists( $single_css_path ) ? filemtime( $single_css_path ) : null
			);
		}

		if ( is_page_template( 'templates/page-tool.php' ) ) {
			$current_slug = get_post_field( 'post_name', get_queried_object_id() );

			switch ( $current_slug ) {
				case 'word-counter':
					wp_enqueue_script(
						'tech-tools-hub-word-counter',
						get_stylesheet_directory_uri() . '/assets/js/tools/word-counter.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/word-counter.min.js' ),
						true
					);
					break;

				case 'json-formatter':
					wp_enqueue_script(
						'tech-tools-hub-json-formatter',
						get_stylesheet_directory_uri() . '/assets/js/tools/json-formatter.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/json-formatter.min.js' ),
						true
					);
					break;

				case 'image-aspect-ratio-calculator':
					wp_enqueue_script(
						'tech-tools-hub-image-aspect-ratio-calculator',
						get_stylesheet_directory_uri() . '/assets/js/tools/image-aspect-ratio-calc.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/image-aspect-ratio-calc.min.js' ),
						true
					);
					break;

				case 'serp-snippet-preview-tool':
					wp_enqueue_script(
						'tech-tools-hub-serp-snippet-preview-tool',
						get_stylesheet_directory_uri() . '/assets/js/tools/serp-snippet-preview-tool.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/serp-snippet-preview-tool.min.js' ),
						true
					);
					break;

				case 'html-css-javascript-minifier':
					wp_enqueue_script(
						'tech-tools-hub-code-minifier',
						get_stylesheet_directory_uri() . '/assets/js/tools/code-minifier.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/code-minifier.min.js' ),
						true
					);
					break;

				case 'reading-time-calculator':
					wp_enqueue_script(
						'tech-tools-hub-reading-time-calculator',
						get_stylesheet_directory_uri() . '/assets/js/tools/reading-time-calculator.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/reading-time-calculator.min.js' ),
						true
					);
					break;

				case 'meta-tag-generator':
					wp_enqueue_script(
						'tech-tools-hub-meta-tag-generator',
						get_stylesheet_directory_uri() . '/assets/js/tools/meta-tag-generator.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/meta-tag-generator.min.js' ),
						true
					);
					break;

				case 'image-dimension-checker':
					wp_enqueue_script(
						'tech-tools-hub-image-dimension-checker',
						get_stylesheet_directory_uri() . '/assets/js/tools/image-dimension-checker.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/image-dimension-checker.min.js' ),
						true
					);
					break;

				case 'password-generator':
					wp_enqueue_script(
						'tech-tools-hub-password-generator',
						get_stylesheet_directory_uri() . '/assets/js/tools/password-generator.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/password-generator.min.js' ),
						true
					);
					break;

				case 'color-contrast-checker':
					wp_enqueue_script(
						'tech-tools-hub-contrast-checker',
						get_stylesheet_directory_uri() . '/assets/js/tools/color-contrast-checker.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/color-contrast-checker.min.js' ),
						true
					);
					break;

				case 'base64-encoder':
					wp_enqueue_script(
						'tech-tools-hub-base64-encoder',
						get_stylesheet_directory_uri() . '/assets/js/tools/base64-encoder.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/base64-encoder.min.js' ),
						true
					);
					break;

				case 'text-case-converter':
					wp_enqueue_script(
						'tech-tools-hub-text-case-converter',
						get_stylesheet_directory_uri() . '/assets/js/tools/text-case-converter.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/text-case-converter.min.js' ),
						true
					);
					break;

				case 'robots-txt-generator':
					wp_enqueue_script(
						'tech-tools-hub-robots-txt-generator',
						get_stylesheet_directory_uri() . '/assets/js/tools/robots-txt-generator.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/robots-txt-generator.min.js' ),
						true
					);
					break;

				case 'pomodoro-timer':
					wp_enqueue_script(
						'tech-tools-hub-pomodoro-timer',
						get_stylesheet_directory_uri() . '/assets/js/tools/pomodoro-timer.min.js',
						array(),
						filemtime( get_stylesheet_directory() . '/assets/js/tools/pomodoro-timer.min.js' ),
						true
					);
					break;
	
			}
		}



	}
}
add_action( 'wp_enqueue_scripts', 'tth_enqueue_assets', 20 );