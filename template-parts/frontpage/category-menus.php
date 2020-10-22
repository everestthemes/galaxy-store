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
<div class="container">
	<div class="row">
		<div class="col tab-wrapper">
			<header class="frontpage-widget__header flex">
				<h4>
					<?php if ( ! empty( $data['title'] ) ) { ?>
						<span><?php echo esc_html( $data['title'] ); ?></span>
					<?php } ?>
				</h4>
				<ul class="product-cat-menu__tab">
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
			</header>

			<div class="product-cat-menu__cnt">
				<?php
				if ( is_array( $data['product_categories'] ) && ! empty( $data['product_categories'] ) ) {
					foreach ( $data['product_categories'] as $index => $product_category ) {
						?>
						<div id="<?php echo esc_attr( $product_category ); ?>" class="product-cat-menu__cnt__item">
								<ul class="flex ">
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
										<li>
											<figure>
												<div class="fig-img">
													<?php the_post_thumbnail( array( 250, 250 ) ); ?>
													<div class="fig-img__hover">
														<?php if ( ! empty( $data['enable_quick_search'] ) ) { ?>
															<div class="fig-img__hover__list">
																<?php get_template_part( 'addonify/addonify-quick-view-button' ); ?>
															</div>
														<?php } ?>

														<?php if ( ! empty( $data['enable_wishlist'] ) ) { ?>
															<a class="fig-img__hover__list">
																<i class="icon-heart"></i>
															</a>
														<?php } ?>
													</div>
												</div>
												<figcaption>
													<?php
													the_title(
														'<h5><a href="' . esc_url( get_the_permalink() ) . '">',
														'</a></h5>'
													);

													?>
													<div class="price"><?php echo $price_html; // phpcs:ignore ?></div>
													<div class="add-cart"><?php woocommerce_template_loop_add_to_cart(); ?></div>
												</figcaption>
											</figure>
										</li>

										<?php
									}

									wp_reset_postdata();
									?>
								</ul>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>

