<?php

    class accountData{         
                
        private static $userLogFile = \GLOBALVAR\USERLOGFILE_PATH;     // cesta k txt souboru a uziv. ucty
        
        private static $userDepo = \GLOBALVAR\USERDEPO_PATH;          // cesta k adresare pro ulozeni uzivatelskych vstupu aplikace
        
        public static function getAccountData($email){
            
        
          $txt_file = file_get_contents(self::$userLogFile);
          
            if($txt_file){
            
                $rows = explode("\n", $txt_file);
                
                array_shift($rows);
                                           
                for($i = 0; $i < count($rows); $i++){
                
                    $row_data = explode("\t", $rows[$i]);     
                 
                        if($row_data[0] == $email){   
  
                            return Array('email' => $row_data[0], 'pass' => $row_data[1]);
                            
                        }
                        
                }                      
                return false;
            }else{

                 ErrorLogHandling::register("Can't read file. ".__LINE__." ,method: ". __METHOD__ ." ,class: " . get_class($this) );
            } 
            
        }
        
        public static function registerData($email, $password){
            
            $hashPass = crypt($password);
            
            $newUser = $email."\t".$hashPass."\n";
            
            if(file_put_contents(self::$userLogFile, $newUser, FILE_APPEND) && self::createDirectory($email)){
            
                  return true;
                  
            }else{
                
                ErrorLogHandling::register("Wrong registration process, catch line: ".__LINE__." ,method: ". __METHOD__ ." ,class: " . get_class($this) );
                
                return false;
                
            } 
        }
        
        private static function createDirectory($depoName){  
            
            return mkdir(self::$userDepo."/".$depoName, 0777);               
     
        }
        
        public static function isSetDataBase($userDir){
            
          $res = scandir(self::$userDepo."/".$userDir."/");
          
          if(count($res) > 2){ return true;}else{ return false;}
          
        }
        
        public static function checkAuthenticData($auth){
            return true;
        }
    }
?>