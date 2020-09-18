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


if ( ! class_exists( 'Galaxy_Store_Featured_Products_Widget' ) ) {

	/**
	 * Class file for creating the section widget.
	 */
	class Galaxy_Store_Featured_Products_Widget extends WP_Widget {

		/**
		 * Sets up the widgets name etc.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'Galaxy_Store_Featured_Products_Widget',
				'description' => __( 'Featured products listing widget for frontpage section.', 'galaxy-store' ),
			);
			parent::__construct( 'Galaxy_Store_Featured_Products_Widget', 'Galaxy Store Featured Products', $widget_ops );
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
			galaxy_store_get_template_part( 'template-parts/frontpage/featured-products', null, $instance );
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
			$title               = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$enable_wishlist     = ! empty( $instance['enable_wishlist'] ) ? $instance['enable_wishlist'] : '';
			$enable_quick_search = ! empty( $instance['enable_quick_search'] ) ? $instance['enable_quick_search'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<strong><?php esc_html_e( 'Title:', 'galaxy-store' ); ?></strong>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label>
					<input type="checkbox" <?php checked( $enable_wishlist, 'yes' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'enable-wishlist' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'enable_wishlist' ) ); ?>" value="yes">
					<span><?php esc_html_e( 'Enable Wishlist', 'galaxy-store' ); ?></span>
				</label>
			</p>
			<p>
				<label>
					<input type="checkbox" <?php checked( $enable_quick_search, 'yes' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'enable-quick-search' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'enable_quick_search' ) ); ?>" value="yes">
					<span><?php esc_html_e( 'Enable Quick View', 'galaxy-store' ); ?></span>
				</label>
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
			$instance                        = array();
			$instance['title']               = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['enable_wishlist']     = ( ! empty( $new_instance['enable_wishlist'] ) ) ? sanitize_text_field( $new_instance['enable_wishlist'] ) : '';
			$instance['enable_quick_search'] = ( ! empty( $new_instance['enable_quick_search'] ) ) ? sanitize_text_field( $new_instance['enable_quick_search'] ) : '';
			return $instance;
		}

	}

}


if ( ! function_exists( 'galaxy_store_featured_products_widget' ) ) {

	/**
	 * Init widget.
	 */
	function galaxy_store_featured_products_widget() {
		register_widget( 'Galaxy_Store_Featured_Products_Widget' );
	}
	add_action( 'widgets_init', 'galaxy_store_featured_products_widget' );
}
