/** -------------------------------------------------------------------
Validates
* ------------------------------------------------------------------- */
$("form").on("submit", function(e){
  
  var errorMessage  = $(".error-message");
  var hasError = false;
  //var email		= 'input[type="email"]';
  //var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  $("input:not(:hidden), select, #lead_vehicle_make_id").each(function(){
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
