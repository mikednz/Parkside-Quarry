<?php
function my_pre_save_post( $post_id )
{
    // check if this is to be a new post
    if( $post_id != 'new' )
    {
        return $post_id;
    }
 
    // Create a new post
    $post = array(
        'post_status'  => 'publish' ,
        'post_title'  => $_POST["fields"]['field_529c0886500bd'],
        'post_type'  => $_POST['the_post_type']
    );  
 
     $post_id = wp_insert_post( $post ); // Insert the post
    do_action( 'acf/save_post' , $post_id ); // Save the fields to the post
    wp_redirect( add_query_arg( 'updated', 'true', get_permalink( $post_id ) ) ); exit; // Redirect to the new post
    return $post_id;
    
   
}
 
add_filter('acf/pre_save_post' , 'my_pre_save_post' );

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
 
function my_deregister_styles() {
    wp_deregister_style( 'wp-admin' );
}

?>