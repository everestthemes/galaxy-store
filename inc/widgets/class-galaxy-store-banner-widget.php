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


if ( ! class_exists( 'Galaxy_Store_Banner_Widget' ) ) {

	/**
	 * Class file for creating the section widget.
	 */
	class Galaxy_Store_Banner_Widget extends WP_Widget {

		/**
		 * Sets up the widgets name etc.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'Galaxy_Store_Banner_Widget',
				'description' => __( 'Banner widget section for frontpage.', 'galaxy-store' ),
			);
			parent::__construct( 'Galaxy_Store_Banner_Widget', 'Galaxy Store Banner', $widget_ops );
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
			get_template_part( 'template-parts/frontpage/banner' );
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {

			$bg_image_id = $this->get_field_id( 'background-image' );
			$image_uri   = ! empty( $instance['image_uri'] ) ? $instance['image_uri'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $bg_image_id ); ?>">
					<strong><?php esc_html_e( 'Background Image:', 'galaxy-store' ); ?></strong>
				</label>
				<img class="<?php echo esc_attr( "{$bg_image_id}_img" ); ?>" src="<?php echo esc_url( $image_uri ); ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
				<input type="hidden" class="widefat <?php echo esc_attr( "{$bg_image_id}_url" ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image_uri' ) ); ?>" value="<?php echo esc_url( $image_uri ); ?>"/>
				<input data-save="<?php echo esc_attr( $this->get_field_id( 'savewidget' ) ); ?>" type="button" id="<?php echo esc_attr( $bg_image_id ); ?>" class="button button-primary js_custom_upload_media" value="<?php esc_attr_e( 'Upload Image', 'galaxy-store' ); ?>" style="margin-top:5px;" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'product_category' ) ); ?>">
					<strong><?php esc_html_e( 'Select Category:', 'galaxy-store' ); ?></strong>
				</label>
				<?php
					wp_dropdown_categories(
						array(
							'taxonomy'        => 'product_cat',
							'show_option_all' => esc_html__( 'Select Category', 'orchid-store' ),
							'name'            => $this->get_field_name( 'product_category' ),
							'id'              => $this->get_field_id( 'product_category' ),
							'class'           => 'widefat',
							'value_field'     => 'slug',
							'hide_empty'      => 1,
							'selected'        => isset( $instance['product_category'] ) ? $instance['product_category'] : '',
						)
					);
				?>
			</p>
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

			$instance['image_uri']        = ( ! empty( $new_instance['image_uri'] ) ) ? esc_url_raw( $new_instance['image_uri'] ) : '';
			$instance['product_category'] = ( ! empty( $new_instance['product_category'] ) ) ? sanitize_text_field( $new_instance['product_category'] ) : '';
			return $instance;
		}

	}

}


if ( ! function_exists( 'galaxy_store_banner_widget' ) ) {

	/**
	 * Init widget.
	 */
	function galaxy_store_banner_widget() {
		register_widget( 'Galaxy_Store_Banner_Widget' );
	}
	add_action( 'widgets_init', 'galaxy_store_banner_widget' );
}
