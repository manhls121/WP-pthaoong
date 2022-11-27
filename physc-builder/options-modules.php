<?php
add_filter( 'physc-builder/modules-unset', 'uray_unset_modules' );

function uray_unset_modules() {
	return array(
		'testimonials',
		'products-showcase',
		'products-cat',
		'product-tab',
		'about-us',
		'flash-sale',
		'flash-list-sale',
	);
}

add_filter( 'physc-builder/posts/before-config-options', 'uray_custom_layout_posts_options' );
function uray_custom_layout_posts_options() {
	$posts_options = array(
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_attr__( 'Title color', 'uray' ),
			'param_name'       => 'title_color',
			'value'            => '',
			'edit_field_class' => 'vc_col-xs-6'
		),
		array(
			'type'             => 'dropdown',
			'heading'          => esc_attr__( 'Layout', 'uray' ),
			'param_name'       => 'layout',
			'value'            => array(
				esc_attr__( 'Layout 1', 'uray' ) => 'layout_1',
				esc_attr__( 'Layout 2', 'uray' ) => 'layout_2',
			),
			'admin_label'      => true,
			'std'              => 'layout_1',
			'edit_field_class' => 'vc_col-xs-7'
		),
		array(
			'type'             => 'textfield',
			'heading'          => esc_html__( 'Length Desc', 'uray' ),
			'param_name'       => 'length',
			'value'            => '10',
			"dependency"       => Array( "element" => "layout", "value" => array( 'layout_2' ) ),
			'edit_field_class' => 'vc_col-xs-3'
		),
		array(
			'type'             => 'textfield',
			'heading'          => esc_html__( 'Speed', 'uray' ),
			'param_name'       => 'speed',
			'value'            => '3000',
			"dependency"       => Array( "element" => "layout", "value" => array( 'layout_2' ) ),
			'edit_field_class' => 'vc_col-xs-2'
		)
	);

	return $posts_options;
}


add_filter( 'physc-builder/products/layout-options', 'uray_custom_layout_product_options' );
function uray_custom_layout_product_options() {
	$layout_options = array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Layout', 'uray' ),
			'param_name'  => 'layout',
			'admin_label' => true,
			'value'       => array(
				esc_attr__( 'Layout 1', 'uray' ) => 'layout-1',
				esc_attr__( 'Layout 2', 'uray' ) => 'layout-2',
				esc_attr__( 'Layout 3', 'uray' ) => 'layout-3',
			),
			'std'         => 'layout-1'
		),
	);

	return $layout_options;
}

