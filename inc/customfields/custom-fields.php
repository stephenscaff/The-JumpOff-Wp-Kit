<?php

/*--------------------------------------------------*/
/* Custom Fields for SEO and Post Subtitle
/* Dependencies: ACF
/*--------------------------------------------------*/
if(function_exists("register_field_group"))
{
/*--------------------------------------------------*/
/* Custom Fields: SEO
/*--------------------------------------------------*/
{
 register_field_group(array (
  'id' => 'acf_seo',
  'title' => 'SEO',
  'fields' => array (
   array (
    'key' => 'field_554e36f565ff9',
    'label' => 'Seo Header Message',
    'name' => '',
    'type' => 'message',
    'message' => '<h2>Seo Meta Info</h2>',
   ),
   array (
    'key' => 'field_554e3a9a7712c',
    'label' => 'SEO Title',
    'name' => 'seo_title',
    'type' => 'text',
    'instructions' => 'Add an SEO Title for the page',
    'default_value' => '',
    'placeholder' => 'SEO Title',
    'prepend' => '',
    'append' => '',
    'formatting' => 'html',
    'maxlength' => '',
   ),
   array (
    'key' => 'field_554e382c65ffb',
    'label' => 'SEO Description',
    'name' => 'seo_description',
    'type' => 'text',
    'instructions' => 'Briefly describe the page\'s content. It\'s best to incorporate keywords from the page. Keep it under 160 characters.',
    'default_value' => '',
    'placeholder' => 'SEO Description',
    'prepend' => '',
    'append' => '',
    'formatting' => 'none',
    'maxlength' => 250,
   ),
   array (
    'key' => 'field_554e385165ffc',
    'label' => 'SEO Keywords',
    'name' => 'seo_keywords',
    'type' => 'text',
    'instructions' => 'Add up to 10 keywords relevant to the page, separated by commas.',
    'default_value' => '',
    'placeholder' => 'SEO Keywords',
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
     'value' => 'page',
     'order_no' => 0,
     'group_no' => 0,
    ),
   ),
   array (
    array (
     'param' => 'post_type',
     'operator' => '==',
     'value' => 'team',
     'order_no' => 0,
     'group_no' => 0,
    ),
   ),
   array (
    array (
     'param' => 'post_type',
     'operator' => '==',
     'value' => 'post',
     'order_no' => 0,
     'group_no' => 1,
    ),
   ),
  ),
  'options' => array (
   'position' => 'normal',
   'layout' => 'no_box',
   'hide_on_screen' => array (
    0 => 'excerpt',
    1 => 'custom_fields',
    2 => 'discussion',
    3 => 'comments',
    4 => 'format',
    5 => 'featured_image',
    6 => 'send-trackbacks',
   ),
  ),
  'menu_order' => 10,
 ));
/*--------------------------------------------------*/
/* Custom Fields: SEO
/*--------------------------------------------------*/
if(function_exists("register_field_group"))
{
 register_field_group(array (
  'id' => 'post-subtitle',
  'title' => 'Post Subtitle',
  'fields' => array (
   array (
    'key' => 'field_556dd90fe5dca',
    'label' => '<h2>Post Subtitle</h2>',
    'name' => '',
    'type' => 'message',
    'message' => '',
   ),
   array (
    'key' => 'field_556dd92ae5dcb',
    'label' => 'Post SubTitle',
    'name' => 'post-subtitle',
    'type' => 'text',
    'instructions' => 'Add a subtitle for the post.',
    'default_value' => '',
    'placeholder' => 'Post subtitle',
    'prepend' => '',
    'append' => '',
    'formatting' => 'none',
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
   ),
  ),
  'options' => array (
   'position' => 'normal',
   'layout' => 'no_box',
   'hide_on_screen' => array (
   ),
  ),
  'menu_order' => 0,
 ));
}

}}
?>