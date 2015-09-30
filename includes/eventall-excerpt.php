<?php
function plankton_eventall_excerpt() {

	global $post;
	global $image;
	global $the_link;
	$postid = get_the_ID();
	$buy_now = get_field('buy_tickets_url', $postid);

?>
	<h2 class="u-pt+"><a href="<?php echo $the_link; ?>"><?php the_title(); ?></a></h2>

	<h5 class="heading-font uppercase u-mb0"><?php  echo get_field('price', $postid); ?><?php  echo ' / ' . get_field('time', $postid); ?></h5>

	<div class="hex-container hex-date">

		<?php
		// grab the date amd time
		if(get_field('end_date', $postid)) :

				$end_date = DateTime::createFromFormat('Ymd', get_field('end_date', $postid));
				$date = DateTime::createFromFormat('Ymd', get_field('date', $postid));
				echo '<p>' . $date->format('j M') . ' - ' . $end_date->format('j M');

		else :

		if(get_field('date', $postid)) {

				$date = DateTime::createFromFormat('Ymd', get_field('date', $postid));
				echo '<p class="aligncenter alpha u-pl0" style="position: relative; z-index: 99;">' . $date->format('j') . '<br>' . $date->format('M') . '</p>';}

		endif; ?>

		<svg class="hex-border" viewBox="0 0 35 29" xmlns="http://www.w3.org/2000/svg">

			<g>
			  <path d="M1 7.708v13.417l11.62 6.708 11.62-6.708V7.708L12.62 1 1 7.708z" stroke="RGB(74, 73, 82)" stroke-width=".371" fill="#fff"/>
			</g>

		</svg>



	</div>





	<p class="excerpt">

	<?php echo tokenTruncate(get_the_content(), 250); ?>&hellip;

	</p>

	<p>
	<a class="button" href="<?php echo $the_link; ?>">Read More ></a>
	<a class="button--primary" href="<?php echo $buy_now; ?>">Buy Now</a>
</p>



	</section><!--
<?php } ?>
