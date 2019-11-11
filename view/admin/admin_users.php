<head>
    <link rel="stylesheet" type="text/css" href="css/admin_users_file.css"/>
	<script src="js/admin_users_file.js" type="text/javascript" defer></script>
	<script src='js/jquery-3.4.1.min.js'></script>
</head>
<?php
    $api_obj = new api_1(new DB,"user");
    $result = $api_obj->get_details("uname,email,admin"," where uname <> '".$_SESSION["uname"]."'");
    echo "<div id='admin-user-details'>";
    echo "<h1 style='color: blue;'> ALL USERS DETAILS </h1>";
    if(isset($result))
    {
        echo "<table  cellpading=20px align='center'>
                    <tr style='transform: none;'>
                    <td>
                    <h2>User Name</h2>
                    </td>
                    <td>
                    <h2>Email</h2>
                    </td>
                    <td colspan=2>
                    <h2>Action</h2>
                    </td>
                    </tr>";
        for( $i = 0; $i < count($result) ;$i++)
        {
            $uname_arg = "'".$result[$i]["uname"]."'";
            echo "<tr><td><a href='?action=view-profile&type=user&uname=".$result[$i]["uname"]
            ."'>".$result[$i]["uname"]."</a></td><td>".
            $result[$i]["email"]."</td><td>".'<button type="button" onclick="delete_user('.$uname_arg.')">
            Delete User </button></td>';
            if ($result[$i]["admin"] == 0)
            {
                echo '<td><button type="button" onclick="make_admin('.$uname_arg.')">Make Admin </button> </td>';
            }
            else
            {
                echo "<td> Is a Admin too </td>"; 
            }
            echo "</tr>";    
        }
        echo "</table>";
    }
    else
    {
        echo "<div style='padding: 50px; text-align: center; color: red;font-size: 40px;'>No Users Yet Registered other than you</div>";
    }
    echo "</div>";
?>