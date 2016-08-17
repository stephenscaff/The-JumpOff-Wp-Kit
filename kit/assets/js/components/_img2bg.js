/*---------------------------------------------
IMG 2 BG
takes an img and adds it as a bg image to it's parent.

@useage:
<figure class="js-imgbg">
  <img src="yourmom.jpg">
</figure>

----------------------------------------------*/
(function($) {
  var s,
  img2bg = {
    settings: {
      imgs: $('.js-imgbg'),
    },
    init: function() {
      s = this.settings;
      this.bindEvents();
    },
    bindEvents: function(){
      s.imgs.each(function() {
        var imageUrl = $(this).find('img').attr('src');
         $(this).css('background-image', 'url(' + imageUrl + ')');
         $(this).find("img").css("visibility", "hidden");
      });
    },
  };
  img2bg.init();
})(jQuery);


/*---------------------------------------------
Data to Bg
Gets data-att of image url and sets and bg image.
@useage:
<figure class="js-imgbg" data-bg-img="http://yourimage.jpg"></figure>
----------------------------------------------*/
(function($) {
  var s,
  data2Bg = {
    settings: {
      imgs: $('.mast__bg'),
    },
    init: function() {
      s = this.settings;
      this.bindEvents();
    },
    bindEvents: function(){
      s.imgs.each(function() {
        var imageUrl = $(this).data('bg-img');
         $(this).css('background-image', 'url(' + imageUrl + ')');
      });
    },
  };
  data2Bg.init();
})(jQuery);