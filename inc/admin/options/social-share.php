<?php
Redux::setSection( 'uray_theme_options', array(
	'title'  => esc_html__( 'Social Sharing', 'uray' ),
	'id'     => 'social_sharing',
	'icon'   => 'el el-group',
	'fields' => array(
		array(
			'id'      => 'sharing_facebook',
			'type'    => 'checkbox',
			'title'   => esc_html__( 'Facebook', 'uray' ),
			'default' => '0'// 1 = on | 0 = off
		),
		array(
			'id'      => 'sharing_twitter',
			'type'    => 'checkbox',
			'title'   => esc_html__( 'Twitter', 'uray' ),
			'default' => '0'// 1 = on | 0 = off
		),
		array(
			'id'      => 'sharing_google',
			'type'    => 'checkbox',
			'title'   => esc_html__( 'Google Plus', 'uray' ),
			'default' => '0'// 1 = on | 0 = off
		),
		array(
			'id'      => 'sharing_pinterset',
			'type'    => 'checkbox',
			'title'   => esc_html__( 'Pinterest', 'uray' ),
			'default' => '0'// 1 = on | 0 = off
		),
		array(
			'id'      => 'sharing_instagram',
			'type'    => 'checkbox',
			'title'   => esc_html__( 'Instagram', 'uray' ),
			'default' => '0'// 1 = on | 0 = off
		),
	)
) );