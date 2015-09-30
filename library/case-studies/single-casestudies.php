<article class="main-content">
		
	<?php// plankton_breadcrumbs(); ?>
			
	<h1 class="h2"><?php the_title(); ?></h1>
	
	<section>
	
	<?php the_post(); ?>
	<?php the_content(); ?>	
	
	<?php   
		$current_post = get_the_ID(); 
		$cat = get_field('category');
		$cat_name =  $cat->name;
	?> 
	
	</section>
			
	<?php
	// The Query
	$the_query = new WP_Query( array(
		
		'post__not_in' => array($current_post),
		'post_type' => 'casestudies'
	
	));
	
	// The Loop
	if ( $the_query->have_posts() ) {
	
		$i = 0;
		
		while ( $the_query->have_posts() ) {
			$the_query->the_post(); 
			
			$i++;
			
			$cat = get_field('category');
			$cat_name_also =  $cat->name;
				
			if($cat_name == $cat_name_also) {
			
				if($i > 0) {	
			
					echo '<h2 class="divider">You might also like to read</h2>';
				
				}
			?>
					
			<section>
			<a href="<?php the_permalink(); ?>">
			<?php if(get_the_post_thumbnail()) :
			echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'thumbnail', array('class' => 'alignleft thumb-link'))); 
			else : ?> <img src="<?php bloginfo('stylesheet_directory'); ?>/img/ball.png" class="alignleft" width=" 100px" />
			
			<?php endif; ?>
			</a>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php the_excerpt(); ?>
		
			</section>	
				
								
			<?php } } }
			
			wp_reset_postdata(); ?>
			
		
</article>
