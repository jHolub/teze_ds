<?php

class DBConnection{
    
    public static function getConnection(DBService $connector) {

        return $connector->getConnection();
    }
    
}
?>
