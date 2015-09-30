<?php 

/*

	Template Name: Contact

*/

get_header(); ?>	
</header>
	
<div id="content">

	<div class="row">

	<article>
		
		<section>
		<?php the_post(); ?>
		<?php the_content(); ?>

		<?php if( get_field('social_links', 'options') ): ?>
	        	<ul id="social-links">
				<?php while( has_sub_field('social_links', 'options') ): ?>
					
						<li class="<?php the_sub_field('social_network', 'options'); ?>"><a href="<?php the_sub_field('social_network_url', 'options'); ?>"><?php the_sub_field('icon_code', 'options'); ?></a></li>
									
				<?php endwhile; ?>
				</ul>	
			<?php endif; ?>
		</section>
	</article>

	</div>

</div><!-- END #content -->

<?php get_footer(); ?>