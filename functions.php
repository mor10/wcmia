<?php
/**
 * wcmia functions and definitions
 *
 * @package wcmia
 */

if ( ! function_exists( 'wcmia_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wcmia_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wcmia, use a find and replace
	 * to change 'wcmia' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wcmia', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'student-head', 500, 500, array( 'center', 'top' ) );
	add_image_size( 'mod-poster', 300 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'wcmia' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wcmia_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // wcmia_setup
add_action( 'after_setup_theme', 'wcmia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wcmia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wcmia_content_width', 640 );
}
add_action( 'after_setup_theme', 'wcmia_content_width', 0 );

/**
 * Display descriptions in main navigation.
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function mod_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( '">' . $args->link_before, '">' . $args->link_before . '<div class="menu-item-description">' . $item->description . '</div>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'mod_nav_description', 10, 4 );


/**
 * Enqueue scripts and styles.
 */
function wcmia_scripts() {
	wp_enqueue_style( 'wcmia-style', get_stylesheet_uri() );

	wp_enqueue_style( 'mod-google-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600|Roboto:300,500,500italic');

	// Icons
	wp_enqueue_style( 'mod-icons', get_template_directory_uri() . '/fonts/icomoon/style.css');

	wp_enqueue_script( 'wcmia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'wcmia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if (is_home()) {
        wp_enqueue_script( 'wcmia-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '20150406', true ); 
        wp_enqueue_script( 'wcmia-isotope-settings', get_template_directory_uri() . '/js/isotope.settings.js', array('wcmia-isotope'), '20150406', true ); 
        wp_enqueue_script( 'wcmia-imagesloaded', get_template_directory_uri() . '/js/libs/imagesloaded.js', array('wcmia-isotope'), '20150406' );
        wp_enqueue_script( 'mod-jquery-bbq', get_template_directory_uri() . '/js/libs/jquery.bbq.min.js', array('jquery'), '20150406', true);
        wp_enqueue_script( 'wcmia-hide-filters', get_template_directory_uri() . '/js/hide-filters.js', array('jquery'), '20150406' );
    }

    if ( is_singular() ) {
		wp_enqueue_script( 'video-fullscreen', get_template_directory_uri() . '/js/mediaelement-settings.js', array(jquery), '20150426', true );
	}

}
add_action( 'wp_enqueue_scripts', 'wcmia_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
