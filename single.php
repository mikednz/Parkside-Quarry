<?php get_header(); ?>	
</header>
	
<div id="content" class="row">

	<article>
		
		<h1 class="h2"><?php the_title(); ?></h1>
		
		<section>
		
		<?php the_post(); ?>
		<?php the_content(); ?>	
				
		
		</section>
	
	</article>
	
	
	
		<?php // get_sidebar(); ?>	


</div><!-- END #content -->

<?php get_footer(); ?>