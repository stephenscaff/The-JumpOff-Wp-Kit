<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/** 
 *  jumpoff_img()
 *  An image path helper that gets template path of images
 */
function jumpoff_img(){
  $template_path = bloginfo('template_directory');
  $img_path = $template_path . '/assets/images';
  echo $img_path;
}

/** 
 *  jumpoff_path
 *  An asset path helper that gets template path.
 *  @example : <video src="<?php jumpoff_path(); ?>/videos/vide.mp4">
 */
function jumpoff_path(){
  $template_path = bloginfo('template_directory');
  $path = $template_path . '/assets';
  echo $path;
}

/** 
 *  jumpoff_svg
 *  An asset path helper that gets template path.
 *  @example : <video src="<?php jumpoff_path(); ?>/videos/vide.mp4">
 */
function jumpoff_svg($icon){
  $svg_icon = get_template_part( 'assets/images/svgs/' . $icon, 'svg' );
  return $svg_icon;
}