<?php

// A LA Blue Mercury

function casestudies_post_type() {
	$labels = array(
		'name'               => _x( 'Case Studies', 'post type general name' ),
		'singular_name'      => _x( 'Case Study', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Case Study' ),
		'add_new_item'       => __( 'Add New Case Study' ),
		'edit_item'          => __( 'Edit Case Study' ),
		'new_item'           => __( 'New Case Study' ),
		'all_items'          => __( 'All Case Studies' ),
		'view_item'          => __( 'View Case Study' ),
		'search_items'       => __( 'Search Case Studies' ),
		'not_found'          => __( 'No releases found' ),
		'not_found_in_trash' => __( 'No releases found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Case Studies'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our Case Studies and Case Study specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	
	register_post_type( 'casestudies', $args );	
	
}
add_action( 'init', 'casestudies_post_type' );

/* Create a Taxonomy */
add_action( 'init', 'case_study_tax' );

function case_study_tax() {
	register_taxonomy(
		'category', // tax
		'casestudies', // post type
		array(
			'label' => __( 'Case Study Category' ),
			'rewrite' => array( 'slug' => 'category' ),
			'hierarchical' => true,
		)
	);
}
?>