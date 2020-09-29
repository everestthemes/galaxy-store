<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Galaxy_Store
 */

get_header();

$galaxy_store_layout_type = is_single() ? 'posts_layout' : 'pages_layout';
?>

<main class="content">
	<?php galaxy_store_get_breadcrumb(); ?>

	<div class="galaxy-store-single">
		<div class="container">
			<div class="row">


				<?php
				if ( 'left-sidebar' === galaxy_store_get_theme_mod( $galaxy_store_layout_type, 'left-sidebar' ) ) {
					! galaxy_store_is_woocommerce_page() ? get_sidebar() : null;
				}
				?>

				<div class="col-xl-8">
					<div class="row">

						<?php
						while ( have_posts() ) {
							the_post();

							get_template_part( 'template-parts/content', 'singular' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						}
						?>

					</div>

				</div>

				<?php
				if ( 'right-sidebar' === galaxy_store_get_theme_mod( $galaxy_store_layout_type, 'right-sidebar' ) ) {
					! galaxy_store_is_woocommerce_page() ? get_sidebar() : null;
				}
				?>

			</div>
		</div>
	</div>

</main>

<?php
get_footer();
