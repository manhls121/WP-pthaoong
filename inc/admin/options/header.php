<?php
$url_image = get_template_directory_uri( 'template_directory' ) . '/images/';

Redux::setSection( $opt_name, array(
	'title' => esc_html__( 'Header', 'uray' ),
	'id'    => 'header',
	'icon'  => 'el el-tasks',
) );

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Logo', 'uray' ),
	'id'         => 'logo-heaser',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'uray_logo',
			'type'    => 'media',
			'title'   => esc_html__( 'Header Logo', 'uray' ),
			'desc'    => esc_html__( 'Enter URL or Upload an image file as your logo.', 'uray' ),
			'default' => array( 'url' => $url_image . 'logo.png' ),
		),
		array(
			'id'      => 'width_logo',
			'type'    => 'dimensions',
			'units'   => 'px',
			'title'   => esc_html__( 'Width Column Logo', 'uray' ),
			'height'  => false,
			'default' => array(
				'width' => 140,
			)
		),
		array(
			'id'      => 'width_logo_mobile',
			'type'    => 'dimensions',
			'units'   => 'px',
			'title'   => esc_html__( 'Width Column Logo Mobile', 'uray' ),
			'height'  => false,
			'default' => array(
				'width' => 100,
			)
		),
	)
) );
//
// Main Menu
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Main Menu', 'uray' ),
	'id'         => 'all_page_general_settings',
	'subsection' => true,
	'fields'     => array(

		array(
			'id'      => 'bg_header_color',
			'type'    => 'color_rgba',
			'title'   => esc_html__( 'Background header', 'uray' ),
			'default' => array(
				'color' => '#fff',
				'alpha' => 1
			),
		),

		array(
			'id'             => 'font_main_menu',
			'type'           => 'typography',
			'title'          => esc_html__( 'Main Menu Font', 'uray' ),
			'line-height'    => false,
			'font-family'    => false,
			'text-align'     => false,
			'font-style'     => false,
			'font-size'      => true,
			'font-weight'    => true,
			'text-transform' => true,
			'default'        => array(
				'color'          => '#333',
				'font-size'      => '15',
				'font-weight'    => '500',
				'text-transform' => 'uppercase',
			),
		),
		array(
			'id'          => 'bg_menu_hover_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Background Hover Color', 'uray' ),
			'transparent' => false,
			'default'     => '#ffa6a8'
		),

		array(
			'id'          => 'text_menu_hover_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Text Hover Color', 'uray' ),
			'transparent' => false,
			'default'     => '#fff'
		),

		array(
			'id'      => 'sticky_menu',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Sticky Menu', 'uray' ),
			'default' => 0,
			'on'      => esc_html__( 'Yes', 'uray' ),
			'off'     => esc_html__( 'No', 'uray' ),
		),


	)
) );

// Sub Menu
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Sub Menu', 'uray' ),
	'id'         => 'sub_menu',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'          => 'sub_menu_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Background Color', 'uray' ),
			'transparent' => false,
			'default'     => '#fff',
		),

		array(
			'id'          => 'font_sub_menu',
			'type'        => 'typography',
			'title'       => esc_html__( 'Main Menu Font', 'uray' ),
			'font-family' => false,
			'line-height' => false,
			'text-align'  => false,
			'font-style'  => false,
			'font-size'   => true,
			'default'     => array(
 				'color'       => '#666',
				'font-size'   => '15',
				'font-weight' => '500',
			),
		),
		array(
			'id'          => 'sub_menu_text_hover_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Text Hover Color', 'uray' ),
			'transparent' => false,
			'default'     => '#ffa6a8',
		),
	)
) );

// Sub Menu
Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Mobile Menu', 'uray' ),
	'id'         => 'mobile_menu_title',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'          => 'icon_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Color Hamburger icon', 'uray' ),
			'transparent' => false,
			'default'     => '#333'
		),

		array(
			'id'          => 'mobile_menu_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Background Item Color', 'uray' ),
			'transparent' => false,
			'default'     => '#fff',
		),
		array(
			'id'          => 'mobile_sub_menu_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Background Sub Item Color', 'uray' ),
			'transparent' => false,
			'default'     => '#f2f2f2',
		),

		array(
			'id'          => 'mobile_menu_text_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Text Color', 'uray' ),
			'transparent' => false,
			'default'     => '#333',
		),

		array(
			'id'          => 'mobile_menu_text_hover_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Text Hover Color', 'uray' ),
			'transparent' => false,
			'default'     => '#000',
		),
		array(
			'id'          => 'mobile_border_item_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Border Item Color', 'uray' ),
			'transparent' => false,
			'default'     => '#e9e9e9',
		),
	)
) );