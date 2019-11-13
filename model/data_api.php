<?php
class api_1 
{
    var $db = null;
    var $table=null;
    function __construct( $db , $table ) 
    {
        $this->db = $db;
        $this->table = $table;
    }

    function check_login( $uname , $password ,$cnt) 
    {
        $sql = "select * from ".$this->table." where uname = '$uname' AND password ='$password'".$cnt;
        return $this->get_result_from_db( $sql , "S2" );
    }
    function check_user ($field,$uname)
    {
        $sql = "select * from ".$this->table." where $field = '$uname'";
        return $this->get_result_from_db($sql,"S2");
    }
    function verify_otp($cnt)
    {
        $sql = "select * from ".$this->table." ".$cnt;
        return $this->get_result_from_db($sql,"S2");
    }
    function update_status( $uname , $v )
    {
        $sql="  update ".$this->table.
                " SET status = ".$v.
                " where uname = '$uname'";
        $this->get_result_from_db( $sql , "U" );        
    }
    function update_otp( $cnt )
    {
        $sql="  update ".$this->table.
                " SET used = 1 ".$cnt ;
        $this->get_result_from_db( $sql , "U" );
    }
    function update_request( $value , $cnt )
    {
        $sql = "update ".$this->table." SET status = ".$value.
        " where r_id = ".$cnt;
        $this->get_result_from_db( $sql , "U");
        
    }

    function update_action( $value , $cnt , $admin_uname )
    {
        $sql = "update ".$this->table." SET action = ".$value.
        ",admin_uname = ". $admin_uname ." where c_id = ".$cnt;
        echo "$sql";
        $this->get_result_from_db( $sql , "U");
    }

    function update_verify($cnt)
    {
        $sql = "update ".$this->table." SET verified = 1 where ".$cnt;
        $this->get_result_from_db( $sql , "U");
    }

    function make_admin($cnt)
    {
        $sql = "update ".$this->table." SET admin = 1 where ".$cnt;
        return $this->get_result_from_db( $sql , "U");
    }

    function check_admin( $uname )
    {
        $sql = "select * from login_credentials where uname ='".$uname."' and admin = 1";
        
        return $this->get_result_from_db( $sql , "S2");
    }

    function insert_details( $fields , $values)
    {
        $sql = "insert into ".$this->table."(".$fields.") values(".$values.")";
        
        return $this->get_result_from_db($sql,"I");
    }

    function get_details($amt,$condition)
    {
        $sql = "select ".$amt." from ".$this->table.$condition;
        return $this->get_result_from_db($sql,"S1");
    }

    function delete_operation( $cnt )
    {
        $sql = "delete from ".$this->table.$cnt;
        return $this->get_result_from_db($sql,"D");
    }

    function get_result_from_db( $sql , $type ) 
    {
        return $this->db->execute( $sql , $type );
    }

}
?>