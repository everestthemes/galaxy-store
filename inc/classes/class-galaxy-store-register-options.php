<?php
/**
 * Class that will register settings and controls for the customizer.
 *
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'Galaxy_Store_Register_Options' ) ) {

	/**
	 * Class that will register settings and controls for the customizer
	 */
	class Galaxy_Store_Register_Options {

		/**
		 * Add controls settings.
		 */
		public static function add_setting( $wp_customize, $option ) {

			// Initialize Setting.
			$wp_customize->add_setting(
				$option['name'],
				array(
					'sanitize_callback' => $option['sanitize_callback'],
					'default'           => isset( $option['default'] ) ? $option['default'] : '',
					'transport'         => isset( $option['transport'] ) ? $option['transport'] : 'refresh',
					'theme_supports'    => isset( $option['theme_supports'] ) ? $option['theme_supports'] : '',
				)
			);

		}


		/**
		 * Add controls.
		 */
		public static function add_control( $wp_customize, $option ) {

			$control = array(
				'label'    => $option['label'],
				'section'  => $option['section'],
				'settings' => $option['name'],
			);

			if ( isset( $option['active_callback'] ) ) {
				$control['active_callback'] = $option['active_callback'];
			}

			if ( isset( $option['priority'] ) ) {
				$control['priority'] = $option['priority'];
			}

			if ( isset( $option['choices'] ) ) {
				$control['choices'] = $option['choices'];
			}

			if ( isset( $option['type'] ) ) {
				$control['type'] = $option['type'];
			}

			if ( isset( $option['input_attrs'] ) ) {
				$control['input_attrs'] = $option['input_attrs'];
			}

			if ( isset( $option['description'] ) ) {
				$control['description'] = $option['description'];
			}

			if ( isset( $option['mime_type'] ) ) {
				$control['mime_type'] = $option['mime_type'];
			}

			if ( isset( $option['flex_width'] ) ) {
				$control['flex_width'] = $option['flex_width'];
			}

			if ( isset( $option['flex_height'] ) ) {
				$control['flex_height'] = $option['flex_height'];
			}

			if ( isset( $option['width'] ) ) {
				$control['width'] = $option['width'];
			}

			if ( isset( $option['height'] ) ) {
				$control['height'] = $option['height'];
			}

			if ( ! empty( $option['custom_control'] ) ) {
				$wp_customize->add_control( new $option['custom_control']( $wp_customize, $option['name'], $control ) );
			} else {
				$wp_customize->add_control( $option['name'], $control );
			}
		}

		/**
		 * Private contruct to prevent initiation with outer code.
		 */
		public static function register_option( $wp_customize, $option ) {
			self::add_setting( $wp_customize, $option );
			self::add_control( $wp_customize, $option );
		}

	}
}

