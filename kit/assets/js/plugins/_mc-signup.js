/*----------------------------------------------   
Mail Chimp Signup
-----------------------------------------------  */
$(function () {
  var $form = $('#mc-embedded-subscribe-form');

  $('#mc-embedded-subscribe').on('click', function(event) {
    if(event) event.preventDefault();
    register($form);
  });
});

function register($form) {
  $.ajax({
    type: $form.attr('method'),
    url: $form.attr('action'),
    data: $form.serialize(),
    cache       : false,
    dataType    : 'json',
    contentType: "application/json; charset=utf-8",
    error       : function(err) { $('#notice-bar').html('<span class="alert">Could not connect to server. Please try again later.</span>'); },
    success     : function(data) {
     
      if (data.result != "success") {
        var message = data.msg.substring(4);
        $('#notice-bar').addClass("error").fadeIn(300).html('<span class="alert">'+message+'</span>');
      } 

      else {
        var message = data.msg;
        $('body').addClass("submit-success");
        $('.sect-form').addClass("fade-out-fast");
        $('#notice-bar').removeClass("error").addClass("success fade-in").html('<span class="success">'+message+'</span>');
        
        
        setTimeout(function(){
        $('.sect-yeah').addClass("fade-in");
          $('#notice-bar').addClass('fade-out').removeClass("fade-in"); 
         },2700); 
         
      }
    }
  });
}

/*--------------------------
Usage
----------------------------
	<article class="rel-wrap">	
		
		<section id="mc_embed_signup" class="sect-form">
	  <form action="http://urbaninfluence.us1.list-manage.com/subscribe/post-json?u=LIST-API-NUMBER&amp;id=LIST_ID&amp;c=?" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	  	<div class="row">
	    <div class="g-8 cols">
	    	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Sign Up For Updates" required>
	    	<div style="position: absolute; left: -5000px;"><input type="text" name="b_58abcfa203271a9db312e69fc_ee0af79b60" value=""></div>
	  		</div>
	  		<div class="g-4 cols">
	    	<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
	    </div>
	   </div>
	  </form>
  </section>
  
  <section class="sect-yeah">
  	<div class="row">
  		<p>Thanks for Signing up! Stay tuned for more from Daddy Gray Beard</p>
  	</div>
  </section>
	</div>
  <div id="notice-bar"></div>
 </article>
 
------------------------------ */
