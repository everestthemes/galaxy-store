<?php
/**
 * Class file for creating the section widget.
 *
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'Galaxy_Store_Call_To_Action_Widget' ) ) {

	/**
	 * Class file for creating the section widget.
	 */
	class Galaxy_Store_Call_To_Action_Widget extends WP_Widget {

		/**
		 * Sets up the widgets name etc.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'Galaxy_Store_Call_To_Action_Widget',
				'description' => __( 'Call to action section widget for frontpage section.', 'galaxy-store' ),
			);
			parent::__construct( 'Galaxy_Store_Call_To_Action_Widget', 'Galaxy Store Call To Action', $widget_ops );
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {

			$layout_type = ! empty( $instance['layout_type'] ) ? $instance['layout_type'] : 'layout_one';

			echo $args['before_widget']; //phpcs:ignore
			galaxy_store_get_template_part( 'template-parts/frontpage/call-to-action', $layout_type, $instance );
			echo $args['after_widget']; //phpcs:ignore
		}


		/**
		 * Call to action layout one.
		 */
		private function layout_type_one( $instance ) {
			$title        = ! empty( $instance['layout_one']['title'] ) ? $instance['layout_one']['title'] : '';
			$description  = ! empty( $instance['layout_one']['description'] ) ? $instance['layout_one']['description'] : '';
			$button_label = ! empty( $instance['layout_one']['button_label'] ) ? $instance['layout_one']['button_label'] : __( 'Shop Now', 'galaxy-store' );
			$button_link  = ! empty( $instance['layout_one']['button_link'] ) ? $instance['layout_one']['button_link'] : null;

			$bg_image_id = $this->get_field_id( 'background-image' );
			$image_uri   = ! empty( $instance['layout_one']['image_uri'] ) ? $instance['layout_one']['image_uri'] : '';

			$field_name = $this->get_field_name( 'layout_one' );
			ob_start();
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<strong><?php esc_html_e( 'Title:', 'galaxy-store' ); ?></strong>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( "{$field_name}[title]" ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>">
					<strong><?php esc_html_e( 'Description:', 'galaxy-store' ); ?></strong>
				</label>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( "{$field_name}[description]" ); ?>" ><?php echo esc_html( $description ); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>">
					<strong><?php esc_html_e( 'Button Label:', 'galaxy-store' ); ?></strong>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>" name="<?php echo esc_attr( "{$field_name}[button_label]" ); ?>" type="text" value="<?php echo esc_attr( $button_label ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>">
					<strong><?php esc_html_e( 'Button Link:', 'galaxy-store' ); ?></strong>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( "{$field_name}[button_link]" ); ?>" type="text" value="<?php echo esc_url( $button_link ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $bg_image_id ); ?>">
					<strong><?php esc_html_e( 'Background Image:', 'galaxy-store' ); ?></strong>
				</label>
				<img class="<?php echo esc_attr( "{$bg_image_id}_img" ); ?>" src="<?php echo esc_url( $image_uri ); ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
				<input type="hidden" class="widefat <?php echo esc_attr( "{$bg_image_id}_url" ); ?>" name="<?php echo esc_attr( "{$field_name}[image_uri]" ); ?>" value="<?php echo esc_url( $image_uri ); ?>"/>
				<input data-save="<?php echo esc_attr( $this->get_field_id( 'savewidget' ) ); ?>" type="button" id="<?php echo esc_attr( $bg_image_id ); ?>" class="button button-primary js_custom_upload_media" value="<?php esc_attr_e( 'Upload Image', 'galaxy-store' ); ?>" style="margin-top:5px;" />
			</p>
			<?php
			$content = ob_get_clean();

			echo $content; // phpcs:ignore
		}


		/**
		 * Call to action layout two.
		 */
		private function layout_type_two( $instance ) {
			ob_start();

			for ( $index = 0; $index <= 2; $index++ ) {
				$title        = ! empty( $instance['layout_two'][ $index ]['title'] ) ? $instance['layout_two'][ $index ]['title'] : '';
				$sub_title    = ! empty( $instance['layout_two'][ $index ]['sub_title'] ) ? $instance['layout_two'][ $index ]['sub_title'] : '';
				$button_label = ! empty( $instance['layout_two'][ $index ]['button_label'] ) ? $instance['layout_two'][ $index ]['button_label'] : __( 'Shop Now', 'galaxy-store' );
				$button_link  = ! empty( $instance['layout_two'][ $index ]['button_link'] ) ? $instance['layout_two'][ $index ]['button_link'] : '';
				$image_uri    = ! empty( $instance['layout_two'][ $index ]['image_uri'] ) ? $instance['layout_two'][ $index ]['image_uri'] : '';

				$field_id    = $this->get_field_id( 'layout-two' ) . "-{$index}";
				$field_name  = $this->get_field_name( 'layout_two' ) . "[{$index}]";
				$bg_image_id = "{$field_id}-background-image";

				$current = $index + 1;
				?>
				<div class="cta-layout-two-sections cta-<?php echo esc_attr( $index ); ?>">
					<hr>
					<h2><?php echo esc_html( __( 'Call To Action', 'galaxy-store' ) . ' ' . $current ); ?></h2>
					<p>
						<label for="<?php echo esc_attr( "{$field_id}-title" ); ?>">
							<strong><?php esc_html_e( 'Title:', 'galaxy-store' ); ?></strong>
						</label>
						<input class="widefat" id="<?php echo esc_attr( "{$field_id}-title" ); ?>" name="<?php echo esc_attr( "{$field_name}[title]" ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
					</p>
					<p>
						<label for="<?php echo esc_attr( "{$field_id}-sub-title" ); ?>">
							<strong><?php esc_html_e( 'Sub Title:', 'galaxy-store' ); ?></strong>
						</label>
						<input class="widefat" id="<?php echo esc_attr( "{$field_id}-sub-title" ); ?>" name="<?php echo esc_attr( "{$field_name}[sub_title]" ); ?>" type="text" value="<?php echo esc_attr( $sub_title ); ?>">
					</p>
					<p>
						<label for="<?php echo esc_attr( "{$field_id}-button-label" ); ?>">
							<strong><?php esc_html_e( 'Button Label:', 'galaxy-store' ); ?></strong>
						</label>
						<input class="widefat" id="<?php echo esc_attr( "{$field_id}-button-label" ); ?>" name="<?php echo esc_attr( "{$field_name}[button_label]" ); ?>" type="text" value="<?php echo esc_attr( $button_label ); ?>">
					</p>
					<p>
						<label for="<?php echo esc_attr( "{$field_id}-button-link" ); ?>">
							<strong><?php esc_html_e( 'Button Link:', 'galaxy-store' ); ?></strong>
						</label>
						<input class="widefat" id="<?php echo esc_attr( "{$field_id}-button-link" ); ?>" name="<?php echo esc_attr( "{$field_name}[button_link]" ); ?>" type="text" value="<?php echo esc_url( $button_link ); ?>">
					</p>
					<p>
						<label for="<?php echo esc_attr( $bg_image_id ); ?>">
							<strong><?php esc_html_e( 'Background Image:', 'galaxy-store' ); ?></strong>
						</label>
						<img class="<?php echo esc_attr( "{$bg_image_id}_img" ); ?>" src="<?php echo esc_url( $image_uri ); ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
						<input type="hidden" class="widefat <?php echo esc_attr( "{$bg_image_id}_url" ); ?>" name="<?php echo esc_attr( "{$field_name}[image_uri]" ); ?>" value="<?php echo esc_url( $image_uri ); ?>"/>
						<input data-save="<?php echo esc_attr( $this->get_field_id( 'savewidget' ) ); ?>" type="button" id="<?php echo esc_attr( $bg_image_id ); ?>" class="button button-primary js_custom_upload_media" value="<?php esc_attr_e( 'Upload Image', 'galaxy-store' ); ?>" style="margin-top:5px;" />
					</p>
				</div>
				<?php
			}
			$content = ob_get_clean();

			echo $content; // phpcs:ignore
		}


		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$layout_type = ! empty( $instance['layout_type'] ) ? $instance['layout_type'] : 'layout_one';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'layout-type' ) ); ?>">
					<strong><?php esc_html_e( 'Select Layout:', 'galaxy-store' ); ?></strong>
				</label>
				<select name="<?php echo esc_attr( $this->get_field_name( 'layout_type' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'layout-type' ) ); ?>">
					<option <?php selected( $layout_type, 'layout_one' ); ?> value="layout_one"><?php esc_html_e( 'Layout One', 'galaxy-store' ); ?></option>
					<option <?php selected( $layout_type, 'layout_two' ); ?> value="layout_two"><?php esc_html_e( 'Layout Two', 'galaxy-store' ); ?></option>
				</select>
			</p>
			<div id="<?php echo esc_attr( $this->get_field_id( 'layout-type-fields' ) ); ?>"></div>

			<script type="text/javascript">
				jQuery(function($){
					var layoutHtml = '';
					var layoutTypeFields   = document.getElementById('<?php echo esc_attr( $this->get_field_id( 'layout-type-fields' ) ); ?>');
					var layoutTypeSelector = '#<?php echo esc_attr( $this->get_field_id( 'layout-type' ) ); ?>';

					$(document).on('change', layoutTypeSelector, function(){
						var selectedLayout = $(this).find(':selected').val();

						if ( 'layout_one' == selectedLayout ) {
							layoutHtml = `<?php $this->layout_type_one( $instance ); ?>`;
						} else {
							layoutHtml = `<?php $this->layout_type_two( $instance ); ?>`;
						}
						$(layoutTypeFields).html(layoutHtml);
					});
					$(layoutTypeSelector).trigger('change');
				});
			</script>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = array();

			$layout_one_old = ! empty( $old_instance['layout_one'] ) ? $old_instance['layout_one'] : array();
			$layout_two_old = ! empty( $old_instance['layout_two'] ) ? $old_instance['layout_two'] : array();

			$instance['layout_type'] = ( ! empty( $new_instance['layout_type'] ) ) ? sanitize_text_field( $new_instance['layout_type'] ) : '';
			$instance['layout_one']  = ( ! empty( $new_instance['layout_one'] ) ) ? galaxy_store_sanitize( $new_instance['layout_one'] ) : $layout_one_old;
			$instance['layout_two']  = ( ! empty( $new_instance['layout_two'] ) ) ? galaxy_store_sanitize( $new_instance['layout_two'] ) : $layout_two_old;
			return $instance;
		}

	}

}


if ( ! function_exists( 'galaxy_store_call_to_action_widget' ) ) {

	/**
	 * Init widget.
	 */
	function galaxy_store_call_to_action_widget() {
		register_widget( 'Galaxy_Store_Call_To_Action_Widget' );
	}
	add_action( 'widgets_init', 'galaxy_store_call_to_action_widget' );
}
