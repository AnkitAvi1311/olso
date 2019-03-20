<?php 

class Model {
    
    //  requisite variables to maintain the connection
    private $conn = null;
    protected $eror = false, $err_info = null;

    //  setting up the connection with the database
    public function __construct() 
    {
        try{
            $this->conn = new PDO(DSN, USER, PASSWORD, PDO_OPTIONS);
        }catch(PDOException $e) {
            $this->error = true;
            $this->err_info = $e->getMessage();
        }
    }

    //  function to insert data into the database
    protected function __insert($sql, $params = null) 
    {
        $stmt = $this->conn->prepare($sql);
        if($params) {
            foreach($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }
        }
        try{
            $stmt->execute();
            $this->error = false;
            $this->err_info = null;
        }catch(PDOException $e) {
            $this->error = true;
            echo $e->getMessage();
        }
    }

    //  function to select a row 
    protected function __select($sql, $params = null) 
    {
        $stmt = $this->conn->prepare($sql);
        if($params){
            foreach($params as $key => &$value) {
                $stmt->bindParam($key, $value);
            }
        }
        try{
            $stmt->execute();
            $this->error = false;
            return $stmt;
        }catch(PDOException $e){
            $this->error = true;
            $this->err_info = $e->getMessage();
        }
    }

    // function to update a row in the table
    protected function __update($sql, $params = null) {
        $stmt = $this->conn->prepare($sql);
        foreach($params as $key => &$value) {
            $stmt->bindParam($key, $value);
        }
        try{
            $stmt->execute();
            return $stmt;
        }catch(PDOException $e) {
            echo "Error = ".$e->getMessage();
        }
    }

    public function __destruct() {
        $this->conn = null;
    }
}