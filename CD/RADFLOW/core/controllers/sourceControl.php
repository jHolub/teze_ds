<?php

class sourceControl extends ControllerService {

    public function __construct() {

        parent::__construct($this);

// neopravneny pristup
        if (!SessionService::getInstance()->get('userIsLogged')) {
            // presmerovani na prihlaseni     
            URLService::redirect();
        }
    }

    public function action_main() {
        $lists = $this->getListModels();

        $activeSource = SessionService::getInstance()->get('sourceName');

        if ($activeSource) {

            $sourceData = sourceData::getSourceData(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'));
        }

        $list = array();
        foreach ($lists as $key => $name) {
            $list[$key]['name'] = $name;
        }

        return[
            'list'=>$list,
            'activeSource' => $activeSource,
            'sourceData' => $sourceData
            ];
    }

    private function getListModels() {

        $space = SessionService::getInstance()->get('userName');

        $list = sourceData::dataListModel($space);
        $list = array_slice($list, 2);
//alphabetic sort
        sort($list);

        return $list;
    }

    public function action_saveParametrs() {

        if (sourceData::saveParametrs(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'), $this->post)) {

            $this->msg = "Data has been saved successfully.";
        } else {

            $this->msg = "Something was wrong. Try again.";
        }
        
        return [];
    }

    public function action_newSource() {

        $domain = SessionService::getInstance()->get('userName');

        if(empty($this->post['name_source'])){
            $this->msg = 'Zvolte název.';
            return[];
        }
        
        if (sourceData::modelExists($domain, $this->post['name_source'])) {
            $this->msg = 'Tento model již exituje.';
            return [];
        }

        if (sourceData::maxModelNumber($domain)) {
            $this->msg = 'Překročen maximální počet modelů pro uživatele';
            return [];
        }

        if (!sourceData::createDomain($domain, $this->post['name_source']) || !sourceData::createConfig($domain, $this->post['name_source'])) {

            $this->msg = 'Akce se nazdařila.';
        }

        $this->delParamSession();
        SessionService::getInstance()->set('sourceName', $this->post['name_source']);
        
        return [];
    }

    public function action_saveDataSource() {

        $file = $_FILES;

        if ($file["file"]["error"] > 0) {

            $this->msg = 'File error';
            return;
        }

        if ($file["file"]["type"] !== 'text/plain') {

            $this->msg = 'Soubor musi byt typu TXT.';
            return;
        }

        if ($file["file"]["size"] > 50000) {

            $this->msg = "Soubor je příliš velký. Velikost:" . $file["file"]["size"] . " Maximální velikost je 50000bajtů.";
            return;
        }

        if (sourceData::saveData($file, $file["file"]["name"], SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'), $this->request['observData'])) {

            $this->msg = 'Data uložena';
        } else {

            $this->msg = 'Data se nepodařilo uložit. Opakujte akci.';
        }
        
        return[];
    }

    public function action_delDataSource() {

        if (sourceData::delData(SessionService::getInstance()->get('userName'), SessionService::getInstance()->get('sourceName'), $this->request['observData'])) {

            $this->msg = 'Data odstraněna';
        } else {

            $this->msg = "Data se nepodařilo odstranit. Zkuste znovu.";
        }
        
        return [];
    }

    public function action_setSource() {

        $domain = SessionService::getInstance()->get('userName');

        if (sourceData::modelExists($domain, $this->request['source'])) {
            $this->delParamSession();
            SessionService::getInstance()->set('sourceName', $this->request['source']);

            $this->msg = 'The source selected.';
        } else {
            $this->msg = 'The source does not exist.';
        }
        
        return [];
    }

    public function action_delSource() {

        $domain = SessionService::getInstance()->get('userName');

        if (sourceData::modelExists($domain, $this->request['source'])) {

            if (sourceData::deleteModel($domain, $this->request['source'])) {

                if ($this->request['source'] == SessionService::getInstance()->get('sourceName')) {
                    $this->delParamSession();
                    SessionService::getInstance()->clear('sourceName');
                }

                $this->msg = 'The source has been deleted.';
            }
        } else {
            $this->msg = 'The source cannot be deleted.';
        }
        
        return [];
    }

    private function delParamSession() {
        
    }
}

?>