/**
 * Mail Chimp Ajax Signup and interaction
 *
 * Currently used inside a signup modal.
 *
 * @see scss/components/_signup.scss
 * @see scss/components/_modals.scss
 * @see js/components/_popups.scss
 */

var MCSignUp = (function() {


  var $form = $('#mc-embedded-subscribe-form'),
      $formSubmit = $('#mc-embedded-subscribe'),
      $body = $('body'),
      $signupNotice = $('.signup-notice');
  

  return {
   
    /**
     * Init Popups
     */
    init: function() {
      this.bind();
    },

    /** 
     * Bind Function 
     */
    bind: function () {
      // On Signup form submit
      $formSubmit.on('click', function(e) {
        if(e) e.preventDefault();
          MCSignUp.registerForm();
      });
    },

    /** 
     * Register Form
     */
    registerForm: function (){
      $.ajax({
        type: $form.attr('method'),
        url:  $form.attr('action'),
        data: $form.serialize(),
        timeout: 5000, // Set timeout value, 5 seconds
        cache:   false,
        dataType:'jsonp',
        contentType: "application/json; charset=utf-8",
        
        // Error
        error: function(err) { 
          $('.signup-notice').html('<span class="alert">Sorry, please try again.</span>'); 
        },

        // Success
        success: function(data) {
          
          var message;
          
          if (data.result !== 'success') {
            // Data Message
            message = data.msg.substring();
            // Add error class
            $body.addClass('signup--error');
            console.log($body);
            console.log('nope');
            // Add error message
            $('.signup-notice').html('<span class="signup-notice__message">'+message+'</span>');

            // add Errors
            $('.signup-form__input').addClass('error');
          
          } else {
            console.log('yep');
            // Data Message
            message = data.msg;
            // Add success class
            $body.addClass('signup--success');
            // Add success message
            $signupNotice.html('<span class="signup-notice__message">'+message+'</span>');
            
            setTimeout(function(){
              // Remove error/success classesd
              $body.removeClass('signup--error signup--success');

              // Close Popups
              // @see js/components/_popups.js
              PopItUp.closePopUp();
            }, 4500); 
          }
        }
      });
    },
  };
})();
MCSignUp.init();

