<?php
    if ( isset($_SESSION["uname"]) )
    {
        $table = "login_credentials";
        if( $_SESSION["type"] == "hospital" )
        {
            $table = "hospital_".$table;
        }
        $api_obj=new api_1(new DB,$table);
        $api_obj->update_status($_SESSION["uname"],0);
        session_unset();
        session_destroy();
    }
    redirect_func();
?>