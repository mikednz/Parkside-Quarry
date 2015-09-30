<?php
function plankton_event_excerpt() { 
	
	global $post;
	global $image;
	global $the_link;
	$postid = get_the_ID();
	$buy_now = get_field('buy_tickets_url', $postid);

?>			
	<h3 class="title--keyline"><a href="<?php echo $the_link; ?>"><?php the_title(); ?></a></h3>	
	
	<p class="excerpt"><?php the_field('tagline', $postid); ?><br />

	<?php 
	// grab the date amd time
	if(get_field('end_date', $postid)) : 
	
			$end_date = DateTime::createFromFormat('Ymd', get_field('end_date', $postid));
			$date = DateTime::createFromFormat('Ymd', get_field('date', $postid));
			echo $date->format('j M') . ' - ' . $end_date->format('j M') . ', ' . get_field('time', $postid) . ', ' .  get_field('price', $postid);
			
	else :
	
	if(get_field('date', $postid)) { 

			$date = DateTime::createFromFormat('Ymd', get_field('date', $postid));
			echo $date->format('D j M') . ', ' . get_field('time', $postid) . ', ' .  get_field('price', $postid); }
	
	endif; ?>		
		

	</p>
	
	<!--<a href="<?php echo $the_link; ?>" class="button--free-left ml mb-">Read More v</a>-->
	<a class="button button--free" href="<?php echo $the_link; ?>">Read More</a>
	
	</section></li>
<?php } ?>