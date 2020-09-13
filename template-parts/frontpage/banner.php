<?php
/**
 * Widget template file for the frontend.
 * We are loading this template and passing the args ( $data ) from
 * respective widget class using the custom function ( galaxy_store_get_template_part ) that replicates like
 * get_template_part function but also provides option to pass args.
 *
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$styles = array(
	"background-image: url({$data['image_uri']});",
);

$args = array(
	'post_type'      => 'product',
	'posts_per_page' => 5,
	'tax_query'      => array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => isset( $data['product_category'] ) ? $data['product_category'] : null,
		),
	),
);

$the_query = new WP_Query( $args );

?>
<div class="main-banner layout-1" style="<?php echo esc_attr( implode( ' ', $styles ) ); ?>">
	<div class="container">
		<div class="owl-carousel slider-group">

			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				?>
				<div class="item">
					<div class="content-holder">
						<div class="caption-text">

							<?php if ( get_the_excerpt() ) { ?>
								<p class="sub-title">
									<?php echo wp_kses_post( get_the_excerpt() ); ?>
								</p>
							<?php } ?>

							<?php the_title( '<h2>', '</h2>' ); ?>

							<a href="<?php the_permalink(); ?>" class="bg-button">
								<?php echo isset( $data['button_label'] ) ? esc_html( $data['button_label'] ) : esc_html__( 'View Product', 'galaxy-store' ); ?>
							</a>

						</div>

						<?php if ( has_post_thumbnail() ) { ?>
							<div class="img-holder">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php } ?>

					</div>
				</div>
				<?php
			}
			?>

		</div>
	</div>
</div>
<?php
wp_reset_postdata();

