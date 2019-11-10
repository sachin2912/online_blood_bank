<?php
    require("db.php");
    require("data_api.php");
    $otp_generated = mt_rand(100000, 999999);
    $api_obj = new api_1(new DB,"otp");
    $fields = "otp,email";
    $values = "'$otp_generated','".$_POST["email"]."'";
    $api_obj->insert_details( $fields , $values );
    $to = $_POST["email"];
    $sub = "Online Blood bank : OTP Verification of email";
    $header = "Important" ;
    $msg = "
    The otp for verification of your account of Online Blood Bank is : $otp_generated
    
    
    
    By Online Blood Bank";
    mail($to,$sub,$msg,$header);
    echo "success";
    

?>