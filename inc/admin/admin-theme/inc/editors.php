<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
 * Editor Toolbars
 * Class for customizing Wp Editor Toolbars, for 
 * Visual (TinyMCE), Text (Qtags) and ACF toolbars
 */
class AdminEditors {
  
  function __construct(){
    add_action( 'admin_print_footer_scripts', array( $this, 'text_editor_toolbar' ) );
    add_filter( 'tiny_mce_before_init', array( $this, 'visual_editor_toolbar' ));
    add_filter('acf/fields/wysiwyg/toolbars' , array( $this, 'acf_toolbar') );
  }


  /**
   * Text Editor Toolbar
   * Used qtags editor
   */
  function text_editor_toolbar(){
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

  /**
   * Visual Editor Toolbar
   * Used Tiny MCE
   */
  function visual_editor_toolbar($toolbar){
    $toolbar['block_formats'] = "Title h3=h3; Title h4=h4; Title h5=h5; Paragraph=p";
    $toolbar['toolbar1'] = 'formatselect,h3,bold,italic,strikethrough,underline,forecolor,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,spellchecker,pastetext,removeformat,wp_fullscreen';
    $toolbar['toolbar2'] = '';
    
    return $toolbar;
  }

  /**
   * ACF Toolbars
   * For the ACF editor field.
   */
  function acf_toolbar( $toolbar ){
    $toolbar['Full'] = array();
    $toolbar['Full'][1] = array('formatselect', 'bold', 'italic', 'underline', 'bullist', 'numlist', 'removeformat', );
    $toolbar['Full'][2] = array();

    // remove the 'Basic' toolbar completely (if you want)
    unset( $toolbar['Basic' ] );

    return $toolbar;
  }
}

new AdminEditors;