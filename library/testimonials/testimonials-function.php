<?php


// Call this on your testimonials page that contains the repeater field
function plankton_all_testimonails() {
	
	if( get_field('testimonials') ): 
				
		while( has_sub_field('testimonials') ):
				
		echo '<section>';
					
		$attachment_id = get_sub_field('logo');
		$size = "thumbnail"; // (thumbnail, medium, large, full or custom size)
 		$image = wp_get_attachment_image_src( $attachment_id, $size );
			
?>
		<h3><?php the_sub_field('client_name'); ?></h3>
 		
 		<?php if(get_sub_field('logo') != '') { ?>
 			<img class="alignleft" src="<?php echo $image[0]; ?>" />
 		<?php } else { ?>
 			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/mini.png" class="alignleft" />
 		<?php }
 			the_sub_field('the_testimonial'); ?>					
	 
	 	</section>
	 	
	 <?php endwhile; ?>
<?php endif; 
}

// Call this in a sidebar or where you want a random couple
function plankton_random_testimonails() {
	
	// get testimonials from the testimonials page
	$contact_drop = new WP_Query('pagename=testimonials'); 
	while ($contact_drop->have_posts()) : 
	$contact_drop->the_post(); 
	
	$testimonials = get_field('testimonials'); // repeater is testimonials
	shuffle ($testimonials); // shuffle
	$i = 0;
		
		if($testimonials) :
			
			foreach($testimonials as $testimonial)
				{
					
					if($i < 2) : // set the amount you want, you'll get the number
					
					echo '<section class="testimonial">';
					
					$attachment_id = $testimonial['logo'];
					$size = "thumbnail";
 					$image = wp_get_attachment_image_src( $attachment_id, $size ); ?>
					
					<?php if(get_sub_field('logo') != '') { ?>
 						<img class="alignleft" src="<?php echo $image[0]; ?>" />
 					<?php } else { ?>
 						<img src="<?php bloginfo('stylesheet_directory'); ?>/img/mini.png" class="alignleft" />
 					<?php }
					
					echo '<p>' . $testimonial['the_testimonial'] . '<br />';
					
					echo '<span class="cite">- ' . $testimonial['client_name'] . '</span></p>';
					
					echo '</section>';
					
					$i++;
					
					else: endif;
				}
		
		
		else : endif;
	   
	    
	endwhile; 

}


?>