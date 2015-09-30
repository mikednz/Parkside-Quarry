<?php

function trashposts() {

$today = date( 'Ymd', current_time( 'timestamp', 0 ) ); 

$args = array(
    	'posts_per_page' => -1,
  		'post_type'   => 'post'
  	);

	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			if(get_field('date')) { // if it has a start date i.e a single show/event

				if(get_field('end_date')) { // if it has multiday shows

					if(get_field('end_date') < $today) { // and last one has past 
										
							wp_trash_post($post->ID);					
					 }
				}
				
				else { // if it has no end date ie single day show

					if(get_field('date') < $today) { // if it's past 
							
							wp_trash_post($post->ID);
						
					 }

				} 
				
			}
			
		} 
		
	} 
 /* Restore original Post Data */
 wp_reset_postdata();	
 
 }

?>