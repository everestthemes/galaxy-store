<?php
/**
 * Main static frontpage template file for this theme.
 *
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) {
	the_post();
	?>
		<main id="primary" class="content">
			<?php

			dynamic_sidebar( 'frontpage-widgets' );

			if ( get_the_content() ) {
				?>
				<div class="section_padd60 frontpage-content">
					<div class="container">
						<div class="row">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</main>
	<?php
}

get_footer();
