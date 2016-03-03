<?php
/*-----------------------------------------------*/
/* IMAGES
/* Get First Image helper
/* Ft Image with fallbacks and sizing
/* html5 image wrapping in the_content
/*-----------------------------------------------*/ 


/*-----------------------------------------------*/
/*  jumpoff_first_img()
/*
/*  Get first image in post
/*  Fallback to no-img.jpg
/*  @example: echo jumpoff_first_img();
/*-----------------------------------------------*/
function jumpoff_first_img() {
   global $post, $posts;
   $first_img = '';
   ob_start();
   ob_end_clean();
  if( $output = preg_match_all('/<img.+src=\'"[\'""].*>/i', $post->post_content, $matches) ) {
    $first_img = $matches[1][0];
  }
   $url =  get_template_directory_uri();
   if(empty($first_img)){ //Defines a default image
     $first_img = "$url/assets/images/no-img.jpg";
   }
  return $first_img;
}


/*--------------------------------------------------*/
/* Featured Image with fallbacks (4)
/*  Used as the primary way to call images in loops/queries
/*  1. Get Ft Image
/*  2. Get Post attachement
/*  3. Get Girst image in post content
/*  4. Get no-img.jpg fallback
/*  
/*  @example: jumpoff_ftimg_fallbacks('full')
/*  @param $imgSize (images size - ie; full, medium, small)
/*--------------------------------------------------*/ 
function jumpoff_ftimg_fallbacks($imgSize){
  global $post, $posts;
  $image_id = get_post_thumbnail_id();  //read featured image data for image url
  $attached_to_post = wp_get_attachment_image_src( get_post_thumbnail_id(), $imgSize, false);
  $related_img =  $attached_to_post[0];                         

  if($related_img == ""):
    $attachments = get_children( array(
      'post_parent'    => get_the_ID(),
      'post_type'      => 'attachment',
      'numberposts'    => 1, 
      'post_status'    => 'inherit',
      'post_mime_type' => 'image',
      'order'          => 'ASC',
      'orderby'        => 'menu_order ASC'
      ) );
    if(!empty($attachments)): //check if there's an image attached or not
      foreach ( $attachments as $attachment_id => $attachment ) {
        if(wp_get_attachment_image($attachment_id) != ""):
            $related_img = wp_get_attachment_url( $attachment_id );
        endif;                        
      }
    else:  // if no attachment 
      $first_img = '';
      ob_start();
      ob_end_clean();
      if( $output = preg_match_all('/<img.+src=\'"[\'""].*>/i', $post->post_content, $matches) ) {
        $first_img = $matches[1][0];
      }
      if(!empty($first_img)):
          $related_img = $first_img;
      else:
          $related_img = bloginfo('template_directory')."/assets/images/no-img.jpg";    //define default thumbnail, you can use full url here.
      endif;
    endif;   
  endif;  

  echo $related_img;
} 

/*-----------------------------------------------*/
/* Wrap images in figure, captions in a figcap
/* Happens in the editor (image_send_to_editor)
/*-----------------------------------------------*/
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


/*-----------------------------------------------*/
/*  jumpoff_img_id_url
/*  
/*  Get Image's URL Via it's ID
/*  @param $imgSize (images size - ie; full, medium, small)
/*  @return $img_url;
/*-----------------------------------------------*/
function jumpoff_img_id_url($imgField, $imgSize) {
  $getImg = get_field($imgField);
  $getImgSize = $imgSize; // (get full size)
  $image_array = wp_get_attachment_image_src($getImg, $getImgsize);
// finally, extract and store the URL from $image_array
  $image_url = $image_array[0];
 return $image_url;
}
?>