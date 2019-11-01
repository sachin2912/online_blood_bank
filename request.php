<?php
    if ( isset( $_SESSION["uname"] ) && $_SESSION["type"] == "hospital" )
    {
        $h_name = $_SESSION["uname"];
        $api_obj = new api_1(new DB,"hospital");
        $condition = " where h_name='$h_name'";
        $result = $api_obj->get_details("address,latitude,longitude",$condition);
        echo $result[0]["address"];

        $api_obj_1 = new api_1(new DB,"user");
        $users_details = $api_obj_1->get_details("*","");
        $acc_users=[];
        for( $i = 0 ; $i < count( $users_details ) ; $i++)
        {
          if (cal_distance($users_details[$i]["latitude"],$users_details[$i]["longitude"],$result[0]["latitude"],$result[0]["longitude"]) < 10 )
          {
            
            $acc_users[] = $users_details[$i];
            
          }
        }
        
        

        
         
    }
?>
<head>
  <meta name="viewport" content="initial-scale=1.0, width=device-width" />
  <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-clustering.js" type="text/javascript" charset="utf-8"></script>
</head>
<div id="request-main">
<div id="requests-users-details" style="width: 640px; height: 480px; float: left;">
  <?php
    echo "<table cellpadding='3px' width='100%' >"
    for( $i = 0; $i < count($acc_users); $i++)
    {
      echo "<tr height='100px' ><td width='20%'>$i</td>
      <td>".$acc_users[$i]["fname"]." ".$acc_users[$i]["lname"]."</td>
    }
  ?>
</div>
  <div style="width: 640px; height: 480px; float: right;" id="mapContainer"></div>

<script>
  var platform = new H.service.Platform({
    'apikey': 'zluYyS_KqQjpwtE9Sb3xRZITeU9EcxD_xApSq89dyA8'
    });
    var svgMarkup = '<svg width="24" height="24" ' +
  'xmlns="http://www.w3.org/2000/svg">' +
  '<rect stroke="white" fill="#1b468d" x="1" y="1" width="22" ' +
  'height="22" /><text x="12" y="18" font-size="12pt" ' +
  'font-family="Arial" font-weight="bold" text-anchor="middle" ' +
  'fill="white">H</text></svg>';
  var maptypes = platform.createDefaultLayers();
  var icon = new H.map.Icon(svgMarkup),
  coords = {lng: <?php echo $result[0]["longitude"]; ?>, lat: <?php echo $result[0]["latitude"];?>},
  marker = new H.map.Marker(coords, {icon: icon});
  var dataPoints = [];
  <?php 
  for($i = 0; $i < count($acc_users) ; $i++)
  {
  echo "dataPoints.push(new H.clustering.DataPoint(".$acc_users[$i]["latitude"].",".$acc_users[$i]["longitude"]."));";
  }
  ?>
var map = new H.Map(
document.getElementById('mapContainer'),
maptypes.vector.normal.map,
{
  zoom: 10,
  
});
map.addObject(marker);
map.setCenter(coords);
var clusteredDataProvider = new H.clustering.Provider(dataPoints);

// Create a layer that includes the data provider and its data points: 
var layer = new H.map.layer.ObjectLayer(clusteredDataProvider);

// Add the layer to the map:
map.addLayer(layer);
</script>
