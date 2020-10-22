<?php
/**
 * Widget template file for the frontend.
 *
 * * We are loading this template and passing the args ( $data ) from
 * * respective widget class using the custom function ( galaxy_store_get_template_part ) that replicates like
 * * get_template_part function but also provides option to pass args.
 *
 * @see galaxy_store_get_template_part()
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$args = array(
	'post_type'      => 'product',
	'posts_per_page' => 8,
	'post__in'       => wc_get_featured_product_ids(),
);


$the_query = new WP_Query( $args );

?>
<div class="container">
	<div class="row">
		<div class="col">
			<header class="frontpage-widget__header flex">
				<h4>
					<?php if ( ! empty( $data['title'] ) ) { ?>
						<span><?php echo esc_html( $data['title'] ); ?></span>
					<?php } ?>
				</h4>
				<a href="<?php echo esc_url( get_post_type_archive_link( 'product' ) ); ?>" class="btn-view-all"><?php esc_html_e( 'View All', 'galaxy-store' ); ?></a>
			</header>

			<div class="flex-list flex product-featured__cnt">
				<?php
					while ( $the_query->have_posts() ) {
					$the_query->the_post();

					$product_catogories = get_the_terms( get_the_ID(), 'product_cat' );
					$product_catogory   = ! is_wp_error( $product_catogories ) && is_object( $product_catogories ) ? wp_list_pluck( $product_catogories, 'name', 'term_id' ) : array();

					$wc_product_detail = wc_get_product( get_the_ID() );
					$price_html        = is_object( $wc_product_detail ) ? $wc_product_detail->get_price_html() : '';

				?>
				<div class="flex-list__item flex-list__item--4">
					<figure>
						<a class="overlay" href='<?php echo esc_url( get_the_permalink( $prod_cat_id ) ); ?>'></a>
						<div class="fig-img">
							<img src="<?php the_post_thumbnail_url(); ?>">
						</div>
						<figcaption>
							<?php
								the_title(
									'<h5><a href="' . esc_url( get_the_permalink() ) . '">',
									'</a></h5>'
								);
							?>
							<div class="product-featured__cnt__dec">
								<?php
										if ( is_array( $product_catogory ) && ! empty( $product_catogory ) ) {
											foreach ( $product_catogory as $prod_cat_id => $product_cat_name ) {
												?>
												<a href="<?php echo esc_url( get_the_permalink( $prod_cat_id ) ); ?>"><?php echo esc_html( $product_cat_name ); ?></a>
												<?php
											}
										}
										?>
							</div>
							<div class="product-featured__cnt__price">
								<?php echo $price_html; // phpcs:ignore ?>
							</div>

							<div class="addcart">
								<?php woocommerce_template_loop_add_to_cart(); ?>
							</div>

							<div class="wishlist"><i class="icon-heart-empty"></i></div>
							<?php if ( ! empty( $data['enable_quick_search'] ) ) { ?>
								<div class="quick-view">
									<?php get_template_part( 'addonify/addonify-quick-view-button' ); ?>
								</div>
							<?php } ?>
							
						</figcaption>
						
					</figure>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>



<?php
wp_reset_postdata();

