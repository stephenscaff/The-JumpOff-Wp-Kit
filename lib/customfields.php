<?php
if(function_exists("register_field_group"))
{
/*--------------------------------------------------*/
/*	Custom Fields: SEO
/*--------------------------------------------------*/
	register_field_group(array (
		'id' => 'acf_seo',
		'title' => 'SEO',
		'fields' => array (
			array (
				'key' => 'field_52a06f31a19d8',
				'label' => 'SEO Metas',
				'name' => '',
				'type' => 'message',
				'message' => '<h2 class="purple">SEO Meta Info</h2>',
			),
			array (
				'key' => 'field_546d1b82c5d4d',
				'label' => 'Seo Title',
				'name' => 'seo_title',
				'type' => 'text',
				'instructions' => 'Add an Seo Title for the page',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_546d1bd7d9ebf',
				'label' => 'Seo Description',
				'name' => 'seo_description',
				'type' => 'text',
				'instructions' => 'Briefly describe the page\'s content. It\'s best to incorporate keywords from the page.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_546d1c18974fe',
				'label' => 'Seo Keywords',
				'name' => 'seo_keywords',
				'type' => 'text',
				'instructions' => 'Add up to 10 keywords relevant to the page, separated by commas.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 2,
				),
				array (
					'param' => 'page',
					'operator' => '!=',
					'value' => '10',
					'order_no' => 0,
					'group_no' => 2,
				),
			),
			
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'excerpt',
				1 => 'custom_fields',
				2 => 'featured_image',
			),
		),
		'menu_order' => 99,
	));


?>