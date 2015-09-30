<?php get_header(); ?>	

	<?php plankton_slideshow_banner(); ?>
	
</header>
	
<div id="content">

	<div class="row">

	<article>
		
		<h1 class="h2">Heading one (has h2 class)</h1>
		
		<p>Fusce dapibus, tellus ac cursus <strong>commodo</strong>, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cum sociis natoque penatibus et magnis dis parturient montes, <em>nascetur ridiculus</em> mus. Maecenas faucibus mollis interdum.</p>
		<p>Curabitur blandit tempus porttitor. Duis mollis, <a href="">est non commodo</a> luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
		<h2>Heading two</h2>
		<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cum sociis natoque penatibus et magnis d</p>
		<p>Mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas faucibus mollis interdum.</p>
		<p>Curabitur blandit tempus porttitor. Duis mollis, <a href="">est non commodo</a> luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
		<h3>Heading three</h3>
		<p>Duis mollis, <a href="">est non commodo</a> luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
		
		<?php

			// The Query
			$the_query = new WP_Query( 'posts_per_page=3' );
			
			// The Loop
			if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
			$the_query->the_post(); 
			
			$count++; if ($count > 2) { $last = ' last'; }

		?>

		<section class="blogroll <?php echo $last; ?>">
			<?php if(get_the_post_thumbnail()) { ?>
				<a class="thumb-link alignleft" href="<?php the_permalink(); ?>"><?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'medium')); ?></a>
			<?php } ?>
		<h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<p class="date"><?php the_date(); ?></p>
		
		<?php the_excerpt(); ?>
		<?php the_tags( 'Tagged with: ', ' , ', '<br />' ); ?>
		<p>Categories: 
			<?php echo get_the_category_list(', ', '', ''); ?>
		</p>
		</section>
		
		<?php } } else { /* no posts found */ }
		wp_reset_postdata(); ?>

		<?php /* if( get_field('exhibition') ): ?>
				<?php while( has_sub_field('exhibition') ): ?>
					<ul>
						<li><?php the_sub_field('name_and_title'); ?></li>
						<li><?php the_sub_field('floor'); ?></li>
						<li><?php the_sub_field('time'); ?></li>
						<li><?php the_sub_field('description'); ?></li>
					</ul>				
				<?php endwhile; ?>
			<?php endif; */?>

		
	</article>
	
	
	
		<?php // get_sidebar(); ?>	

	</div><!-- END .row -->

</div><!-- END #content -->

<?php get_footer(); ?>