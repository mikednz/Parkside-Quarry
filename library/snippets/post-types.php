<?php

function releases_post_type() {
	$labels = array(
		'name'               => _x( 'Releases', 'post type general name' ),
		'singular_name'      => _x( 'Release', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Release' ),
		'add_new_item'       => __( 'Add New Release' ),
		'edit_item'          => __( 'Edit Release' ),
		'new_item'           => __( 'New Release' ),
		'all_items'          => __( 'All Releases' ),
		'view_item'          => __( 'View Release' ),
		'search_items'       => __( 'Search Releases' ),
		'not_found'          => __( 'No releases found' ),
		'not_found_in_trash' => __( 'No releases found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Releases'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Releases and Release specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	
	register_post_type( 'releases', $args );	
}
add_action( 'init', 'releases_post_type' );
?>