<?php
/**
 * inatorishop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inatorishop
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function inatorishop_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on inatorishop, use a find and replace
		* to change 'inatorishop' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'inatorishop', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'inatorishop' ),
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
			'inatorishop_custom_background_args',
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
add_action( 'after_setup_theme', 'inatorishop_setup' );



function theme_add_files()
{
    global $post;
    
    wp_enqueue_style('c-reset', get_template_directory_uri() . '/assets/css/reset.css', [], '1.0', 'all');
    wp_enqueue_style('c-margin', get_template_directory_uri() . '/assets/css/margin.css', [], '1.0', 'all');
    wp_enqueue_style('c-padding', get_template_directory_uri() . '/assets/css/padding.css', [], '1.0', 'all');
    wp_enqueue_style('c-size', get_template_directory_uri() . '/assets/css/size.css', [], '1.0', 'all');
    wp_enqueue_style('c-swiper.min.css', get_template_directory_uri() . '/assets/css/swiper.min.css', [], '1.0', 'all');
    wp_enqueue_style('c-aos', get_template_directory_uri() . '/assets/css/aos.css', [], '1.0', 'all');



    wp_enqueue_style('c-common', get_template_directory_uri() . '/assets/css/common.css', [], '1.0', 'all');
    wp_enqueue_style('c-animation', get_template_directory_uri() . '/assets/css/animation.css', [], '1.0', 'all');
    wp_enqueue_style('c-header', get_template_directory_uri() . '/assets/css/layout/header.css', [], '1.0', 'all');

    wp_enqueue_style('c-footer', get_template_directory_uri() . '/assets/css/layout/footer.css', [], '1.0', 'all');
    wp_enqueue_style('c-index', get_template_directory_uri() . '/assets/css/index.css', [], '1.0', 'all');
    
    wp_enqueue_style('c-single', get_template_directory_uri() . '/assets/css/single.css', [], '1.0', 'all');
    
    

    // wp_enqueue_style('c-style', get_template_directory_uri() . '/style.css', [], '1.0', 'all');

    // WordPress本体のjquery.jsを読み込まない

    if (!is_admin()) {
        wp_deregister_script('jquery');
    }
    wp_enqueue_script('s-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', [], '1.0', false);
    wp_enqueue_script('s-swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', [], '1.0', false);
    wp_enqueue_script('s-swiper-map', get_template_directory_uri() . '/assets/js/swiper.min.js.map', [], '1.0', false);
    wp_enqueue_script('s-aos', get_template_directory_uri() . '/assets/js/aos.js', [], '1.0', false);

    wp_enqueue_script('s-style', get_template_directory_uri() . '/assets/js/style.js', [], '1.0', true);
}
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function inatorishop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'inatorishop_content_width', 640 );
}
add_action( 'after_setup_theme', 'inatorishop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inatorishop_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'inatorishop' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'inatorishop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'inatorishop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function inatorishop_scripts() {
	wp_enqueue_style( 'inatorishop-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'inatorishop-style', 'rtl', 'replace' );

	wp_enqueue_script( 'inatorishop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'inatorishop_scripts' );

// /**
//  * Implement the Custom Header feature.
//  */
// require get_template_directory() . '/inc/custom-header.php';

// /**
//  * Custom template tags for this theme.
//  */
// require get_template_directory() . '/inc/template-tags.php';

// /**
//  * Functions which enhance the theme by hooking into WordPress.
//  */
// require get_template_directory() . '/inc/template-functions.php';

// /**
//  * Customizer additions.
//  */
// require get_template_directory() . '/inc/customizer.php';

// /**
//  * Load Jetpack compatibility file.
//  */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

