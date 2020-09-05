<?php
/**
 * Galaxy Store Theme Customizer
 *
 * @package galaxy-store
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the theme mod.
 */
function galaxy_store_get_theme_mod( $key = false, $default = false ) {
	$mods = get_theme_mod( 'galaxy_store_customizer' );

	if ( ! $key ) {
		return $mods;
	}

	return isset( $mods[ $key ] ) ? $mods[ $key ] : $default;
}



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function galaxy_store_customize_register( $wp_customize ) {

	$customizer_path = get_template_directory() . '/inc/customizer';

	require_once "{$customizer_path}/custom-controls/class-galaxy-store-customizer-label.php";
	require_once "{$customizer_path}/custom-controls/toggle/class-toggle-control.php";

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'galaxy_store_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'galaxy_store_customize_partial_blogdescription',
			)
		);
	}

	$customizer_options = array(
		'site-layout',
		'header',
		'footer',
	);

	if ( is_array( $customizer_options ) && ! empty( $customizer_options ) ) {
		foreach ( $customizer_options as $customizer_option ) {
			require_once "{$customizer_path}/{$customizer_option}.php";
		}
	}
}
add_action( 'customize_register', 'galaxy_store_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function galaxy_store_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function galaxy_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function galaxy_store_customize_preview_js() {
	wp_enqueue_script( 'galaxy-store-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), GALAXY_STORE_VERSION, true );
}
add_action( 'customize_preview_init', 'galaxy_store_customize_preview_js' );



if ( ! function_exists( 'galaxy_store_sanitize_select' ) ) {

	/**
	 * Sanitization callback function for select field.
	 */
	function galaxy_store_sanitize_select( $input, $setting ) {

		/**
		 * Bail early if the $input is empty.
		 * It prevents the false validation notification.
		 */
		if ( empty( $input ) ) {
			return $input;
		}

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;
		$attrs   = $setting->manager->get_control( $setting->id )->input_attrs;

		$is_multiple = ! empty( $attrs['multiple'] ) ? $attrs['multiple'] : false;

		if ( $is_multiple ) {
			$valid_data = array();
			if ( is_array( $input ) && ! empty( $input ) ) {
				foreach ( $input as $ids ) {
					$found = ! empty( $choices[ $ids ] ) ? $choices[ $ids ] : false;
					if ( $found ) {
						array_push( $valid_data, $ids );
					}
				}
			}

			if ( count( $valid_data ) > 0 ) {
				/**
				 * Return the valid data.
				 */
				return $valid_data;
			}
		} else {
			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}

	}
}


/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function galaxy_store_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

