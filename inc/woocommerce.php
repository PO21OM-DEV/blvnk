<?php
/**
 * woocommerce.
 *
 * @package blvnk
 * @since 1.0.0
 */

/**
 * Register "woocommerce-active" class to the body tag.
 *
 * @since 1.0.0
 */
function theme_woocommerce_body_class( $classes ) {
  $classes[] = 'woocommerce-active';
  return $classes;
}
add_filter( 'body_class', 'theme_woocommerce_body_class' );
