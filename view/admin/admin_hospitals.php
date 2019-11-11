<head>
    <link rel="stylesheet" type="text/css" href="css/admin_hospitals_file.css"/>
	<script src="js/admin_hospitals_file.js" type="text/javascript" defer></script>
	<script src='js/jquery-3.4.1.min.js'></script>
</head>
<?php
    $api_obj = new api_1(new DB,"hospital");
    $result = $api_obj->get_details("h_name,latitude,longitude,phone_number,address,verified","");
    echo "<div id='admin-hospital-details'>";
    echo "<h1 style='color: blue;'> ALL HOSPITALS DETAILS </h1>";
    if(isset($result))
    {
        echo "<table width=100% cellpading=15px align='center'>
                    <tr style='transform: none;'>
                    <td>
                    <h2>Hospital Name</h2>
                    </td>
                    <td>
                    <h2>Latitude and Longitude<h2>
                    </td>
                    
                    <td>
                    <h2>Address</h2>
                    </td>
                    <td colspan=2>
                    <h2>Action</h2>
                    </td>
                    </tr>";
        for( $i = 0; $i < count($result) ;$i++)
        {
            $uname_arg = "'".$result[$i]["h_name"]."'";
            echo "<tr><td><a href='?action=view-profile&type=hospital&uname=".$result[$i]["h_name"]
            ."'>".$result[$i]["h_name"]."</a></td><td>".
            $result[$i]["latitude"]." and ".$result[$i]["longitude"]."</td>"."<td>".$result[$i]["address"]."</td>";
            if($result[$i]["verified"] == 1)
            {
                echo '<td colspan=2><button type="button" onclick="verify('.$uname_arg.',2)">'.
                "Delete Hospital's Details </button></td></tr>";
            }    
            else
            {
                echo '<td><button type="button" onclick="verify('.$uname_arg.',1)">
                Verify Hospital </button></td>'.'<td><button type="button" onclick="verify('.$uname_arg.',2)">
                Reject Hospital </button></td></tr>';
            }
               
        }
        echo "</table>";
    }
    else
    {
        echo "<div style='padding: 50px; text-align: center; color: red;font-size: 40px;'>No Hospitals Yet Registered !!!</div>";
    }
    echo "</div>";
?>