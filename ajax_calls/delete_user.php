<?php
    
    require("../model/db.php");
    require("../model/data_api.php");
    
    $api_obj = new api_1(new DB,"user");
    $cnt = " where uname='".$_POST["username"]."'";
    echo $api_obj->delete_operation($cnt);
?>