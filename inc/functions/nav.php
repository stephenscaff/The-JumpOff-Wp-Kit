<?php
/*-----------------------------------------------*/
/*  NAV
/*  01. Is-Current class
/*  02. jumpoff_page_link
/*  03. Register menu(s) if so desired
/*-----------------------------------------------*/

/*--------------------------------------------------*/
/*  Nav - Add is-current class
/*  Not using Wp's native nav. 
/*  This nav is too crazy for the risk of adding more pages.
/*
/*  @param: 'page-name'
/*  @return: is-current
/*  @example: echo jumpoff_active_class('page-slug') ?>
/*--------------------------------------------------*/
function jumpoff_active_class($page_name){
if (is_page( $page_name )) 
  return 'is-current';
}

/*--------------------------------------------------*/
/*  jumpoff_get_page_link('page name')
/*  gets and echos the page link by page name
/*--------------------------------------------------*/ 
function jumpoff_page_url($page_name, $cpt=''){
  if ($cpt == true) {
    $page_url = esc_url( get_post_type_archive_link($page_name) );
  } else {
    $page_url = esc_url( get_permalink( get_page_by_title( $page_name ) ) );
  }
  return $page_url;
    if (is_page( $page_name )){
     echo '" class="is-active';
  }
}

/*-----------------------------------------------*/
/*  Jumpoff Register Menus
/*-----------------------------------------------*/
/*
function jumpoff_register_menus() {
  register_nav_menus(
    array(
      'main-nav' => __( 'Main Nav' )
    )
  );
}
add_action( 'init', 'jumpoff_register_menus' );
*/
?>