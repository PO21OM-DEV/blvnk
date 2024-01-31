<?php
/**
 * block-patterns.
 *
 * @package blvnk
 * @since 1.0.0
 */

/**
 * Register block patterns category.
 *
 * @since 1.0.0
 */
function theme_block_pattern_categories() {
  register_block_pattern_category(
    'theme-block-patterns',
    [
      'label' => __( 'Theme Patterns', 'blvnk' ),
      'description' => __( 'List of theme patterns.', 'blvnk' ),
    ]
  );
}
add_action( 'init', 'theme_block_pattern_categories' );
