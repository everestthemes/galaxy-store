<?php
/**
 * Galaxy Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Galaxy_Store
 */

if ( ! defined( 'GALAXY_STORE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'GALAXY_STORE_VERSION', '1.0.0' );
}


if ( ! function_exists( 'galaxy_store_get_template_part' ) ) {

	/**
	 * As, get_template_part does not accept any args before WordPress 5.5, we have this custom function as work around.
	 *
	 * @param string $slug The slug name for the generic template.
	 * @param string $name The name of the specialised template.
	 * @param array  $data Optional. Additional arguments passed to the template.
	 *                     Default empty array.
	 */
	function galaxy_store_get_template_part( $slug, $name = null, $data = array() ) {
		$template = '';
		$name     = (string) $name;

		$template = "{$slug}.php";

		if ( '' !== $name ) {
			$template = "{$slug}-{$name}.php";
		}

		include locate_template( $template, false, false );
	}
}

if ( ! function_exists( 'galaxy_store_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function galaxy_store_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Galaxy Store, use a find and replace
		 * to change 'galaxy-store' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'galaxy-store', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top-bar'      => esc_html__( 'Top Bar', 'galaxy-store' ),
				'primary'      => esc_html__( 'Primary', 'galaxy-store' ),
				'special-menu' => esc_html__( 'Special Menu', 'galaxy-store' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'galaxy_store_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'galaxy_store_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function galaxy_store_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'galaxy_store_content_width', 640 );
}
add_action( 'after_setup_theme', 'galaxy_store_content_width', 0 );



if ( ! function_exists( 'galaxy_store_nav_menu_fallback' ) ) {
	/**
	 * Fallback for wp_nav_menu
	 *
	 * @since 1.0.0
	 */
	function galaxy_store_nav_menu_fallback() {
		?>
		<ul class="menu">
			<?php
			if ( current_user_can( 'edit_theme_options' ) ) {
				?>
				<li class="menu-item"><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Add Menu', 'trending-mag' ); ?></a></li>
				<?php
			}
			?>
		</ul>
		<?php
	}
}



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function galaxy_store_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'galaxy-store' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'galaxy-store' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	/**
	 * Frontpage section widgets.
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Frontpage Widgets', 'galaxy-store' ),
			'id'            => 'frontpage-widgets',
			'description'   => esc_html__( 'Add widgets for your frontpage sections widgets.', 'galaxy-store' ),
			'before_widget' => '<section id="%1$s" class="frontpage-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<span>',
			'after_title'   => '</span>',
		)
	);

	/**
	 * Footer widget areas.
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area One', 'galaxy-store' ),
			'id'            => 'footer-widgets-area-one',
			'description'   => esc_html__( 'Add widgets for your footer.', 'galaxy-store' ),
			'before_widget' => '<div id="%1$s" class="footer-widgets %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span>',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area Two', 'galaxy-store' ),
			'id'            => 'footer-widgets-area-two',
			'description'   => esc_html__( 'Add widgets for your footer.', 'galaxy-store' ),
			'before_widget' => '<div id="%1$s" class="footer-widgets %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span>',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area Three', 'galaxy-store' ),
			'id'            => 'footer-widgets-area-three',
			'description'   => esc_html__( 'Add widgets for your footer.', 'galaxy-store' ),
			'before_widget' => '<div id="%1$s" class="footer-widgets %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span>',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area Four', 'galaxy-store' ),
			'id'            => 'footer-widgets-area-four',
			'description'   => esc_html__( 'Add widgets for your footer.', 'galaxy-store' ),
			'before_widget' => '<div id="%1$s" class="footer-widgets %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span>',
			'after_title'   => '</span>',
		)
	);
}
add_action( 'widgets_init', 'galaxy_store_widgets_init' );


/**
 * Returns the array of supported social links.
 */
function galaxy_store_social_links() {
	return apply_filters(
		'galaxy_store_social_links',
		array(
			'facebook',
			'instagram',
			'twitter',
		)
	);
}



/**
 * Returns the array of active footer widget areas
 */
function galaxy_store_get_active_footer_widget_areas() {

	$active_area = array();

	$enable_widget_area = galaxy_store_get_theme_mod( 'enable_footer_widgets', true );

	if ( ! $enable_widget_area ) {
		return;
	}

	$widget_area_ids = array(
		'footer-widgets-area-one',
		'footer-widgets-area-two',
		'footer-widgets-area-three',
		'footer-widgets-area-four',
	);

	if ( is_array( $widget_area_ids ) && ! empty( $widget_area_ids ) ) {
		foreach ( $widget_area_ids as $widget_area_id ) {
			if ( is_active_sidebar( $widget_area_id ) ) {
				$active_area[] = $widget_area_id;
			}
		}
	}

	return $active_area;

}


/**
 * Recursive sanitation for an array/
 *
 * Here we are using sanitize_text_field function wrapped with our custom function.
 * This custom function iterates the sanitize_text_field function to every string element of provided array
 * and returns the array with sanitized string elements.
 *
 * Credit: @link https://wordpress.stackexchange.com/a/255238
 *
 * @param array $array submitted $_POST data array.
 * @return mixed
 */
function galaxy_store_sanitize( $array ) {
	foreach ( $array as $key => &$value ) {
		if ( is_array( $value ) ) {
			$value = galaxy_store_sanitize( $value );
		} else {
			$value = sanitize_text_field( wp_unslash( $value ) );
		}
	}
	return $array;
}


/**
 * Dynamic CSS variables.
 */
function galaxy_store_dynamic_css_variables() {

	$colors = array(
		'top_header_bg_color'             => '#f7f8fb',
		'top_header_text_color'           => '#7d7d7d',
		'top_header_link_hover_color'     => '#F77426',
		'top_header_menu_separator_color' => '#e0e0e0',
		'top_header_border_bottom_color'  => '#e0e0e0',
	);

	?>
	<style id="galaxy-store-dynamic-css-variables">
		:root {
			<?php
			if ( is_array( $colors ) && ! empty( $colors ) ) {
				foreach ( $colors as $color_index => $color_default ) {
					$css_var_suffix = str_replace( '_', '-', $color_index );
					$color_values   = sanitize_hex_color( galaxy_store_get_theme_mod( $color_index, $color_default ) );
					echo esc_attr( "--galaxy-store-{$css_var_suffix}: {$color_values}; " );
				}
			}
			?>
		}
	</style>
	<?php
}



/**
 * Enqueue scripts and styles.
 */
function galaxy_store_scripts() {

	galaxy_store_dynamic_css_variables();

	wp_enqueue_style( 'galaxy-store-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'galaxy-store-simple-line-icons', get_template_directory_uri() . '/css/simple-line-icons.css', array(), '1.0.0' );
	wp_enqueue_style( 'galaxy-store-beezify', get_template_directory_uri() . '/css/beezify.css', array(), '1.0.0' );

	wp_enqueue_style( 'galaxy-store-font-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap', array(), '1.0.0' );
	wp_enqueue_style( 'galaxy-store-font-Inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), '1.0.0' );

	wp_enqueue_style( 'galaxy-store-nice-select', get_template_directory_uri() . '/css/nice-select.css', array(), '1.0.0' );
	wp_enqueue_style( 'galaxy-store-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.3.4' );
	wp_enqueue_style( 'galaxy-store-animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0.0' );
	wp_enqueue_style( 'galaxy-store-main-style', get_template_directory_uri() . '/css/style.css', array(), GALAXY_STORE_VERSION );
	wp_enqueue_style( 'galaxy-store-responsive', get_template_directory_uri() . '/css/responsive.css', array(), GALAXY_STORE_VERSION );

	wp_enqueue_style( 'galaxy-store-style', get_stylesheet_uri(), array(), GALAXY_STORE_VERSION );
	wp_style_add_data( 'galaxy-store-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'galaxy-store-nice-select', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'galaxy-store-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '2.3.4', true );
	wp_enqueue_script( 'galaxy-store-jquery-plugin', get_template_directory_uri() . '/js/jquery.plugin.js', array(), GALAXY_STORE_VERSION, true );
	wp_enqueue_script( 'galaxy-store-jquery-countdown', get_template_directory_uri() . '/js/jquery.countdown.js', array(), GALAXY_STORE_VERSION, true );
	wp_enqueue_script( 'galaxy-store-main', get_template_directory_uri() . '/js/main.js', array(), GALAXY_STORE_VERSION, true );

	wp_enqueue_script( 'galaxy-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), GALAXY_STORE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'galaxy_store_scripts' );


if ( ! function_exists( 'galaxy_store_admin_scripts' ) ) {

	/**
	 * Hooks the styles and scripts to admin panel.
	 */
	function galaxy_store_admin_scripts() {
		wp_enqueue_media();
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'galaxy-store-admin', get_template_directory_uri() . '/js/admin.js', array(), GALAXY_STORE_VERSION, true );
	}
	add_action( 'admin_enqueue_scripts', 'galaxy_store_admin_scripts' );
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/breadcrumbs.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer control class.
 */
require get_template_directory() . '/inc/classes/class-galaxy-store-register-options.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * All the frontpage widgets.
 */
require get_template_directory() . '/inc/widgets/class-galaxy-store-banner-widget.php';
require get_template_directory() . '/inc/widgets/class-galaxy-store-product-categories-widget.php';
require get_template_directory() . '/inc/widgets/class-galaxy-store-featured-products-widget.php';
require get_template_directory() . '/inc/widgets/class-galaxy-store-product-offers-widget.php';
require get_template_directory() . '/inc/widgets/class-galaxy-store-recent-posts-widget.php';
require get_template_directory() . '/inc/widgets/class-galaxy-store-call-to-action-widget.php';
require get_template_directory() . '/inc/widgets/class-galaxy-store-services-widget.php';
require get_template_directory() . '/inc/widgets/class-galaxy-store-clients-widget.php';
require get_template_directory() . '/inc/widgets/class-galaxy-store-category-menus-widget.php';





