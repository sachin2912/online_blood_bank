<?php
class DB {

    var $conn = null;
    var $res = null;

    function __construct() 
    {
        $this->conn = new mysqli("localhost","sachin","sachin123","blood_bank");
        if ($this->conn->connect_error) 
        {
            die("Error: Failed to connect with the database");
        }
    }
    function execute($sql, $type)
    {
        if (($type=='I' || $type=='U' || $type=='D') && $sql !='') {
            if ( $this->conn->query($sql) == TRUE)
            {
                return "success";
            }
            else
            {
                return "error: ".$this->conn->error;
            }
        } 
        else  
        {
            $this->res = $this->conn->query($sql);
            if ($type=="S1")
            {
                if ($this->res->num_rows>0)
                {   
                    $data = [];
                    while($row = $this->res->fetch_assoc()) 
                    {
                        $data[] = $row;
                        
                    }
                    return $data;
                }
            }
            else if ($type=="S2")
            {
                return $this->getNoOfRows();
            }    
        }
    }

    function getNoOfRows() {
        return $this->res->num_rows;
    }
}
?>