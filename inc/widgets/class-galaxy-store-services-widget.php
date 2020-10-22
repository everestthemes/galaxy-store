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


if ( ! class_exists( 'Galaxy_Store_Services_Widget' ) ) {

	/**
	 * Class file for creating the section widget.
	 */
	class Galaxy_Store_Services_Widget extends WP_Widget {

		/**
		 * Sets up the widgets name etc.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'Galaxy_Store_Services_Widget service',
				'description' => __( 'Services section widget for frontpage section.', 'galaxy-store' ),
			);
			parent::__construct( 'Galaxy_Store_Services_Widget', 'Galaxy Store Services', $widget_ops );
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
			galaxy_store_get_template_part( 'template-parts/frontpage/services', null, $instance );
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
			$number_of_posts = ! empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
					<strong><?php esc_html_e( 'Select Category:', 'galaxy-store' ); ?></strong>
				</label>
				<?php
					wp_dropdown_categories(
						array(
							'taxonomy'        => 'category',
							'show_option_all' => esc_html__( 'Select Category', 'galaxy-store' ),
							'name'            => $this->get_field_name( 'category' ),
							'id'              => $this->get_field_id( 'category' ),
							'class'           => 'widefat',
							'value_field'     => 'slug',
							'hide_empty'      => 1,
							'required'        => true,
							'selected'        => isset( $instance['category'] ) ? $instance['category'] : '',
						)
					);
				?>
				<p class="description"><?php esc_html_e( 'Select a category for services section. It is a required field for this section widget.', 'galaxy-store' ); ?></p>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>">
					<strong><?php esc_html_e( 'Number Of Posts:', 'galaxy-store' ); ?></strong>
				</label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="number" min="1" value="<?php echo esc_attr( $number_of_posts ); ?>">
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
			$instance                    = array();
			$instance['category']        = ( ! empty( $new_instance['category'] ) ) ? sanitize_text_field( $new_instance['category'] ) : '';
			$instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ) ? sanitize_text_field( $new_instance['number_of_posts'] ) : '';
			return $instance;
		}

	}

}


if ( ! function_exists( 'galaxy_store_services_widget' ) ) {

	/**
	 * Init widget.
	 */
	function galaxy_store_services_widget() {
		register_widget( 'Galaxy_Store_Services_Widget' );
	}
	add_action( 'widgets_init', 'galaxy_store_services_widget' );
}
