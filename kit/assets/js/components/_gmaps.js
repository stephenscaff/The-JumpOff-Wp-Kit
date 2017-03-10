var VcardMap = (function() {
  var s;
  var icon = {
    url: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFIAAABsCAYAAAD5XOVGAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAABClJREFUeNrsndFt2zAQhmkh79YGzgbxAAWivBeoN3AyQdQJ6m6gbiBPUAfIe2Ug77UniDRBrQlSsj2jRtAEong8Huk7gECCyJb56T/yjjw6k5eXFyXmbpkgEJACUkCKCUgBKSAFpJiAFJACUuyvXbi+wYfiI9ZnuYRW6JbrNn/juhbaDlrrctOn5pEHSEdbQDPwZgNfc/3q9063RrcNtDgVOVJ5pW63uk0R3s88gCW0HmBWoNYkx0gDsNbtWbd7JIivbQpAf4JKi5RA5qCQZ+gklZkh4Ac8vDx2kAW42H3AcXgJE9IiVpAVKGKmwptx+e8+1Zl5cuUmsArfU2fjA2bmCeI149j5Cj7jJVeQR4hXESQiVzB259xAxgTxdNxsdGaWcwJZRQbxVJkbLiBL4vgQPd7Uqqxc32TiUiCgP8AcsogU7OapeWxCKbJS6VgdxLW1Gm+ZhznWix+6T6sQilyp9KwcO4tnDmqcJQhyCpMnmSJTVKOTKrMRalwkqsZTVS4oFLlQ6VspIJEyHu15l95AgltP1XlY4VORhTofs+qr7S7inLgzZqu1hZ9zRbsw4lWRVCD3JvdV/woGCrj3DfyNJNPxAhJiqykRRAPufwsIDQBdU5DUfS58KJJCjT1APAwITzpOAyq3IqpqAEQF11BkV/NYQTYW11LU+eTnAPIgro0zDucCEid2Kzh5iA1IijK50tO1fBT51DxSjEkmCK4HXGdmbO/bHDabYbauvSWAuYQZOX9jXDQh0hei9NRbrr1TNBten3T7BRnMMdc26SLl6tPON0hKC1l4YNVXW9du1PmYVV+tKy10It+qtPds/uT8eqLJfSryXFRp3ccxIDdnAHLjHaSWvLlJL4rESRFTVuVei6UVkO42qsJuFMjE3XtDBhKsThDieuyaQkbtAsxttDhGg4QBeZsQxE5Kn3Fs5fLiieu39SWSMlqnhNiKdH6SMYc82CDNAN3FrEYuIGNXZYWxjYIFMlZVoqgRE2Ssqlxhbephgqwjiys7zPANu0AgJlWi7otjgzSZwToCiFuFvIKVeXrS3FeGbrHf0AfIA3MX/6ocv0+NCuQxU+A48XS+HnLm2X361F2aAmTLzMW/KY9byb7rI7m4+N73Q82I3Kln4NKH2EG2PsemAfZZERR/UZU+bwIF6g+KaBU/I3avPeH9OkpPoC7GXxCNlz3c65AqyFbRHJwvVcLfsXu0BiYAn/FiTd2pUOdsKk+Tz4MKdGwk5IEl7MlnHzLMCn3yq0CCOfR4crIgDwgzeXCIHEAeZ/JiJMwjxF3oTnA51LkbCbPkAJETyFOYQ+1OMarR5HbMeAeAooLIEaQCQHcxQeQK8j2YLCFyBnkKs+cO0diF4m01jJtzxbz4fyL/Xzt91xaQAlJMQApIASkmIAWkgBSQYgKS1H4LMADuPv4w1aVnhQAAAABJRU5ErkJggg==', // url
    scaledSize: new google.maps.Size(30, 41), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
  };

  /**
   * Settings
   */
  var settings = {
    cityMapRender: $('.js-map'),
    cityMarker: $('.marker'),
    self: null
  };

  return {
    /**
     * Init
     */
    init: function() {
      s = settings;
      this.renderMap();
    },

    /**
     * RednerMap
     */
    renderMap: function(){

      var styles = [{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}];

      // Map Args
      var args = {
        zoom: 6,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: styles,
        scrollwheel: false,
        disableDefaultUI: false,
        mapTypeControl: false,
      };

      /**
       *  Parse Address markup to create map location
       */
      s.cityMapRender.each(function(index, Element) {
        
        $el = $(Element);

        //Map vars
        var map;
        var geocoder;
        var marker;
        var address = 
        $el.children('.city').text() + ', ' + 
        $el.children('.state').text() + ' ' + 
        $el.children('.country').text();
        
        // New Google Geocoder
        geocoder = new google.maps.Geocoder();
      
        // Geocode that Address son
        geocoder.geocode({ 'address': address }, 

        function(results, status) {
      
          // Status check
          if (status === google.maps.GeocoderStatus.OK) {

            args.center = results[0].geometry.location;
          
            map = new google.maps.Map(Element, args);
          
            // Center on resize
            CityMap.centerMapResize(map);
          
            //Marker customizations  
            marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location,
              animation: google.maps.Animation.DROP,
              icon: 'http://127.0.0.1/inrix/wp-content/themes/inrix/assets/images/scorecards/gps-marker.png',
            });
          } 
        });
      });  
    },

    /**
     * Center Map on Resize
     */
    centerMapResize: function(map){
      google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
      });
    },
  };
})();

VcardMap.init();