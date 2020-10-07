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
<div class="blog-posts section_padd60 section-bg1">
	<div class="container">
		<?php if ( ! empty( $data['title'] ) ) { ?>
		<div class="section-header">
			<span><?php echo esc_html( $data['title'] ); ?></span>
		</div>
		<?php } ?>

		<div class="owl-carousel blog-slider">
			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				?>
				<div class="item">
					<div class="single-blog-post">

						<?php if ( has_post_thumbnail() ) { ?>
							<div class="blog-media">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php } ?>

						<div class="blog-content">
							<div class="user-section">

								<div class="user-img">
									<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
								</div>

								<ul class="blog-page-meta">

									<?php if ( empty( $data['hide_author_name'] ) ) { ?>
										<li class="author">
											<a href="<?php the_permalink(); ?>">
												<?php the_author(); ?>
											</a>
										</li>
									<?php } ?>

									<?php if ( empty( $data['hide_post_date'] ) ) { ?>
										<li class="date">
											<a href="<?php the_permalink(); ?>">
												<i class="icon-calendar"></i> <?php echo esc_html( get_the_date() ); ?>
											</a>
										</li>
									<?php } ?>

								</ul>
							</div>

							<?php if ( empty( $data['hide_category_name'] ) ) { ?>
								<div class="cat-tags">
									<?php the_category(); ?>
								</div>
							<?php } ?>

							<?php
							the_title(
								'<h4 class="blog-title"><a href="' . esc_url( get_the_permalink() ) . '">',
								'</a></h4>'
							);

							the_excerpt();
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
