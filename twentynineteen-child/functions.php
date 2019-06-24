<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function philly_meta_box( $meta_boxes ) {
	$prefix = 'philly_';

	$meta_boxes[] = array(
		'id' => 'xtrameta',
		'title' => esc_html__( 'Release date and Contact information', 'metabox-online-generator' ),
		'post_types' => array('post' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'release_date',
				'type' => 'date',
				'name' => esc_html__( 'Release Date', 'metabox-online-generator' ),
				'desc' => esc_html__( 'Date post was released', 'metabox-online-generator' ),
			),
			array(
				'id' => $prefix . 'contact_meta',
				'type' => 'fieldset_text',
				'name' => esc_html__( 'Contact Information', 'metabox-online-generator' ),
				'rows' => 2,
				'options' => array(
					'contact_name' => 'Contact Name',
					'contact_email' => 'Contact Email',
					'contact_phone' => 'Contact Phone',
				),
				'clone' => 'true',
				'add_button' => esc_html__( 'Add Contact', 'metabox-online-generator' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'philly_meta_box' );