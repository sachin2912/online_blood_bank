<?php
require("../model/data_api.php");
require("../model/db.php");
if ( isset($_POST["email"]) )
{
    $api_obj = new api_1(new DB,"user");
    $result = $api_obj->check_user("email",$_POST["email"]);
    if ($result == 0)
    {
        echo "Available";
    }
    else
    {
        echo "exist";
    }
}

?>