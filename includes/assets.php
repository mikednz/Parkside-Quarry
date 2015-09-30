<?php

function html5blank_header_scripts()
{
	global $wp_query;

	if ( $GLOBALS['pagenow'] != 'wp-login.php' && ! is_admin() ) {
		wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js'); // Custom scripts
		wp_enqueue_script( 'modernizr' );
		wp_register_script( 'type_theme_script', get_template_directory_uri() . '/assets/js/script.miny.js', '', '', true); // Custom scripts
		wp_enqueue_script( 'type_theme_script' );
	}
}

// Load HTML5 Blank styles
function html5blank_styles()
{
	wp_register_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'style' );
}
