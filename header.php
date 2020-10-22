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


$misc_options_enable_search_form = galaxy_store_get_theme_mod( 'misc_options_enable_search_form', true );
$misc_options_enable_wishlist    = galaxy_store_get_theme_mod( 'misc_options_enable_wishlist', true );
$misc_options_enable_mini_cart   = galaxy_store_get_theme_mod( 'misc_options_enable_mini_cart', true );

$special_menu_title = galaxy_store_get_theme_mod( 'special_menu_title', __( 'All Departments', 'galaxy-store' ) );
$special_menu_title = $special_menu_title ? $special_menu_title : __( 'All Departments', 'galaxy-store' );

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

	<header class="site-header">
		<?php get_template_part( 'template-parts/content', 'top-header' ); ?>
		
		<section class="site-header__main">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-3">
							<?php if ( has_custom_logo() || get_bloginfo() || get_bloginfo( 'description' ) ) { ?>
							<div class="site-logo">
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
												<div class="site-des">
													<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
												</div>
											<?php } ?>
										</div>
									<?php } ?>
								</a>
							</div>
						<?php } ?>
					</div>
					<div class="col">

						<?php if ( $misc_options_enable_search_form ) { ?>
							<div class="search-wrap">
								<form id="galaxy-store-header-search" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<div class="search-wrap__product">
										<input type="text" id="header-search-keyword" value="<?php the_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Search for product', 'galaxy-store' ); ?>">
										<button type="submit" class="search-wrap__product__btn"><i class="icon-search"></i></button>

										<?php
										$galaxy_store_product_categories = get_terms(
											array(
												'taxonomy' => 'product_cat',
											)
										);

										if ( $galaxy_store_product_categories && ! is_wp_error( $galaxy_store_product_categories ) ) {
											?>
											<div class="select-wrap">
												<select id="header-search-product-category" name="category_name">
													<option value=""><?php esc_html_e( 'All Categories', 'galaxy-store' ); ?></option>
												<?php
												if ( is_array( $galaxy_store_product_categories ) && ! empty( $galaxy_store_product_categories ) ) {
													foreach ( $galaxy_store_product_categories as $galaxy_store_product_category ) {
														?>
														<option value="<?php echo esc_attr( $galaxy_store_product_category->slug ); ?>">
															<?php echo esc_html( $galaxy_store_product_category->name ); ?>
														</option>
														<?php
													}
												}
												?>
												</select>
											</div>
											<?php
										}
										?>

										<ul id="search-results" class="search-wrap__product__results"></ul>
									</div>

								</form>
							</div>
						<?php } ?>
					</div>
					<div class="col-3">
						<div class="flex-list flex flex-list--justify-end flex">
							<?php if ( ! is_user_logged_in() ) { ?>
								<div class="flex-list__item">
									<a href="<?php echo esc_url( wp_login_url() ); ?>">
										<i class="icon-user"></i>
									</a>
								</div>
							<?php } ?>

							<?php if ( $misc_options_enable_wishlist ) { ?>
								<div class="flex-list__item">
									<a href="">
										<i class="icon-heart"></i>
									</a>
								</div>
							<?php } ?>

							<?php if ( $misc_options_enable_mini_cart && function_exists( 'galaxy_store_woocommerce_header_cart' ) ) { ?>
								<div class="flex-list__item shopping-cart">
									<?php galaxy_store_woocommerce_header_cart(); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="site-header__nav">
			<div class="container">
				<div class="row">				
					<?php if ( has_nav_menu( 'special-menu' ) ) { ?>
					<div class="col-3">
						<nav class="special-nav">

							<div class="special-nav__title special-nav__title--arrow">
								<?php echo esc_html( $special_menu_title ); ?>
							</div>

							<?php
							wp_nav_menu(
								array(
									'container'      => null,
									'menu_class'     => 'special-nav__cat',
									'fallback_cb'    => false,
									'theme_location' => 'special-menu',
								)
							);
							?>

						</nav>
					</div>
					<?php } ?>

					<div class="col">
						<?php
						wp_nav_menu(
							array(
								'container'       => 'nav',
								'container_class' => 'navigation navigation--main',
								'menu_class'      => 'clearfix',
								'fallback_cb'     => 'galaxy_store_nav_menu_fallback',
								'theme_location'  => 'primary',
							)
						);
						?>
					</div>
				</div>
			</div>
		</section>
	</header>
