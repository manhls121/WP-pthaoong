<?php
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Display Settings', 'uray' ),
	'icon'   => 'el el-eye-open',
	'id'     => 'display_settings',
	'fields' => array(
		array(
			'id'      => 'excerpt_length_blog',
			'type'    => 'spinner',
			'title'   => esc_html__( 'Excerpt Length', 'uray' ),
			'desc'    => esc_html__( 'Enter the number of words you want to cut from the content to be the excerpt of search and archive', 'uray' ),
			'default' => '30',
			'min'     => '10',
			'step'    => '1',
			'max'     => '100',
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Archive Settings', 'uray' ),
	'id'         => 'archive_display_settings',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'archive_cate_layout',
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
			'id'      => 'archive_cat_style',
			'type'    => 'select',
			'title'   => esc_html__( 'Select Style', 'uray' ),
			'options' => array(
				'standard' => esc_html__( 'Standard', 'uray' ),
				'masonry'  => esc_html__( 'Masonry', 'uray' ),
			),
			'default' => 'standard',
			'select2' => array( 'allowClear' => false )
		),
		array(
			'id'       => 'archive_cat_column',
			'type'     => 'select',
			'title'    => esc_html__( 'Column', 'uray' ),
			'options'  => array(
				'2' => '2',
				'3' => '3',
				'4' => '4'
			),
			'required' => array( 'archive_cat_style', '=', 'masonry' ),
			'default'  => '3',
			'select2'  => array( 'allowClear' => false )
		),
		array(
			'id'       => 'phys_archive_cate_hide_title',
			'type'     => 'checkbox',
			'title'    => esc_html__( 'Hide Title', 'uray' ),
			'subtitle' => esc_html__( 'Check this box to hide/unhide title', 'uray' ),
			'default'  => '0'// 1 = on | 0 = off
		),

		array(
			'id'       => 'phys_archive_cate_hide_breadcrumbs',
			'type'     => 'checkbox',
			'title'    => esc_html__( 'Hide Breadcrumbs', 'uray' ),
			'subtitle' => esc_html__( 'Check this box to hide/unhide breadcrumbs', 'uray' ),
			'default'  => '0'// 1 = on | 0 = off
		),
		array(
			'id'    => 'phys_archive_cate_top_image',
			'type'  => 'media',
			'title' => esc_html__( 'Background Heading', 'uray' ),
			'desc'  => esc_html__( 'Enter URL or Upload an background image file for header', 'uray' ),
		),
		array(
			'title'       => esc_html__( 'Background Heading Color', 'uray' ),
			'id'          => 'phys_archive_cate_heading_bg_color',
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#f7f7f7',
		),

		array(
			'title'       => esc_html__( 'Text Color Heading', 'uray' ),
			'id'          => 'phys_archive_cate_heading_text_color',
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#333',
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Post & Page Settings', 'uray' ),
	'id'         => 'single_display_settings',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'archive_single_layout',
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
			'title' => esc_html__( 'Background Heading', 'uray' ),
			'id'    => 'phys_archive_single_top_image',
			'type'  => 'media',
			'desc'  => esc_html__( 'Enter URL or Upload an background heading file for header', 'uray' ),
		),
		array(
			'id'       => 'phys_archive_single_hide_title',
			'type'     => 'checkbox',
			'title'    => esc_html__( 'Hide Title', 'uray' ),
			'subtitle' => esc_html__( 'Check this box to hide/unhide title', 'uray' ),
			'default'  => '0'// 1 = on | 0 = off
		),

		array(
			'id'       => 'phys_archive_single_hide_breadcrumbs',
			'type'     => 'checkbox',
			'title'    => esc_html__( 'Hide Breadcrumbs', 'uray' ),
			'subtitle' => esc_html__( 'Check this box to hide/unhide breadcrumbs', 'uray' ),
			'default'  => '0'// 1 = on | 0 = off
		),

		array(
			'title'       => esc_html__( 'Background Heading Color', 'uray' ),
			'id'          => 'phys_archive_single_heading_bg_color',
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#f7f7f7',
		),

		array(
			'title'       => esc_html__( 'Text Color Heading', 'uray' ),
			'id'          => 'phys_archive_single_heading_text_color',
			'type'        => 'color',
			'transparent' => false,
			'default'     => '#333',
		),
		array(
			'id'      => 'show_related_post',
			'type'    => 'checkbox',
			'title'   => esc_html__( 'Show Related Post', 'uray' ),
			'default' => '0'// 1 = on | 0 = off
		),
	)
) );

Redux::setSection( $opt_name, array(
	'title'      => esc_html__( 'Page 404 Settings', 'uray' ),
	'id'         => 'page_404_display_settings',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'    => 'phys_404_bg_image',
			'type'  => 'media',
			'title' => esc_html__( 'Background 404', 'uray' ),
			'default' => array( 'url' => get_template_directory_uri( 'template_directory' ) . '/images/page-not-found-bg.jpg' ),
		),
	)
) );