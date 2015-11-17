/** -------------------------------------------------------------------
Validatior
Author: Stephen Scaff
Dependencies: _forms.scss

A super simple validation. add an empty div (.error-message) to render notice bar

* ------------------------------------------------------------------- */
$("form").on("submit", function(e){
  
  var errorMessage  = $(".error-message");
  var hasError = false;
  //var email		= 'input[type="email"]';
  //var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  $("input:not(:hidden), select").each(function(){
    var $this = $(this);
    
    if($this.val() === ""){
      hasError = true;
      $this.addClass("input-error");
      errorMessage.html("<div class='alert-box'><p>Whoops! You missed a few fields. Please correct the errors and resubmit</p></div>");
      e.preventDefault();
    }if($this.val() !== ""){
      $this.removeClass("input-error"); 
    }else{
      return true; 
    }
  }); //Input
  

  errorMessage.fadeIn('slow').addClass("fade-down");

}); //Form .submit
