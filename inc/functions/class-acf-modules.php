<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly

/**
* ACF Module Loader Class
*
* Autoloads ACF Flexible Content Fields as modules by matching the module name with the file name
* from within the modules directory.
*
* @author       Stephen Scaff
* @package      Inrix
* @see          partials/modules
* @see          asthttp://www.advancedcustomfields.com/add-ons/flexible-content-field/
* @version      1.0
* @example      ACF_Layout::render(get_row_layout());
*/


class ACF_Modules {
  /**
   * Path of where the layout templates are found,
   * (relative to the theme template directory).
   */
  const LAYOUT_DIRECTORY = '/partials/modules/';

  /**
   * Get Layout
   *
   * @param  {string} $file
   * @param  {array}  $data
   * @return {string}
   */
  static function get_layout($layout, $data = null){
    
    $full_layout_directory = get_template_directory() . self::LAYOUT_DIRECTORY;
    $layout_file = '{{layout}}.php';
    $find = array('{{layout}}', '_');
    $replace = array($layout, '-');

    /* Find a file that matchs this_format */
    $new_layout_file = str_replace($find[0], $replace[0], $layout_file);

    if (file_exists($full_layout_directory . $new_layout_file)){
      include($full_layout_directory . $new_layout_file);
      return true;
    
    } else {
      /* Find a file that matchs this-format */
      $new_layout_file = str_replace($find, $replace, $layout_file);

      if (file_exists($full_layout_directory . $new_layout_file)) {
        include($full_layout_directory . $new_layout_file);
        return true;
      }
    }

    /**
     * If no files can be matched,
     * and WP DEBUG is true: throw a warning.
     */
    if (WP_DEBUG) {
      echo "<pre>ACF_Modules: No layout template found for $layout.</pre>";
    }
    
    return false;
  }

  /**
   * Render
   *
   * @param  {string} $layout
   * @return {string}
   */
  static function render($layout, $data = null) {
    return self::get_layout($layout, $data);
  }
}

?>