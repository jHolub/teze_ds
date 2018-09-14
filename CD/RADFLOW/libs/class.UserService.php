<?php

class UserService{
    
    public function __construct() {
        
    }
    
    public function isLogged(){
        
        return SessionService::getInstance()->get('userIsLogged');
        
    }
    
    public function getUserName() {

        return SessionService::getInstance()->get('userName');
    }
    
    public function getId(){    
        
        return SessionService::getInstance()->get('userId');
        
    }
    
    public function getRole(){        
                
        return SessionService::getInstance()->get('userRole');
        
    }
    
    public function isAllowed($role){
        
        if(is_array($role)){
            
            return in_array($this->getRole(), $role) ? TRUE : FALSE;
                
        }elseif(!empty($role)){
            
            return $role == $this->getRole() ? TRUE : FALSE;
            
        }else{  return FALSE;    }
        
    }
    
}


?>