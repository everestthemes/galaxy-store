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


$widget_area_ids       = galaxy_store_get_active_footer_widget_areas();
$display_social_icons  = galaxy_store_get_theme_mod( 'display_social_icons', true );
$social_links          = galaxy_store_get_theme_mod( 'right_section_social_link' );
$footer_copyright_text = galaxy_store_get_theme_mod( 'footer_copyright_text' );
$payment_option_logos  = galaxy_store_get_theme_mod( 'payment_option_logos' );
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


					<?php
					if ( $display_social_icons && is_array( $social_links ) && ! empty( $social_links ) ) {
						?>
						<div class="col-xl-4 col-lg-4 col-md-12 text-center text-lg-left">
							<div class="footer-social">

								<ul>
									<?php
									foreach ( $social_links as $social_link_type => $social_link_address ) {
										if ( ! $social_link_address ) {
											continue;
										}
										?>
										<li>
											<a href="<?php echo esc_url( $social_link_address ); ?>">
												<i class="bfy-icon bfy-<?php echo esc_attr( $social_link_type ); ?>"></i>
											</a>
										</li>
										<?php
									}
									?>
								</ul>

							</div>
						</div>
						<?php
					}
					?>


					<?php if ( $footer_copyright_text ) { ?>
						<div class="col-xl-4 col-lg-4 col-md-12 text-center">
							<div class="footer-copy">
								<p><?php echo wp_kses_post( $footer_copyright_text ); ?></p>
							</div>
						</div>
					<?php } ?>


					<?php if ( $payment_option_logos && is_array( $payment_option_logos ) ) { ?>
						<div class="col-xl-4 col-lg-4 col-md-12 text-lg-right text-center">
							<div class="footer-payment">
								<ul>
									<?php foreach ( $payment_option_logos as $payment_option_logo ) { ?>
										<li>
											<a>
												<img src="<?php echo esc_url( $payment_option_logo ); ?>">
											</a>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					<?php } ?>


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
