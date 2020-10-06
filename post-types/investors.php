<?php

/**
 * Registers the `investors` post type.
 */
function investors_init() {
	register_post_type( 'investors', array(
		'labels'                => array(
			'name'                  => __( 'Investors', 'interface' ),
			'singular_name'         => __( 'Investors', 'interface' ),
			'all_items'             => __( 'All Investors', 'interface' ),
			'archives'              => __( 'Investors Archives', 'interface' ),
			'attributes'            => __( 'Investors Attributes', 'interface' ),
			'insert_into_item'      => __( 'Insert into investors', 'interface' ),
			'uploaded_to_this_item' => __( 'Uploaded to this investors', 'interface' ),
			'featured_image'        => _x( 'Featured Image', 'investors', 'interface' ),
			'set_featured_image'    => _x( 'Set featured image', 'investors', 'interface' ),
			'remove_featured_image' => _x( 'Remove featured image', 'investors', 'interface' ),
			'use_featured_image'    => _x( 'Use as featured image', 'investors', 'interface' ),
			'filter_items_list'     => __( 'Filter investors list', 'interface' ),
			'items_list_navigation' => __( 'Investors list navigation', 'interface' ),
			'items_list'            => __( 'Investors list', 'interface' ),
			'new_item'              => __( 'New Investors', 'interface' ),
			'add_new'               => __( 'Add New', 'interface' ),
			'add_new_item'          => __( 'Add New Investors', 'interface' ),
			'edit_item'             => __( 'Edit Investors', 'interface' ),
			'view_item'             => __( 'View Investors', 'interface' ),
			'view_items'            => __( 'View Investors', 'interface' ),
			'search_items'          => __( 'Search investors', 'interface' ),
			'not_found'             => __( 'No investors found', 'interface' ),
			'not_found_in_trash'    => __( 'No investors found in trash', 'interface' ),
			'parent_item_colon'     => __( 'Parent Investors:', 'interface' ),
			'menu_name'             => __( 'Investors', 'interface' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'investors',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'investors_init' );

/**
 * Sets the post updated messages for the `investors` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `investors` post type.
 */
function investors_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['investors'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Investors updated. <a target="_blank" href="%s">View investors</a>', 'interface' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'interface' ),
		3  => __( 'Custom field deleted.', 'interface' ),
		4  => __( 'Investors updated.', 'interface' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Investors restored to revision from %s', 'interface' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Investors published. <a href="%s">View investors</a>', 'interface' ), esc_url( $permalink ) ),
		7  => __( 'Investors saved.', 'interface' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Investors submitted. <a target="_blank" href="%s">Preview investors</a>', 'interface' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Investors scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview investors</a>', 'interface' ),
		date_i18n( __( 'M j, Y @ G:i', 'interface' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Investors draft updated. <a target="_blank" href="%s">Preview investors</a>', 'interface' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'investors_updated_messages' );
