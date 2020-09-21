<?php
/**
 * Handles the breadcrumb functions.
 *
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! function_exists( 'galaxy_store_get_breadcrumb' ) ) {

	/**
	 * Prints the breadcrumb html.
	 */
	function galaxy_store_get_breadcrumb() {
		?>
		<div class="full-width-breadcrumb">
			<div class="container">
				<h1><?php wp_title( ' ' ); ?></h1>
				<?php galaxy_store_breadcrumbs_trail(); ?>
			</div>
		</div>
		<?php
	}
}


if ( ! function_exists( 'galaxy_store_breadcrumbs_trail' ) ) {

	/**
	 * Shows a breadcrumb for all types of pages.
	 */
	function galaxy_store_breadcrumbs_trail() {

		// Return if is static front page.
		if ( is_front_page() ) {
			return;
		}

		// Yoast breadcrumbs.
		if ( function_exists( 'yoast_breadcrumb' )
		&& true === WPSEO_Options::get( 'breadcrumbs-enable', false ) ) {
			return yoast_breadcrumb();
		}

		// SEOPress breadcrumbs.
		if ( function_exists( 'seopress_display_breadcrumbs' ) ) {
			return seopress_display_breadcrumbs();
		}

		// Rank Math breadcrumbs.
		if ( function_exists( 'rank_math_the_breadcrumbs' ) && RankMath\Helper::get_settings( 'general.breadcrumbs' ) ) {
			return rank_math_the_breadcrumbs();
		}

		if ( ! class_exists( 'Galaxy_Store_Breadcrumb_Trail' ) ) {
			require_once get_template_directory() . '/inc/classes/class-galaxy-store-breadcrumb-trail.php';
		}

		$breadcrumb = new Galaxy_Store_Breadcrumb_Trail(
			array(
				'show_browse' => false,
			)
		);
		return $breadcrumb->trail();
	}
}
