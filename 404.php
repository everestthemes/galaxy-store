<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Galaxy_Store
 */

get_header();
?>

	<main class="content">
		<div class="page-404">
			<div class="container">
				<div class="text-holder">

					<span><?php echo wp_kses_post( __( '404', 'galaxy-store' ) . '<br>' . __( 'Page Not Found', 'galaxy-store' ) ); ?></span>

					<h1><?php esc_html_e( 'Don\'t Worry !', 'galaxy-store' ); ?></h1>

					<h2><?php esc_html_e( 'You are not lost', 'galaxy-store' ); ?></h2>

					<?php get_search_form(); ?>

				</div>
			</div>
		</div>
	</main>

<?php
get_footer();
