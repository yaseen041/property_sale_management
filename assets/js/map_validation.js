var autocomplete1;
var input1;
function initialize_filter_loc() {
      var input2 = /** @type {HTMLInputElement} */(
        document.getElementById("filter_business_location"));
      var cntry = 'UK';
      var options = {
          componentRestrictions: {country: cntry}
      };
      var autocomplete2 = new google.maps.places.Autocomplete(input2, options);

      google.maps.event.addListener(autocomplete2, "place_changed", function() {
       
      //infowindow.close();
      //marker.setVisible(false);
      var place = autocomplete2.getPlace();
      if (!place.geometry) {
        return;
      }
      // get lat
      var lat = place.geometry.location.lat();
      // get lng
      var lng = place.geometry.location.lng();
      //var point = marker.getPosition();
      //map.panTo(point);
      document.getElementById("filter_lat_long").value=lat+", "+lng;
      });
 }
 function initialize() {
      input1 = /** @type {HTMLInputElement} */(
        document.getElementById("property_lat_long"));
      var cntry = 'UK';
      var options = {
          componentRestrictions: {country: cntry}
      };
      autocomplete1 = new google.maps.places.Autocomplete(input1, options);

      google.maps.event.addListener(autocomplete1, "place_changed", function() {
       
      //infowindow.close();
      //marker.setVisible(false);
      var place = autocomplete1.getPlace();
      if (!place.geometry) {
        return;
      }
      // get lat
      var lat = place.geometry.location.lat();
      // get lng
      var lng = place.geometry.location.lng();
      //var point = marker.getPosition();
      //map.panTo(point);
      document.getElementById("lat_long").value=lat+", "+lng;
      });
 }
 function ButtonClick() {
    var f;
    var b = "",
        a = "",
        e = "",
        d = "";
    if (input1.value.trim() == "") {
        $.gritter.add({

                    title: 'Error!',

                    sticky: false,

                    time: '5000',

                    before_open: function(){

                    if($('.gritter-item-wrapper').length >= 3)

                    {

                      return false;

                    }

                    },

                    text: 'Invalid Location',

                    class_name: 'gritter-error'

                  });
        //alert('Invalid input for "PickUp" location. Please select from the dropdown list.');
        return
    }
    var i = autocomplete1.getPlace();
    if (i != undefined && i.place_id != undefined) {
        b = i.place_id;
        e = input1.value
    }
    if (b == "") {
        f = new google.maps.places.AutocompleteService();
        var g = input1.value.trim() + ",";
        f.getPlacePredictions({
            input: g,
            componentRestrictions: {
                country: 'ZA'
            }
        }, function(l, j) {
            if (j == google.maps.places.PlacesServiceStatus.OK) {
                var k = l[0];
                b = k.place_id;
                e = input1.value.trim();
            } else {
               $.gritter.add({

                    title: 'Error!',

                    sticky: false,

                    time: '5000',

                    before_open: function(){

                    if($('.gritter-item-wrapper').length >= 3)

                    {

                      return false;

                    }

                    },

                    text: 'Invalid Location',

                    class_name: 'gritter-error'

                  });
                
                return
            }
        })
    }
} 
//initialize_filter_loc();
initialize();