<?php
/**
 * Customizer field options and settings.
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
 * Create panel.
 */
$wp_customize->add_panel(
	'galaxy_store_customizer_header',
	array(
		'title'       => __( 'Header', 'galaxy-store' ),
		'description' => '<p class="customizer-section-intro customize-control-description">' . __( 'Customize your theme header.', 'galaxy-store' ) . '</p>',
		'priority'    => 35,
	)
);



/**
 * =========================
 * Top Header
 * =========================
 */

$wp_customize->add_section(
	'galaxy_store_customizer_top_header',
	array(
		'title'       => __( 'Top Header', 'galaxy-store' ),
		'panel'       => 'galaxy_store_customizer_header',
		'description' => '<p class="customizer-section-intro customize-control-description">' . __( 'Customize your theme top header.', 'galaxy-store' ) . '</p>',
		'priority'    => 25,
	)
);


Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'galaxy_store_label',
		'custom_control'    => 'Galaxy_Store_Customizer_Label',
		'name'              => 'galaxy_store_customizer_label_general_options',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'General Options', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'galaxy_store_customizer[enable_top_header]',
		'sanitize_callback' => 'galaxy_store_sanitize_select',
		'label'             => esc_html__( 'Enable Top Header', 'galaxy-store' ),
		'choices'           => array(
			0 => __( 'Enable', 'galaxy-store' ),
			1 => __( 'Disable', 'galaxy-store' ),
		),
		'section'           => 'galaxy_store_customizer_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[top_header_bg_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Background Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[top_header_text_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Text Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[top_header_link_hover_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Link Hover Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[top_header_border_bottom_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Border Bottom Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'galaxy_store_label',
		'custom_control'    => 'Galaxy_Store_Customizer_Label',
		'name'              => 'galaxy_store_customizer_label_left_section',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Left Section Options', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'galaxy_store_customizer[left_section_type]',
		'sanitize_callback' => 'galaxy_store_sanitize_select',
		'label'             => esc_html__( 'Left Section Type', 'galaxy-store' ),
		'choices'           => array(
			'menu'        => __( 'WordPress Menu', 'galaxy-store' ),
			'custom-text' => __( 'Custom Text', 'galaxy-store' ),
		),
		'section'           => 'galaxy_store_customizer_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'galaxy_store_customizer[left_section_custom_text]',
		'sanitize_callback' => 'sanitize_text_field',
		'active_callback'   => function( $control ) {
			$setting = $control->manager->get_setting( 'galaxy_store_customizer[left_section_type]' )->value();
			return 'custom-text' === $setting;
		},
		'label'             => esc_html__( 'Add Custom Text', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_top_header',
	)
);

