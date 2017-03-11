/**
 * PopUps
 * For stuff like modals and popups. 
 * Uses data atts to support multiple unique instances.
 *
 * @version: 1.2 (added aria support)
 * @author  Stephen Scaff
 * @example <a href="" data-popup="modal-popup">Poppin and Rockin</a> 
 *          El to Popup <article id="modal-popup">Rock it don't stop</article>
 */

  var PopItUp = (function() {
    var s;

    /**
     * Settings
     */
    var settings = {
      autoOpen: $('[data-popup-init]'),
      openLink: $('[data-popup]'),
      closeLink: $('.js-close-popup'),
      body: $(document.body),
      //vimeoID: $('[data-vimeo-id]'),
      videoHolder:  $('.popup__vid'),
      self: null
    };

    return {
   
      /**
       * Init Popups
       */
      init: function() {
        s = settings;
        this.bindEvents();
      },

      /**
       * Bind Events
       */
      bindEvents: function(){
        
        // Auto Open
        if (typeof s.autoOpen.data('popup-init') !== 'undefined'){
          PopItUp.autoOpenPopUp();
        }

        // Opener
        s.openLink.on( 'click', function(e) {
          e.preventDefault();
          e.stopPropagation();
          s.self = this;
          PopItUp.openPopUp();
          
          // If we have a Vimeo ID
          if ($(this).data('vimeo-id')){
            PopItUp.playVideo();
          }
        });
        
        // Close Link
        s.closeLink.on( 'click', function(e) {
          e.preventDefault();
          PopItUp.closePopUp();
          PopItUp.stopVideo();
        });

        // Close on escape
        s.body.on("keyup click", function(e) {
          if (s.body.hasClass('popup--is-open') && e.which === 27) {
            PopItUp.closePopUp();
            PopItUp.stopVideo();
          } 
        });
      },

      /**
       * Auto Open
       */
      autoOpenPopUp: function(){
        s.autoOpen.addClass('is-open');
        s.body.addClass('popup--auto-open');
      },

      /**
       * Open PopUps
       */
      openPopUp: function(){
        var popup = $(s.self).data('popup');
        
        // Make sure we close any rouge autoOpens
        s.autoOpen.removeClass('is-open');

        // now, let's open that shit
        $('#'+popup).addClass('is-open').attr('aria-hidden', 'false');
        s.body.addClass('popup--is-open');
        // If popup has data-vid
          //if(s.vimeoID) { 
  
      },
      
      /**
       * Close Popups
       */
      closePopUp: function(){
        var popup = $(s.self).attr('data-popup');
        $('#'+popup).removeClass('is-open').attr('aria-hidden', 'true');
        s.body.removeClass('popup--is-open popup--auto-open');
        //s.body.removeClass('popup--auto-open');
      },

      /**
       * Play Video
       * Supports Vimeo for the full viewport vids
       */
      playVideo: function(){
        /** @todo Fix vimeoID 'this' scope */
        var vimeoID = $(s.self).data('vimeo-id'), 
            vimeoURL = 'https://player.vimeo.com/video/',
            vimeoPath = vimeoURL+vimeoID,
            vimeoColor = $(s.self).data('vimeo-color');


        $.getJSON('http://www.vimeo.com/api/oembed.json?url=' + encodeURIComponent(vimeoPath) + '&title=0&byline=0&color=' + vimeoColor + '&autoplay=1&callback=?', 
          
          function(data){
            s.videoHolder.html(data.html);
          });
      },

      /**
       * Stop Video
       * Just clear out vids
       */
      stopVideo: function(){
        //var vimeourl = $(".popup__vid").data('vid');
         $(".popup__vid").empty();
      },
    };
  })();
 PopItUp.init();