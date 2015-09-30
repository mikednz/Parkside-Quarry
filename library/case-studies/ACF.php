<?php
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_case-studies',
		'title' => 'Case Studies',
		'fields' => array (
			array (
				'key' => 'field_52eeb7886dbe5',
				'label' => 'Featured?',
				'name' => 'featured',
				'type' => 'true_false',
				'message' => 'Would you like to feature this Case Study?',
				'default_value' => 0,
			),
			array (
				'key' => 'field_52eeb7ce6dbe6',
				'label' => 'Category',
				'name' => 'category',
				'type' => 'taxonomy',
				'taxonomy' => 'category',
				'field_type' => 'radio',
				'allow_null' => 0,
				'load_save_terms' => 0,
				'return_format' => 'object',
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'casestudies',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'categories',
				1 => 'tags',
			),
		),
		'menu_order' => 0,
	));
}
?>