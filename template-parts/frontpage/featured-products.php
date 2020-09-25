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
<div class="section_padd60 section-bg1">
	<div class="container">
		<div class="product-header">

			<?php if ( ! empty( $data['title'] ) ) { ?>
				<span><?php echo esc_html( $data['title'] ); ?></span>
			<?php } ?>

			<div class="view-all-button">
				<a href="<?php echo esc_url( get_post_type_archive_link( 'product' ) ); ?>" class="bg-button"><?php esc_html_e( 'View All', 'galaxy-store' ); ?></a>
			</div>
		</div>

		<div class="product-grid">
			<div class="woocommerce columns-4">
				<ul class="products">

					<?php
					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						$product_catogories = get_the_terms( get_the_ID(), 'product_cat' );
						$product_catogory   = ! is_wp_error( $product_catogories ) && is_object( $product_catogories ) ? wp_list_pluck( $product_catogories, 'name', 'term_id' ) : array();

						$wc_product_detail = wc_get_product( get_the_ID() );
						$price_html        = is_object( $wc_product_detail ) ? $wc_product_detail->get_price_html() : '';

						?>
						<li class="product">
							<div class="single-prod-detail">
								<div class="wrap-div">

									<div class="img-holder">
										<img src="<?php the_post_thumbnail_url(); ?>">
									</div>

									<div class="text-holder">
										<?php
										the_title(
											'<h3><a href="' . esc_url( get_the_permalink() ) . '">',
											'</a></h3>'
										);
										?>

										<div class="product-cats">
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

										<div class="wrapp-product-price">
											<span class="price">
												<?php echo $price_html; // phpcs:ignore ?>
											</span>
										</div>

										<div class="fade-block">
											<div class="product-info">
												<?php the_excerpt(); ?>
											</div>

											<div class="wrap-add-cart">

												<div class="wishlist">
													<a href="#">
														<i class="icon-heart"></i>
													</a>
												</div>

												<div class="addcart">
													<?php woocommerce_template_loop_add_to_cart(); ?>
												</div>

												<?php if ( ! empty( $data['enable_quick_search'] ) ) { ?>
													<div class="quick-view">
														<?php get_template_part( 'addonify/addonify-quick-view-button' ); ?>
													</div>
												<?php } ?>

											</div>

										</div>
									</div>
								</div>
								<div class="content-imagin"></div>
							</div>
						</li>

						<?php
					}
					?>


				</ul>
			</div>

		</div>

	</div>
</div>
<?php
wp_reset_postdata();

