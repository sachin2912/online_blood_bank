var add = document.getElementById("p").in;
var add_val = add.values;
function opp()
{
    alert("idhar");
var platform = new H.service.Platform
(
    {
    'apikey': 'zluYyS_KqQjpwtE9Sb3xRZITeU9EcxD_xApSq89dyA8'
  }
);
  
  // Get default map types from the platform object:
  
  // Instantiate the map:

  // Create the parameters for the geocoding request:
  var geocodingParams = 
    {
      searchText: add_val
    };
  
  // Define a callback function to process the geocoding response:
    var onResult = function(result) {
    var locations = result.Response.View[0].Result,
      
    for (i = 0;  i < locations.length; i++) {
    position = {
      lat: locations[i].Location.DisplayPosition.Latitude,
      lng: locations[i].Location.DisplayPosition.Longitude
    };
    }
    alert(position);
  };
  
  // Get an instance of the geocoding service:
  var geocoder = platform.getGeocodingService();
  
  // Call the geocode method with the geocoding parameters,
  // the callback and an error callback function (called if a
  // communication error occurs):
  geocoder.geocode(geocodingParams, onResult, function(e) {
    alert(e);
  });
}  