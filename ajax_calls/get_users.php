<?php
require("../model/data_api.php");
require("../model/db.php");
if ( isset($_POST["h_name"]) )
{
    $api_obj = new api_1(new DB,"blood_request");
    $result = $api_obj->check_user("uname","h_name ='".$_POST["h_name"]."'");
    $option = "<option selected disabled>No users</option>";
    if (isset($result))
    {
        for ( $i=0 ; $i < count($result) ; $i++)
        {
            $option.="<option value=".$result[$i]["uname"].">".$result[$i]["uname"]."</option>";
        }
    }   
}
return $option;
?>