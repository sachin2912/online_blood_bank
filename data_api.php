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

    function check_login( $uname , $password ) 
    {
        $sql = "select * from ".$this->table." where uname = '$uname' AND password ='$password'";
        return $this->get_result_from_db( $sql , "S2" );
    }
    
    function update_status( $uname , $v )
    {
        $sql="  update ".$this->table.
                " SET status = ".$v.
                " where uname = '$uname'";
        $this->get_result_from_db( $sql , "U" );        
    }
    
    function insert_details( $fields , $values)
    {
        $sql = "insert into ".$this->table."(".$fields.") values(".$values.")";
        $this->get_result_from_db($sql,"I");
    }

    function get_details($amt,$condition)
    {
        $sql = "select ".$amt." from ".$this->table.$condition;
        return $this->get_result_from_db($sql,"S");
    }


    

    function get_result_from_db( $sql , $type ) 
    {
        return $this->db->execute( $sql , $type );
           
    }

}
?>