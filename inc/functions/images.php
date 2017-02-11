<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
*  jumpoff_ft_img
*  Featured Image helper with fallbacks
*  1. Get Ft Image
*  2. Get Post attachement
*  3. Get First image in post content
*  4. Get no-img.jpg fallback
*  
* @example: jumpoff_ftimg_fallbacks('full')
* @param $size (array|string) : images size - ie; full, medium, small)
* @param $id (string) : image id
* @param $echo (boolean) : cho (default) or return image
**/ 

function jumpoff_ft_img($size, $post_id = '', $echo = 'true') {
  global $post, $posts;

  // Allow loading posts by ID instead of relying on global $post/the loop
  if ($post_id) { 
    $post = get_post($post_id); 
  }

  // Read featured image data for image url.
  $image_id = get_post_thumbnail_id();

  // Get Image src of image attached to post.
  $attached_to_post = wp_get_attachment_image_src( get_post_thumbnail_id(), $size, false);
  
  // Set our attached image as the returned related image.
  $related_img =  $attached_to_post[0];                         

  // Check Post for image attachments
  if($related_img == "") {
    $attachments = get_children( array(
      'post_parent'    => get_the_ID(),
      'post_type'      => 'attachment',
      'numberposts'    => 1, 
      'post_status'    => 'inherit',
      'post_mime_type' => 'image',
      'order'          => 'ASC',
      'orderby'        => 'menu_order ASC'
      ) );
    
    // If we found attached image
    if(!empty($attachments)) {
      foreach ( $attachments as $attachment_id => $attachment ) {
         if(wp_get_attachment_image($attachment_id) != "") {
          $related_img = wp_get_attachment_url( $attachment_id );
        }                       
      }  
    } else { 
      // If no ft image set, let's get the first image within post 
      $first_img = '';
      ob_start();
      ob_end_clean();

      // Find that shit
      if( $output = preg_match_all('/<img.+src=\'"[\'""].*>/i', $post->post_content, $matches) ) {
        $first_img = $matches[1][0];
      }

      // If we have a first image
      if(!empty($first_img)) {
        $related_img = $first_img;
      } else {
        
        // Get dir
        $template_dir = get_bloginfo('template_directory');

        // Array of fallback images to deliver randomly
        // @since v1.2
        $random_no_images = 
          array('placeholder-1.jpg', 
                'placeholder-2.jpg', 
                'placeholder-3.jpg', 
                'placeholder-4.jpg', 
                'placeholder-5.jpg',
                'placeholder-6.jpg',
                'placeholder-7.jpg',
                'placeholder-8.jpg',
                'placeholder-9.jpg',
                'placeholder-10.jpg',
                'placeholder-11.jpg');

        // Randomize array of fallbacks
        $randomNumber = array_rand($random_no_images);
        $randomImage = $random_no_images[$randomNumber];

        // Set placeholder path for out random fallbacks
        $related_img = $template_dir."/assets/images/placeholders/$randomImage";  
      }
    }   
  }  

  // If $echo is false, return, else echo.
  // Needed so we can create a ft image shortcode
  // @since 1.2
  // @see inc/funcitons/shortcodes.php
  if ( $echo == FALSE  ) {
    return $related_img;
  } else {
    echo $related_img;
  }
}

/**
*  jumpoff_html5_insert_image
*  Wrap images in figure, captions in a figcap.
*  Takes place in editor via image_send_to_editor
*
* @param $html (array|string) : images size - ie; full, medium, small)
* @param $id (integer) : image id
* @param $caption (string) : gets from attachment editor caption field
* @param $align (string) : alignment class
* @param $url (string) : image path
* @param $size (string|array) (Optional) Image size. Accepts any valid image size, or an array of width and height values in pixels (in that order).
* @param $alt (string) : gets from attachment editor alt field
**/ 
function jumpoff_html5_insert_image($html, $id, $caption, $title, $align, $url, $size, $alt) {
  $src  = wp_get_attachment_image_src( $id, $size, false );
  $html5_str = "<figure id='media-" .$id . "' class='align-" . $align . "'>";
  $html5_str .= "<img src='" . $src[0] . "' alt='" . $alt . "' />";
  if ($caption) {
    $html5_str .= "<figcaption>" . $caption ."</figcaption>";
  }
  $html5_str .= "</figure>";
  return $html5_str;
}
add_filter( 'image_send_to_editor', 'jumpoff_html5_insert_image', 10, 9 );


/**
*   jumpoff_img_id_url
*   Wrap images in figure, captions in a figcap.
*   Takes place in editor via image_send_to_editor
*
*   @param $imgField (array|string) : images size - ie; full, medium, small)
*   @param $imgSize (integer) : image id
*   @return $img (integer) : image id
**/ 
function jumpoff_img_id_url($imgField, $imgSize) {
  $getImg = get_field($imgField);
  $getImgSize = $imgSize; // (get full size)
  $image_array = wp_get_attachment_image_src($getImg, $getImgsize);
  // finally, extract and store the URL from $image_array
  $image_url = $image_array[0];
  
  return $image_url;
}

?>