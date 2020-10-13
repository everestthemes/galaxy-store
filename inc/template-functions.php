<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Galaxy_Store
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function galaxy_store_body_classes( $classes ) {

	if ( ! is_front_page() ) {
		$classes[] = 'toggle-cat-nav';
	}

	$galaxy_store_layout_type = 'archives_layout';

	if ( is_single() ) {
		$galaxy_store_layout_type = 'posts_layout';
	}

	if ( is_page() ) {
		$galaxy_store_layout_type = 'pages_layout';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	// Else use key as body class.
	if ( ! is_active_sidebar( 'sidebar-1' ) || 'no-sidebar' === galaxy_store_get_theme_mod( $galaxy_store_layout_type, 'right-sidebar' ) ) {
		$classes[] = 'no-sidebar';
	} else {
		$classes[] = galaxy_store_get_theme_mod( $galaxy_store_layout_type, 'right-sidebar' );
	}

	$classes[] = galaxy_store_get_theme_mod( 'site_layout', 'boxed' );

	return $classes;
}
add_filter( 'body_class', 'galaxy_store_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function galaxy_store_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'galaxy_store_pingback_header' );
