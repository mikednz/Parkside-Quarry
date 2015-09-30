<?php
function plankton_thumbnails() { 
	
	global $post;
	global $the_link;
	global $image;

	$postid = get_the_ID();
	
	$attachment_id = get_field('image', $postid);
	$size = "custom size"; // (thumbnail, medium, large, full or custom size)
					 
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	
	
	if(get_field('link_to_festival_page', $postid)) {

		$the_link = get_field('link_to_festival_page', $postid);

	}

	else {
		$the_link = get_permalink();

	}

	?>
					
	<a href="<?php echo $the_link; ?>"><img src="<?php echo $image[0]; ?>" /></a>
	<?php }	?>