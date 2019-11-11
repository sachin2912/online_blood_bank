<?php
require("../model/data_api.php");
require("../model/db.php");
if ( isset($_POST["username"]) )
{
    $api_obj = new api_1(new DB,"user");
    $result = $api_obj->check_user("uname",$_POST["username"]);
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