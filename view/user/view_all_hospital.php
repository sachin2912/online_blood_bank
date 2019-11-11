<head>
	<link rel="stylesheet" type="text/css" href="css/view_all_hospital_file.css"/>
	

</head>
<?php
    $api_obj = new api_1( new DB ,"hospital");
    $result = $api_obj->get_details("*","");
    echo "<div id='all-hospital-container'>";
        
    if ( isset($result) )
    {
        echo "
        <h1> Hospital Details </h1>
        <table width=100% cellpadding=10px align='center'>
        <tr>
        <td>
            Registration Number
        </td>
        <td>
            Name
        </td>
        <td>
            Website
        </td>
        <td>
            Contact Number
        </td>
        <td>
            Address
        </td>
        </tr>
        ";
        for( $i = 0 ; $i < count($result) ; $i++)
        {
            echo "<tr> <td>".$result[$i]["reg_no"]."</td>
            <td>".$result[$i]["h_name"]."</td><td><a href='http://www.".
            $result[$i]["website"]."' target='on_blank'>".$result[$i]["h_name"]."</a></td><td>".$result[$i]["phone_number"].
            "</td><td>".$result[$i]["address"]."</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<div style='top: 40%; right: 45%; color: red;'>No requests Made yet</div>";
        
    }
    echo "</div>";



?>