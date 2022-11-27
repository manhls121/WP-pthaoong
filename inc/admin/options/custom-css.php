<?php
// css custom
Redux::setSection( $opt_name, array(
	'title'  => esc_html__( 'Custom Css', 'uray' ),
	'id'     => 'custom_css',
	'icon'   => 'el el-css',
	'fields' => array(
		array(
			'id'       => 'opt-ace-editor-css',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'CSS Code', 'uray' ),
			'subtitle' => esc_html__( 'Paste your CSS code here.', 'uray' ),
			'mode'     => 'css',
			'theme'    => 'monokai',
			'default'  => ""
		)
	)
) );