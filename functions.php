<?php
/**
 * functions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blvnk
 * @since 1.0.0
 */

/**
 * Add theme version.
 *
 * @since 1.0.0
 */
define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Add theme support.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'theme_setup' ) ) {
  function theme_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'blvnk', get_template_directory() . '/languages' );

    // Enqueue editor styles.
    add_editor_style( get_template_directory_uri() . '/assets/css/style-editor.css' );

    // Remove core block patterns.
    remove_theme_support( 'core-block-patterns' );

    // Add theme support for WooCommerce.
    add_theme_support( 'woocommerce' );
  }
}
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Re-enable WordPress customizer.
 *
 * @since 1.0.0
 */
add_action( 'customize_register', '__return_true' );

/**
 * Enqueue theme styles and scripts.
 *
 * @since 1.0.0
 */
function theme_enqueue_styles_and_scripts() {
  // Theme styles.
  wp_enqueue_style(
    'theme-plugins',
    get_theme_file_uri( '/assets/css/plugins.css' ),
    [],
    THEME_VERSION,
    'all'
  );
  wp_enqueue_style(
    'theme-fonts',
    get_theme_file_uri( '/assets/css/fonts.css' ),
    [],
    THEME_VERSION,
    'all'
  );
  wp_enqueue_style(
    'theme-theme',
    get_theme_file_uri( '/assets/css/theme.css' ),
    [],
    THEME_VERSION,
    'all'
  );
  wp_enqueue_style(
    'theme-style',
    get_stylesheet_uri(),
    [],
    THEME_VERSION
  );
  wp_enqueue_style(
    'theme-print',
    get_theme_file_uri( '/assets/css/print.css' ),
    [],
    THEME_VERSION,
    'print'
  );

  // Theme WooCommerce styles.
  if ( class_exists( 'woocommerce' ) ) {
    wp_register_style(
      'theme-woocommerce',
      get_theme_file_uri( '/assets/css/woocommerce.css' ),
      [],
      THEME_VERSION,
      'all'
    );
    wp_enqueue_style( 'theme-woocommerce' );
  }

  // Theme scripts.
  wp_enqueue_script(
    'jquery'
  );
  wp_enqueue_script(
    'theme-plugins',
    get_theme_file_uri( '/assets/js/plugins.js' ),
    [],
    THEME_VERSION,
    true
  );
  wp_enqueue_script(
    'theme-scripts',
    get_theme_file_uri( '/assets/js/scripts.js' ),
    [ 'jquery' ],
    THEME_VERSION,
    true
  );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles_and_scripts' );

/**
 * Add page name class to body.
 *
 * @since 1.0.0
 */
function theme_body_class_page_name( $classes ) {
  if ( is_page() ) {
    global $post;
    $classes[] = 'page-' . $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'theme_body_class_page_name' );

/**
 * Include styles, patterns, woocommerce.
 *
 * @since 1.0.0
 */
require_once get_theme_file_path( '/inc/block-styles.php' );
require_once get_theme_file_path( '/inc/block-patterns.php' );

// WooCommerce.
if ( class_exists( 'woocommerce' ) ) {
  require_once get_theme_file_path( '/inc/woocommerce.php' );
}

/**
 * Add extra inc elements.
 *
 * @since 1.0.0
 */
