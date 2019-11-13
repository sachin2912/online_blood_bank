<?php
    require("../model/data_api.php");
    require("../model/db.php");
    if ( isset($_POST["c_id"]) )
    {
        $api_obj = new api_1(new DB,"blood_request");
        $result = $api_obj->update_request("'Complain Rejected'",$_POST["c_id"]);
        $api_obj_1 = new api_1(new DB , "user_complains");
        $api_obj_1->update_action ("'Rejected'",$_POST["c_id"],"'".$_POST["admin_uname"]."'");
        echo "'action taken : Rejected Complain'";
           
    }
    
    

?>