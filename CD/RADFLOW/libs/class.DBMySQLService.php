<?php

// var connection and interface - definition
require_once \GLOBALVAR\SETTING_PATH.'/class.DBconfig.php'; 

interface DBService{
    
    public function __construct();
    
    public function  getConnection();
    
    public function __destruct();
}

class DBMySQLService extends DBconfig implements DBService{
    
    private $connection;      
    
    public function __construct(){

        try{

            $this->connection = mysql_connect(parent::$serverName, parent::$serverPort, parent::$dbName, parent::$userName, parent::$passCode."'");

            if(!$this->connection){

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
        
        mysql_close($this->connection);   
     
    }
    
}


?>