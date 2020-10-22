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


$call_to_actions = ! empty( $data['layout_two'] ) ? $data['layout_two'] : array();

?>sdfsdfds
<div class="offer section_padd60">
	<div class="container">
		<div class="row">
			<?php
			if ( is_array( $call_to_actions ) && ! empty( $call_to_actions ) ) {
				foreach ( $call_to_actions as $call_to_action ) {
					?>
					<div class="col-md-4">
						<div class="offer-section">
							<img src="<?php echo ! empty( $call_to_action['image_uri'] ) ? esc_url( $call_to_action['image_uri'] ) : null; ?>">
							<div class="text-holder">
								<?php

								echo ! empty( $call_to_action['title'] ) ? wp_kses_post( "<span class='text'>{$call_to_action['title']}</span>" ) : null;
								echo ! empty( $call_to_action['sub_title'] ) ? wp_kses_post( "<span class='discount-text'>{$call_to_action['sub_title']}</span>" ) : null;

								?>
								<a
									href="<?php echo ! empty( $call_to_action['button_link'] ) ? esc_url( $call_to_action['button_link'] ) : null; ?>"
									class="bg-button"
								>
									<?php echo ! empty( $call_to_action['button_label'] ) ? esc_html( $call_to_action['button_label'] ) : null; ?>
								</a>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</div>
