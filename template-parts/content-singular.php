<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Galaxy_Store
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php galaxy_store_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		if ( ! galaxy_store_is_woocommerce_page() ) {
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'galaxy-store' ),
					'after'  => '</div>',
				)
			);
		}
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'galaxy-store' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php
the_post_navigation();

?>
<div id="primary">
	<div class="single-blog-post single-blog">
		<div class="blog-media">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
		<div class="blog-content">

			<div class="user-section">
				<div class="user-img">
					<img src="images/human-2.jpg" alt="image">
				</div>
				<ul class="blog-page-meta">
					<li class="author">
						<a href="#">
							Admin
						</a>
					</li>
					<li class="date">
						<a href="#">
							<i class="icon-calendar"></i> 24 April, 2020
						</a>
					</li>
				</ul>
			</div>

			<div class="cat-tags">
				<ul>
					<li>
						<a href="#">Fashion</a>
					</li>
					<li>
						<a href="#">Blog</a>
					</li>
					<li>
						<a href="#">Food</a>
					</li>
					<li>
						<a href="#">Doctor</a>
					</li>
				</ul>
			</div>
			<h4 class="blog-title">
				<a href="#">Country road</a>
			</h4>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eius expedita hic, vel minima minus reiciendis consequuntur ab beatae necessitatibus amet magni itaque, nostrum vero eos
				nobis modi temporibus recusandae.
			</p>
			<p>
				Mauris eu molestie dui. Phasellus quis orci nec elit consequat placerat quis quis libero. Phasellus euismod consequat orci a venenatis. Mauris eget tortor nec velit eleifend ultrices a sit amet sem. Proin suscipit sagittis consectetur.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eius expedita hic, vel minima minus reiciendis consequuntur ab beatae necessitatibus amet magni itaque, nostrum vero eos
				nobis modi temporibus recusandae.
			</p>

			<ul class="wp-block-gallery">
				<li class="blocks-gallery-item">
					<figure>
						<img src="images/fas123.jpg" align="img">
					</figure>
				</li>
				<li class="blocks-gallery-item">
					<figure>
						<img src="images/fas124.jpg" align="img">
					</figure>
				</li>
				<li class="blocks-gallery-item">
					<figure>
						<img src="images/fas125.jpg" align="img">
					</figure>
				</li>
			</ul>

			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eius expedita hic, vel minima minus reiciendis consequuntur ab beatae necessitatibus amet magni itaque, nostrum vero eos
				nobis modi temporibus recusandae.
			</p>

			<blockquote class="wp-block-quote">
				<p>
					Mauris eu molestie dui. Phasellus quis orci nec elit consequat placerat quis quis libero.
				</p>
				<cite>Demo team</cite>
			</blockquote>

			<p>
				Mauris eu molestie dui. Phasellus quis orci nec elit consequat placerat quis quis libero. Phasellus euismod consequat orci a venenatis. Mauris eget tortor nec velit eleifend ultrices a sit amet sem. Proin suscipit sagittis consectetur.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eius expedita hic, vel minima minus reiciendis consequuntur ab beatae necessitatibus amet magni itaque, nostrum vero eos
				nobis modi temporibus recusandae.
			</p>

			<h3>EXAMPLE HEADING</h3>

			<p>
				Mauris eu molestie dui. Phasellus quis orci nec elit consequat placerat quis quis libero. Phasellus euismod consequat orci a venenatis. Mauris eget tortor nec velit eleifend ultrices a sit amet sem. Proin suscipit sagittis consectetur.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum eius expedita hic, vel minima minus reiciendis consequuntur ab beatae necessitatibus amet magni itaque, nostrum vero eos
				nobis modi temporibus recusandae.
			</p>
		</div>
	</div>

	<div class="post-navigation">
		<div class="nav-links">
			<div class="nav-previous">
				<span>Prev post</span>
				<a href="#">70% Discount Approaching On All Kitchen Items</a>
			</div>
			<div class="nav-next">
				<span>Next post</span>
				<a href="#">Converse Lovers Will Love These New Arrivals</a>
			</div>
		</div>
	</div>

	<div id="comments" class="comments-area">
		<div id="respond" class="comment-respond">
			<h3>Leave a Reply</h3>
		</div>
	</div>

</div>
