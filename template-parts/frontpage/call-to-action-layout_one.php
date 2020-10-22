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

$cta_img_url = ! empty( $data['layout_one']['image_uri'] ) ? $data['layout_one']['image_uri'] : '';

$styles = array(
	"background-image: url({$cta_img_url});",
);

?>
<div class="parallax" style="<?php echo esc_attr( implode( ' ', $styles ) ); ?>">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-8">
				<?php if ( ! empty( $data['layout_one']['title'] ) ) { ?>
					<?php echo wp_kses_post( "<h3>{$data['layout_one']['title']}</h3>" ); ?>
				<?php } ?>

				<?php echo ! empty( $data['layout_one']['description'] ) ? wp_kses_post( wpautop( $data['layout_one']['description'] ) ) : null; ?>

				<a
					href="<?php echo ! empty( $data['layout_one']['button_link'] ) ? esc_url( $data['layout_one']['button_link'] ) : null; ?>"
					class="bg-button"
				>
					<?php echo ! empty( $data['layout_one']['button_label'] ) ? esc_html( $data['layout_one']['button_label'] ) : null; ?>
				</a>
			</div>
		</div>
	</div>
</div>
