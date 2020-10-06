<?php

/**
 * Registers the `transaction` post type.
 */
function transaction_init() {
	register_post_type( 'transaction', array(
		'labels'                => array(
			'name'                  => __( 'Transactions', 'interface' ),
			'singular_name'         => __( 'Transaction', 'interface' ),
			'all_items'             => __( 'All Transactions', 'interface' ),
			'archives'              => __( 'Transaction Archives', 'interface' ),
			'attributes'            => __( 'Transaction Attributes', 'interface' ),
			'insert_into_item'      => __( 'Insert into transaction', 'interface' ),
			'uploaded_to_this_item' => __( 'Uploaded to this transaction', 'interface' ),
			'featured_image'        => _x( 'Featured Image', 'transaction', 'interface' ),
			'set_featured_image'    => _x( 'Set featured image', 'transaction', 'interface' ),
			'remove_featured_image' => _x( 'Remove featured image', 'transaction', 'interface' ),
			'use_featured_image'    => _x( 'Use as featured image', 'transaction', 'interface' ),
			'filter_items_list'     => __( 'Filter transactions list', 'interface' ),
			'items_list_navigation' => __( 'Transactions list navigation', 'interface' ),
			'items_list'            => __( 'Transactions list', 'interface' ),
			'new_item'              => __( 'New Transaction', 'interface' ),
			'add_new'               => __( 'Add New', 'interface' ),
			'add_new_item'          => __( 'Add New Transaction', 'interface' ),
			'edit_item'             => __( 'Edit Transaction', 'interface' ),
			'view_item'             => __( 'View Transaction', 'interface' ),
			'view_items'            => __( 'View Transactions', 'interface' ),
			'search_items'          => __( 'Search transactions', 'interface' ),
			'not_found'             => __( 'No transactions found', 'interface' ),
			'not_found_in_trash'    => __( 'No transactions found in trash', 'interface' ),
			'parent_item_colon'     => __( 'Parent Transaction:', 'interface' ),
			'menu_name'             => __( 'Transactions', 'interface' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'transaction',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'transaction_init' );

/**
 * Sets the post updated messages for the `transaction` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `transaction` post type.
 */
function transaction_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['transaction'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Transaction updated. <a target="_blank" href="%s">View transaction</a>', 'interface' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'interface' ),
		3  => __( 'Custom field deleted.', 'interface' ),
		4  => __( 'Transaction updated.', 'interface' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Transaction restored to revision from %s', 'interface' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Transaction published. <a href="%s">View transaction</a>', 'interface' ), esc_url( $permalink ) ),
		7  => __( 'Transaction saved.', 'interface' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Transaction submitted. <a target="_blank" href="%s">Preview transaction</a>', 'interface' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Transaction scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview transaction</a>', 'interface' ),
		date_i18n( __( 'M j, Y @ G:i', 'interface' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Transaction draft updated. <a target="_blank" href="%s">Preview transaction</a>', 'interface' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'transaction_updated_messages' );


// Add the hook action
add_action('transition_post_status', 'send_new_post', 10, 3);

// Listen for publishing of a new post
function send_new_post($new_status, $old_status, $post) {
  if($post->post_type === 'transaction') {
	  if ($post){
		  //var_dump($post);
	  }
    // Do something!
  }
}

add_action( 'save_post_transaction', 'add_title', 10, 3 );
function add_title( $ID, $post, $update ) {


}


add_filter('title_save_pre','auto_generate_post_title');
function auto_generate_post_title($title) {
   global $post;
   if (isset($post->ID)) {
      if (empty($_POST['post_title']) && 'transaction' == get_post_type($post->ID)){
         // get the current post ID number
         $id = get_the_ID();
         // add ID number with order strong
         $title = 'transaction-'.$id;} }
   return $title; 
}
