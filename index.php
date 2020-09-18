<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Galaxy_Store
 */

get_header();
?>

<main class="content">
	<?php galaxy_store_get_breadcrumb(); ?>

	<div class="blog-posts grid-list">
		<div class="container">
			<div class="row">
				<div class="col-xl-8">
					<div class="row">

						<?php
						while ( have_posts() ) {
							the_post();

							get_template_part( 'template-parts/content' );
						}
						?>

					</div>

					<?php the_posts_pagination(); ?>

				</div>

				<?php get_sidebar(); ?>

			</div>
		</div>
	</div>

</main>

<?php
get_footer();
