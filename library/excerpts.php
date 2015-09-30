<?php

// Puts link in excerpts more tag
function new_excerpt_more($more) {
       global $post;
  return '<a class="moretag" href="'. get_permalink($post->ID) . '"> ...Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function custom_excerpt_length( $length ) {
  return 90;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Custom excerpt 

/*

    <p>
    <?php echo excerpt(25); ?>
    <a href="<?php the_permalink(); ?>">read more</a>
    </p>

*/
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }


?>