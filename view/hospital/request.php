<?php
  function display_users($users,$bd_gp_arr)
  {
    
    $result_table = "<table cellpadding=3px width=100%>";
    $count=0;
    for( $i = 0; $i < count($users); $i++)
    {
      if (in_array( $users[$i]["blood_group"] , $bd_gp_arr ) )

      {
        $count++;
        $arg = '"'.$users[$i]["uname"].'","'.$_SESSION["uname"].'"';
        $result_table.= "<tr><td><table class='zoom-class'><tr height=20px> <td> S.no </td> 
        <td> Name </td>
        <td> Blood Group </td>
        <td> Address </td>
        <td> Email </td>
        <td> Mobile Number </td>
        </tr>";
        $result_table.= "<tr height=100px><td>".($i+1)."</td><td>"
        .$users[$i]["fname"]." ".$users[$i]["lname"]."</td><td>".
        $users[$i]["blood_group"]."</td><td>".
        $users[$i]["user_address"]."</td><td>".$users[$i]["email"].
        "</td><td>".$users[$i]["mobile_number"]."</td></tr>
        <tr><td colspan='6' align='center'><button class='request-btn' id='".$users[$i]["uname"]."-request-btn' onclick='sendemail($arg)' >Request for Blood
        </button></td></tr></table></td></tr>";
      }
    }

    $result_table.= "</table>";

    echo "<div id='snackbar'></div>";
    if ( $count == 0 )
    {
      return "No Users Found!!!!!!!!";
    }
    return $result_table;
  }
    if ( isset( $_SESSION["uname"] ) && $_SESSION["type"] == "hospital" )
    {
        $h_name = $_SESSION["uname"];
        $api_obj = new api_1(new DB,"hospital");
        $condition = " where h_name='$h_name'";
        $result = $api_obj->get_details("address,latitude,longitude",$condition);
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
  <link rel="stylesheet" type="text/css" href="css/request_file.css"/>
  <script src="js/request_file.js" type="text/javascript" defer></script>
  <script src='js/jquery-3.4.1.min.js'></script>
  
  <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-clustering.js" type="text/javascript" charset="utf-8"></script>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
</head>
<div id="request-main">
  <h1 style="text-align: center;"> Select the Blood Group for donatation <h1>
  <div id="filter-list">
    <button  id="btn-O+">O+</button>
    <button  id="btn-A+">A+</button>
    <button  id="btn-B+">B+</button>
    <button id="btn-AB+">AB+</button>
    <button  id="btn-O-">O-</button>
    <button  id="btn-A-">A-</button>
    <button  id="btn-B-">B-</button>
    <button  id="btn-AB-">AB-</button>
    
  </div>
  <div id="requests-users-details" style="width: 50%; float: left;">
    <?php
      $arrall = ["O+","O-","A+","A-","B-","B+","AB+","AB-"];
      echo display_users($acc_users,$arrall);
    ?>
  </div>
  <div style="display: none;" id="O_pos_view">
        <?php 
        
        $arr= ["O+","O-"];
        echo display_users($acc_users,$arr); 
        ?>
  </div>
  <div style="display: none;" id="O_neg_view">
      <?php 
        $arr= ["O-"];
        echo display_users($acc_users,$arr); 
        ?>
  </div>
  <div style="display: none;" id="A_pos_view">
  <?php 
        $arr= ["O+","O-","A+","A-"];
        echo display_users($acc_users,$arr); ?>
  </div>
  <div style="display: none;" id="A_neg_view">
  <?php 
        $arr= ["A-","O-"];
        echo display_users($acc_users,$arr); 
        ?>
  </div>
  <div style="display: none;" id="B_pos_view">
  <?php 
        $arr= ["B+","B-","O+","O-"];
        echo display_users($acc_users,$arr); ?>
  </div>
  <div style="display: none;" id="B_neg_view">
  <?php 
        $arr= ["B-","O-"];
        echo display_users($acc_users,$arr); ?>
  </div>
  <div style="display: none;" id="AB_pos_view">
  <?php 
        $arr= ["O+","O-","A+","A-","B-","B+","AB+","AB-"];
        echo display_users($acc_users,$arr); ?>
  </div>
  <div style="display: none;" id="AB_neg_view">
    <?php 
      $arr= ["B-","O-","A-","AB-"];
      echo display_users($acc_users,$arr); 
    ?>
  </div>
    <div style="width: 40%; height: 80%; float: right;" id="mapContainer"></div>

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
   
    var ui = H.ui.UI.createDefault(map, maptypes);
    var zoom = ui.getControl('zoom');
    </script>
</div>