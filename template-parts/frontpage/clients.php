<?php
/**
 * Widget template file for the frontend.
 *
 * * We are loading this template and passing the args ( $data ) from
 * * respective widget class using the custom function ( galaxy_store_get_template_part ) that replicates like
 * * get_template_part function but also provides option to pass args.
 *
 * @see galaxy_store_get_template_part()
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="container">
	<div class="row">
		<div class="col">
			<header class="frontpage-widget__header flex">
				<h4>
					<?php if ( ! empty( $data['title'] ) ) { ?>
						<span><?php echo esc_html( $data['title'] ); ?></span>
					<?php } ?>
				</h4>
			</header>

			<?php
				$logos = ! empty( $data['logos'] ) ? $data['logos'] : '';
				if ( is_array( $logos ) && ! empty( $logos ) ) {
			?>
			<div class="our-clients__cnt flex">
				<?php
					foreach ( $logos as $logo ) {
						$image_uri = ! empty( $logo['image_uri'] ) ? $logo['image_uri'] : '';
					if ( ! $image_uri ) {
						continue;
					}
				?>
				<a class="our-clients__cnt__item" tabindex="-1">
						<img src="<?php echo esc_url( $image_uri ); ?>">
				</a>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

