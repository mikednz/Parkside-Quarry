<?php
/* Create a personnel Taxonomy */
add_action( 'init', 'personnel_tax' );

function personnel_tax() {
	register_taxonomy(
		'personnel', // tax
		'releases', // post type
		array(
			'label' => __( 'Release Personnel' ),
			'rewrite' => array( 'slug' => 'personnel' ),
			'hierarchical' => false,
		)
	);
}
?>