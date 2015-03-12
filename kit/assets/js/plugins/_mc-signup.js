/** http://stackoverflow.com/a/15120409/477958 **/
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
    error       : function(err) { $('#sect-notice').html('<span class="alert">Could not connect to server. Please try again later.</span>'); },
    success     : function(data) {
     
      if (data.result != "success") {
        var message = data.msg.substring(4);
        $('#sect-notice').addClass("error").fadeIn(300).html('<span class="alert">'+message+'</span>');
      } 

      else {
        var message = data.msg;
        $('body').addClass("submit-success");
        $('.sect-form').addClass("fade-out-fast");
        $('#sect-notice').removeClass("error").addClass("success fade-in").html('<span class="success">'+message+'</span>');
        
        /*
        setTimeout(function(){
        $('.sect-success').addClass("fade-in");
        $('#sect-notice').addClass('fade-out').removeClass("fade-in");
         },2700); 
      
      setTimeout(function(){
        $('.sect-success').addClass("fade-in");
          $('#sect-notice').css('z-index', '-1'); 
         },3300); 
         
         */
         
       $('#sect-notice').addClass("fade-out").afterTime(3000,function(){
           //$('#sect-notice').addClass('fade-out').removeClass("fade-in");
           $(this).slideUp( "300", function() {
               $(this).afterTime(5000,function(){
                   $(this).remove();    
               });
             });
              
       });  
      }
    }
  });
}
