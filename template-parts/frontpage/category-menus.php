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

if ( empty( $data['product_categories'] ) ) {
	return;
}

?>
<div class="section_padd60">
	<div class="container">

		<?php if ( ! empty( $data['title'] ) ) { ?>
			<div class="product-header">
				<span><?php echo esc_html( $data['title'] ); ?></span>
			</div>
		<?php } ?>

		<div class="tab-wrapper">

			<div class="tab-nav">
				<ul>
					<?php
					if ( is_array( $data['product_categories'] ) && ! empty( $data['product_categories'] ) ) {
						foreach ( $data['product_categories'] as $index => $product_category ) {
							$product_cat_data = get_term_by( 'slug', $product_category, 'product_cat' );
							$product_cat_name = ! is_wp_error( $product_cat_data ) && is_object( $product_cat_data ) ? $product_cat_data->name : '';
							?>
							<li>
								<a href="#<?php echo esc_attr( $product_category ); ?>" rel="<?php echo esc_attr( $product_category ); ?>" class="<?php echo 0 === $index ? esc_attr( 'active' ) : null; ?>"><?php echo esc_html( $product_cat_name ); ?></a>
							</li>
							<?php
						}
					}
					?>
				</ul>
			</div>

			<div class="tab-entry">
				<?php
				if ( is_array( $data['product_categories'] ) && ! empty( $data['product_categories'] ) ) {
					foreach ( $data['product_categories'] as $index => $product_category ) {
						?>
						<div id="<?php echo esc_attr( $product_category ); ?>" class="tab-content">
							<div class="woocommerce columns-4">
								<ul class="products">
									<?php

									$args = array(
										'post_type'      => 'product',
										'posts_per_page' => isset( $data['number_of_posts'] ) ? $data['number_of_posts'] : 10,
										'tax_query'      => array(
											array(
												'taxonomy' => 'product_cat',
												'field'    => 'slug',
												'terms'    => $product_category,
											),
										),
									);

									$the_query = new WP_Query( $args );

									while ( $the_query->have_posts() ) {
										$the_query->the_post();

										$wc_product_detail = wc_get_product( get_the_ID() );
										$price_html        = is_object( $wc_product_detail ) ? $wc_product_detail->get_price_html() : '';

										?>
										<li class="product">
											<div class="lay-prod-wrap">
												<div class="img-holder">
													<?php the_post_thumbnail( array( 250, 250 ) ); ?>
													<div class="prod-hover">
														<ul>
															<?php if ( ! empty( $data['enable_quick_search'] ) ) { ?>
																<li>
																	<?php get_template_part( 'addonify/addonify-quick-view-button' ); ?>
																</li>
															<?php } ?>

															<?php if ( ! empty( $data['enable_wishlist'] ) ) { ?>
																<li>
																	<a href="">
																		<i class="icon-heart"></i>
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
												<div class="prod-info">
													<?php
													the_title(
														'<h2><a href="' . esc_url( get_the_permalink() ) . '">',
														'</a></h2>'
													);

													?>
													<div class="wrapp-product-price">
														<span class="price">
															<?php echo $price_html; // phpcs:ignore ?>
														</span>
													</div>

													<div class="addcart">
														<i class="icon-bag"></i>
														<?php woocommerce_template_loop_add_to_cart(); ?>
													</div>

												</div>
											</div>
										</li>

										<?php
									}

									wp_reset_postdata();
									?>
								</ul>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
