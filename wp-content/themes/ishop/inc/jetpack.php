<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package ishop
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function ishop_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'type' => 'scroll',	  //Accepts two different values: scroll or click.
		'footer_widgets' => false, //If footer widgets are present, the scroll type will be set to click so the widgets are accessible.
		'posts_per_page' => false, //How many posts are loaded each time Infinite Scroll acts
		'wrapper'        => true,
		'render'    => 'republic_infinite_scroll_render', //it appends, and utilizes template parts in the content-{post format}.php
		'footer'    => 'page',
	) );
} // end function ishop_jetpack_setup
add_action( 'after_setup_theme', 'ishop_jetpack_setup' );

function ishop_infinite_scroll_render() {
	echo '<ul class="large-block-grid-2">';
	while ( have_posts() ) {
		the_post();
		echo '<li>';
		get_template_part( 'template-parts/content', get_post_format() );
		echo '</li>';
	}
	
	echo '</ul>';
} // end function ishop_infinite_scroll_render