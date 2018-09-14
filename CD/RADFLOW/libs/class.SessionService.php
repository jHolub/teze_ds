<?php

/*/ SESSION CLASS SERVICE
 * author: Jiri Holub
 * 
 */

class SessionService{
    
    private static $instance = NULL;
    
    private static $SALT = "L0kC3d_Is_S2v5";
     
    private function __construct() {
    }
 
    public static function getInstance() {
        
        if (self::$instance == NULL) {

            self::$instance = new self();
            self::startUp();
        }
        return self::$instance;
    }
    
    private static function startUp(){
        
     // ptatnost session 24min  
        session_cache_expire(24);    
        session_start();
        
    // zmena session id pri kazdem zavolani tridy. ochrana session         
        session_regenerate_id(false);
 
        if(empty($_SESSION)){

            self::load();
            
        } 
        
        if($_SESSION['userIsLogged']){
      
            // kontrola zda se jedna o stejneho klienta, ktery se prihlasil( SESSION SECURITY ) 
            if ($_SESSION['fingerPrint'] != md5($_SERVER['HTTP_USER_AGENT'] . self::$SALT . $_SERVER['REMOTE_ADDR'])) {

               self::destroy();
               header("Location: ".ROOT."/");
               exit();                
            }            
        }
    }
 
    public function login($id, $name, $role = 'logged'){
        
        $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] . self::$SALT . $_SERVER['REMOTE_ADDR']);        
        $_SESSION['userId'] = $id;
        $_SESSION['userName'] = $name;
        $_SESSION['userRole'] = $role;
        $_SESSION['userIsLogged'] = TRUE;
        
    }    
    
   private static function load(){
       
        // hodnoty pro anonymniho uzivatele
        $_SESSION['userName'] = "Host";
        $_SESSION['userRole'] = "guest";            
        // pro anonym user se nastavi jako default id = 0
        $_SESSION['userId'] = 0;
        $_SESSION['userIsLogged'] = FALSE;
        
    }
    
    public function get($key){
        
        return  isset( $_SESSION[$key] ) ? $_SESSION[$key] : FALSE ;
        
    }
    
    public function set($key, $value){
        
        $_SESSION[$key] = $value;
        
    }
    
    public function clear($var){
        
        unset( $_SESSION[$var] );
    
    }
   // logout 
    public function destroy(){
 
        session_destroy();
        
    }
    
}

?>
