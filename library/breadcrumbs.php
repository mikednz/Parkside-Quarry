<?php
function plankton_breadcrumbs() { 
	
	global $post;

	
	$page_title = $post->post_title; // Get Page Title
	$slug = basename(get_permalink()); // Page Slug
	$cat = get_field('category');
	$cat_name =  $cat->name;
	$cat_slug =  $cat->slug;
	
	?>
	<ul class="inline-list breadcrumbs">
		<li class="home"><a href="/">Home</a></li>
		<li><a href="/all-case-studies">All Case Studies</a></li>
			
		<?php if ( is_page() && $post->post_parent ) { 
   		
   		} else { ?>
   			<li><a href="/all-case-studies/<?php echo $cat_slug; ?>"><?php echo $cat_name; ?></a></li>
		<?php } ?>

		<li><?php echo $page_title; ?></li>
	</ul>
	
<?php }	?>