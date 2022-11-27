<?php
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Woo Settings', 'uray' ),
	'id'     => 'woo_setting',
	'icon'   => 'el el-shopping-cart',
	'fields' => array(
		array(
			'title'   => esc_html__( 'Number of Products per Page', 'uray' ),
			'id'      => 'woo_product_per_page',
			'type'    => 'spinner',
			'desc'    => esc_html__( 'Insert the number of posts to display per page.', 'uray' ),
			'default' => '8',
			'max'     => '100',
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Archive Product', 'uray' ),
	'id'         => 'archive_woo_setting',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'woo_cate_layout',
			'type'    => 'image_select',
			'title'   => esc_html__( 'Select Layout Default', 'uray' ),
			'options' => array(
				'full-content'  => array(
					'alt' => 'body-full',
					'img' => get_template_directory_uri() . '/images/themeoptions/body-full.png'
				),
				'sidebar-left'  => array(
					'alt' => 'sidebar-left',
					'img' => get_template_directory_uri() . '/images/themeoptions/sidebar-left.png'
				),
				'sidebar-right' => array(
					'alt' => 'sidebar-right',
					'img' => get_template_directory_uri() . '/images/themeoptions/sidebar-right.png'
				),
			),
			'default' => 'sidebar-right'
		),
		array(
			'title'    => esc_html__( 'Hide Title', 'uray' ),
			'id'       => 'phys_woo_cate_hide_title',
			'type'     => 'checkbox',
			'subtitle' => esc_html__( 'Check this box to hide/unhide title' . 'uray' ),
			'default'  => false,
		),
		array(
			'title'    => esc_html__( 'Hide Breadcrumbs?', 'uray' ),
			'id'       => 'phys_woo_cate_hide_breadcrumbs',
			'default'  => 0,
			'type'     => 'checkbox',
			'subtitle' => esc_html__( 'Check this box to hide/unhide breadcrumbs', 'uray' ),
		),
		array(
			'title' => esc_html__( 'Background Heading', 'uray' ),
			'id'    => 'phys_woo_cate_top_image',
			'type'  => 'media',
			'desc'  => esc_html__( 'Enter URL or Upload an background heading file for header', 'uray' ),
		),
		array(
			'title'       => esc_html__( 'Background Heading Color', 'uray' ),
			'id'          => 'phys_woo_cate_heading_bg_color',
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#f7f7f7',
		),
		array(
			'title'       => esc_html__( 'Text Color Heading', 'uray' ),
			'id'          => 'phys_woo_cate_heading_text_color',
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#333',
		),


	)
) );

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Single Product', 'uray' ),
	'id'         => 'single_woo_setting',
	'subsection' => true,
	'fields'     => array(

		array(
			'id'      => 'number_related',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Number Related', 'uray' ),
			'default' => '4',
			'min'     => '0',
			'step'    => '1',
			'max'     => '20',
		),
		array(
			'id'      => 'column_related',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Column Related', 'uray' ),
			'default' => '4',
			'min'     => '0',
			'step'    => '1',
			'max'     => '20',
		),
		array(
			'title'    => esc_html__( 'Hide Title', 'uray' ),
			'id'       => 'phys_woo_single_hide_title',
			'type'     => 'checkbox',
			'subtitle' => esc_html__( 'Check this box to hide/unhide title' . 'uray' ),
			'default'  => false,
		),
		array(
			'title'    => esc_html__( 'Hide Breadcrumbs?', 'uray' ),
			'id'       => 'phys_woo_single_hide_breadcrumbs',
			'default'  => 0,
			'type'     => 'checkbox',
			'subtitle' => esc_html__( 'Check this box to hide/unhide breadcrumbs', 'uray' ),
		),
		array(
			'title' => esc_html__( 'Background Heading', 'uray' ),
			'id'    => 'phys_woo_single_top_image',
			'type'  => 'media',
			'desc'  => esc_html__( 'Enter URL or Upload an background heading file for header', 'uray' ),
		),
		array(
			'title'       => esc_html__( 'Background Heading Color', 'uray' ),
			'id'          => 'phys_woo_single_heading_bg_color',
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#f7f7f7',
		),
		array(
			'title'       => esc_html__( 'Text Color Heading', 'uray' ),
			'id'          => 'phys_woo_single_heading_text_color',
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#333',
		),
	)
) );