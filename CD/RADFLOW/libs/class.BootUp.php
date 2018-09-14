<?php

class BootUp {
// The Instance of appropriate Controller class  
    public $control;

    public function __construct() {
        
        SessionService::getInstance();

        if (isset($_GET['core'])) {

            if(file_exists(\GLOBALVAR\CONTROLLERS_PATH . '/' . $_GET['core'] . 'Control.php')){
                
                SessionService::getInstance();
                
                require_once \GLOBALVAR\CONTROLLERS_PATH .'/'. $_GET['core'] .'Control.php';

                $class = $_GET['core']."Control";

                $this->control = new $class();
                
                $this->view = $this->control->getViewer();

                $this->view->core = $_GET['core'];
  
//  Detect An Ajax Request                
                if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
                {
                    echo json_encode($this->control->getResponse());
                    exit;
                }
                
            }else{
    
               URLService::getError('Controller not exist. CLASS: ' . __CLASS__ );
            }
        } else {
            
            URLService::redirect(\GLOBALVAR\ROOT . '/?core=account');
            
        }
    }
}

?>
