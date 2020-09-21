<?php

/**
 * Customizer custom control
 *
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer label custom control.
 */
class Galaxy_Store_Customizer_Label extends WP_Customize_Control {

	/**
	 * The type of control being rendered
	 */
	public $type = 'galaxy_store_label';

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		?>
		<div class="galaxy-store-label-control">
			<h1 class="customize-control-label">
				<?php echo wp_kses_post( $this->label ); ?>
			</h1>
			<?php if ( ! empty( $this->description ) ) { ?>
				<span class="customize-control-label-description">
					<?php echo wp_kses_post( $this->description ); ?>
				</span>
			<?php } ?>
		</div>
		<?php
	}
}
