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
<div class="banner" style="<?php echo esc_attr( implode( ' ', $styles ) ); ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="owl-carousel banner__slider">
					<?php
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							?>
							<div class="banner__slider__item flex">
								<div class="banner__slider__item__cnt">

									<?php the_title( '<h2>', '</h2>' ); ?>

									<?php if ( get_the_excerpt() ) { ?>
										<p>
											<?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), '20', '...' ) ); ?>
										</p>
										<?php } ?>

									<a href="<?php the_permalink(); ?>" class="btn btn--md btn--theme mt-4">
										<?php echo isset( $data['button_label'] ) ? esc_html( $data['button_label'] ) : esc_html__( 'View Product', 'galaxy-store' ); ?>
									</a>
								</div>
							
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="banner__slider__item__img">
											<?php the_post_thumbnail(); ?>
										</div>
									<?php } ?>

								</div>
							<?php
						}
						?>

				</div>
			</div>
		</div>
	</div>
</div>


<?php
wp_reset_postdata();