<?php
add_action( 'uray_logo', 'uray_logo', 10 );
add_action( 'uray_logo_header_v1', 'uray_logo', 10 );
// logo
if ( !function_exists( 'uray_logo' ) ) :
	function uray_logo() {
		global $uray_theme_options;
		if ( isset( $uray_theme_options['uray_logo'] ) && $uray_theme_options['uray_logo']['url'] <> '' ) {
			$url        = $uray_theme_options['uray_logo']['url'];
			$width      = isset( $uray_theme_options['uray_logo']['width'] ) ? $uray_theme_options['uray_logo']['width'] : '';
			$height     = isset( $uray_theme_options['uray_logo']['height'] ) ? $uray_theme_options['uray_logo']['height'] : '';
			$site_title = esc_attr( get_bloginfo( 'name', 'display' ) );
			echo '<div class="logo"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">';
			echo '<img src="' . esc_url( $url ) . '" alt="' . esc_attr( $site_title ) . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '"/>';
			echo '</a></div>';

		} else {
			echo '<div class="logo-area-title"><a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' - ' . esc_attr( get_bloginfo( 'description' ) ) . '" rel="home">';
 			echo esc_attr( get_bloginfo( 'name' ) );
			echo '</a></div>';
 		}
 	}
endif;