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

if ( empty( $data['category'] ) ) {
	return;
}

$args = array(
	'post_type'      => 'post',
	'posts_per_page' => isset( $data['number_of_posts'] ) ? $data['number_of_posts'] : 10,
);

if ( ! empty( $data['category'] ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => $data['category'],
		),
	);
}

$the_query = new WP_Query( $args );

?>
<div class="service-block section_padd60 layout-2">
	<div class="container">
		<div class="row">

			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				?>
				<div class="col-lg-4 col-md-6">
					<div class="service-section">
						<div class="img-holder umbrella">
							<?php the_post_thumbnail( array( 150, 150 ) ); ?>
						</div>
						<div class="text-holder">
							<?php
							the_title(
								'<h4>',
								'</h4>'
							);

							if ( get_the_content() ) {
								?>
								<span><?php echo wp_kses_post( get_the_content() ); ?></span>
								<?php
							}
							?>
						</div>
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
