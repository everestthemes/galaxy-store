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
<div class="partners layout-1 section_padd60 section-bg1">
	<div class="container">

		<?php if ( ! empty( $data['title'] ) ) { ?>
			<div class="section-header">
				<h2><span><?php echo esc_html( $data['title'] ); ?></span></h2>
			</div>
		<?php } ?>

		<?php
		$logos = ! empty( $data['logos'] ) ? $data['logos'] : '';
		if ( is_array( $logos ) && ! empty( $logos ) ) {
			?>
			<ul>
				<?php
				foreach ( $logos as $logo ) {
					$image_uri = ! empty( $logo['image_uri'] ) ? $logo['image_uri'] : '';
					if ( ! $image_uri ) {
						continue;
					}
					?>
					<li>
						<a tabindex="-1">
							<img src="<?php echo esc_url( $image_uri ); ?>">
						</a>
					</li>
					<?php
				}
				?>
			</ul>
			<?php
		}
		?>

	</div>
</div>
