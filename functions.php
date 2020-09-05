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
				'top-bar' => esc_html__( 'Top Bar', 'galaxy-store' ),
				'primary' => esc_html__( 'Primary', 'galaxy-store' ),
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
 * Enqueue scripts and styles.
 */
function galaxy_store_scripts() {

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





