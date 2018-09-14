<?php

class accountControl extends ControllerService{
    
    public function __construct(){        
        
           parent::__construct($this);     
    }
    
    public function action_main(){
        
        return[];
    } 


// handle: processing form (especially POST)    
    public function action_login(){
        
        $email = $this->post['email_user'];
        $pass = $this->post['password'];
        
        $row = accountData::getAccountData($email);    //pg_fetch_array($res); 
            if(!$row){
            
                $this->msg = 'Zadaný uživatel neexistuje.';
                
                return [];
            }
 
            if($row['pass']!= crypt($pass, $row['pass'])){
            
                $this->msg = 'Neplatné heslo.';
                
                return [];
            }
      
            SessionService::getInstance()->login(1, $email, "logged"); 
          
            $this->msg = "Úspěšné přihlášení.";
            
            if(accountData::isSetDataBase(SessionService::getInstance()->get('userName'))){
                
                SessionService::getInstance()->set("data_base",TRUE);
                
            }
            
            return [];        
    }
 
    public function action_register(){
          
         
        $email = $this->post['email_user'];
        $password = $this->post['password'];
            
            if($password !== $this->post['passwordVerify']){

		$this->msg = 'Potvrzení hesla se nazdařilo.';
		return false;
            }   
          
            if(AccountData::getAccountData($email)){

                $this->msg = 'E-mail už existuje(zvolte jiný).';
                return false;

            }

            if(!AccountData::registerData($email, $password)){

                $this->msg = 'Litujeme registrace se nezdařila, opakujte akci.';
                return false;    

            }
            
            $this->action_login();

        $this->msg = 'Účet byl vytvořen.';
        return [];  
        
    }
    
     public function action_logOut() {
        
        SessionService::getInstance()->destroy();
        URLService::redirect();        
    }   
    
} 