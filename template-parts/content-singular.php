<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Galaxy_Store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$galaxy_store_author_id         = get_the_author_meta( 'ID' );
$galaxy_store_author_avatar_url = get_avatar_url( $galaxy_store_author_id, array( 'size' => 150 ) );

?>
<div class="single-blog-post single-blog">

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="blog-media">
			<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title_attribute(); ?>">
		</div>
	<?php } ?>

	<div class="blog-content">

		<div class="user-section">

			<?php if ( $galaxy_store_author_avatar_url ) { ?>
				<div class="user-img">
					<img src="<?php echo esc_url( $galaxy_store_author_avatar_url ); ?>">
				</div>
			<?php } ?>

			<?php if ( get_the_date() || get_the_author() ) { ?>
				<ul class="blog-page-meta">
					<?php
					if ( get_the_author() ) {
						?>
						<li class="author">
							<a href="<?php echo esc_url( get_author_posts_url( $galaxy_store_author_id ) ); ?>"><?php the_author(); ?></a>
						</li>
						<?php
					}

					if ( get_the_date() ) {
						?>
						<li class="date">
							<i class="icon-calendar"></i> <?php echo esc_html( get_the_date() ); ?>
						</li>
						<?php
					}
					?>
				</ul>
			<?php } ?>

		</div>

		<?php if ( has_category() ) { ?>
			<div class="cat-tags">
				<?php the_category(); ?>
			</div>
		<?php } ?>

		<?php
		the_title( '<h4 class="blog-title">', '</h4>' );

		the_content();

		if ( ! galaxy_store_is_woocommerce_page() ) {
			wp_link_pages();
		}
		?>

	</div>
</div>
