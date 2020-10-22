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
<div class="container">
	<div class="row">
		<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
		?>
		<div class="col-md-4 col-sm-6">
			<figure class="service__item">
				<div class="service__item__img"><?php the_post_thumbnail( array( 150, 150 ) ); ?></div>
				<figcaption>
					<?php
						the_title(
							'<h5>',
							'</h5>'
						);

						if ( get_the_content() ) {
							?>
							<?php echo wp_kses_post( get_the_content() ); ?>
							<?php
						}
						?>
				</figcaption>
			</figure>
		</div>
		<?php } ?>
	</div>
</div>
<?php
wp_reset_postdata();
