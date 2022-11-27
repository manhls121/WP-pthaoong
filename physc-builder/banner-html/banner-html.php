<?php
/**
 * Template for displaying default template Products element.
 *
 * This template can be overridden by copying it to yourtheme/physc-builder/banner-html/banner-html.php.
 *
 * @author      Physcode
 * @package     PhyscBuilders/Templates
 * @version     1.0.0
 * @author      Physcodes
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit;

$layout = $params['layout'];

$thumbnail_image = $params['thumbnail_image'];
$link_banner     = ( isset( $params['link_banner'] ) && $params['link_banner'] ) ? $params['link_banner'] : '#';
$text_number     = $params['text_number'];
$text_vertical   = $params['text_vertical'];
$text_1          = $params['text_1'];
$text_1_color    = $params['text_1_color'];
$text_2          = $params['text_2'];
$text_2_color    = $params['text_2_color'];
$bg_color        = $params['bg_color'];
$text_btn_color  = $params['text_btn_color'];
$show_button     = $params['show_button'];
$text_button     = $params['text_button'];
$text_align      = $params['text_align'];
$css             = '';
$css_text_1      = $text_1_color ? ' color:' . $text_1_color : '';
$style_text_1    = $css_text_1 ? ' style="' . $css_text_1 . '"' : '';
$style_text_2    = $text_2_color ? ' style="color:' . $text_2_color . '"' : '';
$style_btn_color = $text_2_color ? ' style="color:' . $text_btn_color . '"' : '';
$uray_animation  = $params['el_class'] ? ' ' . $params['el_class'] : '';

$link_image = $thumbnail_image ? wp_get_attachment_image_src( $thumbnail_image, 'full' ) : '';
echo '<div class="banner-section' . $uray_animation . '">';
if ( $layout == 'layout-1' && $link_image ) {
	$css = ' style="background-image: url(' . esc_url( $link_image[0] ) . ')"';
}
$text_align = ' text_' . $text_align;
if ( $layout == 'layout-4' && $bg_color ) {
	echo '<span class="bg-color' . $text_align . '" style="background-color:' . $bg_color . ' "></span>';
}
echo '<div class="banner-' . $layout . $text_align . '"' . $css . '>';

if ( $layout == 'layout-1' ) {
	echo '<div class="info">';

	if ( $text_1 ) {
		echo '<p class="text-1"' . $style_text_1 . '>' . $text_1 . '</p>';
	}
	if ( $text_2 ) {
		echo '<p class="text-2"' . $style_text_2 . '>' . $text_2 . '</p>';
	}
	if ( $show_button == 'true' ) {
		echo '<a href="' . esc_url( $link_banner ) . '" class="button-more"' . $style_btn_color . '>' . $text_button . '</a>';
	}
	echo '</div>';
} elseif ( $layout == 'layout-2' ) {
	echo '<span class="line"></span><span class="line-1"></span>';
	echo '<div class="info">';
	if ( $text_1 ) {
		echo '<p class="text-1"' . $style_text_1 . '>' . $text_1 . '</p>';
	}
	echo '</div>';
	if ( $link_image ) {
		echo '<div class="wrap-image"><a href="' . esc_url( $link_banner ) . '" class="bg-image"><img src="' . esc_url( $link_image[0] ) . '" alt="' . esc_attr__( 'Banner Html', 'uray' ) . '"></a></div>';
	}
} elseif ( $layout == 'layout-3' ) {
	if ( $link_image ) {
		echo '<div class="wrap-image"><a href="' . esc_url( $link_banner ) . '" class="bg-image"><img src="' . esc_url( $link_image[0] ) . '" alt="' . esc_attr__( 'Banner Html', 'uray' ) . '"></a></div>';
	}
	echo '<div class="info">';
	if ( $text_align == ' text_center' ) {
		$text_number_html = '';
		if ( $text_number ) {
			$text_number_html = '<span class="text-number">' . $text_number . '</span>';
		}
		if ( $text_1 ) {
			echo '<p class="text-1"' . $style_text_1 . '>' . $text_number_html . $text_1 . '</p>';
		}
	} else {
		if ( $text_number ) {
			echo '<div class="text-number">' . $text_number . '</div>';
		}
		if ( $text_1 ) {
			echo '<p class="text-1"' . $style_text_1 . '>' . $text_1 . '</p>';
		}
	}

	if ( $text_2 ) {
		echo '<p class="text-2"' . $style_text_2 . '>' . $text_2 . '</p>';
	}
	if ( $show_button == 'true' && $text_button ) {
		echo '<a href="' . $link_banner . '" class="button-more"' . $style_btn_color . '>' . $text_button . '</a>';
	}
	echo '</div>';
} else {
	$text_vertical_html = $text_vertical ? '<span class="text_vertical">' . $text_vertical . '</span>' : '';
	if ( $link_image ) {
		echo '<div class="wrap-image">' . $text_vertical_html . '<a href="' . esc_url( $link_banner ) . '" class="bg-image"><img src="' . esc_url( $link_image[0] ) . '" alt="' . esc_attr__( 'Banner Html', 'uray' ) . '"></a></div>';
	}
	echo '<div class="info">';
	if ( $text_1 ) {
		echo '<p class="text-1"' . $style_text_1 . '>' . $text_1 . '</p>';
	}
	if ( $text_2 ) {
		echo '<p class="text-2"' . $style_text_2 . '>' . $text_2 . '</p>';
	}
	if ( $show_button == 'true' && $text_button ) {
		echo '<a href="' . esc_url( $link_banner ) . '" class="button-more"' . $style_btn_color . '>' . $text_button . '</a>';
	}
	echo '</div>';
}

echo '</div>';
echo '</div>';