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


if ( ! class_exists( 'Galaxy_Store_Recent_Posts_Widget' ) ) {

	/**
	 * Class file for creating the section widget.
	 */
	class Galaxy_Store_Recent_Posts_Widget extends WP_Widget {

		/**
		 * Sets up the widgets name etc.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'Galaxy_Store_Recent_Posts_Widget',
				'description' => __( 'Recent posts section widget for frontpage section.', 'galaxy-store' ),
			);
			parent::__construct( 'Galaxy_Store_Recent_Posts_Widget', 'Galaxy Store Recent Posts', $widget_ops );
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
			get_template_part( 'template-parts/frontpage/recent-posts' );
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$title              = ! empty( $instance['title'] ) ? $instance['title'] : '';
			$number_of_posts    = ! empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : '';
			$hide_author_name   = ! empty( $instance['hide_author_name'] ) ? $instance['hide_author_name'] : '';
			$hide_category_name = ! empty( $instance['hide_category_name'] ) ? $instance['hide_category_name'] : '';
			$hide_post_date     = ! empty( $instance['hide_post_date'] ) ? $instance['hide_post_date'] : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<strong><?php esc_html_e( 'Title:', 'galaxy-store' ); ?></strong>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'product_category' ) ); ?>">
					<strong><?php esc_html_e( 'Select Category:', 'galaxy-store' ); ?></strong>
				</label>
				<?php
					wp_dropdown_categories(
						array(
							'taxonomy'        => 'product_cat',
							'show_option_all' => esc_html__( 'Select Category', 'galaxy-store' ),
							'name'            => $this->get_field_name( 'product_category' ),
							'id'              => $this->get_field_id( 'product_category' ),
							'class'           => 'widefat',
							'value_field'     => 'slug',
							'hide_empty'      => 1,
							'selected'        => isset( $instance['product_category'] ) ? $instance['product_category'] : '',
						)
					);
				?>
				<p class="description"><?php esc_html_e( 'Select a category if you want to display recent posts of a specific category only.', 'galaxy-store' ); ?></p>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>">
					<strong><?php esc_html_e( 'Number Of Posts:', 'galaxy-store' ); ?></strong>
				</label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="number" min="1" value="<?php echo esc_attr( $number_of_posts ); ?>">
			</p>
			<p>
				<label>
					<input type="checkbox" <?php checked( $hide_author_name, 'yes' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'enable-wishlist' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hide_author_name' ) ); ?>" value="yes">
					<span><?php esc_html_e( 'Hide Author Name', 'galaxy-store' ); ?></span>
				</label>
			</p>
			<p>
				<label>
					<input type="checkbox" <?php checked( $hide_category_name, 'yes' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'enable-quick-search' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hide_category_name' ) ); ?>" value="yes">
					<span><?php esc_html_e( 'Hide Category Name', 'galaxy-store' ); ?></span>
				</label>
			</p>
			<p>
				<label>
					<input type="checkbox" <?php checked( $hide_post_date, 'yes' ); ?> id="<?php echo esc_attr( $this->get_field_id( 'enable-quick-search' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hide_post_date' ) ); ?>" value="yes">
					<span><?php esc_html_e( 'Hide Post Date', 'galaxy-store' ); ?></span>
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
			$instance                    = array();
			$instance['title']           = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
			$instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ) ? sanitize_text_field( $new_instance['number_of_posts'] ) : '';
			return $instance;
		}

	}

}


if ( ! function_exists( 'galaxy_store_recent_posts_widget' ) ) {

	/**
	 * Init widget.
	 */
	function galaxy_store_recent_posts_widget() {
		register_widget( 'Galaxy_Store_Recent_Posts_Widget' );
	}
	add_action( 'widgets_init', 'galaxy_store_recent_posts_widget' );
}
