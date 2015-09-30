<?php
/*------------------------------------*\
	Theme Support
\*------------------------------------*/


class Bootstrapwp_Walker_Nav_Menu extends Walker_Nav_Menu {

	function __construct() {

	}
	  function start_lvl(&$output, $depth) {

    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }

}

//add_filter('show_admin_bar', '__return_false');


// register menus
function register_my_menu() {
  register_nav_menu('primary-menu',__( 'Primary Menu' ));

}
add_action( 'init', 'register_my_menu' );

if ( function_exists( 'add_theme_support' ) ) {
	// Add Menu Support
	add_theme_support( 'menus' );

	// Add Thumbnail Theme Support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'large', 700, '', true ); // Large Thumbnail
	add_image_size( 'medium', 250, '', true ); // Medium Thumbnail
	add_image_size( 'small', 120, '', true ); // Small Thumbnail
	add_image_size( 'avatar', 64, 64, true ); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

	// Enables post and comment RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Remove the <div> surrounding the dynamic navigation to cleanup markup
// FILTER

function my_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;

	return $args;
}


// REPLACE "current_page_" WITH CLASS "active"
function current_to_active($text){
        $replace = array(
                // List of classes to replace with "active"
                'current_page_item' => 'active',
                'current_page_parent' => 'active',
                'current_page_ancestor' => 'active',
        );
        $text = str_replace(array_keys($replace), $replace, $text);
                return $text;
        }


// Remove invalid rel attribute values in the categorylist
// FILTER
function remove_category_rel_from_category_list( $thelist )
{
	return str_replace( 'rel="category tag"', 'rel="tag"', $thelist );
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
// FILTER
function add_slug_to_body_class( $classes )
{
	global $post;
	if ( is_home() ) {
		$key = array_search( 'blog', $classes );
		if ( $key > - 1 ) {
			unset( $classes[ $key ] );
		}
	} elseif ( is_page() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	} elseif ( is_singular() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	}

	return $classes;
}

// Remove the width and height attributes from inserted images
// FILTER
function remove_width_attribute( $html )
{
	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );

	return $html;
}

// Remove wp_head() injected Recent Comment styles
// ACTION
function my_remove_recent_comments_style()
{
	global $wp_widget_factory;
	remove_action( 'wp_head', array(
		$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
		'recent_comments_style'
	) );
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
// ACTION
function html5wp_pagination()
{
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'prev_text' => '<i class="fa fa-caret-left"></i>',
		'next_text' => '<i class="fa fa-caret-right"></i>'
	) );
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}


// Custom View Article link to Post
// FILTER
function html5_blank_view_article( $more )
{
	global $post;

	return '<p><a class="view-article" href="' . get_permalink( $post->ID ) . '">' . __( 'Read more', 'thoughtstheme' ) . '</a></p>';
}

// Making jQuery Google API
// ACTIONS
function modify_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, '1.11');
		wp_enqueue_script('jquery');
	}
}

// Remove 'text/css' from our enqueued stylesheet
// FILTER
function html5_style_remove( $tag )
{
	return preg_replace( '~\s+type=["\'][^"\']++["\']~', '', $tag );
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
// FILTER
function remove_thumbnail_dimensions( $html )
{
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );

	return $html;
}


// Threaded Comments
// ACTION
function enable_threaded_comments()
{
	if ( ! is_admin() ) {
		if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

// Custom Comments Callback
// Called in comments.php
function html5blankcomments( $comment, $args, $depth )
{
	$GLOBALS['comment'] = $comment;
	extract( $args, EXTR_SKIP );

	if ( 'div' == $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	} ?>

	<!-- heads up: starting < for the html tag (li or div) in the next line: -->
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

	<?php if ( 'div' != $args['style'] ) : ?>
	<div class="comment__inner" id="div-comment-<?php comment_ID() ?>">
<?php endif; ?>

	<div class="media media--small">
		<div class="media__img avatar">
			<?php if ( $args['avatar_size'] != 0 ) {
				echo get_avatar( $comment, '32' );
			} ?>
		</div>
		<div class="media__body">
			<div class="comment-author">
				<?php echo get_comment_author_link() ?>
			</div>
			<div class="comment-date">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"
				   title="<?php printf( __( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ); ?>">
					<?php echo human_time_diff( get_comment_date( 'U' ), current_time( 'timestamp' ) ) . ' ago'; ?>
				</a>
			</div>
			<div class="comment-actions">
				<?php edit_comment_link( '<i class="fa fa-edit"></i>', '  ', '' ); ?>
				<?php comment_reply_link(
					array_merge( $args, array(
						'add_below'  => $add_below,
						'depth'      => $depth,
						'reply_text' => '<i class="fa fa-reply ml--"></i>',
						'max_depth'  => $args['max_depth']
					) ) ) ?>
			</div>

			<div class="comment-body">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="mb-">
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ) ?></em>
					</p>
				<?php endif; ?>

				<?php comment_text() ?>
			</div>
		</div>
	</div>

	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
<?php endif; ?>
<?php
}

function custom_reply_fields( $fields )
{
	$fields['author'] =
		'<p class="comment-form-author mb--"><input class="text-input 1/1" id="author" name="author" type="text" value="" size="30" aria-required="true" placeholder="' . __( 'Author', 'thoughtstheme' ) . '"/></p>';

	$fields['email'] =
		'<p class="comment-form-email mb--"><input class="text-input 1/1" id="email" name="email" type="text" value="" size="30" aria-required="true" placeholder="' . __( 'Email', 'thoughtstheme' ) . '"/></p>';

	$fields['url'] =
		'<p class="comment-form-url mb--"><input class="text-input 1/1" id="url" name="url" type="text" value="" size="30" placeholder="' . __( 'Website', 'thoughtstheme' ) . '" /></p>';

	return $fields;
}

function custom_reply_textarea( $field )
{
	$field = '<p class="comment-form-comment mb--"><textarea class="text-input 1/1" id="comment" name="comment" rows="8" aria-required="true" placeholder="' . __( 'Comment', 'thoughtstheme' ) . '"></textarea></p>';

	return $field;
}

function get_posts_count_by_tag( $tag )
{
	$term = get_term_by( 'slug', $tag, 'post_tag' );

	return $term->count;
}

function theme_option( $name, $default = false )
{
	$options = ( get_option( 'type_theme_options' ) ) ? get_option( 'type_theme_options' ) : null;
	// return the option if it exists
	if ( isset( $options[ $name ] ) && ! empty( $options[ $name ] ) ) {
		return apply_filters( 'type_theme_options_$name', $options[ $name ] );
	}

	// return default if nothing else
	return apply_filters( 'type_theme_options_$name', $default );
}

function tokenTruncate($string, $your_desired_width) {
  $parts = preg_split('/([\s\n\r]+)/', $string, null, PREG_SPLIT_DELIM_CAPTURE);
  $parts_count = count($parts);

  $length = 0;
  $last_part = 0;
  for (; $last_part < $parts_count; ++$last_part) {
    $length += strlen($parts[$last_part]);
    if ($length > $your_desired_width) { break; }
  }

  return strip_tags(implode(array_slice($parts, 0, $last_part)));
}
