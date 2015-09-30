<?php
//Making jQuery Google API
function modify_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, '1.11');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery');

function my_scripts_method() {
	wp_enqueue_script(
		'custom-script',
		get_stylesheet_directory_uri() . '/js/global-ck.js'
	);
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );


?>