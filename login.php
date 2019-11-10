<?php
    
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
        
        if ( isset( $_POST["username"] ) )
        {
            
            $table = "login_credentials" ;
            $cnt ="";
            if ( $_POST["type"] == "hospital" )
            {
                $table = "hospital_".$table ;
                $cnt.=" and verified = 1";
            }
            $api_obj = new api_1( new DB , $table ) ;
            $result = $api_obj->check_login($_POST["username"],$_POST["password"],$cnt);
            if ( $result == 1 )
            {
                $_SESSION["type"]=$_POST["type"];
                if ($_POST["type"] == "user")
                {
                    
                    
                    if ( $api_obj->check_admin($_POST["username"]) == 1)
                    {
                        $_SESSION["type"]="admin";
                    }
                   
                }
                $_SESSION["uname"]=$_POST["username"];
                
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