<?php 

/*

	Template Name: Videos

*/

get_header(); ?>	
</header>
	
<div id="content">

	<div class="row">

	<article>
		
		<?php if( get_field('videos_group') ): ?>

				<?php while( has_sub_field('videos_group') ): ?>
					<?php $count = 1; ?>
					<section>
						<?php $group = get_sub_field('group_title'); ?>
						<?php if( get_sub_field('videos') ): ?>
							
							<?php while( has_sub_field('videos') ): ?>
								<?php if ($count < 2 ) { ?>
									<div class="video_single">
									<h2><?php echo $group; ?></h2>	
									<?php the_sub_field('video_single'); ?>
									</div>
								<?php $count++; } else { ?>
									<div class="video_single">
									<?php the_sub_field('video_single'); ?>
									</div>
								<?php } ?>

							<?php endwhile; ?>
							
						<?php endif; ?>
						
					</section>
				<?php endwhile; ?>
			<?php endif; ?>
	
	</article>

	</div>

</div><!-- END #content -->

<?php get_footer(); ?>