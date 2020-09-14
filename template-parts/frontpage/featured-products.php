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
	'meta_key'       => '_featured',
	'meta_value'     => 'yes',
	'posts_per_page' => 8,
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
						?>
						<li class="product">
							<div class="single-prod-detail">
								<div class="wrap-div">
									<div class="img-holder">
										<img src="images/product-3.jpg" alt="image">
									</div>
									<div class="text-holder">
										<h3>
											<a href="#">Wooden single drawer</a>
										</h3>
										<?php
										the_title(
											'<h3><a href="' . esc_url( get_the_permalink() ) . '">',
											'</a></h3>'
										);
										?>
										<div class="product-cats">
											<a href="#">accesories</a>, <a href="#">furniture</a>
										</div>
										<div class="wrapp-product-price">
											<span class="price">
												<del><span>$799.00</span></del>
												<ins><span>$399.00</span></ins>
											</span>
										</div>
										<div class="fade-block">
											<div class="product-info">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
													tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												</p>
											</div>
											<div class="wrap-add-cart">
												<div class="wishlist">
													<a href="#">
														<i class="icon-heart"></i>
														<span class="tool">add to wishlist</span>
													</a>
												</div>
												<div class="addcart">
													<a href="#" class="bg-button">
														<i class="icon-bag"></i>
														add to cart
													</a>
												</div>
												<div class="quick-view">
													<a href="#">
														<i class="icon-magnifier"></i>
														<span class="tool">quick search</span>
													</a>
												</div>
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

