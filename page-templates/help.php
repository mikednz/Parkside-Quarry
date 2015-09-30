<?php
/*

	Template Name: Help

*/

get_header();

?>

</header>
	
<div id="content">

	<div class="row">
	
		<article class="main-content" style="float: none; width: 700px; margin: 0 auto;">
			
			<h1 class="h2"><?php the_title(); ?></h1>
			
			<section>
			
			<?php if ( is_user_logged_in() ) { ?>
			
			<?php the_post(); ?>
			<?php the_content(); ?>	
			
			<?php  } ?>
			
			
			
			
			</section>
		
		</article>
	

	</div>

</div><!-- END #content -->

<?php get_footer(); ?>