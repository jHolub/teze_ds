
<?php

require_once \GLOBALVAR\CORE_PATH . "/class/dataService.php";

class pechControl extends ControllerService {

    public function __construct() {

        parent::__construct($this);

        if (!SessionService::getInstance()->get('sourceName') || !SessionService::getInstance()->get('userName')) {

            URLService::redirect(\GLOBALVAR\ROOT . "/?core=source");
        }
    }
  public function action_main(){
        
        $sourceData = dataService::getSourceData(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'));        
        
        return [
            'graphData'=>$this->printData(),
            'sourceData'=>$sourceData
        ];
    }
    
    private function printData() {

        $data = dataService::getData(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'));

        if ($data) {
            $graphData['t'] = 0;
            $graphData['s'] = 0;

            for ($i = 0; $i < count($data["s"]); $i++) {
                $graphData['t'] = $graphData['t'] . "," . $data["t"][$i];
                $graphData['s'] = $graphData['s'] . "," . $data["s"][$i];
            }
        } else {

            $this->msg = 'Data is empty.';
        }
        
        return $graphData;
    } 
 
    public function action_saveParametrs(){
        
        if(dataService::saveParametrs(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'),$this->post)){
        
            $this->msg = "Data has been saved successfully.";
        }else{
            
            $this->msg = "Something was wrong. Try again.";    
        }
        
        return[];
    }     

}

?>