<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Galaxy_Store
 */

get_header();
?>

<main class="content">
	<?php galaxy_store_get_breadcrumb(); ?>

	<div class="galaxy-store-single">
		<div class="container">
			<div class="row">

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

				<?php get_sidebar(); ?>

			</div>
		</div>
	</div>

</main>

<?php
get_footer();