add_filter( 'physc-builder/banner-html/config-options', 'uray_custom_layout_banner_html_options' );
function uray_custom_layout_banner_html_options() {
	return array(

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Layout', 'uray' ),
			'param_name'  => 'layout',
			'value'       => array(
				esc_attr__( 'Layout 1', 'uray' ) => 'layout-1',
				esc_attr__( 'Layout 2', 'uray' ) => 'layout-2',
				esc_attr__( 'Layout 3', 'uray' ) => 'layout-3',
				esc_attr__( 'Layout 4', 'uray' ) => 'layout-4',
				esc_attr__( 'Layout 5', 'uray' ) => 'layout-5',
			),
			'std'         => 'layout-1',
		),
		array(
			'type'       => 'image_preview',
			'param_name' => 'image-layout-1',
			'value'      => URAY_THEME_URI . 'physc-builder/banner-html/images/layout-1.jpg',
			"dependency" => Array( "element" => "layout", "value" => array( "layout-1" ) ),
		),
		array(
			'type'       => 'image_preview',
			'param_name' => 'image-layout-2',
			'value'      => URAY_THEME_URI . 'physc-builder/banner-html/images/layout-2.jpg',
			"dependency" => Array( "element" => "layout", "value" => array( "layout-2" ) ),
		),
		array(
			'type'       => 'image_preview',
			'param_name' => 'image-layout-3',
			'value'      => URAY_THEME_URI . 'physc-builder/banner-html/images/layout-3.jpg',
			"dependency" => Array( "element" => "layout", "value" => array( "layout-3" ) ),
		),
		array(
			'type'       => 'image_preview',
			'param_name' => 'image-layout-4',
			'value'      => URAY_THEME_URI . 'physc-builder/banner-html/images/layout-4.jpg',
			"dependency" => Array( "element" => "layout", "value" => array( "layout-4" ) ),
		),
		array(
			'type'       => 'image_preview',
			'param_name' => 'image-layout-5',
			'value'      => URAY_THEME_URI . 'physc-builder/banner-html/images/layout-5.jpg',
			"dependency" => Array( "element" => "layout", "value" => array( "layout-5" ) ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_attr__( 'Background color', 'uray' ),
			'param_name' => 'bg_color',
			'value'      => '',
			'std'         => '#6c6c6c',
			"dependency" => Array( "element" => "layout", "value" => array( "layout-4" ) ),
		),
		array(
			"type"        => "textfield",
			"heading"     => esc_html__( "Text Number", 'uray' ),
			'admin_label' => true,
			"param_name"  => "text_number",
			"value"       => "",
			"dependency"  => Array( "element" => "layout", "value" => array( "layout-3" ) ),
		),
		array(
			"type"        => "textfield",
			"heading"     => esc_html__( "Text Vertical", 'uray' ),
			'admin_label' => true,
			"param_name"  => "text_vertical",
			"value"       => "",
			"dependency"  => Array( "element" => "layout", "value" => array( "layout-4" ) ),
		),
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Text align', 'uray' ),
			'param_name'  => 'text_align',
			'value'       => array(
				esc_attr__( 'Center', 'uray' ) => 'center',
				esc_attr__( 'Left', 'uray' )   => 'left',
				esc_attr__( 'Right', 'uray' )  => 'right',
			),
			'std'         => 'left',
			"dependency"  => Array( "element" => "layout", "value" => array( "layout-3", "layout-4", "layout-5" ) ),
		),
		array(
			"type"       => "textarea",
			"heading"    => esc_html__( "Text 1", 'uray' ),
			"param_name" => "text_1",
			"value"      => "",
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_attr__( 'Text 1 color', 'uray' ),
			'param_name'       => 'text_1_color',
			'value'            => '',
			'std'         => '#6c6c6c',
			'edit_field_class' => 'vc_col-xs-6'
		),

		array(
			"type"       => "textarea",
			"heading"    => esc_html__( "Text 2", 'uray' ),
			"param_name" => "text_2",
			"value"      => "",
			"holder"     => "div",
			"dependency" => Array( "element" => "layout", "value" => array( "layout-1", "layout-3", "layout-4", "layout-5" ) ),
		),
		array(
			'type'       => 'colorpicker',
			'heading'    => esc_attr__( 'Text 2 color', 'uray' ),
			'param_name' => 'text_2_color',
			'value'      => '',
			'std'         => '#6c6c6c',
			"dependency" => Array( "element" => "layout", "value" => array( "layout-1", "layout-3", "layout-4", "layout-5" ) ),
		),
		array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Upload Image', 'uray' ),
			'param_name' => 'thumbnail_image',
			'value'      => '', // default value to backend editor admin_label
		),
		array(
			"type"       => "textfield",
			"heading"    => esc_html__( "Link Banner", "uray" ),
			"param_name" => "link_banner",
			'value'      => '#',
		),
		array(
			'type'             => 'dropdown',
			'admin_label'      => true,
			'heading'          => esc_attr__( 'Button', 'uray' ),
			'param_name'       => 'show_button',
			'value'            => array(
				esc_attr__( 'Show', 'uray' )   => 'true',
				esc_attr__( 'Hidden', 'uray' ) => 'false',
			),
			'std'              => 'false',
			'edit_field_class' => 'vc_col-xs-2',
			"dependency"       => Array( "element" => "layout", "value" => array( "layout-1", "layout-3", "layout-4" ) ),
		),

		array(
			"type"             => "textfield",
			"heading"          => esc_html__( "Text Button", "uray" ),
			"param_name"       => "text_button",
			"value"            => '',
			'edit_field_class' => 'vc_col-xs-6',
			"dependency"       => Array( "element" => "show_button", "value" => array( "true" ) ),
		),
		array(
			'type'             => 'colorpicker',
			'heading'          => esc_attr__( 'Text Button color', 'uray' ),
			'param_name'       => 'text_btn_color',
			'value'            => '',
			'edit_field_class' => 'vc_col-xs-4',
			'std'         => '#6c6c6c',
			"dependency"       => Array( "element" => "show_button", "value" => array( "true" ) ),
		),
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Extra class', 'uray' ),
			'param_name'  => 'el_class',
			'value'       => '',
			'description' => esc_attr__( 'Add extra class for element.', 'uray' ),
		),
	);
}