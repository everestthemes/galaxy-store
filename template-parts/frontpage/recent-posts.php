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
			<div class="owl-carousel recent-post__slider">
				<?php
					while ( $the_query->have_posts() ) {
					$the_query->the_post();
				?>
				<div class="recent-post__slider__item">
					<figure>
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="fig-img">
							<?php the_post_thumbnail(); ?>
							<a class="recent-post-overlay" href="<?php the_permalink(); ?>"><span>View Details</span></a>
						</div>
						<?php } else { ?>
							<div class="fig-img fig-img--no"><i class="icon icon-file-image"></i></div>
							<a class="recent-post-overlay" href="<?php the_permalink(); ?>"><span>View Details</span></a>
						<?php } ?>
						<figcaption>
							<div class="recent-post-user flex">
								<div class="recent-post-user__img"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></div>
								<div class="recent-post-user__info">
									<?php if ( empty( $data['hide_author_name'] ) ) { ?>
										<a href="<?php the_permalink(); ?>">
											<i class="icon icon-user-3"></i><?php the_author(); ?>
										</a>
									<?php } ?>
									<?php if ( empty( $data['hide_post_date'] ) ) { ?>
										<div class="date">
												<i class="icon icon-calendar"></i> <?php echo esc_html( get_the_date() ); ?>
										</div>
									<?php } ?>
								</div>
							</div>
							<?php if ( empty( $data['hide_category_name'] ) ) { ?>
								<div class="recent-post-tags">
									<?php the_category(); ?>
								</div>
							<?php } ?>

							<?php
							the_title(
								'<h5 class="blog-title"><a href="' . esc_url( get_the_permalink() ) . '">',
								'</a></h5>'
							);

							the_excerpt();
							?>

						</figcaption>

					</figure>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php
wp_reset_postdata();
