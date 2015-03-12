/*----------------------------------------
* google maps - 
* parse text form markup to build via jquery
------------------------------------------*/
$(document).ready(function() {
  $maps = $('.map_canvas');
  $maps.each(function(index, Element) {
    $infotext = $(Element).children('.infotext');
    
    //Styles
    var styles = [{
      "featureType": "all",
      "elementType": "labels.text.fill",
      "stylers": [{
        "saturation": 36
      }, {
        "color": "#78a596"
      }, {
        "lightness": 10
      }]
    }, {
      "featureType": "all",
      "elementType": "labels.text.stroke",
      "stylers": [{
        "visibility": "on"
      }, {
        "color": "#000000"
      }, {
        "lightness": 16
      }]
    }, {
      "featureType": "all",
      "elementType": "labels.icon",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "administrative",
      "elementType": "geometry.fill",
      "stylers": [{
        "color": "#111111"
      }, {
        "lightness": 50
      }]
    }, {
      "featureType": "administrative",
      "elementType": "geometry.stroke",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 17
      }, {
        "weight": 1.2
      }]
    }, {
      "featureType": "administrative",
      "elementType": "labels",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "administrative.country",
      "elementType": "all",
      "stylers": [{
        "visibility": "simplified"
      }]
    }, {
      "featureType": "administrative.country",
      "elementType": "geometry",
      "stylers": [{
        "visibility": "simplified"
      }]
    }, {
      "featureType": "administrative.country",
      "elementType": "labels.text",
      "stylers": [{
        "visibility": "simplified"
      }]
    }, {
      "featureType": "administrative.province",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "administrative.locality",
      "elementType": "all",
      "stylers": [{
        "visibility": "simplified"
      }, {
        "saturation": "-100"
      }, {
        "lightness": "30"
      }]
    }, {
      "featureType": "administrative.neighborhood",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "administrative.land_parcel",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "landscape",
      "elementType": "all",
      "stylers": [{
        "visibility": "simplified"
      }, {
        "gamma": "0.00"
      }, {
        "lightness": "74"
      }]
    }, {
      "featureType": "landscape",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 20
      }]
    }, {
      "featureType": "landscape.man_made",
      "elementType": "all",
      "stylers": [{
        "lightness": "3"
      }]
    }, {
      "featureType": "poi",
      "elementType": "all",
      "stylers": [{
        "visibility": "off"
      }]
    }, {
      "featureType": "poi",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 21
      }]
    }, {
      "featureType": "road",
      "elementType": "geometry",
      "stylers": [{
        "visibility": "simplified"
      }]
    }, {
      "featureType": "road.highway",
      "elementType": "geometry.fill",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 15
      }]
    }, {
      "featureType": "road.highway",
      "elementType": "geometry.stroke",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 29
      }, {
        "weight": 0.2
      }]
    }, {
      "featureType": "road.arterial",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 18
      }]
    }, {
      "featureType": "road.local",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 16
      }]
    }, {
      "featureType": "transit",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 19
      }]
    }, {
      "featureType": "water",
      "elementType": "geometry",
      "stylers": [{
        "color": "#000000"
      }, {
        "lightness": 17
      }]
    }];
    
    //Options
    var myOptions = {
      'zoom': parseInt($infotext.children('.zoom').text()),
      'mapTypeId': google.maps.MapTypeId.ROADMAP,
      'mapTypeControl': false,
      'scrollwheel': false,
      'zoom': 16,
      'disableDefaultUI': true,
      'styles': styles
    };
    
    //Center on Resize
    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center); 
    });
    //map.setOptions({styles: styles});
    var map;
    var geocoder;
    var marker;
    var infowindow;
    var address = $infotext.children('.address').text() + ', ' + $infotext.children('.city').text() + ', ' + $infotext.children('.state').text() + ' ' + $infotext.children('.zip').text() + ', ' + $infotext.children('.country').text();
    var content = '<strong>' + $infotext.children('.location').text() + '</strong><br />' + $infotext.children('.address').text() + '<br />' + $infotext.children('.city').text() + ', ' + $infotext.children('.state').text() + ' ' + $infotext.children('.zip').text();
    if (0 < $infotext.children('.phone').text().length) {
      content += '<br />' + $infotext.children('.phone').text();
    }
    
    geocoder = new google.maps.Geocoder();
    
    geocoder.geocode({
      'address': address
    }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        myOptions.center = results[0].geometry.location;
        map = new google.maps.Map(Element, myOptions);
        marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
          animation: google.maps.Animation.DROP,
          color: '#000',
          title: $infotext.children('.location').text()
        });
        
        //Info Tile: Build with content
        infowindow = new google.maps.InfoWindow({
          'content': content
        });
        
        //Info Tile: Open on load
        google.maps.event.addListener(map, 'tilesloaded', function(event) {
          infowindow.open(map, marker);
        });
        
        //Info Tile: click to open
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
        });
      } else {
        alert('The address could not be found for the following reason: ' + status);
      }
    });
  });
});