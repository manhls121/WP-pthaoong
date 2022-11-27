<?php
// -> START Typography
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Typography', 'uray' ),
	'id'     => 'typography',
	'icon'   => 'el el-fontsize',
	'fields' => array(
		array(
			'id'         => 'font_body',
			'type'       => 'typography',
			'title'      => esc_html__( 'Body Font', 'uray' ),
			'subtitle'   => esc_html__( 'Specify the body font properties.', 'uray' ),
			'text-align' => false,
			'google'     => true,
			'all_styles' => true,
			'default'    => array(
				'color'       => '#666',
				'font-size'   => '15px',
				'line-height' => '25px',
				'font-family' => 'Poppins',
				'font-weight' => '400',
			),
		),

		array(
			'id'          => 'font_title',
			'type'        => 'typography',
			'title'       => esc_html__( 'Title Font', 'uray' ),
			'line-height' => false,
			'text-align'  => false,
			'font-style'  => false,
			'font-size'   => false,
			'google'      => true,
			'default'     => array(
				'font-family' => 'Poppins',
				'subsets'     => '',
				'font-weight' => '500',
			),
		),

		array(
			'id'      => 'font_size_h1',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Font Size H1 (px)', 'uray' ),
			'default' => '36',
			'min'     => '1',
			'step'    => '1',
			'max'     => '90',
		),

		array(
			'id'      => 'font_size_h2',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Font Size H2 (px)', 'uray' ),
			'default' => '30',
			'min'     => '1',
			'step'    => '1',
			'max'     => '80',
		),

		array(
			'id'      => 'font_size_h3',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Font Size H3 (px)', 'uray' ),
			'default' => '25',
			'min'     => '1',
			'step'    => '1',
			'max'     => '50',
		),

		array(
			'id'      => 'font_size_h4',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Font Size H4 (px)', 'uray' ),
			'default' => '22',
			'min'     => '1',
			'step'    => '1',
			'max'     => '50',
		),

		array(
			'id'      => 'font_size_h5',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Font Size H5 (px)', 'uray' ),
			'default' => '18',
			'min'     => '1',
			'step'    => '1',
			'max'     => '50',
		),

		array(
			'id'      => 'font_size_h6',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Font Size H6 (px)', 'uray' ),
			'default' => '16',
			'min'     => '1',
			'step'    => '1',
			'max'     => '50',
		),

		array(
			'id'      => 'font_size_title_sidebar',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Font Size Title Sidebar', 'uray' ),
			'default' => '20',
			'min'     => '1',
			'step'    => '1',
			'max'     => '50',
		),
		array(
			'id'      => 'font_size_title_home',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Font Size Title Home Page', 'uray' ),
			'default' => '60',
			'min'     => '20',
			'step'    => '1',
			'max'     => '100',
		),
	)
) );