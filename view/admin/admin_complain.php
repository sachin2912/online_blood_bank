<head>
    <link rel="stylesheet" type="text/css" href="css/admin_complain_file.css"/>
	<script src="js/admin_users_file.js" type="text/javascript" defer></script>
    <script src="js/admin_complain_file.js" type="text/javascript" defer></script>
	<script src='js/jquery-3.4.1.min.js'></script>
</head>
<?php
    $api_obj = new api_1(new DB,"user_complains");
    $result = $api_obj->get_details("c_id,uname,h_name,complain,action,admin_uname"," ");
    echo "<div id='admin-hospital-details'>";
    echo "<h1 style='color: blue; text-align: center;'> ALL COMPLAIN DETAILS </h1>";
    if(isset($result))
    {
        echo "<table width=100% cellpading=15px align='center'>
                    <tr style='transform: none;'>
                    <td>
                    <h2>Username</h2>
                    </td>
                    <td>
                    <h2>Hospital Name<h2>
                    </td>
                    
                    <td>
                    <h2>Complain</h2>
                    </td>
                    <td colspan=2>
                    <h2>Action</h2>
                    </td>
                    <td>
                     <h2>View uploaded Image</h2>
                    </td> 
                    </tr>";
        for( $i = 0; $i < count($result) ;$i++)
        {
           
            $uname_arg = $result[$i]["c_id"].",'".$_SESSION["uname"]."'";
            echo "<tr><td><a href='?action=view-profile&type=user&uname=".$result[$i]["uname"]
            ."'>".$result[$i]["uname"]."</a></td><td>".
            $result[$i]["h_name"]."</td>"."<td>".$result[$i]["complain"]."</td>";
            if($result[$i]["action"] == "Registered")
            {
                echo '<td><button type="button" onclick="reject_complain('.$uname_arg.')">
                Reject Complain </button></td><td><button type="button" onclick="warn_user('.$uname_arg.')">
                Warn User </button></td>';
            
                if (file_exists("complain_images/".$result[$i]["uname"]."_".$result[$i]["c_id"].".jpeg" ))  
                {
                    echo '<td> <button type="button" onclick="display_image('."'complain_images/".$result[$i]['uname']."_".$result[$i]['c_id'].".jpeg'".')">
                    View Image </button></td>';
                }
                else if (file_exists("complain_images/".$result[$i]["uname"]."_".$result[$i]["c_id"].".jpg" ))
                {
                    echo '<td> <button type="button" onclick="display_image('."'complain_images/".$result[$i]['uname']."_".$result[$i]['c_id'].".jpg'".')">
                    View Image </button></td>';
                }
                else if (file_exists("complain_images/".$result[$i]["uname"]."_".$result[$i]["c_id"].".png"))
                {
                    echo '<td> <button type="button" onclick="display_image('."'complain_images/".$result[$i]["uname"]."_".$result[$i]['c_id'].".png'".')">
                    View Image </button></td>';
                }
                
            
            }    
            else
            {
                echo "<td colspan=2>".$result[$i]["action"]." Taken By Admin username : ".$result[$i]["admin_uname"]."</td>";
            }
            echo '</tr>';   
        }
        echo "</table>";
    }
    else
    {
        echo "<div style='padding: 50px; text-align: center; color: red;font-size: 40px;'>No Complains Yet Registered !!!</div>";
    }
    echo "</div>";
?>


<div id='modal-class' class='modal'>
<span class="close">&times;</span>
    <div id='modal-content-id' class='modal-content'>
    
    
    </div>
</div>