<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Galaxy_Store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$widget_area_ids = galaxy_store_get_active_footer_widget_areas();

?>

<footer class="footer-area">

	<?php
	if ( is_array( $widget_area_ids ) && ! empty( $widget_area_ids ) ) {
		?>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<?php
					foreach ( $widget_area_ids as $widget_area_id ) {
						?>
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<?php dynamic_sidebar( $widget_area_id ); ?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
	?>

	<div class="footer-bottom">
		<div class="container">
			<div class="footer-b-wrap">
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-12 text-center text-lg-left">
						<div class="footer-social">
							<ul>
								<li>
									<a href="">
										<img src="images/fb.jpg" alt="image">
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/tw.jpg" alt="image">
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/google.jpg" alt="image">
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/youtube.jpg" alt="image">
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/insta.jpg" alt="image">
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-12 text-center">
						<div class="footer-copy">
							<p>
								&copy; 2020 All Right Reserved By ABC
							</p>
						</div>
					</div>

					<div class="col-xl-4 col-lg-4 col-md-12 text-lg-right text-center">
						<div class="footer-payment">
							<ul>
								<li>
									<a href="">
										<img src="images/pay-1.jpg" alt="image">
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/pay-2.jpg" alt="image">
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/pay-3.jpg" alt="image">
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/pay-4.jpg" alt="image">
									</a>
								</li>
								<li>
									<a href="">
										<img src="images/pay-5.jpg" alt="image">
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Mobile category view  -->
<div class="mob-category">
	<div class="close">
		<i class="icon-close"></i>
	</div>
	<div class="category-header">
		All Departments
	</div>
	<ul class="category-nav">
		<li>
			<a href="#">
				Brands
			</a>
		</li>
		<li>
			<a href="#">
				Fashion
			</a>
		</li>
		<li>
			<a href="#">
				New Arrival
			</a>
		</li>
		<li>
			<a href="#">
				TV &amp; Audio
			</a>
		</li>
		<li>
			<a href="#">
				Accessories
			</a>
		</li>
		<li>
			<a href="#">
				Brands
			</a>
		</li>
		<li>
			<a href="#">
				Fashion
			</a>
		</li>
		<li>
			<a href="#">
				New Arrival
			</a>
		</li>
		<li>
			<a href="#">
				TV &amp; Audio
			</a>
		</li>
		<li>
			<a href="#">
				Accessories
			</a>
		</li>
	</ul>
</div>
<div class="mob-menu">
	<div class="close">
		<i class="icon-close"></i>
	</div>
	<div class="main-navigation">
		<ul class="clearfix">
			<li class="active">
				<a href="#">
					Home
				</a>
			</li>
			<li class="has-sub-menu">
				<a href="#">
					Shop
				</a>
				<div class="mega-menu clearfix">
					<div class="mega-sec">
						<h2>Electronics</h2>
						<ul class="mega-sub-menu">
							<li>
								<a href="">
									Example 1
								</a>
							</li>
							<li>
								<a href="">
									Example 2
								</a>
							</li>
							<li>
								<a href="">
									Example 3
								</a>
							</li>
							<li>
								<a href="">
									Example 4
								</a>
							</li>
							<li>
								<a href="">
									Example 5
								</a>
							</li>
							<li>
								<a href="">
									Example 6
								</a>
							</li>
						</ul>
					</div>
					<div class="mega-sec">
						<h2>Accesories</h2>
						<ul class="mega-sub-menu">
							<li>
								<a href="">
									Example 1
								</a>
							</li>
							<li>
								<a href="">
									Example 2
								</a>
							</li>
							<li>
								<a href="">
									Example 3
								</a>
							</li>
							<li>
								<a href="">
									Example 4
								</a>
							</li>
							<li>
								<a href="">
									Example 5
								</a>
							</li>
							<li>
								<a href="">
									Example 6
								</a>
							</li>
						</ul>
					</div>
					<div class="mega-sec">
						<h2>Gadgets</h2>
						<ul class="mega-sub-menu">
							<li>
								<a href="">
									Example 1
								</a>
							</li>
							<li>
								<a href="">
									Example 2
								</a>
							</li>
							<li>
								<a href="">
									Example 3
								</a>
							</li>
							<li>
								<a href="">
									Example 4
								</a>
							</li>
							<li>
								<a href="">
									Example 5
								</a>
							</li>
							<li>
								<a href="">
									Example 6
								</a>
							</li>
						</ul>
					</div>
					<div class="mega-sec">
						<h2>Food</h2>
						<ul class="mega-sub-menu">
							<li>
								<a href="">
									Example 1
								</a>
							</li>
							<li>
								<a href="">
									Example 2
								</a>
							</li>
							<li>
								<a href="">
									Example 3
								</a>
							</li>
							<li>
								<a href="">
									Example 4
								</a>
							</li>
							<li>
								<a href="">
									Example 5
								</a>
							</li>
							<li>
								<a href="">
									Example 6
								</a>
							</li>
						</ul>
					</div>
					<div class="mega-sec">
						<h2>Accesories</h2>
						<ul class="mega-sub-menu">
							<li>
								<a href="">
									Example 1
								</a>
							</li>
							<li>
								<a href="">
									Example 2
								</a>
							</li>
							<li>
								<a href="">
									Example 3
								</a>
							</li>
							<li>
								<a href="">
									Example 4
								</a>
							</li>
							<li>
								<a href="">
									Example 5
								</a>
							</li>
							<li>
								<a href="">
									Example 6
								</a>
							</li>
						</ul>
					</div>
				</div>
			</li>
			<li>
				<a href="#">
					About Us
				</a>
			</li>
			<li class="has-sub-menu">
				<a href="#">
					Blog Page
				</a>
				<ul class="sub-menu">
					<li>
						<a href="">
							Blog single page
						</a>
					</li>
					<li>
						<a href="">
							Blog grid
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#">
					Contact Us
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="cat-overlay"></div>

<?php wp_footer(); ?>
</body>

</html>
