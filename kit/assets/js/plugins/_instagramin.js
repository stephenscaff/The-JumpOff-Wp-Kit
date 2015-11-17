/*----------------------------------------------   
Everyday I'm Instagrammin
everydayiminstagrammin.stephenscaff.com
Author: Stephen Scaff
-----------------------------------------------  */ 

(function($) {
  $.everydayImInstagrammin = {
    defaults: {
      clientID: 'null',
      accessToken: 'null',
      numberPics: '12',
      imgClass: 'everyday-img',
      fadeInTime: '8500',
      sequenceFadeIn: 'true',
      captions: 'false',
      captionAlign: 'bottom',
      cappy: 'false'
    }
  };
  $.fn.extend({
    everydayImInstagrammin: function(options) {
      $.extend($.everydayImInstagrammin.defaults, options);
      return this.each(function() {
        var elem = $(this);
        var clientID = options.clientID;
        var accessToken = options.accessToken;
        var numberPics = options.numberPics;
        var liClass = options.liClass;
        var imgClass = options.imgClass;
        var sequenceFadeIn = options.sequenceFadeIn;
        var captionAlign = options.captionAlign;
        var instaUrl = 'https://api.instagram.com/v1/users/' +
          clientID + '/media/recent/?access_token=' + accessToken +
          '&callback=?';
        $.ajax({
          type: "GET",
          dataType: "jsonp",
          cache: false,
          url: instaUrl,
          success: function(data) {
            for (var i = 0; i < options.numberPics; i++) {
              if (options.captions == 'true') {
                elem.append(
                  "<li class='everyday-item'><a target='_blank' href='" +
                  data.data[i].link + "'><img class='" +
                  options.imgClass + "' src='" + data.data[
                    i].images.standard_resolution.url +
                  "' /><div class='everyday-caption'><p>" +
                  data.data[i].caption.text +
                  "</p></div></a></li>");
              } else {
                elem.append(
                  "<li class='everyday-item'><a target='_blank' href='" +
                  data.data[i].link + "'><img class='" +
                  options.imgClass + "' src='" + data.data[
                    i].images.standard_resolution.url +
                  "'  /></a></li>");
              }
            }
            if (options.captionAlign == 'bottom') {
              $('.everyday-caption p').css({
                position: 'absolute',
                bottom: '10px'
              });
            }
            if (options.captionAlign == 'top') {
              $('.everyday-caption p').css({
                position: 'absolute',
                top: '10px'
              });
            }
            if (options.sequenceFadeIn = 'true') {
              var eT = 0;
              $('img.insta-img').hide().each(function() {
                $(this).delay(eT).fadeIn(1000);
                eT += 350;
              });
            }
            //captions
            $("li.everyday-item a").on({
              mouseenter: function() {
                $(".everyday-caption", this).filter(
                  ':not(:animated)').fadeIn(400);
              },
              mouseleave: function() {
                $(".everyday-caption", this).fadeOut(
                  400);
              }
            });
          }
        });
      });
    }
  });
})(jQuery);
$('.instagram').everydayImInstagrammin({
  clientID: '300619084',
  accessToken: '300619084.5b9e1e6.230b0dbc78ad48ad87cca3a1b91b8ec2',
  numberPics: '12',
  imgClass: 'insta-img',
  sequenceFadeIn: 'false', 
  captions: 'true',
  captionAlign: 'bottom',
  fadeInTime: '5000'
});
