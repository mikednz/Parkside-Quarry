<?php 

/*

	Template Name: Press

*/

get_header(); ?>	
</header>
	
<div id="content">

	<div class="row">

	<article>
		
		<?php if( get_field('photos_gallery') ): ?>

				<?php while( has_sub_field('photos_gallery') ): ?>
					
					<section>

						<h2><?php the_sub_field('gallery_title'); ?></h2>

						<?php $images = get_sub_field('gallery');
		 			
							if( $images ): ?>
							
								<?php foreach( $images as $image ): ?>
							            
							        <a class="fancybox" rel="gallery_<?php the_sub_field('gallery_title'); ?>" href="<?php echo $image['sizes']['large']; ?>"><img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" /></a>

					       		<?php endforeach; ?>
						
							<?php endif; ?>
						
					
					</section>
				<?php endwhile; ?>
			<?php endif; ?>
	
		<section>
			<?php the_post(); the_content(); ?>
		<section>
	</article>	

	</div>

</div><!-- END #content -->

<?php get_footer(); ?>