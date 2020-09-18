<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Galaxy_Store
 */

?>
<div class="col-md-12 col-sm-12">
	<div class="single-blog-post">

		<div class="blog-media">
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="blog-content">
			<div class="user-section">

				<div class="user-img">
					<img src="<?php echo esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) ); ?>">
				</div>

				<ul class="blog-page-meta">

					<li class="author">
						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
							<?php the_author(); ?>
						</a>
					</li>

					<li class="date">
						<a href="<?php the_permalink(); ?>">
							<i class="icon-calendar"></i> <?php echo esc_html( get_the_date() ); ?>
						</a>
					</li>
				</ul>

			</div>

			<?php if ( get_the_category() ) { ?>
				<div class="cat-tags">
					<ul>
						<?php wp_list_categories(); ?>
					</ul>
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



