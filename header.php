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

$special_menu_title = galaxy_store_get_theme_mod( 'special_menu_title' );

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

		<?php get_template_part( 'template-parts/content', 'top-header' ); ?>

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
											<p class="site-description">
												<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
											</p>
										<?php } ?>
									</div>
								<?php } ?>
							</a>
						</div>
					<?php } ?>


					<div class="header-cart">

						<?php if ( ! is_user_logged_in() ) { ?>
							<div class="d-xl-none">
								<a href="<?php echo esc_url( wp_login_url() ); ?>">
									<i class="icon-user"></i>
								</a>
							</div>
						<?php } ?>

						<?php if ( $misc_options_enable_wishlist ) { ?>
							<div>
								<a href="">
									<i class="icon-heart"></i>
								</a>
							</div>
						<?php } ?>

						<?php if ( $misc_options_enable_mini_cart ) { ?>
							<div>
								<a href="">
									<i class="icon-bag"></i>
								</a>
							</div>
						<?php } ?>

						<div class="togMenu">
							<i class="icon-options-vertical"></i>
						</div>

					</div>

					<div class="first-search-input-wrap clearfix">

						<?php if ( has_nav_menu( 'special-menu' ) ) { ?>
							<div class="category-toggle-button">
								<i class="icon-menu"></i>
							</div>
						<?php } ?>

						<?php if ( $misc_options_enable_search_form ) { ?>
							<form id="galaxy-store-header-search" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="form-field">
								<div class="searchelememts">
									<input type="text" id="header-search-keyword" value="<?php the_search_query(); ?>" name="s" placeholder="<?php esc_attr_e( 'Search for product', 'galaxy-store' ); ?>">

									<?php
									$galaxy_store_product_categories = get_terms(
										array(
											'taxonomy' => 'product_cat',
										)
									);

									if ( $galaxy_store_product_categories && ! is_wp_error( $galaxy_store_product_categories ) ) {
										?>
										<select id="header-search-product-category" name="category_name" class="cat-search">
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
										<?php
									}
									?>

									<ul id="search-results"></ul>
								</div>

								<div class="searchicon">
									<button type="submit"><i class="icon-magnifier"></i></button>
								</div>

							</form>
						<?php } ?>
					</div>

				</div>

				<div class="secondrow clearfix">

					<?php if ( has_nav_menu( 'special-menu' ) ) { ?>
						<div class="category-section">

							<?php if ( $special_menu_title ) { ?>
								<div class="category-header">
									<?php echo esc_html( $special_menu_title ); ?>
								</div>
							<?php } ?>

							<?php
							wp_nav_menu(
								array(
									'container'      => null,
									'menu_class'     => 'category-nav',
									'fallback_cb'    => false,
									'theme_location' => 'special-menu',
								)
							);
							?>

						</div>
					<?php } ?>


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
