<?php

/**
 * The template for displaying archive pages
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

				<?php
				if ( 'left-sidebar' === galaxy_store_get_theme_mod( 'archives_layout', 'left-sidebar' ) ) {
					get_sidebar();
				}
				?>

				<?php if ( have_posts() ) { ?>
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
					<?php
				} else {
					get_template_part( 'template-parts/content', 'none' );
				}
				?>

				<?php
				if ( 'right-sidebar' === galaxy_store_get_theme_mod( 'archives_layout', 'right-sidebar' ) ) {
					get_sidebar();
				}
				?>

			</div>
		</div>
	</div>

</main>

<?php
get_footer();
