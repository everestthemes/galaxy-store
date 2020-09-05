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



$wp_customize->add_section(
	'galaxy_store_customizer_footer',
	array(
		'title'       => __( 'Footer', 'galaxy-store' ),
		'description' => '<p class="customizer-section-intro customize-control-description">' . __( 'Customize your theme footer.', 'galaxy-store' ) . '</p>',
		'priority'    => 45,
	)
);


Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'flat',
		'custom_control'    => 'Galaxy_Store_Toggle_Control',
		'name'              => 'galaxy_store_customizer[enable_footer_widgets]',
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Enable Footer Widgets', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_footer',
	)
);

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'flat',
		'custom_control'    => 'Galaxy_Store_Toggle_Control',
		'name'              => 'galaxy_store_customizer[display_social_icons]',
		'default'           => true,
		'sanitize_callback' => 'wp_validate_boolean',
		'label'             => esc_html__( 'Display Social Icons', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_footer',
	)
);


Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'textarea',
		'name'              => 'galaxy_store_customizer[footer_copyright_text]',
		'sanitize_callback' => 'wp_kses_post',
		'label'             => esc_html__( 'Copyright Text', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_footer',
	)
);




/**
 * ===============
 * Payment Options
 * ===============
 */

Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'galaxy_store_label',
		'custom_control'    => 'Galaxy_Store_Customizer_Label',
		'name'              => 'galaxy_store_customizer_label_payment_option_logos',
		'sanitize_callback' => 'sanitize_text_field',
		'label'             => esc_html__( 'Payment Options', 'galaxy-store' ),
		'description'       => esc_html__( 'Upload your accepted payment options logos.', 'galaxy-store' ),
		'section'           => 'galaxy_store_customizer_footer',
	)
);


for ( $index = 1; $index <= 5; $index++ ) {
	Galaxy_Store_Register_Options::register_option(
		$wp_customize,
		array(
			'custom_control'    => 'WP_Customize_Image_Control',
			'name'              => "galaxy_store_customizer[payment_option_logos][{$index}]",
			'sanitize_callback' => 'esc_url_raw',
			'label'             => esc_html__( 'Payment Option', 'galaxy-store' ) . " {$index}",
			'section'           => 'galaxy_store_customizer_footer',
		)
	);

}


