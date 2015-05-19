<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package wcmia
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function wcmia_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'wcmia_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function wcmia_jetpack_setup
add_action( 'after_setup_theme', 'wcmia_jetpack_setup' );

function wcmia_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function wcmia_infinite_scroll_render