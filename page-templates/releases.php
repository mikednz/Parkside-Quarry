<?php 

/*

	Template Name: Releases

*/

get_header(); ?>	
</header>
	
<div id="content">

	<div class="row">

	<article>
		
		<?php  if( get_field('releases') ): ?>

				<?php while( has_sub_field('releases') ): ?>
					
					<section>

					<div class="coverart">
						<img src="<?php the_sub_field('cover_art'); ?>" />
						<?php if( get_sub_field('stores') ): ?>
							
							<?php while( has_sub_field('stores') ): ?>
								<a href="<?php the_sub_field('url'); ?>">
									<svg>
          								<use xlink:href="#shape-<?php the_sub_field('store'); ?>" />
        							</svg>
									
								</a>
								
							<?php endwhile; ?>
							
						<?php endif; ?>
						
					</div>	

					<div class="content">
						<?php the_sub_field('content'); ?>

						<?php the_sub_field('player_embed_code'); ?>
					</div>
					</section>
				<?php endwhile; ?>
			<?php endif; ?>
	
	</article>

	</div>

</div><!-- END #content -->

<?php get_footer(); ?>