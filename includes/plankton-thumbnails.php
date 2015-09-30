<?php
function plankton_thumbnails() {

	global $post;
	global $the_link;
	global $image;
	global $count;

	$postid = get_the_ID();

	$attachment_id = get_field('image', $postid);
	$size = "custom size"; // (thumbnail, medium, large, full or custom size)

	$image = wp_get_attachment_image_src( $attachment_id, $size );

	$the_link = get_permalink();

	?>
	<?php if(get_field('image', $postid)) : ?>

		<div class="hex-container u-mr u-mb">

			<svg class="home-hex-image" viewBox="0 0 35 29" xmlns="http://www.w3.org/2000/svg">

				<g>
				   <clipPath id="hex-mask<?php echo $count; ?>">
						<path d="M1 7.708v13.417l11.62 6.708 11.62-6.708V7.708L12.62 1 1 7.708z" stroke="#000" stroke-width=".671" fill="none"/>
					</clipPath>
				</g>

				<a xlink:href="<?php echo $the_link; ?>">

		           <image clip-path="url(#hex-mask<?php echo $count; ?>)" height="100%" width="100%" xlink:href="<?php echo $image[0]; ?>" preserveAspectRatio="xMidYMin slice" />

		        </a>
			</svg>

			<svg class="hex-border" viewBox="0 0 35 29" xmlns="http://www.w3.org/2000/svg">

				<g>
				  <path d="M1 7.708v13.417l11.62 6.708 11.62-6.708V7.708L12.62 1 1 7.708z" stroke="RGB(74, 73, 82)" stroke-width=".371" fill="none"/>
				</g>

			</svg>

		</div>


	<?php else: ?>

		<div class="hex-container u-mr u-mb">

			<svg class="home-hex-image" viewBox="0 0 35 29" xmlns="http://www.w3.org/2000/svg">

				<g>
				   <clipPath id="hex-mask">
						<path d="M1 7.708v13.417l11.62 6.708 11.62-6.708V7.708L12.62 1 1 7.708z" stroke="#000" stroke-width=".671" fill="none"/>
					</clipPath>
				</g>

				<a xlink:href="<?php echo $the_link; ?>">

		           <image clip-path="url(#hex-mask)" height="100%" width="100%" xlink:href="http://ateventcentre.co.nz/wp-content/uploads/2015/03/placeholder.jpg" preserveAspectRatio="xMidYMin slice" />

		        </a>
			</svg>

			<svg class="hex-border" viewBox="0 0 35 29" xmlns="http://www.w3.org/2000/svg">

				<g>
				  <path d="M1 7.708v13.417l11.62 6.708 11.62-6.708V7.708L12.62 1 1 7.708z" stroke="RGB(74, 73, 82)" stroke-width=".371" fill="none"/>
				</g>

			</svg>

		</div>
	<?php endif; ?>
	<?php }	?>
