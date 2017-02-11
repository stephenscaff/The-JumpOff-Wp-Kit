<?php
# Editor and Toolbar

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
*  Builds a custom toolbar for the Text Editor
*/
function jumpoff_editor_show_quicktags( $init ) {
  $init['buttons'] = 'strong,em,block,ul,ol,li,link,fullscreen';
  return $init;
}
//add_filter('quicktags_settings', 'jumpoff_editor_show_quicktags');


/**
*  Builds a custom toolbar for the Text Editor
*/
function jumpoff_editor_build_quicktags() {
    if (wp_script_is('quicktags')){
?>
 <script type="text/javascript">
  QTags.addButton( 'h3-title', 'H3', '<h3>', '</h3>', '3', 'Title H3', 1 );
  QTags.addButton( 'h4-title', 'H4', '<h4>', '</h4>', '3', 'Title H4', 1 );
  QTags.addButton( 'h5-title', 'H5', '<h5>', '</h5>', '5', 'Title H5', 1 );
  QTags.addButton( 'font-lead', 'Font Lead', '<p class="font-lead">', '</p>', '2', 'Font Lead', 1 );
  QTags.addButton( 'text-center', 'Text Center', '<p class="text-center">', '</p>', '4', 'Sub Header', 2 );
  QTags.addButton( 'hr-sep', 'Seperator', '<hr class="sep sep--alpha"/>', '', 's', 'Horizontal rule line', 202 );
  QTags.addButton( 'figcaption', 'Caption', '<figcaption>', '</figcaption>', 'f', 'Figcaption', 203 );
 </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'jumpoff_editor_build_quicktags' );


/**
* Tiny MCE Editor Customization
*/
function jumpoff_editor_tinymce( $init ) {
  $init['block_formats'] = "Title h3=h3; Title h4=h4; Title h5=h5; Paragraph=p";
  $init['toolbar1'] = 'formatselect,h3,bold,italic,strikethrough,underline,forecolor,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,spellchecker,pastetext,removeformat,wp_fullscreen';
  $init['toolbar2'] = '';
  return $init;
}
add_filter( 'tiny_mce_before_init', 'jumpoff_editor_tinymce' );


/**
* Build custom TinyMCE Editor for ACF instances.
*/
function jumpoff_acf_editor_tinymce( $toolbars ) {
  $toolbars['Full'] = array();
  $toolbars['Full'][1] = array('formatselect', 'bold', 'italic', 'underline', 'bullist', 'numlist', 'removeformat', );
  $toolbars['Full'][2] = array();

  // remove the 'Basic' toolbar completely (if you want)
  unset( $toolbars['Basic' ] );

  // return $toolbars - IMPORTANT!
  return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars' , 'jumpoff_acf_editor_tinymce');

?>