<?php
    require("../model/db.php");
    require("../model/data_api.php");
    $api_obj = new api_1(new DB,"otp");
    $cnt = "where otp='".$_POST["otp"]."' and email ='".$_POST["email"]."' and used = 0";
    $res = $api_obj->verify_otp($cnt);
    $cnt_1 = "where otp='".$_POST["otp"]."' and email ='".$_POST["email"]."'";
    $api_obj->update_otp($cnt_1);
    
    if ($res > 0 )
    {
        echo "verified";
    }

?>