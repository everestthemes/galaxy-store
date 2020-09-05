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

$galaxy_store_site_layout = galaxy_store_get_theme_mod( 'site_layout', 'boxed' );


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( $galaxy_store_site_layout ); ?>>
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
						<div class="category-toggle-button">
							<i class="icon-menu"></i>
						</div>

						<?php if ( $misc_options_enable_search_form ) { ?>
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
						<?php } ?>
					</div>

				</div>

				<div class="secondrow clearfix">

					<div class="category-section">

						<?php if ( $special_menu_title ) { ?>
							<div class="category-header">
								<?php echo esc_html( $special_menu_title ); ?>
							</div>
						<?php } ?>

						<?php
						wp_nav_menu(
							array(
								'menu_class'     => 'category-nav',
								'fallback_cb'    => 'galaxy_store_nav_menu_fallback',
								'theme_location' => 'special-menu',
							)
						);
						?>

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
