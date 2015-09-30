<?php 

/*

	Template Name: News

*/

get_header(); ?>	
</header>
	
<div id="content">

	<div class="row">

	<article>
		
		<?php

			// The Query
			$the_query = new WP_Query( 'posts_per_page=-1' );
			
			// The Loop
			if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
			$the_query->the_post(); 
			
		?>

		<section class="blogroll">
			<?php if(get_the_post_thumbnail()) { ?>
				<a class="thumb-link alignleft" href="<?php the_permalink(); ?>"><?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'medium')); ?></a>
			<?php } ?>
		<h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p class="date"><?php the_date(); ?></p>
		
		<?php 
		$content = get_the_content();
		$custom_excerpt =  strip_tags($content, '<a>'); 
		$truncated_excerpt = tokenTruncate($custom_excerpt, 600);
		$trimmed_excerpt = rtrim($truncated_excerpt);
		echo '<p>' . $trimmed_excerpt; ?>&hellip;<a href="<?php the_permalink(); ?>">read more</a></p>

		
		</section>
		
		<?php } } else { /* no posts found */ }
		wp_reset_postdata(); ?>
		

	</article>	

	</div>

</div><!-- END #content -->

<?php get_footer(); ?>