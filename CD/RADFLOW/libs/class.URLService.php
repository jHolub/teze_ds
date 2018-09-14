<?php

class URLService{
    
    static public function redirect($path = \GLOBALVAR\ROOT){
        
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: ". $path );
        header("Connection: close");
            
    }
    
    static public function getError($text = ''){

        ErrorLogHandling::register("Error is occured." . $text . " USER ID:". SessionService::getInstance()->get('userId') ." DATE: ". date("F j, Y, g:i a"));

        if(file_exists(\GLOBALVAR\CONTROLLERS_PATH . '/errorControl.php')){
        
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".\GLOBALVAR\ROOT."/?core=error");
            header("Connection: close");        
        }
        
    }    
}
?>