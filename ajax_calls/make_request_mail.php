<?php
    require("../model/data_api.php");
    require("../model/db.php");
    $api_obj = new api_1(new DB , "user");
    $amt = " email,fname,lname,latitude,longitude ";
    $condition = " where uname='".$_POST["username"]."'";
    $result = $api_obj->get_details( $amt , $condition );
    
    $to = $result[0]["email"];
    $api_obj_1= new api_1( new DB, "hospital" );
    $amt1 = " latitude,longitude ";
    $cdt = " where h_name='".$_POST["hospital_name"]."'";
    $font_disp = "font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;";
    $header = "Important";
    $res = $api_obj_1->get_details( $amt1 , $cdt );
    
    $msg = "
            Blood donation required at ".$_POST["hospital_name"]."
            the distance to the hospital from your home is within 10 Kilometers ,
            So please helps us in saving a life . Follow this link for directions 
            - https://www.here.com/directions/drive/start:".$result[0]["latitude"].","
            .$result[0]["longitude"]."/end:".$res[0]["latitude"].",".$res[0]["longitude"];
     
     $sub = " IMP : Online Blood Management ['Request For Blood']";
     $mail_sent = mail($to,$sub,$msg,$header);
     
     if ($mail_sent == TRUE)
     {
         
        
        $api_obj_2 = new api_1(new DB,"blood_request");
        $feild_2 = "uname,h_name,status";
        $value_2 = "'".$_POST["username"]."','".$_POST["hospital_name"]."','Requested'";
        $api_obj_2->insert_details($feild_2,$value_2);
        echo $_POST["username"];
    }

    
?>