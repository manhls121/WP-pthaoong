<?php

add_filter( 'rwmb_meta_boxes', 'phys_register_meta_boxes' );
function phys_register_meta_boxes( $meta_boxes ) {
// Post Formats
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Gallery', 'uray' ),
		'id'     => 'meta-box-post-format-gallery',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Images', 'uray' ),
				'id'   => 'images',
				'type' => 'image_advanced',
			),
		),
	);
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Video', 'uray' ),
		'id'     => 'meta-box-post-format-video',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Video URL or Embeded Code', 'uray' ),
				'id'   => 'video',
				'type' => 'textarea',
			),
		)
	);
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Audio', 'uray' ),
		'id'     => 'meta-box-post-format-audio',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Audio URL or Embeded Code', 'uray' ),
				'id'   => 'audio',
				'type' => 'textarea',
			),
		)
	);
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Quote', 'uray' ),
		'id'     => 'meta-box-post-format-quote',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Quote', 'uray' ),
				'id'   => 'quote',
				'type' => 'textarea',
			),
			array(
				'name' => esc_html__( 'Author', 'uray' ),
				'id'   => 'author',
				'type' => 'text',
			),

		)
	);
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Link', 'uray' ),
		'id'     => 'meta-box-post-format-link',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'URL', 'uray' ),
				'id'   => 'url',
				'type' => 'url',
			),
			array(
				'name' => esc_html__( 'Text', 'uray' ),
				'id'   => 'text',
				'type' => 'text',
			),
		)
	);

	// Display Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Display Settings', 'uray' ),
		'pages'  => array( 'post', 'page', 'product' ), // All custom post types
		'fields' => array(

			array(
				'name' => esc_html__( 'Custom Featured Title Area?', 'uray' ),
				'id'   => 'heading_title',
				'type' => 'heading',
			),
			array(
				'name'  => esc_html__( 'User Featured Title?', 'uray' ),
				'id'    => 'phys_user_featured_title',
				'type'  => 'checkbox',
				'class' => 'checkbox-toggle',

			),

			array(
				'name'   => esc_html__( 'Hide Title', 'uray' ),
				'id'     => 'phys_hide_title',
				'type'   => 'checkbox',
				'before' => '<div style="margin-left: 25px; padding-left: 25px; border-width: 0 0 0 3px; border-style: solid; border-color: #ddd">',
			),

			array(
				'name' => esc_html__( 'Background Color Featured', 'uray' ),
				'id'   => 'phys_bg_color',
				'type' => 'color',
			),
			array(
				'name' => esc_html__( 'Text Color Featured', 'uray' ),
				'id'   => 'phys_text_color',
				'type' => 'color',
			),
			array(
				'name'             => esc_html__( 'Update images', 'uray' ),
				'id'               => 'phys_top_image',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'desc'             => esc_html__( 'This will overwrite page layout settings in Theme Options', 'uray' ),
			),
			array(
				'name'  => esc_html__( 'Hide Breadcrumbs?', 'uray' ),
				'id'    => 'phys_hide_breadcrumbs',
				'type'  => 'checkbox',
				'after' => '</div>',
			),
			array(
				'name'  => esc_html__( 'Custom Layout', 'uray' ),
				'id'    => 'heading_layout',
				'type'  => 'heading',
				'class' => 'hidden-product',
			),

			array(
				'name'  => esc_html__( 'Use Custom Layout?', 'uray' ),
				'id'    => 'phys_custom_layout',
				'type'  => 'checkbox',
				'class' => 'checkbox-toggle hidden-product',
				'desc'  => esc_html__( 'This will overwrite page layout settings in Theme Options', 'uray' ),
			),

			array(
				'name'    => esc_html__( 'Select Layout', 'uray' ),
				'id'      => 'layout',
				'type'    => 'image_select',
				'std'     => 'sidebar-left',
				'options' => array(
					'full-content'  => URAY_THEME_URI . '/images/themeoptions/body-full.png',
					'sidebar-left'  => URAY_THEME_URI . '/images/themeoptions/sidebar-left.png',
					'sidebar-right' => URAY_THEME_URI . '/images/themeoptions/sidebar-right.png',
				),
			),
			array(
				'name'  => esc_html__( 'No Padding', 'uray' ),
				'id'    => 'phys_no_padding',
				'type'  => 'checkbox',
				'class' => 'hidden-product',
			),
		)
	);


	return $meta_boxes;
}

add_action( 'admin_enqueue_scripts', 'phys_admin_script_meta_box' );

/**
 * Enqueue script for handling actions with meta boxes
 *
 * @return void
 * @since 1.0
 */

function phys_admin_script_meta_box() {
	wp_enqueue_style( 'uray-admin', get_template_directory_uri() . '/assets/css/admin.css', '1.1' );
	$custom_css = '#meta-box-post-format-' . get_post_format() . '{display:block}';
	wp_add_inline_style( 'uray-admin', $custom_css );

	wp_enqueue_script( 'uray-meta-box', URAY_THEME_URI . '/assets/js/admin/meta-boxes.js', array( 'jquery' ), '16219', true );
}
