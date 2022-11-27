<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uray
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( uray_get_option( 'show_preload' ) == '1' ) {
	echo '<div class="images-preloader" id="preload">
			<div id="preloader_1" class="rectangle-bounce">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>';
}

$class_header = uray_get_option( 'sticky_menu' ) == '1' ? ' sticky_header' : '';
 $boxed        = uray_get_option( 'box_layout' ) == 'boxed' ? ' boxed-area' : '';
?>
<div class="wrapper-container<?php echo esc_attr( $boxed ); ?>">
	<header id="masthead" class="site-header header_v1 <?php echo esc_attr( $class_header ) ?>">
		<?php
		get_template_part( 'inc/header/header_v1');
		?>
	</header>
	<div class="site page-content">