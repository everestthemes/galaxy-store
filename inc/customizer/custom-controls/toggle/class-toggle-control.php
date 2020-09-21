<?php

if ( ! class_exists( 'Galaxy_Store_Toggle_Control' ) ) :

	/**
	 * Toggle Custom Control Class
	 *
	 * All section widgets can extend this class
	 *
	 * @since 1.0.0
	 */
	class Galaxy_Store_Toggle_Control extends WP_Customize_Control {


		/**
		 * Declare the control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'flat';

		/**
		 * Enqueue scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'galaxy-store-customizer-toggle-one-style', get_template_directory_uri() . '/inc/customizer/custom-controls/toggle/css/toggle-one.css', array(), '1.0.0' );
			wp_enqueue_script( 'galaxy-store-customizer-toggle-one-script', get_template_directory_uri() . '/inc/customizer/custom-controls/toggle/js/toggle-one.js', array( 'jquery' ), '1.0.0', true );
		}

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			?>
			<label>
				<div style="display:flex;flex-direction: row;justify-content: flex-start;">
					<span class="customize-control-title" style="flex: 2 0 0; vertical-align: middle;"><?php echo esc_html( $this->label ); ?></span>
					<input
						id="cb<?php echo esc_attr( $this->instance_number ); ?>"
						type="checkbox" class="toggle-one toggle-one-<?php echo esc_attr( $this->type ); ?>"
						value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?>
					/>

					<label for="cb<?php echo esc_attr( $this->instance_number ); ?>" class="toggle-one-btn"></label>
				</div>
				<?php
				if ( ! empty( $this->description ) ) :
					?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php
				endif;
				?>
			</label>
			<?php
		}
	}
endif;

/**
 * Sanitization callback function for toggle one control.
 * Uses default wp_validate_boolean
 */
