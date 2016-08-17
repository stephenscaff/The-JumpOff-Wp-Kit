/*----------------------------------------
A file/image upload button
Dependancies: modules/_forms.scss
------------------------------------------*/

var SITE = SITE || {};
 
SITE.fileInputs = function() {
  var $this = $(this),
  $val = $this.val(),
  valArray = $val.split('\\'),
  newVal = valArray[valArray.length-1],
  $button = $this.siblings('.btn'),
  $fakeFile = $this.siblings('.file-holder');

  if(newVal !== '') {
    $button.text('Photo Chosen');
    if($fakeFile.length === 0) {
      $button.after('<span class="file-holder">' + newVal + '</span>');
    } else {
      $fakeFile.text(newVal);
    }
  }
};

$('.file-wrapper input[type=file]').bind('change focus click', SITE.fileInputs);
