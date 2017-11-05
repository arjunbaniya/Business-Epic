<?php
/**
 * Bussiness Epic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bussiness_Epic
 */

if ( ! function_exists( 'business_epic_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function business_epic_setup() {
		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Bussiness Epic, use a find and replace
         * to change 'business_epic' to the name of your theme in all the template files.
         */
		load_theme_textdomain( 'business_epic' );

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
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'business-epic' ),
			'social-link' => esc_html__('Social Link', 'business-epic'),
			
		) );

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'business_epic_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'business_epic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_epic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_epic_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_epic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_epic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'business-epic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'business-epic' ),
		'before_widget' => '<section id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name' => esc_html__('HomePage Widgets Area ', 'business-epic'),
		'id' => 'homepage_widgets',
		'description' => esc_html__('Add widgets here.', 'business-epic'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Info Section', 'business-epic'),
		'id' => 'footerinfo',
		'description' => esc_html__('Add widgets here.', 'business-epic'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer1 ', 'business-epic'),
		'id' => 'footer1',
		'description' => esc_html__('Add widgets here.', 'business-epic'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer2 ', 'business-epic'),
		'id' => 'footer2',
		'description' => esc_html__('Add widgets here.', 'business-epic'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer3 ', 'business-epic'),
		'id' => 'footer3',
		'description' => esc_html__('Add widgets here.', 'business-epic'),
		'before_widget' => '<section id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer4 ', 'business-epic'),
		'id' => 'footer4',
		'description' => esc_html__('Add widgets here.', 'business-epic'),
		'before_widget' => '<section id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
}
add_action( 'widgets_init', 'business_epic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function business_epic_scripts() {
	wp_enqueue_style( 'business-epic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'business-epic-media', get_template_directory_uri().'/assets/css/media.css' );
	wp_enqueue_style( 'owl.carousel', get_template_directory_uri().'/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'owl.theme', get_template_directory_uri().'/assets/css/owl.theme.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome',get_template_directory_uri().'/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-animate', get_template_directory_uri().'/assets/css/animate.css' );
	wp_enqueue_script( 'business-epic-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'carousel.min', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri().'/assets/js/waypoints.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/assets/js/wow.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery.isotope', get_template_directory_uri().'/assets/js/jquery.isotope.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery.touchSwipe', get_template_directory_uri().'/assets/js/jquery.touchSwipe.min.js', array('jquery'), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_epic_scripts' );


/**
 * define size of logo.
 */

if (!function_exists('business_epic_custom_logo_setup')) :
	function business_epic_custom_logo_setup()
	{
		add_theme_support('custom-logo', array(
			'height' => 90,
			'width' => 300,
			'flex-width' => true,
		));
	}

	add_action('after_setup_theme', 'business_epic_custom_logo_setup');
endif;


if (!function_exists('business_epic_widgets_backend_enqueue')) :
	function business_epic_widgets_backend_enqueue($hook)
	{
		if ('widgets.php' != $hook) {
			return;
		}

		wp_register_script('business-epic-custom-widgets', get_template_directory_uri() . '/assets/js/widgets.js', array('jquery'), true);
		wp_enqueue_media();
		wp_enqueue_script('business-epic-custom-widgets');
	}

	add_action('admin_enqueue_scripts', 'business_epic_widgets_backend_enqueue');
endif;




if (!function_exists('business_epic_admin_css_enqueue_new_post')) :
	function business_epic_admin_css_enqueue_new_post($hook)
	{
		if ('post-new.php' != $hook) {
			return;
		}
		wp_enqueue_style('business-epic-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '2.0.0');
	}
	add_action('admin_enqueue_scripts', 'business_epic_admin_css_enqueue_new_post');
endif;



if (!function_exists('business_epic_admin_css_enqueue')) :
	function business_epic_admin_css_enqueue($hook)
	{
		if ('post.php' != $hook) {
			return;
		}
		wp_enqueue_style('business-epic-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), '2.0.0');
	}
	add_action('admin_enqueue_scripts', 'business_epic_admin_css_enqueue');
endif;




$args = array(
	'flex-width'    => true,
	'width'         => 980,
	'flex-height'    => true,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/assets/images/header.jpg',
);
add_theme_support( 'custom-header', $args );




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
 * Customizer additions.
 */
require get_template_directory() . '/inc/fileloader.php';

require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/library/breadcrumbs/breadcrumbs.php';



/*add custom body class for sidebar section*/




/*for sidebar adding options**/

function business_epic_names( $classes ) {
	// add 'class-name' to the $classes array
	$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'business_epic_sidebar_layout', true) );
	if (is_singular() && $sidebardesignlayout != "default-sidebar")
	{
		$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'business_epic_sidebar_layout', true) );

	} else
	{
		$sidebardesignlayout = esc_attr(business_epic_get_option('business_epic_sidebar_layout_option' ));
	}

	$classes[] = $sidebardesignlayout;
	return $classes;

}
add_filter( 'body_class', 'business_epic_names' );

/**
 * Load Dynamic css.
 */
$dynamic_css_options = business_epic_get_option('business_epic_color_reset_option');

if ($dynamic_css_options == "do-not-reset" || $dynamic_css_options == "") {

	include get_template_directory() . '/inc/hook/dynamic-style-css.php';

} elseif ($dynamic_css_options == "reset-all") {
	do_action('business_epic_colors_reset');
}


// woocommerce images popup code
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );


