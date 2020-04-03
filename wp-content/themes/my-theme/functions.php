<?php
/**
 * WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Custom_WP_Starter
 */

if ( ! function_exists( 'myprefix_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function myprefix_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on bc WP, use a find and replace
     * to change 'bc' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'bc', get_template_directory() . '/languages' );

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
      'menu-1' => esc_html__( 'Primary', 'bc' ),
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
    add_theme_support( 'custom-background', apply_filters( 'myprefix_custom_background_args', array(
      'default-color' => 'fffefc',
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
add_action( 'after_setup_theme', 'myprefix_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function myprefix_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters( 'myprefix_content_width', 640 );
}
add_action( 'after_setup_theme', 'myprefix_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function myprefix_scripts() {
  wp_enqueue_style( 'bc-style', get_stylesheet_directory_uri() . '/dist/css/style.css' );
  wp_enqueue_script( 'navigation',  get_stylesheet_directory_uri() . '/dist/js/navigation.js', array(), '1.0.0', true);

  wp_deregister_script( 'wp-embed' );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'myprefix_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
* Include the theme's Customizer controls
*/
$custom = glob(get_template_directory() . "/inc/customizer/*.php");
foreach($custom as $file){
  require $file;
}

/**
* Add custom 'menu' page
*/
function myprefix_nav_rewrite_rule() {
  add_rewrite_rule( 'menu', 'index.php?menu=true', 'top' );
}

add_action( 'init', 'myprefix_nav_rewrite_rule' );

function myprefix_register_query_var( $vars ) {
  $vars[] = 'menu';

  return $vars;
}

add_filter( 'query_vars', 'myprefix_register_query_var' );

add_filter( 'template_include', function( $path ) {
  if ( get_query_var( 'menu' ) ) {
    return get_template_directory() . '/menu.php';
  }
  return $path;
});



/**
* Remove dashicons in frontend for unauthenticated users
*/
// add_action( 'wp_enqueue_scripts', 'myprefix_dequeue_dashicons' );
// function myprefix_dequeue_dashicons() {
// 	if ( ! is_user_logged_in() ) {
// 		wp_deregister_style( 'dashicons' );
// 	}
// }
