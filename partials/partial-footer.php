<?php
/**
 * Partial: partials/partial-footer
 *
 * @author    Stephen Scaff
 * @package   jumpoff/partials/partial-footer
 * @version   1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>
<footer class="footer-main">
 <div class="row-xl">
  <div class="g-8 cols">
   <img class="logo" src="<?php bloginfo('template_directory'); ?>/assets/images/logo-dark.png" alt="" />
   <nav>
   <ul>
    <li><a href="#">Facebook</a></li>
    <li><a href="#">Twitter</a></li>
    <li><a href="#">Etsy</a></li>
    <li><a href="#">Instagram</a></li>
    <li><a href="#">Linked In</a></li>
   </ul>
   </nav>
  </div>
  <div class="g-4 cols">
  <p class="credits">© The Jumpoff. All rights reserved.<br/>
  Made by Urban Influence in Seattle, WA. <br/>
  Ph. (425) 213-0804. XLI rules. <br/>
  </p>
  </div>  
 </div>
</footer>

<!-- Le javascript
================================================== --> 
<?php wp_footer(); ?>

</body>
</html>