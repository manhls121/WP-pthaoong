<?php


if ( is_admin() && class_exists( 'Tax_Meta_Class' ) ) {
	$prefix = 'phys_';

	function uray_my_meta( $my_meta ) {
		$prefix = 'phys_';
		$my_meta->addSelect(
			$prefix . 'layout', array(
			''              => esc_html__( 'Using in Theme Option', 'uray' ),
			'full-content'  => esc_html__( 'No Sidebar', 'uray' ),
			'sidebar-left'  => esc_html__( 'Left Sidebar', 'uray' ),
			'sidebar-right' => esc_html__( 'Right Sidebar', 'uray' )
		),
			array( 'name' => esc_html__( 'Custom Layout ', 'uray' ), 'std' => array( '' ) )
		);

		$my_meta->addSelect(
			$prefix . 'custom_heading', array(
			''       => esc_html__( 'Using in Theme Option', 'uray' ),
			'custom' => esc_html__( 'Custom', 'uray' ),
		), array( 'name' => esc_html__( 'Custom Heading ', 'uray' ), 'std' => array( '' ), 'class' => 'toggle_custom' )
		);
		$my_meta->addImage( $prefix . 'cate_top_image', array( 'name' => esc_html__( 'Heading Background Image', 'uray' ), 'class' => 'show_custom' ) );
		$my_meta->addColor( $prefix . 'cate_heading_bg_color', array( 'name' => esc_html__( 'Heading Background Color', 'uray' ), 'class' => 'show_custom' ) );
		$my_meta->addColor( $prefix . 'cate_heading_text_color', array( 'name' => esc_html__( 'Heading Text Color', 'uray' ), 'class' => 'show_custom' ) );
		$my_meta->addCheckbox( $prefix . 'cate_hide_title', array( 'name' => esc_html__( 'Hide Title', 'uray' ), 'class' => 'show_custom' ) );
		$my_meta->addCheckbox( $prefix . 'cate_hide_desc', array( 'name' => esc_html__( 'Hide Description', 'uray' ), 'class' => 'show_custom' ) );
		$my_meta->addSelect(
			$prefix . 'layout_content', array(
			''         => esc_html__( 'Using in Theme Option', 'uray' ),
			'standard' => esc_html__( 'Standard', 'uray' ),
			'masonry'  => esc_html__( 'Masonry', 'uray' ),
		),
			array( 'name' => esc_html__( 'Layout', 'uray' ), 'std' => array( '' ), 'class' => 'toggle_gird_custom' )
		);
		$my_meta->addSelect(
			$prefix . 'layout_column', array(
			''  => esc_html__( 'Using in Theme Option', 'uray' ),
			'2' => '2',
			'3' => '3',
			'4' => '4',
		), array( 'name' => esc_html__( 'Column', 'uray' ), 'std' => array( '' ), 'class' => 'show_column_custom' )
		);
	}

	/*
		  * configure your meta box
		  */
	$config = array(
		'id'             => 'category__meta_box',
		// meta box id, unique per meta box
		'title'          => 'Category Meta Box',
		// meta box title
		'pages'          => array( 'category', 'post_tag' ),
		// taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal',
		// where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(),
		// list of meta fields (can be added by field arrays)
		'local_images'   => false,
		// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false
		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);

	$my_meta_post = new Tax_Meta_Class( $config );
	uray_my_meta( $my_meta_post );
	/*Add custom style*/
	$my_meta_post->Finish();
}
if ( class_exists( 'Tax_Meta_Class' ) ) {
	if ( !function_exists( 'uray_get_tax_meta' ) ) {
		function uray_get_tax_meta( $term_id, $key, $multi = false ) {
			$t_id = ( is_object( $term_id ) ) ? $term_id->term_id : $term_id;
			$m    = get_option( 'tax_meta_' . $t_id );
			if ( isset( $m[$key] ) ) {
				return $m[$key];
			} else {
				return '';
			}
		}
	}
} else {
	if ( !function_exists( 'uray_get_tax_meta' ) ) {
		function uray_get_tax_meta( $term_id, $key, $multi = false ) {
 			return '';
		}
	}
}