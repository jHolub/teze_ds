<?php
/**
 * Description of class: error handling, error save to file
 *
 * @author holub.jiri
 */

class ErrorLogHandling {
    
    private static $file = \GLOBALVAR\ERROR_PATH;


    public static function register($err){
        
        if (file_exists(self::$file)) {
        
            $err = date("F j, Y, g:i a")." - ".$err."\n\n\n";

            file_put_contents(self::$file, $err, FILE_APPEND); 
        
        }
          
    }    
    
}

?>
