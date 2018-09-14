<?php

class sourceData {

    private static $userDepo = \GLOBALVAR\USERDEPO_PATH;
    
    private static $config = "/config.xml";

    public static function dataListModel($domain) {

        $dir = self::$userDepo . "/" . $domain . "/";

        return scandir($dir);
    }

    public static function createDomain($domain, $source) {

        return mkdir(self::$userDepo . "/" . $domain . "/" . $source, 0777);
    }

    public static function createConfig($domain, $source) {
        
        $xml = self::createConfFile($source);
        
        if (!$xml->save(self::$userDepo . "/" . $domain  . "/" . $source . self::$config)) {

            ErrorLogHandling::register("Cannot create file:" . $file . " , catch line: " . __LINE__ . " ,method: " . __METHOD__ . " ,class: " . get_class($this));
            return false;
        } else {
            return TRUE;
        }
    }

    public static function modelExists($domain, $model) {

        $dir = self::$userDepo . "/" . $domain . "/";
        return in_array($model, scandir($dir));
    }

    public static function maxModelNumber($domain) {

        $dir = self::$userDepo . "/" . $domain . "/";
        return (count(scandir($dir)) < 52) ? false : true;
    }

    public static function deleteModel($domain, $model) {

        $dir = self::$userDepo . "/" . $domain . "/" . $model;
        return self::rrmdir($dir);
    }

    private static function rrmdir($directory) {

        if (!$dh = opendir($directory)) {
            return false;
        }

        while ($file = readdir($dh)) {
            if ($file == "." || $file == "..") {
                continue;
            }

            if (is_dir($directory . "/" . $file)) {
                self::rrmdir($directory . "/" . $file);
            }

            if (is_file($directory . "/" . $file)) {
                unlink($directory . "/" . $file);
            }
        }

        closedir($dh);

        rmdir($directory);
        return true;
    }

    public static function saveData($file, $fileName, $userDir, $source, $observ) {
        
        $info = simplexml_load_file(self::$userDepo . "/" . $userDir  . "/" . $source . self::$config);
        if($observ){
            $fileName = "observ_" . $fileName;
            $info->OBSERV_DATA = "$fileName";
        }else{
            
            $info->TEST_DATA = "$fileName";
        }
        $info->asXML(self::$userDepo . "/" . $userDir  . "/" . $source . self::$config);    
        
        return move_uploaded_file($file["file"]["tmp_name"], self::$userDepo . "/" . $userDir . "/" .$source. "/" . $fileName);
    }

    public static function delData($userDir, $source, $observ) {
        
        $info = simplexml_load_file(self::$userDepo . "/" . $userDir  . "/" . $source . self::$config);
         if($observ){
             
            $file = (string) $info->OBSERV_DATA; 
            $info->OBSERV_DATA = "NULL";
        }else{
        
            $file = (string) $info->TEST_DATA;        
            $info->TEST_DATA = "NULL";
        }
        $info->asXML(self::$userDepo . "/" . $userDir  . "/" . $source . self::$config); 
        
        return unlink(self::$userDepo . "/" . $userDir . "/" . $source . "/" . $file);

    }
    
    public static function saveParametrs($userDir, $source, $data){
    
        $param = simplexml_load_file(self::$userDepo . "/" . $userDir  . "/" . $source . self::$config);

        foreach ($data as $key => $value) {
            
            $param->$key = "$value";
        }
        
        return $param->asXML(self::$userDepo . "/" . $userDir  . "/" . $source . self::$config);
        
    } 
    
    public static function getSourceData($userDir, $source){
        
        $source = simplexml_load_file(self::$userDepo . "/" . $userDir  . "/" . $source . self::$config);

        foreach ((array)$source as $key => $value) {
            if($value != 'NULL'){
                
                $data[$key] = $value;
            }else{$data[$key] = "";}
        }
        return $data;
    }    
    
    private static function createConfFile($source){
        
        $nodes = array('STORATIVITY','TRANSMISSIVITY','RECHARGE','RADIUS_WELL','TEST_DATA','OBSERV_DATA','WELL_DISTANCE','SKIN','WELL_STORAGE');
        
        $xml = new DOMDocument('1.0', 'utf-8');
        $xml->formatOutput = true;
        $obj = $xml->createElement( "SOURCE" );
        
        $date = $xml->createElement( "DATE", date("Y-m-d H:i:s") );
        $obj->appendChild( $date );
   
        $name = $xml->createElement( "SOURCE_NAME", "$source" );
        $obj->appendChild( $name );
        
        for($i = 0; $i < count($nodes); $i++){
        
            $elem = $xml->createElement( $nodes[$i], "NULL" );
            $obj->appendChild( $elem );           
        }
        
        $xml->appendChild( $obj ); 
        
        return $xml;
        
    }
    
    private function readConfFile($userDir, $source){
    
       $conf = simplexml_load_file(self::$userDepo . "/" . $userDir . "/" . $source . self::$config);
       var_dump($conf);
    }
    
}
?>