<?php

include "includes/functions.php";
include "includes/assets.php";
//include "includes/colors.php";
//include "includes/options.php";
//include "includes/shortcodes.php";
//include "includes/tinymce.php";
//include "includes/social.php";

include "includes/actions.php";
include "includes/filters.php";


include "includes/trashposts.php";
include "includes/plankton-thumbnails.php";
include "includes/event-excerpt.php";
include "includes/eventall-excerpt.php";

include "includes/child-page-check.php";

add_filter('relevanssi_excerpt_content', 'excerpt_function', 10, 3);
function excerpt_function($content, $post, $query) {

$fields = array('contact_details');
$field_name = array('Contact Details');

foreach($fields as $field){
$field_value = get_post_meta($post->ID, $field, TRUE);
$content .= ' '. ( is_array($field_value) ? implode(' ', $field_value) : $field_value );
//$content .= ' '. ( is_array($field_value) ? implode(' ', $field_name, ' ', $field_value) : $field_value );
}
return $content;
}

?>
