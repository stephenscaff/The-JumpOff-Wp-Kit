<?php
/*=======================================================*/
/*
/*	Body Class - Let's clean it up, then add classes we want
/* 
/*=======================================================*/

/*--------------------------------------------------*/
/*	Add Specific class to body
/*--------------------------------------------------
add_filter('body_class','my_class_names');
function my_class_names($classes) {
	// add 'class-name' to the $classes array
	$classes[] = 'kf-fade-in-2';
	// return the $classes array
	return $classes;
}
*/

/*--------------------------------------------------*/
/*	Create Is Blog Function
/*--------------------------------------------------*/ 

function jumpoff_is_blog() {
	if (is_home() || is_singular('post') || is_post_type_archive( 'post' ))
		return true;
	else return false;
}

/*--------------------------------------------------*/
/*	Is Blog - Add Class Journal
/*--------------------------------------------------*/ 
function jumpoff_body_class($classes) {

// ADD POST/PAGE SLUG
  if (is_single() || is_page() && !is_front_page()) {
    $classes[] = basename(get_permalink());
  }
if (jumpoff_is_blog()) {
  $classes[] = 'journal';
}
// REMOVE UNNECESSARY CLASSES
  $home_id_class = 'page-id-' . get_option('page_on_front');
  $remove_classes = array(
    'page-template-default',
    $home_id_class
  );
  $classes = array_diff($classes, $remove_classes);
  return $classes;
}

add_filter('body_class', 'jumpoff_body_class');

/*--------------------------------------------------*/
/*	Add cat nicenames to body class
/* via plugin like "map cats to pages"
/*--------------------------------------------------
// ADD CATEGORY NICENAMES TO BODY CLASS 
// VIA PLUGIN LIKE MAP CATS TO PAGES
function category_id_class($classes) {
global $post;
foreach((get_the_category($post->ID)) as $category)
$classes[] = $category->category_nicename;
return $classes;
}
add_filter('body_class', 'category_id_class');

// OR, JUST ADD THE PAGE NAME TO BODY CLASS
function jumpoff_page_bodyclass() {  // add class to <body> tag
	global $wp_query;
	$page = '';
	if (is_front_page() ) {
    	   $page = 'home';
	} elseif (is_page()) {
   	   $page = $wp_query->query_vars["pagename"];
	}
	if ($page)
		echo 'class= "'. $page. '"';
}

*/

?>