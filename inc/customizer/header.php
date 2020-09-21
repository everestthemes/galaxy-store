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
	'galaxy_store_customizer_header_top_header',
	array(
		'title'       => __( 'Top Header', 'galaxy-store' ),
		'panel'       => 'galaxy_store_customizer_header',
		'description' => '<p class="customizer-section-intro customize-control-description">' . __( 'Customize your theme top header.', 'galaxy-store' ) . '</p>',
		'priority'    => 25,
	)
);


// General Options.

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'galaxy_store_label',
		'custom_control'    => 'Galaxy_Store_Customizer_Label',
		'name'              => 'galaxy_store_customizer_label_general_options',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'General Options', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'flat',
		'custom_control'    => 'Galaxy_Store_Toggle_Control',
		'name'              => 'galaxy_store_customizer[enable_top_header]',
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Enable Top Header', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[top_header_bg_color]',
		'default'           => '#f7f8fb',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Background Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[top_header_text_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#7d7d7d',
		'label'             => esc_html__( 'Text Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[top_header_link_hover_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#F77426',
		'label'             => esc_html__( 'Link Hover Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[top_header_menu_separator_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#e0e0e0',
		'label'             => esc_html__( 'Menu Separator Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[top_header_border_bottom_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '#e0e0e0',
		'label'             => esc_html__( 'Border Bottom Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);


// Left Section.
Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'galaxy_store_label',
		'custom_control'    => 'Galaxy_Store_Customizer_Label',
		'name'              => 'galaxy_store_customizer_label_left_section',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Left Section Options', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'galaxy_store_customizer[left_section_type]',
		'sanitize_callback' => 'galaxy_store_sanitize_select',
		'label'             => esc_html__( 'Left Section Type', 'galaxy-store' ),
		'default'           => 'menu',
		'choices'           => array(
			'menu'        => __( 'WordPress Menu', 'galaxy-store' ),
			'custom-text' => __( 'Custom Text', 'galaxy-store' ),
		),
		'section'           => 'galaxy_store_customizer_header_top_header',
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
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);


// Right Section.

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'galaxy_store_label',
		'custom_control'    => 'Galaxy_Store_Customizer_Label',
		'name'              => 'galaxy_store_customizer_label_right_section',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Right Section Options', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_top_header',
	)
);


$social_links = galaxy_store_social_links();

if ( is_array( $social_links ) && ! empty( $social_links ) ) {
	foreach ( $social_links as $social_link ) {
		Galaxy_Store_Register_Options::register_option(
			$wp_customize,
			array(
				'type'              => 'text',
				'name'              => "galaxy_store_customizer[right_section_social_link][{$social_link}]",
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => ucwords( $social_link ),
				'section'           => 'galaxy_store_customizer_header_top_header',
			)
		);
	}
}





/**
 * =========================
 * Misc Options
 * =========================
 */

$wp_customize->add_section(
	'galaxy_store_customizer_header_misc_options',
	array(
		'title'       => __( 'Misc Options', 'galaxy-store' ),
		'panel'       => 'galaxy_store_customizer_header',
		'description' => '<p class="customizer-section-intro customize-control-description">' . __( 'Other general options for your theme header.', 'galaxy-store' ) . '</p>',
		'priority'    => 25,
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'flat',
		'custom_control'    => 'Galaxy_Store_Toggle_Control',
		'name'              => 'galaxy_store_customizer[misc_options_enable_search_form]',
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Enable Search Form', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_misc_options',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'flat',
		'custom_control'    => 'Galaxy_Store_Toggle_Control',
		'name'              => 'galaxy_store_customizer[misc_options_enable_wishlist]',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
		'label'             => esc_html__( 'Enable Wishlist', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_misc_options',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'flat',
		'custom_control'    => 'Galaxy_Store_Toggle_Control',
		'name'              => 'galaxy_store_customizer[misc_options_enable_mini_cart]',
		'sanitize_callback' => 'wp_validate_boolean',
		'default'           => true,
		'label'             => esc_html__( 'Enable Mini Cart', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_misc_options',
	)
);





/**
 * =========================
 * Special Menu
 * =========================
 */

$wp_customize->add_section(
	'galaxy_store_customizer_header_special_menu',
	array(
		'title'       => __( 'Special Menu', 'galaxy-store' ),
		'panel'       => 'galaxy_store_customizer_header',
		'description' => '<p class="customizer-section-intro customize-control-description">' . __( 'Customize the theme special menu that is used for categorised item listing.', 'galaxy-store' ) . '</p>',
		'priority'    => 25,
	)
);


Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'text',
		'name'              => 'galaxy_store_customizer[special_menu_title]',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Title', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_special_menu',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[special_menu_background_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Background Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_special_menu',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[special_menu_text_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Text Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_special_menu',
	)
);







/**
 * =========================
 * Main Menu
 * =========================
 */

$wp_customize->add_section(
	'galaxy_store_customizer_header_main_menu',
	array(
		'title'       => __( 'Main Menu', 'galaxy-store' ),
		'panel'       => 'galaxy_store_customizer_header',
		'description' => '<p class="customizer-section-intro customize-control-description">' . __( 'Customize the theme main menu that is used for website navigation.', 'galaxy-store' ) . '</p>',
		'priority'    => 25,
	)
);


Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[main_menu_background_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Background Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_main_menu',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[main_menu_text_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Text Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_main_menu',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[main_menu_active_menu_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Active Menu Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_main_menu',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[main_menu_hover_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Menu Hover Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_main_menu',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[main_menu_sub_menu_text_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Sub Menu Text Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_main_menu',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[main_menu_sub_menu_hover_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Sub Menu Hover Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_main_menu',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'color',
		'custom_control'    => 'WP_Customize_Color_Control',
		'name'              => 'galaxy_store_customizer[main_menu_submenu_icon_color]',
		'sanitize_callback' => 'sanitize_hex_color',
		'label'             => esc_html__( 'Submenu Icon Color', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_header_main_menu',
	)
);

