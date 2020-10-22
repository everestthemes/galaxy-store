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


if ( ! class_exists( 'Galaxy_Store_Clients_Widget' ) ) {

	/**
	 * Class file for creating the section widget.
	 */
	class Galaxy_Store_Clients_Widget extends WP_Widget {

		/**
		 * Sets up the widgets name etc.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'Galaxy_Store_Clients_Widget our-clients',
				'description' => __( 'Clients section widget for frontpage section.', 'galaxy-store' ),
			);
			parent::__construct( 'Galaxy_Store_Clients_Widget', 'Galaxy Store Clients', $widget_ops );
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
			echo $args['before_widget']; //phpcs:ignore
			galaxy_store_get_template_part( 'template-parts/frontpage/clients', null, $instance );
			echo $args['after_widget']; //phpcs:ignore
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<strong><?php esc_html_e( 'Title:', 'galaxy-store' ); ?></strong>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<div class="image-logo-uploader">
				<?php
				for ( $index = 0; $index <= 4; $index++ ) {

					$image_uri   = ! empty( $instance['logos'][ $index ]['image_uri'] ) ? $instance['logos'][ $index ]['image_uri'] : '';
					$field_id    = $this->get_field_id( 'logos' ) . "-{$index}";
					$field_name  = $this->get_field_name( 'logos' ) . "[{$index}]";
					$bg_image_id = "{$field_id}-background-image";

					$current = $index + 1;
					?>
					<p>
						<label for="<?php echo esc_attr( $bg_image_id ); ?>">
							<strong><?php echo esc_html( __( 'Image/Logo', 'galaxy-store' ) . " {$current}: " ); ?></strong>
						</label>
						<img width="100" class="<?php echo esc_attr( "{$bg_image_id}_img" ); ?>" src="<?php echo esc_url( $image_uri ); ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
						<input type="hidden" class="widefat <?php echo esc_attr( "{$bg_image_id}_url" ); ?>" name="<?php echo esc_attr( "{$field_name}[image_uri]" ); ?>" value="<?php echo esc_url( $image_uri ); ?>"/>
						<input data-save="<?php echo esc_attr( $this->get_field_id( 'savewidget' ) ); ?>" type="button" id="<?php echo esc_attr( $bg_image_id ); ?>" class="button button-primary js_custom_upload_media" value="<?php esc_attr_e( 'Upload Image', 'galaxy-store' ); ?>" style="margin-top:5px;" />
					</p>
					<?php
				}
				?>
			</div>
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
			$instance          = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['logos'] = ( ! empty( $new_instance['logos'] ) ) ? galaxy_store_sanitize( $new_instance['logos'] ) : '';
			return $instance;
		}

	}

}


if ( ! function_exists( 'galaxy_store_clients_widget' ) ) {

	/**
	 * Init widget.
	 */
	function galaxy_store_clients_widget() {
		register_widget( 'Galaxy_Store_Clients_Widget' );
	}
	add_action( 'widgets_init', 'galaxy_store_clients_widget' );
}
