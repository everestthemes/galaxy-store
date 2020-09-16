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


if ( ! class_exists( 'Galaxy_Store_Category_Menus_Widget' ) ) {

	/**
	 * Class file for creating the section widget.
	 */
	class Galaxy_Store_Category_Menus_Widget extends WP_Widget {

		/**
		 * Sets up the widgets name etc.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'Galaxy_Store_Category_Menus_Widget',
				'description' => __( 'Category menus section widget for frontpage section.', 'galaxy-store' ),
			);
			parent::__construct( 'Galaxy_Store_Category_Menus_Widget', 'Galaxy Store Category Menus', $widget_ops );
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
			galaxy_store_get_template_part( 'template-parts/frontpage/category-menus', null, $instance );
			echo $args['after_widget']; //phpcs:ignore
		}


		/**
		 * Prints the html of WooCommerce product categories checkboxes.
		 *
		 * @param array $instance Previously saved values from database.
		 */
		private function get_product_categories( $instance ) {

			$product_categories = get_terms(
				array(
					'taxonomy' => 'product_cat',
				)
			);

			ob_start();
			if ( $product_categories && ! is_wp_error( $product_categories ) ) {
				if ( is_array( $product_categories ) && ! empty( $product_categories ) ) {
					foreach ( $product_categories as $product_category ) {
						$product_category_slug = $product_category->slug;

						$checked = '';
						if ( ! empty( $instance['product_categories'] ) ) {
							if ( in_array( $product_category_slug, $instance['product_categories'], true ) ) {
								$checked = 'checked';
							}
						}
						?>
						<label>
							<input type="checkbox" <?php echo esc_attr( $checked ); ?> name="<?php echo esc_attr( $this->get_field_name( 'product_categories' ) ); ?>[]" value="<?php echo esc_attr( $product_category_slug ); ?>">
							<span><?php echo esc_html( $product_category->name ); ?></span>
						</label>
						<?php
					}
				}
			} else {
				?>
				<p class="description">
					<?php esc_html_e( 'No product categories found.' ); ?>
				</p>
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
			$title               = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$number_of_posts     = ! empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : '';
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
					<strong><?php esc_html_e( 'Category Menus:', 'galaxy-store' ); ?></strong>
				</label>

				<div class="product-categories">
					<?php $this->get_product_categories( $instance ); ?>
				</div>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>">
					<strong><?php esc_html_e( 'Number Of Posts:', 'galaxy-store' ); ?></strong>
				</label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="number" min="1" value="<?php echo esc_attr( $number_of_posts ); ?>">
				<p class="description"><?php esc_html_e( 'Number of product posts per category menu.', 'galaxy-store' ); ?></p>
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
					<span><?php esc_html_e( 'Enable Quick Search', 'galaxy-store' ); ?></span>
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
			$instance = array();

			$instance['title']               = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['product_categories']  = ( ! empty( $new_instance['product_categories'] ) ) ? galaxy_store_sanitize( $new_instance['product_categories'] ) : array();
			$instance['number_of_posts']     = ( ! empty( $new_instance['number_of_posts'] ) ) ? sanitize_text_field( $new_instance['number_of_posts'] ) : '';
			$instance['enable_wishlist']     = ( ! empty( $new_instance['enable_wishlist'] ) ) ? sanitize_text_field( $new_instance['enable_wishlist'] ) : '';
			$instance['enable_quick_search'] = ( ! empty( $new_instance['enable_quick_search'] ) ) ? sanitize_text_field( $new_instance['enable_quick_search'] ) : '';
			return $instance;
		}

	}

}


if ( ! function_exists( 'galaxy_store_category_menus_widget' ) ) {

	/**
	 * Init widget.
	 */
	function galaxy_store_category_menus_widget() {
		register_widget( 'Galaxy_Store_Category_Menus_Widget' );
	}
	add_action( 'widgets_init', 'galaxy_store_category_menus_widget' );
}
