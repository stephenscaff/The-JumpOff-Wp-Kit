<?php
/*-----------------------------------------------*/
/*  EDITOR
/*  Html editor - toolbar
/*  Visual editor - tinymce
/*-----------------------------------------------*/
/*-----------------------------------------------*/
/*  Editor: Customize Output of Editor QuickTags
/*-----------------------------------------------*/
function jumpoff_show_quicktags( $qtInit ) {
 $qtInit['buttons'] = 'strong,em,block,ul,ol,li,link,fullscreen';
 return $qtInit;
}
add_filter('quicktags_settings', 'jumpoff_show_quicktags');

/*-----------------------------------------------*/
/*  Editor Toolbar: Add Text Editor Buttons
/*-----------------------------------------------*/
function jumpoff_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
 <script type="text/javascript">
  QTags.addButton( 'h3-subheader', 'SubHeader', '<h3>', '</h3>', '3', 'Sub Header', 1 );
  QTags.addButton( 'h5-subheader', 'H5', '<h5>', '</h5>', '5', 'h5', 1 );
  QTags.addButton( 'font-lead', 'Font Lead', '<p class="font-lead">', '</p>', '2', 'Font Lead', 1 );
  QTags.addButton( 'hr-sep', 'Seperator', '<hr class="sep"/>', '', 's', 'Horizontal rule line', 201 );
  QTags.addButton( 'figcaption', 'Caption', '<figcaption>', '</figcaption>', 'f', 'Figcaption', 203 );
 </script>
<?php
    }
}
add_action( 'admin_print_footer_scripts', 'jumpoff_add_quicktags' );


/*-----------------------------------------------*/
/* Tiny MCE Editor Customization
/* Give authors only what they need, to maintain 
/* styles of the site and prevent retardery
/*-----------------------------------------------*/
function jumpoff_format_TinyMCE( $in ) {
  $in['block_formats'] = "Paragraph=p; Subheader h3=h3; Gray Subheader=h4";
  $in['toolbar1'] = 'formatselect,h3,bold,italic,strikethrough,underline,forecolor,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,spellchecker,pastetext,removeformat,wp_fullscreen ';
  $in['toolbar2'] = '';
  return $in;
}
add_filter( 'tiny_mce_before_init', 'jumpoff_format_TinyMCE' );

?>