<head>
    <link rel="stylesheet" type="text/css" href="css/view_history_file.css"/>
    <script src="js/view_history_file.js" type="text/javascript" defer></script>
	<script src='js/jquery-3.4.1.min.js'></script>
</head>
<?php
    if((isset($_SESSION["uname"]) && $_SESSION["uname"] == $_REQUEST["uid"] && $_SESSION["type"] == "hospital") || $_SESSION["type"] == "ADMIN" )
    {
        echo "<div id='view-history-container'>";
        
        echo "<h1> Hospital Blood Request Details </h1>" ;
        $table = "blood_request" ;
        $condition = " where h_name='".$_REQUEST["uid"]."'";
        $api_obj = new api_1( new DB , $table ) ;
        $result = $api_obj->get_details( " * " , $condition );
        
        if (isset($result))
        {
            echo "<table width=100% align='center' >
            <tr>
            <td>
            Request ID
            </td>
            <td>
            Requested Username
            </td>
            <td>
            Date and Time
            </td>
            <td>
            Current Status
            </td>
            <td>
            Action
            </td>
            </tr>";
            for ( $i = 0 ; $i < count($result) ; $i++ )
            
            {
                echo "<tr> <td>". $result[$i]["r_id"].
                "</td><td>".$result[$i]["uname"]."</td><td>".
                $result[$i]["time_date"]."</td><td>".$result[$i]["status"].
                "</td>";
                if ($result[$i]["status"] == "Requested")
                {
                echo "<td><div class='action-btn' id='".$result[$i]["r_id"]."-action-btn'><div class='btn'><button type='button'
                onclick='verify_request(".$result[$i]["r_id"].",1)'> Verify Request
                </button></div><div class='btn'><button type='button' onclick='verify_request
                (".$result[$i]["r_id"].",2)'> Reject Request </button>
                </div></div></td>";
                }
                else
                {
                    echo "<td> Action Already Taken </td>";
                }
                echo "</tr>";

            }
            echo "</table>";
        }
        else
        {
            echo "<div style='top: 40%; right: 45%; color: red;'>No requests Made yet</div>";
        }        
        echo "</div>";
    }
    else
    {
        redirect_func();
    }
?>
