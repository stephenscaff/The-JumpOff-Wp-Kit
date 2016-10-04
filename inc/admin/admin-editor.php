<?php
/*-----------------------------------------------*/
/*  EDITOR
/*  Wp admin editor related functions
/*-----------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/*-----------------------------------------------*/
/*  jumpoff_ft_img_help
/*  @description: Applies help text to the featured image uploads
/*-----------------------------------------------*/
function jumpoff_ft_img_help( $content ) {
  global $post_type;
  if( 'industries' == $post_type ) {
    return $content .= '<p>Featured and Mast Image: <br /> Size to 2000x1200px.</p>';
  }
  elseif( 'posttypename' == $post_type ) {
    return $content .= '<p> Size to about 700x1050px.</p>';
  }
  else {
    return $content .= '<p>Featured images appear in the Masthead and blog index previews. Size to 2000x1200px. Insert Shortcode: <br/><code>[featured-image]</code> </p>';
  }
}
add_filter( 'admin_post_thumbnail_html', 'jumpoff_ft_img_help');


/*-----------------------------------------------*/
/*  jumpoff_editor_show_quicktags()
/*  @description: Builds a custom toolbar for the Text Editor
/*-----------------------------------------------*/
function jumpoff_editor_show_quicktags( $init ) {
  $init['buttons'] = 'strong,em,block,ul,ol,li,link,fullscreen';
  return $init;
}
//add_filter('quicktags_settings', 'jumpoff_editor_show_quicktags');


/*-----------------------------------------------*/
/*  jumpoff_editor_build_quicktags
/*  @description: Builds a custom toolbar for the Text Editor
/*-----------------------------------------------*/
function jumpoff_editor_build_quicktags() {
    if (wp_script_is('quicktags')){
?>
 <script type="text/javascript">
  QTags.addButton( 'h3-subheader', 'H3', '<h3>', '</h3>', '3', 'Sub Header', 1 );
  QTags.addButton( 'h5-subheader', 'H5', '<h5>', '</h5>', '5', 'h5', 1 );
  QTags.addButton( 'font-lead', 'Font Lead', '<p class="font-lead">', '</p>', '2', 'Font Lead', 1 );
  QTags.addButton( 'text-center', 'Text Center', '<p class="text-center">', '</p>', '4', 'Sub Header', 2 );
  QTags.addButton( 'hr-sep', 'Seperator', '<hr class="sep sep--alpha"/>', '', 's', 'Horizontal rule line', 202 );
  QTags.addButton( 'figcaption', 'Caption', '<figcaption>', '</figcaption>', 'f', 'Figcaption', 203 );
 </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'jumpoff_editor_build_quicktags' );


/*-----------------------------------------------*/
/*  jumpoff_editor_tinymce()
/*  @description: Tiny MCE Editor Customization
/*                Give authors only what they need, to maintain 
/*                styles of the site and prevent retardery
/*-----------------------------------------------*/
function jumpoff_editor_tinymce( $init ) {
  $init['block_formats'] = "Paragraph=p; Subheader h3=h3; Gray Subheader=h4";
  $init['toolbar1'] = 'formatselect,h3,bold,italic,strikethrough,underline,forecolor,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,spellchecker,pastetext,removeformat,wp_fullscreen';
  $init['toolbar2'] = '';
  return $init;
}
add_filter( 'tiny_mce_before_init', 'jumpoff_editor_tinymce' );


?>