<?php

/**
 * Top header template part.
 *
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$enable_top_header = galaxy_store_get_theme_mod( 'enable_top_header', true );

if ( ! $enable_top_header ) {
	return;
}

$left_section_type = galaxy_store_get_theme_mod( 'left_section_type', 'menu' );
$social_links      = galaxy_store_get_theme_mod( 'right_section_social_link' );

?>
<div class="top-header">
	<div class="container">
		<div class="d-flex align-items-center">

			<div class="topbar-left">
				<?php

				if ( 'menu' === $left_section_type ) {
					wp_nav_menu(
						array(
							'container'       => 'div',
							'container_class' => 'top-nav',
							'fallback_cb'     => 'galaxy_store_nav_menu_fallback',
							'theme_location'  => 'top-bar',
						)
					);
				} else {
					$left_section_custom_text = galaxy_store_get_theme_mod( 'left_section_custom_text' );
					echo wp_kses_post( wpautop( $left_section_custom_text ) );
				}

				?>

			</div>

			<div class="topbar-right ml-auto">

				<?php
				if ( is_array( $social_links ) && ! empty( $social_links ) ) {
					?>

					<div class="list-inline-item top-social">
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
					<?php
				}
				?>

				<ul class="list-inline-item top-Culogin">

					<!-- TODO -->
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

					<?php if ( ! is_user_logged_in() ) { ?>
					<li class="list-inline-item">
						<div class="top-header-login borderLeft d-xl-block d-none">
							<a href="<?php echo esc_url( wp_login_url() ); ?>">
								<i class="icon-user"></i> <?php esc_html_e( 'Register or Sign In', 'galaxy-store' ); ?>
							</a>
						</div>
					</li>
					<?php } ?>

				</ul>
			</div>
		</div>
	</div>
</div>
