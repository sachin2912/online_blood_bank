<?php
    if ( isset( $_SESSION["uname"] ) && $_SESSION["type"] == "hospital" )
    {
        $h_name=$_SESSION["uname"];
        $api_obj = new api_1(new DB,"hospital");
        $condition = " where h_name = '$h_name'";
        $result=$api_obj->get_details("address,latitude,longitude",$condition);

    }

?>
<head>
<meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"
  type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"
  type="text/javascript" charset="utf-8"></script>
</head>
<div style="width: 640px; height: 480px" id="mapContainer"></div>

<script>
var platform = new H.service.Platform({
    'apikey': 'zluYyS_KqQjpwtE9Sb3xRZITeU9EcxD_xApSq89dyA8'
    });
    var maptypes = platform.createDefaultLayers();

// Instantiate (and display) a map object:
var map = new H.Map(
document.getElementById('mapContainer'),
maptypes.vector.normal.map,
{
  zoom: 12,
  center: { lng: 73.8567, lat: 18.5204 }
});
</script>