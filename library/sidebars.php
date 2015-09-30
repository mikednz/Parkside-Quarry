<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function plankton_widgets_init() {

	register_sidebar( array(
		'name' => 'sidebar',
		'id' => 'sidebar',
		'before_widget' => '',
		'after_widget' => ''
	) );
	
	register_sidebar( array(
		'name' => 'twitter',
		'id' => 'twitter',
		'before_widget' => '',
		'after_widget' => ''
	) );
	
}
add_action( 'widgets_init', 'plankton_widgets_init' );
?>