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

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'galaxy-store' ); ?></a>

	<header class="header">
		<div class="top-header">
			<div class="container">
				<div class="d-flex align-items-center">
					<div class="topbar-left">

						<?php
						wp_nav_menu(
							array(
								'container'       => 'div',
								'container_class' => 'top-nav',
								'fallback_cb'     => 'galaxy_store_nav_menu_fallback',
								'theme_location'  => 'top-bar',
							)
						);
						?>

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


					<?php if ( has_custom_logo() || get_bloginfo() || get_bloginfo( 'description' ) ) { ?>
						<div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php the_custom_logo(); ?>

								<?php if ( get_bloginfo() || get_bloginfo( 'description' ) ) { ?>
									<div class="site-branding-text" >
										<?php if ( get_bloginfo() ) { ?>
											<h1 class="site-title">
												<?php echo esc_html( get_bloginfo() ); ?>
											</h1>
										<?php } ?>
										<?php if ( get_bloginfo( 'description' ) ) { ?>
											<p class="site-tagline">
												<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
											</p>
										<?php } ?>
									</div>
								<?php } ?>
							</a>
						</div>
					<?php } ?>


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


					<?php
					wp_nav_menu(
						array(
							'container'       => 'div',
							'container_class' => 'main-navigation',
							'menu_class'      => 'clearfix',
							'fallback_cb'     => 'galaxy_store_nav_menu_fallback',
							'theme_location'  => 'primary',
						)
					);
					?>


				</div>
			</div>
		</div>
	</header>
