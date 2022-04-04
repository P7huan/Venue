<?php
/**
 * venue Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package venue
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_VENUE_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'venue-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_VENUE_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );


add_image_size( 'villathumb', 800, 600, true );

/**
 * Filters the post thumbnail size from Astra.
 */
add_filter( 'astra_post_thumbnail_default_size', 'your_prefix_featured_image_size_function' );
function your_prefix_featured_image_size_function( $size ){
  // Add the Registered new image size.
  $size = 'villathumb';
  return $size;
}


/**
 * Add a sidebar.
 */
function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Villa Sidebar', 'textdomain' ),
        'id'            => 'sidebar-villa',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );