<?php
    require("../model/db.php");
    require("../model/data_api.php");
    $api_obj = new api_1(new DB,"hospital");
    if($_POST["what_to_do"] == 2)
    {
        $cnt = " where h_name='".$_POST["username"]."'";
    
        $api_obj->delete_operation($cnt);
        echo "deleted";
    }
    else if ($_POST["what_to_do"] == 1)
    {
        $cnt = "h_name='".$_POST["username"]."'";
        $cnt_1 =  "uname='".$_POST["username"]."'";
        $api_obj->update_verify($cnt);
        $api_obj_1 = new api_1(new DB , "hospital_login_credentials");
        $api_obj_1->update_verify($cnt_1);
        echo "verified";
        
    }   
?>