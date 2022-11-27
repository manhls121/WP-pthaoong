<?php

Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Footer Area', 'uray' ),
	'id'     => 'footer_area',
	'icon'   => 'el el-graph',
	//	'subsection' => true,
	'fields' => array(
		array(
			"title" => esc_html__( "Show Top Footer", "uray" ),
			"id"    => "top_footer_show",
			"std"   => 1,
			"folds" => 1,
			"on"    => esc_html__( "show", "uray" ),
			"off"   => esc_html__( "hide", "uray" ),
			"type"  => "switch"
		),

		array(
			'id'          => 'bg_footer',
			'type'        => 'color',
			'title'       => esc_html__( 'Background Color', 'uray' ),
			'default'     => '#333',
			'transparent' => false,
		),
		array(
			'id'          => 'border_footer',
			'type'        => 'color',
			'title'       => esc_html__( 'Border Footer', 'uray' ),
			'default'     => '#ddd',
			'transparent' => false,
		),
		array(
			'id'          => 'text_color_footer',
			'type'        => 'color',
			'title'       => esc_html__( 'Text Color', 'uray' ),
			'default'     => '#fff',
			'transparent' => false,
		),
		array(
			'id'          => 'text_link_color_footer',
			'type'        => 'color',
			'title'       => esc_html__( 'Link Hover Color', 'uray' ),
			'default'     => '#ccc',
			'transparent' => false,
		),
		array(
			'id'          => 'title_color_footer',
			'type'        => 'color',
			'title'       => esc_html__( 'Title Color', 'uray' ),
			'default'     => '#fff',
			'transparent' => false,
		),
		array(
			'id'      => 'title_font_size_footer',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Font Size Title (px)', 'uray' ),
			'default' => '22',
			'min'     => '1',
			'step'    => '1',
			'max'     => '50',
		),

		array(
			"title" => esc_html__( "Back To Top", "uray" ),
			"id"    => "totop_show",
			"std"   => 1,
			"folds" => 1,
			"on"    => esc_html__( "show", "uray" ),
			"off"   => esc_html__( "hide", "uray" ),
			"type"  => "switch"
		)
	)
) );