<?php
/**
 * Partial Signup
 *
 * MC Signup Partial
 *
 * @author    Stephen Scaff
 * @package   partials/
 * @version   1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$id = get_the_id();
$signup_title = get_field('signup_title', $post->ID);
$signup_text = get_field('signup_text', $post->ID);
$signup_img = get_field('signup_image', $post->ID);
$signup_cta_text = get_field('signup_cta_text', $post->ID);

?>


<?php if ($signup_cta_text) : ?>
<section class="cta cta--signup" data-scroll="stagger-up" data-theme="dark">
  <a class="cta__link" href="#" data-popup="signup-newsletter">
    <span class="btn-link btn--white"><span><?php echo $signup_cta_text; ?></span></span>
  </a>
</section>


<section id="signup-newsletter" class="popup" aria-hidden="true">  
  <button class="popup__close js-close-popup" aria-label="Close">
    <div class="popup__x"></div>
  </button> 

  <section class="modal modal--signup modal--dark">
    <div class="modal__col has-bg">
      <figure class="modal__bg" style="background-image: url(<?php echo $signup_img['url']; ?>)"></figure>
    </div>
    <div class="modal__col">
      <div class="modal__content">
        <h3 class="modal__title"><?php echo $signup_title; ?></h3>
        <p class="modal__text"><?php echo $signup_text; ?></p>
        

      <form id="mc-embedded-subscribe-form" class="signup-form form--minimal form--dark" name="mc-embedded-subscribe-form" action="https://sprealestate.us12.list-manage.com/subscribe/post-json?u=7f66acd0a723eb267712053a2&amp;id=e484081e75&amp;c=?" method="POST" target="_blank" novalidate>
      
          <div class="signup__inputs">
            
            <input class="signup-form__input" id="mce-FNAME" name="FIRSTNAME"  value="" type="text" aria-label="First Name" aria-required="true" required="" placeholder="First Name">
            <input class="signup-form__input" id="mce-LNAME" type="text" value="" name="LNAME" placeholder="Last Name" >
            <input class="signup-form__input" id="mce-PHONE" type="text" name="PHONE" class="required" value="" placeholder="Phone Number">
            <input class="signup__input email" id="mce-EMAIL" name="EMAIL"  value="" type="email" aria-label="Email Address" aria-required="true" placeholder="Enter you email address">
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_7f66acd0a723eb267712053a2_e484081e75" value=""></div>
            <input type="submit" class="signup__submit btn-link bt btn-signup" value="Subscribe" name="subscribe" id="mc-embedded-subscribe"  aria-label="Submit" title="Submit">
          </div>
        </form>

        <!-- Signup Message -->
        <div class="signup-message">
          <p>Thanks for signing up for updates</p>
        </div>   
      </div>
    </div>
  </section>
</section>

<section class="signup-notice">
  
</section>

<?php endif; ?>