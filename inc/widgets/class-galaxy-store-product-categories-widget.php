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


if ( ! class_exists( 'Galaxy_Store_Product_Categories_Widget' ) ) {

	/**
	 * Class file for creating the section widget.
	 */
	class Galaxy_Store_Product_Categories_Widget extends WP_Widget {

		/**
		 * Sets up the widgets name etc.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'Galaxy_Store_Product_Categories_Widget',
				'description' => __( 'Product categories listing widget for frontpage section.', 'galaxy-store' ),
			);
			parent::__construct( 'Galaxy_Store_Product_Categories_Widget', 'Galaxy Store Product Categories', $widget_ops );
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
			get_template_part( 'template-parts/frontpage/product-categories' );
		}

		/**
		 * Prints the html of WooCommerce product categories checkboxes.
		 */
		private function get_product_categories() {
			$product_categories = get_terms(
				array(
					'taxonomy' => 'product_cat',
				)
			);

			ob_start();
			if ( $product_categories && ! is_wp_error( $product_categories ) ) {
				if ( is_array( $product_categories ) && ! empty( $product_categories ) ) {
					foreach ( $product_categories as $product_category ) {
						?>
						<label>
							<input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'product_categories' ) ); ?>[]" value="<?php echo esc_attr( $product_category->term_id ); ?>">
							<span><?php echo esc_html( $product_category->name ); ?></span>
						</label>
						<?php
					}
				}
			} else {
				?>
				<p class="description"><?php esc_html_e( 'No product categories found.' ); ?></p>
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
			$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<?php esc_attr_e( 'Title:', 'galaxy-store' ); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label><?php esc_html_e( 'Product Categories:', 'galaxy-store' ); ?></label>

				<div class="product-categories-container">
					<?php $this->get_product_categories(); ?>
				</div>
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
			$instance          = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			return $instance;
		}

	}

}


if ( ! function_exists( 'galaxy_store_product_categories_widget' ) ) {

	/**
	 * Init widget.
	 */
	function galaxy_store_product_categories_widget() {
		register_widget( 'Galaxy_Store_Product_Categories_Widget' );
	}
	add_action( 'widgets_init', 'galaxy_store_product_categories_widget' );
}
