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

			<div class="product-cat__slider owl-carousel">
				<?php
					if ( ! empty( $data['product_categories'] && is_array( $data['product_categories'] ) ) ) {
						foreach ( $data['product_categories'] as $product_category ) {
						$product_term_data = get_term_by( 'slug', $product_category, 'product_cat' );
					if ( is_wp_error( $product_term_data ) || ! is_object( $product_term_data ) ) {
						continue;
					}
					$thumbnail_url = galaxy_store_product_term_thumbnail_url( $product_term_data->term_id );
				?>
				<div class="product-cat__slider__item">
					<figure>
						<?php if ( $thumbnail_url ) { ?>
						<div class="fig-img">
							<img src="<?php echo esc_url( $thumbnail_url ); ?>">
						</div>
						<?php } else { ?>
							<div class="fig-img fig-img--no"><i class="icon icon-file-image"></i></div>
						<?php } ?>
						
						<figcaption>
							<?php if ( $product_term_data->name ) { ?>
								<h5><?php echo esc_html( $product_term_data->name ); ?></h5>
							<?php } ?>
							<div class="product-cat-count"><?php echo esc_html( $product_term_data->count ) . ' ' . __( 'Product', 'galaxy-store' ); ?></div>
						</figcaption>
						<a href="<?php echo esc_url( get_term_link( $product_term_data->term_id ) ); ?>" class="btn-overlay"></a>
					</figure>
				</div>
			<?php } } ?>
			</div>
		</div>
	</div>
</div>
