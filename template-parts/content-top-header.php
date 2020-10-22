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
<section class="site-header__top">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="flex-list flex-list--justify-between flex-list--align-center flex">
					<div class="flex-list__item">
						<?php

							if ( 'menu' === $left_section_type ) {
								wp_nav_menu(
									array(
										'container'       => 'nav',
										'container_class' => 'navigation navigation--top-menu',
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
					<div class="flex-list__item flex site-header__top__right">
						<?php
							if ( is_array( $social_links ) && ! empty( $social_links ) ) {
								?>
									<ul class="site-header__top__right__list social-media">
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
								<?php
							}
						?>
						<div class="site-header__top__right__list multi-lang dropdown">
							<a href="#">Dollar (US)</a>
							<ul class="dropdown__item dropdown__item--right">
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

						<?php if ( ! is_user_logged_in() ) { ?>
						<div class="site-header__top__right__list user-login">
								<a href="<?php echo esc_url( wp_login_url() ); ?>">
									<i class="icon-user"></i> <?php esc_html_e( 'Register or Sign In', 'galaxy-store' ); ?>
								</a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>