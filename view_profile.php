<head>
    <link rel="stylesheet" type="text/css" href="css/view_profile_file.css"/>
</head>
<?php
    if((isset($_SESSION["uname"]) && $_SESSION["uname"] == $_REQUEST["uname"] && $_SESSION["type"] == $_REQUEST["type"]) || $_SESSION["type"] == "ADMIN" )
    {
        echo "<div id='profile-container'>";
        if ( $_REQUEST["type"] == "user" )
        {
            echo "<h1> Personal Information </h1>" ;
            $table = "user" ;
            $condition = " where uname='".$_REQUEST["uname"]."'";
            $cnt = " where uname='".$_REQUEST["uname"]."'";
        }
        else if ( $_REQUEST["type"] == "hospital" )
        {
            echo "<h1> Hospital Details </h1>" ;
            $table = "hospital" ;
            $condition = " where h_name='".$_REQUEST["uname"]."'";
            $cnt = " where h_name='".$_REQUEST["uname"]."'";
        } 

        $api_obj = new api_1( new DB , $table ) ;
        $result = $api_obj->get_details( " * " , $condition );
        $api_obj_1 = new api_1(new DB , "blood_request");
        $req_result = $api_obj_1->get_details(" * ",$cnt);
        if ( $_REQUEST["type"] == "user" )
        {
            $api_obj1 = new api_1(new DB , "blood_request");
            $request_result = $api_obj1->get_details(" * " , $condition );
            echo "<table cellpadding='30px'>
            <tr>
            <td> 
                Name :
            </td> 
            <td colspan='3'>"
                .$result[0]["fname"]." ".$result[0]["lname"]
            ."</td>
            </tr>
            <tr>
            <td>
                Age :
            </td> 
            <td>"
                .$result[0]["age"].
            "</td>
            <td> 
                Blood Group :
            </td>
            <td>"
                .$result[0]["blood_group"].
            "</td>
            </tr>
            <tr>
            <td>
                Email :
            </td>
            <td>"
                .$result[0]["email"].
            "</td>
            <td>
            Mobile Number : 
            </td>
            <td>"
                .$result[0]["mobile_number"].
            "</td>
            </tr>
            <tr>
            <td>
            Address :
            </td>
            <td colspan='3'>"
            .$result[0]["user_address"]
            ."</td>
            </tr>
            
            </table>";
            

        }
        else if ($_REQUEST["type"] == "hospital")
        {
            echo "<div id='profile-container'>
            <table cellpadding='35px'>
            <tr>
            <td> 
                Hospital Name : 
            </td> 
            <td colspan='3'>"
                .$result[0]["h_name"]
            ."</td>
            </tr>
            <tr>
            <td>
                Person of Contact :
            </td>
            <td colspan='3'>".
            $result[0]["poc_name"]."
            </td>
            </tr>
            <tr>
            <td>
                Website :
            </td> 
            <td><a href='https://www."
                .$result[0]["website"].
            "' target='_blank'>".$result[0]["website"]."</a></td>
            <td> 
                Registration Number : 
            </td>
            <td>"
                .$result[0]["reg_no"].
            "</td>
            </tr>
            <tr>
            <td>
                Email :
            </td>
            <td>"
                .$result[0]["email"].
            "</td>
            <td>
            Phone Number : 
            </td>
            <td>"
                .$result[0]["phone_number"].
            "</td>
            </tr>
            <tr>
            <td>
            Address :
            </td>
            <td colspan='3'>"
            .$result[0]["address"]
            ."</td>
            </tr>
            
            </table>";
        }
        
    
    
    echo "</div>";
    }
    else
    {
        redirect_func();
    }
?>