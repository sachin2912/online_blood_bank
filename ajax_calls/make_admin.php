<?php
    require("../model/db.php");
    require("../model/data_api.php");
    $api_obj = new api_1(new DB,"login_credentials");
    $cnt = "uname='".$_POST["username"]."'";
    $api_obj_1 = new api_1(new DB,"user");
    $api_obj_1->make_admin($cnt);
    echo $api_obj->make_admin($cnt);
?>