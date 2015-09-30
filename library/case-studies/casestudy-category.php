<article class="main-content">
	
		<?php $post_title_test = get_the_title(); ?>
		
		<?php plankton_breadcrumbs(); ?>
		
		<h1 class="h2"><?php the_title(); ?></h1>
		
		<section>
		
		
		<?php the_post(); the_content(); ?>

	
		
		</section>
			
			<?
			
			// The Query
			$the_query = new WP_Query( 'post_type=casestudies' );
			
			// The Loop
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post(); ?>
					
					<?php 
							$cat = get_field('category');
							$cat_name =  $cat->name;
							$cat_slug =  $cat->slug;
						
					if($post_title_test == $cat_name) {
					
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
					
					<?php }
									
			} } 
			/* Restore original Post Data */
			wp_reset_postdata();
			 ?>

		
		
	
	
	</article>
