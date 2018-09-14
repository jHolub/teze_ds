<?php

// var connection and interface - definition
require_once \GLOBALVAR\SETTING_PATH.'/DBconfig.php'; 

interface DBService{
    
    public function __construct();
    
    public function  getConnection();
    
    public function __destruct();
}

class DBPostgreSQLService extends DBconfig implements DBService{
    
    private $connection;      
    
    public function __construct(){

        try{

            $this->connection = pg_connect("host='".parent::$serverName."' port='".parent::$serverPort."'dbname='".parent::$dbName."' user='".parent::$userName."'password='".parent::$passCode."'");

            if(!is_resource($this->connection)){

               throw new Exception("Can't connect to the database.");

            }
        
        } catch(Exception $e){
     
            ErrorLogHandling::register($e."Can't connect to the database.");
            
        }

    }
    
    public function getConnection(){
        
        return $this->connection;
        
    }
    
    public function __destruct(){

        if (is_resource($this->connection)) {

            pg_close($this->connection);           
        }     
    }
    
}

?>