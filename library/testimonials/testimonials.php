<?php
/*

	Template Name: Testimonials

*/

get_header();

?>

</header>
	
<div id="content">

	<div class="row">
	
	<article class="main-content">
		
		<h1 class="h2"><?php the_title(); ?></h1>
		
		
		
<?php
			
			the_post();
			
			plankton_all_testimonails();
?>			
		
		
	
	</article>
	
	<?php get_sidebar(); ?>	
	
	</div>

</div><!-- END #content -->

<?php get_footer(); ?>