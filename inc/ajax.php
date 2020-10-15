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

		$results   = '';
		$ajax_data = isset( $_POST['action'] ) ? galaxy_store_sanitize( $_POST ) : array();
		$keyword   = ! empty( $ajax_data['keyword'] ) ? $ajax_data['keyword'] : '';
		$category  = ! empty( $ajax_data['category'] ) ? $ajax_data['category'] : '';

		if ( ! $keyword ) {
			wp_send_json_success( $results );
		}

		$args = array(
			'post_type' => array( 'post', 'product' ),
			's'         => $keyword,
		);

		if ( $category ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $category,
				),
			);
		}

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				$results .= '<li class="matched-item"><a href="#">' . get_the_title() . '</a></li>';
			}
		} else {
			$results = '<li class="no-item-found">' . esc_html__( 'No item found.', 'galaxy-store' ) . '</li>';
		}

		wp_reset_postdata();

		wp_send_json_success( $results );

	}
	add_action( 'wp_ajax_galaxy_store_ajax_search', 'galaxy_store_ajax_search' );
	add_action( 'wp_ajax_nopriv_galaxy_store_ajax_search', 'galaxy_store_ajax_search' );
}
