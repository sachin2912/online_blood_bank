<?php
    $api_obj = new api_1(new DB , "user");
    $amt = " email,fname,lname ";
    $condition = " where uname='".$_POST["username"]."'";
    $result = $api_obj->get_details( $amt , $condition );
    $to = $result[0]["email"];
    $header = " Noreply : Emergency blood Donation Required ";
    $api_obj_1= new api_1( new DB, "hospital" );
    $amt1 = " latitude,longitude ";
    $cdt = " where h_name='".$_POST["hospital_name"]"'";
    $res = $api_obj_1->get_details( $amt1 , $cdt );
    $msg = " Blood donation required at ".$_POST["hospital"]."
     the distance to the hospital from your home is within 10 Kilometers ,
     So please helps us in saving a life . Follow this link for directions - 
     https://www.here.com/directions/drive/start:".$result[0]["latitude"].","
     .$result[0]["longitude"]."/end:".$res[0]["latitude"].",".$res[0]["longitude"];
    $sub = " IMP : Online Blood Management ['Request For Blood']";
    
?>