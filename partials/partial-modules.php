<?php
/**
 * Partial: Modules
 *
 * Calls our modules, using our ACF Modules class, which then class modules by name
 * from the partials/modules folder.
 *
 * @author    Stephen Scaff
 * @package   partials
 * @version   1.0
 * @see       inc/fields/class-acf-modules.php
 * @see       partials/moduels (for available modules)
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
// Modules
while (has_sub_field('modules')) :
  ACF_Modules::render(get_row_layout()); 
endwhile; 

?>