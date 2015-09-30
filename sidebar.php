<aside>
<h3 class="h1">Latest News</h3>	
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
		<a class="thumb-link" href="<?php the_permalink(); ?>"><?php echo clean_wp_width_height(get_the_post_thumbnail(get_the_ID(),'medium')); ?></a>
	<?php } ?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<p>
    <?php echo excerpt(25); ?><a href="<?php the_permalink(); ?>">read more</a>
    </p>

</section>

<?php } } else { /* no posts found */ }
		wp_reset_postdata(); ?>


<h2>Videos</h2>	

<?php

	$rows = get_field('videos', '14');
		
	if($rows){
	shuffle( $rows );
	$i = 0;
	 
		foreach($rows as $row){ ?>
			<section>

			<?php echo $video = do_shortcode($row['shortcode']); ?>
			
			<p class="aligncenter"><?php echo $row['video_caption']; ?></p>
			</section>
			
			<?php if (++$i == 2) break;
		}	
	}
?>

<h2>Releases</h2>	


</aside>