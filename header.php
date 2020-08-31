<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Galaxy_Store
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'galaxy-store' ); ?></a>

	<header class="header">
		<div class="top-header">
			<div class="container">
				<div class="d-flex align-items-center">
					<div class="topbar-left">
						<!-- <div class="intro-text">
							<a href="#" class="">Welcome to The Store</a>
						</div> -->
						<div class="top-nav">
							<ul>
								<li>
									<a href="#">
										shop
									</a>
								</li>
								<li>
									<a href="#">
										about
									</a>
								</li>
								<li>
									<a href="#">
										contact
									</a>
								</li>
								<li>
									<a href="#">
										blog
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="topbar-right ml-auto">
						<div class="list-inline-item top-social">
							<ul>
								<li>
									<a href="#">
										<i class="bfy-icon bfy-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="bfy-icon bfy-instagram"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="bfy-icon bfy-twitter"></i>
									</a>
								</li>
							</ul>
						</div>
						<ul class="list-inline-item top-Culogin">
							<li class="list-inline-item mr-0">
								<div class="currency borderLeft">
									<a href="#">Dollar (US) <i class="icon-arrow-down"></i></a>
									<ul class="dropLang">
										<li>
											<a href="">English</a>
										</li>
										<li>
											<a href="">Deutch</a>
										</li>
										<li>
											<a href="">Espanol</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="list-inline-item">
								<div class="top-header-login borderLeft d-xl-block d-none">
									<a href="#">
										<i class="icon-user"></i> Register <span>or</span> Sign in
									</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="main-header">
			<div class="container">
				<div class="firstrow clearfix">
					<div class="logo">
						<a href="index.html">
							<img src="images/logo.png" alt="logo">
						</a>
					</div>
					<div class="header-cart">
						<div class="d-xl-none">
							<a href="">
								<i class="icon-user"></i>
							</a>
						</div>
						<div>
							<a href="">
								<i class="icon-heart"></i>
							</a>
						</div>
						<div>
							<a href="">
								<i class="icon-bag"></i>
							</a>
						</div>
						<div class="togMenu">
							<i class="icon-options-vertical"></i>
						</div>
					</div>
					<div class="first-search-input-wrap clearfix">
						<div class="category-toggle-button">
							<i class="icon-menu"></i>
						</div>
						<form class="form-field">
							<div class="searchelememts">
								<input type="text" name="" placeholder="Search for product">
								<select class="cat-search">
									<option value="volvo">All category</option>
									<option value="volvo">Category 1</option>
									<option value="saab">Category 2</option>
									<option value="mercedes">Category 3</option>
									<option value="audi">Category 4</option>
								</select>
							</div>
							<div class="searchicon">
								<i class="icon-magnifier"></i>
							</div>
						</form>
					</div>
				</div>

				<div class="secondrow clearfix">
					<div class="category-section">
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
									TV & Audio
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
									TV & Audio
								</a>
							</li>
							<li>
								<a href="#">
									Accessories
								</a>
							</li>
						</ul>
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
									Shop <i class="icon-arrow-down"></i>
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
									Blog Page <i class="icon-arrow-down"></i>
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
			</div>
		</div>
	</header>
