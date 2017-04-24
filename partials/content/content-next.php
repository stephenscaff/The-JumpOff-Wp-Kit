<?php
/**
* Content: Next
* Tempalte for displaying Next Post
*
* @author    Stephen Scaff
* @package   partials/content
* @version   1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<article class="banner banner--next">
  <a class="banner__link" href="<?php echo the_permalink($next_post); ?>">
    <figure class="banner__bg " style="background-image:url(<?php echo jumpoff_ft_img('full', $next_post) ?>)"></figure>
    <div class="grid">
      <header class="banner__header">
        <span class="banner__pretitle">Read Next</span>
        <h1 class="banner__title"><?php echo get_the_title($next_post); ?></h1>
        <span class="btn-line btn--white">Read Story</span>
      </header>
    </div>
  </a>
</article>