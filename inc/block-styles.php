<?php
/**
 * block-styles.
 *
 * @package blvnk
 * @since 1.0.0
 */

/**
 * Register block styles assets.
 *
 * @since 1.0.0
 */
function theme_block_styles_assets() {
  $styled_blocks = [
    // Add styled blocks.
    'button',
    'columns',
    'image',
    'list',
    'media-text',
    'navigation'
  ];
  foreach ( $styled_blocks as $block_name ) {
    $args = [
      'handle' => "block-styles-$block_name",
      'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.css" ),

      // Load inline block css code.
      // 'path'   => get_theme_file_path( "assets/css/blocks/$block_name.css" ),

      // Load extern block css file. (default)
      $args['path'] = get_theme_file_path( "assets/css/blocks/$block_name.css" ),
    ];
    wp_enqueue_block_style( "core/$block_name", $args );
  }
}
add_action( 'init', 'theme_block_styles_assets' );

/**
 * Register block styles.
 *
 * @since 1.0.0
 */
function theme_block_styles() {
  $block_styles = [
    // Add block styles.
    'core/columns' => [
      'medium' => __( 'M', 'blvnk' ),
      'large' => __( 'L', 'blvnk' ),
      'xlarge' => __( 'XL', 'blvnk' ),
    ],
    'core/image' => [
      'cover' => __( 'Cover', 'blvnk' ),
    ],
    'core/list' => [
      'image' => __( 'Image', 'blvnk' ),
      'no-symbol' => __( 'No symbol', 'blvnk' ),
      'symbol' => __( 'Symbol', 'blvnk' ),
      'symbol-outside' => __( 'Symbol outside', 'blvnk' ),
    ],
    'core/media-text' => [
      'medium' => __( 'M', 'blvnk' ),
      'large' => __( 'L', 'blvnk' ),
      'xlarge' => __( 'XL', 'blvnk' ),
    ],
  ];

  foreach ( $block_styles as $block => $styles ) {
    foreach ( $styles as $style_name => $style_label ) {
      register_block_style(
        $block,
        [
          'name'  => $style_name,
          'label' => $style_label,
        ]
      );
    }
  }
}
add_action( 'init', 'theme_block_styles' );
