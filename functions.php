<?php
/**
 * uray functions and definitions.
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uray
 */

// Constants: Folder directories/uri's
define( 'URAY_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'URAY_THEME_URI', trailingslashit( get_template_directory_uri() ) );
define( 'URAY_THEME_VERSION', '1.1.0');

/**
 * Theme Includes
 */

require_once URAY_THEME_DIR . 'inc/init.php';
add_filter( 'woocommerce_get_image_size_single', 'uray_theme_override_woocommerce_image_size_single' );
function uray_theme_override_woocommerce_image_size_single( $size ) {
	return array(
		'width'  => get_option( 'woocommerce_single_image_width' ),
		'height' => get_option( 'woocommerce_single_image_width' ),
		'crop'   => 1,
	);
}