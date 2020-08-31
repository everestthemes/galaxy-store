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
		<main class="content">
			<?php

			dynamic_sidebar( 'frontpage-widgets' );

			if ( get_the_content() ) {
				?>
				<div class="frontpage-content-wrapper">
					<?php the_content(); ?>
				</div>
				<?php
			}
			?>
		</main>
	<?php
}

get_footer();
