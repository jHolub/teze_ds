<?php


include \GLOBALVAR\MODELS_PATH."/stehfestData.php";

class vyvojControl extends ControllerService {

     protected $msg;
    
    public function __construct() {

        parent::__construct($this);

// neopravneny pristup
        if (!SessionService::getInstance()->get('sourceName')) {
            
            URLService::redirect(\GLOBALVAR\ROOT."/?core=source");
        }
        
        $this->printData();
        
        $this->sourceData = stehfestData::getSourceData(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'));        
    }
    
    public function printData() {

        $data = stehfestData::getData(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'));

        if ($data) {
            $this->graphData['t'] = 0;
            $this->graphData['s'] = 0;

            for ($i = 0; $i < count($data["s"]); $i++) {
                $this->graphData['t'] = $this->graphData['t'] . "," . $data["t"][$i];
                $this->graphData['s'] = $this->graphData['s'] . "," . $data["s"][$i];
            }
        } else {

            $this->msg = 'Data is empty.';
        }
    } 
    
}

