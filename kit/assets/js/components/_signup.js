/*----------------------------------------   
-Mail CHimp Signup

@useage:

<section class="signup">
    <h3 class="signup__title">Stay up to date with DNA</h3>
    <!-- Signup Form -->
    <form class="signup__form" id="mc-signup" name="mc-embedded-subscribe-form"  action="https://LISTUSERNAME.us10.list-manage.com/subscribe/post-json?u=LISTIDS&amp;c=?" method="POST" target="_blank" novalidate>
      <div class="signup__inputs">
        <input class="signup__input   email" id="mce-EMAIL" name="EMAIL"  value="" type="email" aria-label="Email Address" aria-required="true" required="" placeholder="your@youremail.com">
        <div style="position: absolute; left: -5000px;"><input type="text" name="LISTIDS" value=""></div>
        <button class="signup__submit  signup__btn btn-signup" value="Subscribe" name="subscribe" id="mc-submit"  aria-label="Submit" title="Submit"><span>Get News <i class="icon-right"></i></span></button>
      </div>
    </form>

    <!-- Signup Message -->
    <div class="signup__message">
      <p>Thanks for signing up for updates</p>
    </div> 
</section>
-----------------------------------------*/

function register($form) {
  $.ajax({
    type: $form.attr('method'),
      url: $form.attr('action'),
      data: $form.serialize(),
      timeout: 5000, // Set timeout value, 5 seconds
      cache       : false,
      dataType    : 'jsonp',
      contentType: "application/json; charset=utf-8",
      error       : function(err) { $('.signup-notice').html('<span class="alert">Sorry Dave. I can not do that. Try again later.</span>'); },
      success     : function(data) {
      var message;
      if (data.result !== "success") {
        message = data.msg.substring();
        $('.signup-notice').addClass("error").fadeIn(300).html('<span class="alert">'+message+'</span>');
      } 

      else {
        message = data.msg;
        $('body').addClass("submit-success");
        $('.signup').addClass("fade-out").fadeOut(500);
        $('.signup-notice').removeClass("error").addClass("success").html('<span class="success">'+message+'</span>');
        
        
        setTimeout(function(){
          $('.signup-notice.success').fadeOut(600); 
         }, 3000); 
      }
    }
  });
}

$(function () {
var $form = $('#mc-signup');

  $('#mc-submit').on('click', function(event) {
  if(event) event.preventDefault();
  register($form);
  });
});
