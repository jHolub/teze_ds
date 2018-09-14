<?php

class ModelService{
    
    public $connect;

    public function __construct(DBService $connector) {

        $this->connect = $connector;
    }
    
    public function getConnect(){
        
        return $this->connect->getConnection();
    }
    
    public function __destruct(){
        
        //database disconnect
    }
}
?>