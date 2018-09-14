
<?php

class jacobControl extends ControllerService {

    public function __construct() {

        parent::__construct($this);

        if (!SessionService::getInstance()->get('sourceName') || !SessionService::getInstance()->get('userName')) {

            URLService::redirect(\GLOBALVAR\ROOT . "/?core=source");
        }
    }

    public function action_main() {

        $sourceData = jacobData::getSourceData(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'));
        
        return [
            'sourceData'=>$sourceData,
            'graphData'=>$this->printData(),
            'graphDataObserv'=>$this->printDataObserv()
        ];
    }

    private function printData() {

        $data = jacobData::getData(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'));

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

    private function printDataObserv() {

        $data = jacobData::getDataObserv(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'));

        if ($data) {

            $graphDataObserv['t'] = 0;
            $graphDataObserv['s'] = 0;

            for ($i = 0; $i < count($data["s"]); $i++) {

                $graphDataObserv['t'] = $graphDataObserv['t'] . "," . $data["t"][$i];
                $graphDataObserv['s'] = $graphDataObserv['s'] . "," . $data["s"][$i];
            }
        } 
        
        return $graphDataObserv;
    }

    public function action_saveParametrs() {

        if (jacobData::saveParametrs(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'), $this->post)) {

            $this->msg = "Data has been saved successfully.";
        } else {

            $this->msg = "Something was wrong. Try again.";
        }

        return [];
    }

}

?>