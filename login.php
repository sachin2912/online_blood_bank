<?php
    
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
        
        if ( isset( $_POST["username"] ) )
        {
            
            $table = "login_credentials" ;
            if ( $_POST["type"] == "hospital" )
            {
                $table = "hospital_".$table ;
            }
            
            $api_obj = new api_1( new DB , $table ) ;
            $result = $api_obj->check_login($_POST["username"],$_POST["password"]);
            if ( $result == 1 )
            {
                $_SESSION["uname"]=$_POST["username"];
                $_SESSION["type"]=$_POST["type"];
                $api_obj->update_status($_POST["username"],1);
            }
            else
            {
                echo "<script>
                        alert('Unsuccessfull , login credentials does not match !!!!!');
                        </script>";
            }
            redirect_func();
        }
    }


?>