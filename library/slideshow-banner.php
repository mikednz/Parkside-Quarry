<?php

/* 
	Need to first get content and styling as you would like from the regent 
	example, .banner.scss
	
	Then clear the hardcode and add your own using the fields below..
		
	So you need the following...
	
		banner (repeater)
			link_url
			banner_text (wsiwig)
			button_text
			image (set size)
		
*/


function plankton_slideshow_banner() { 
	
?>
	<div class="banner">
		
		<img class="graphic" src="http://www.regenttheatre.co.nz/wp-content/themes/regent_sept_2014/img/graphic.png" draggable="false">
		
	<ul class="slides">	
				
		<?php /* if( get_field('banner') ): ?>
			<?php while( has_sub_field('banner') ): ?>
				
				<!-- new link to wrap image -->
						
				<li>
				<a href="<?php the_sub_field('link_url'); ?>"> 
					<div>
					<?php the_sub_field('banner_text'); ?>
					<p class="mustard box-button"><?php the_sub_field('button_text'); ?></p>
					</div>
					<img src="<?php the_sub_field('image'); ?>" />
				</a>
				</li>
							
			<?php endwhile; ?>
		<?php endif; */ ?>



		<!-- DELETE BELOW -->
		
		<li>
			<a href="/"> 
				<div>
				<h2>fdhhjl</h2>
				<p>hjfkld hfjdla hfjdl fhjdsa</p>
				
				</div>
				<img src="http://www.regenttheatre.co.nz/wp-content/uploads/2014/06/Sci-Comm-web-banner.jpg" draggable="false">
			</a>
		</li>
		
		<li>
			<a href="/"> 
				<div>
				<h2>fdhhjl</h2>
				<p>hjfkld hfjdla hfjdl fhjdsa</p>
				
				</div>
					<img src="http://www.regenttheatre.co.nz/wp-content/uploads/2014/06/AFD-web-banner-Beyond.jpg" draggable="false">
			</a>
		</li>	
		
		<!-- DELETE ABOVE -->
		
	</ul>
	</div>
<?php }	?>