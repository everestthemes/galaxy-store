<?php
/**
 * Ajax functions.
 *
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! function_exists( 'galaxy_store_ajax_search' ) ) {

	/**
	 * Sends ajax search result.
	 */
	function galaxy_store_ajax_search() {

	}
	add_action( 'wp_ajax_galaxy_store_ajax_search', 'galaxy_store_ajax_search' );
	add_action( 'wp_ajax_nopriv_galaxy_store_ajax_search', 'galaxy_store_ajax_search' );
}
