<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Galaxy_Store
 */

get_header();

$galaxy_store_layout_type = is_single() ? 'posts_layout' : 'pages_layout';
?>

<main class="content">

	<?php galaxy_store_get_breadcrumb(); ?>

	<div class="page-content">
		<div class="container clearfix">

			<?php
			if ( 'left-sidebar' === galaxy_store_get_theme_mod( $galaxy_store_layout_type, 'left-sidebar' ) ) {
				! galaxy_store_is_woocommerce_page() ? get_sidebar() : null;
			}
			?>

			<div id="primary">
				<div class="single-blog-post single-blog">

					<div class="blog-media">
						<img src="images/blog-img-1.jpg" alt="images">
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

						<!-- contents -->
						<!-- /contents -->

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

			<?php
			if ( 'right-sidebar' === galaxy_store_get_theme_mod( $galaxy_store_layout_type, 'right-sidebar' ) ) {
				! galaxy_store_is_woocommerce_page() ? get_sidebar() : null;
			}
			?>

		</div>
	</div>

</main>



<?php
get_footer();
