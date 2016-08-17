<?php
/*-----------------------------------------------*/
/*  PATH HELPERS
/*  jumpoff_img()
/*  jumpoff_path()
/*-----------------------------------------------*/ 

/*-----------------------------------------------*/
/*  jumpoff_img()
/*  @description: An image path helper that gets template path
/*                 and out theme's images location (assets/images/)
/*                 Fallback to no-img.jpg
/*  @example: <img src="<?php jumpoff_imgpath(); ?>/image.jpg"/>
/*-----------------------------------------------*/
function jumpoff_img(){
  $template_path = bloginfo('template_directory');
  $img_path = $template_path . '/assets/images';
  echo $img_path;
}

/*-----------------------------------------------*/
/*  jumpoff_path
/*  @description: An asset path helper that gets template path
/*                and out theme's assets location (assets/)
/*  @example:     <video src="<?php jumpoff_path(); ?>/videos/vide.mp4">
/*-----------------------------------------------*/
function jumpoff_path(){
  $template_path = bloginfo('template_directory');
  $path = $template_path . '/assets';
  echo $path;
}

?>