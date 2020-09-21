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


?>
<div class="product-section section_padd60">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<div class="product-header">

					<?php if ( ! empty( $data['title'] ) ) { ?>
						<span><?php echo esc_html( $data['title'] ); ?></span>
					<?php } ?>

					<div class="view-all-button">
						<a href="<?php echo esc_url( get_post_type_archive_link( 'product' ) ); ?>" class="bg-button"><?php esc_html_e( 'View All', 'galaxy-store' ); ?></a>
					</div>
				</div>

				<div class="top-product-list product-list-carousel owl-carousel">
					<?php
					if ( ! empty( $data['product_categories'] && is_array( $data['product_categories'] ) ) ) {
						foreach ( $data['product_categories'] as $product_category ) {
							$product_term_data = get_term_by( 'slug', $product_category, 'product_cat' );
							if ( is_wp_error( $product_term_data ) || ! is_object( $product_term_data ) ) {
								continue;
							}

							$thumbnail_url = galaxy_store_product_term_thumbnail_url( $product_term_data->term_id );

							?>
							<div class="slide">
								<div class="top-product">
									<?php if ( $thumbnail_url ) { ?>
									<div class="image-holder">
										<img src="<?php echo esc_url( $thumbnail_url ); ?>">
									</div>
									<?php } ?>
									<div class="text-holder">
										<?php if ( $product_term_data->name ) { ?>
											<h2><?php echo esc_html( $product_term_data->name ); ?></h2>
										<?php } ?>
										<span class="product-count"><?php echo esc_html( $product_term_data->count ) . ' ' . __( 'Product', 'galaxy-store' ); ?></span>
									</div>
									<a href="<?php echo esc_url( get_term_link( $product_term_data->term_id ) ); ?>" class="view-page"></a>
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
</div>
