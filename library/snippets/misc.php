<?php
// redirct after trashing post
add_action('trashed_post','my_trashed_post_handler',10,1);
function my_trashed_post_handler($post_id)
{
    wp_redirect( get_option('siteurl') );
    exit;
}


// only show media library of assets by logged in user (i think)
add_filter( 'posts_where', 'devplus_attachments_wpquery_where' );
function devplus_attachments_wpquery_where( $where ){
	global $current_user;

	if( is_user_logged_in() ){
		// we spreken over een ingelogde user
		if( isset( $_POST['action'] ) ){
			// library query
			if( $_POST['action'] == 'query-attachments' ){
				$where .= ' AND post_author='.$current_user->data->ID;
			}
		}
	}

	return $where;
}

// remove width and height to images
function clean_wp_width_height($string){
	return preg_replace('/\<(.*?)(width="(.*?)")(.*?)(height="(.*?)")(.*?)\>/i', '<$1$4$7>',$string);
}

?>