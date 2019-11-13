<?php
    require("../model/data_api.php");
    require("../model/db.php");
    if ( isset($_POST["c_id"]) )
    {
        $api_obj = new api_1(new DB,"blood_request");
        $result = $api_obj->update_request("'User Warned'",$_POST["c_id"]);
        $api_obj_1 = new api_1(new DB , "user_complains");
        $api_obj_1->update_action("'User Warned'",$_POST["c_id"],"'".$_POST["admin_uname"]."'");
        $result = $api_obj_1->get_details("uname,complain"," where c_id = ".$_POST["c_id"]);
        $api_obj_2 = new api_1(new DB , "user");
        $result_1 = $api_obj_2->get_details("email"," where uname = '".$result[0]["uname"]."'");
        $to = $result_1[0]["email"];
        echo $to;
        $header = "Warning";
        $sub = "Warning : A complain is filed against you";
        $msg = "
        A complain is filed by one of our registered hospital  below is the complain ";
        $msg.= " ' ".$result[0]["complain"] . " ' ";
        $msg.= "
        We are warning you this time but please do take care to not repeat it again .
        Thanks Regards
        Online Blood Bank";
        mail($to,$sub,$msg,$header);
        echo "'action taken : Warned User Through email' ";
           
    }
    
    

?>