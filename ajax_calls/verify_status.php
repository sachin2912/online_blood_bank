<?php
    require("../model/db.php");
    require("../model/data_api.php");
    $api_obj = new api_1(new DB , "blood_request");
    $cnt = $_POST["r_id"];
    if( $_POST["what_to_do"] == 1 )
    {
        $value = "Verified";
        
    }
    else if( $_POST["what_to_do"] == 2 )
    {
        $value = "Rejected";
    }
    $api_obj->update_request( "'".$value."'" ,$cnt );
    echo $value;

?>