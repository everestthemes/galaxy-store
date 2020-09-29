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
 * Create section.
 */
$wp_customize->add_section(
	'galaxy_store_customizer_site_layout',
	array(
		'title'       => __( 'Site Layout', 'galaxy-store' ),
		'description' => '<p class="customizer-section-intro customize-control-description">' . __( 'Select a layout for your website.', 'galaxy-store' ) . '</p>',
		'priority'    => 25,
	)
);


/**
 * Register options.
 */
Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'galaxy_store_customizer[site_layout]',
		'sanitize_callback' => 'galaxy_store_sanitize_select',
		'label'             => esc_html__( 'Site Layout', 'galaxy-store' ),
		'default'           => 'boxed',
		'choices'           => array(
			'full-width' => __( 'Full width layout', 'galaxy-store' ),
			'boxed'      => __( 'Boxed layout', 'galaxy-store' ),
		),
		'section'           => 'galaxy_store_customizer_site_layout',
	)
);




/**
 * Register options.
 */
Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'galaxy_store_customizer[archives_layout]',
		'sanitize_callback' => 'galaxy_store_sanitize_select',
		'label'             => esc_html__( 'Blogs/Archives Layout', 'galaxy-store' ),
		'default'           => 'right-sidebar',
		'choices'           => array(
			'no-sidebar'    => __( 'No Sidebar', 'galaxy-store' ),
			'right-sidebar' => __( 'Right Sidebar', 'galaxy-store' ),
			'left-sidebar'  => __( 'left Sidebar', 'galaxy-store' ),
		),
		'section'           => 'galaxy_store_customizer_site_layout',
	)
);


/**
 * Register options.
 */
Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'galaxy_store_customizer[posts_layout]',
		'sanitize_callback' => 'galaxy_store_sanitize_select',
		'label'             => esc_html__( 'Posts Layout', 'galaxy-store' ),
		'default'           => 'right-sidebar',
		'choices'           => array(
			'no-sidebar'    => __( 'No Sidebar', 'galaxy-store' ),
			'right-sidebar' => __( 'Right Sidebar', 'galaxy-store' ),
			'left-sidebar'  => __( 'left Sidebar', 'galaxy-store' ),
		),
		'section'           => 'galaxy_store_customizer_site_layout',
	)
);


Galaxy_Store_Register_Options::register_option(
	$wp_customize,
	array(
		'type'              => 'select',
		'name'              => 'galaxy_store_customizer[pages_layout]',
		'sanitize_callback' => 'galaxy_store_sanitize_select',
		'label'             => esc_html__( 'Pages Layout', 'galaxy-store' ),
		'default'           => 'right-sidebar',
		'choices'           => array(
			'no-sidebar'    => __( 'No Sidebar', 'galaxy-store' ),
			'right-sidebar' => __( 'Right Sidebar', 'galaxy-store' ),
			'left-sidebar'  => __( 'left Sidebar', 'galaxy-store' ),
		),
		'section'           => 'galaxy_store_customizer_site_layout',
	)
);
