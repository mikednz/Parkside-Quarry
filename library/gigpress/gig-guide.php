<?php
/*
	 Template Name: Gig Guide
*/
?>

<?php get_header(); ?>		

</div>

</header>
	
<div id="content" class="row">

	<article>
	<h1><?php the_title(); ?></h1>
	<section>
	
	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>
		<?php echo do_shortcode('[gigpress_shows]'); ?>
		
	<?php endwhile; ?>
	
	</article>
	
	<?php get_sidebar(); ?>
			
<?php get_footer(); ?>