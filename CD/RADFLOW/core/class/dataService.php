<?php

class dataService {

    private static $userDepo = \GLOBALVAR\USERDEPO_PATH;
    private static $config = "/config.xml";

    public static function getData($userDir, $source) {

        $conf = simplexml_load_file(self::$userDepo . "/" . $userDir . "/" . $source . self::$config);

        $file = (string) $conf->TEST_DATA;

        if ($file == "NULL") {

            return false;
        }

        $data = array("t" => array(), "s" => array());

        if (($handle = fopen(self::$userDepo . "/" . $userDir . "/" . $source . "/" . $file, "r") ) !== FALSE) {

            while (($source = fgetcsv($handle, 1000, "\t")) !== FALSE) {

                array_push($data["t"], str_replace(",", ".", $source[0]));
                array_push($data["s"], str_replace(",", ".", $source[1]));
            }
            fclose($handle);
        }

        return $data;
    }

    public static function getSourceData($userDir, $source) {

        $source = simplexml_load_file(self::$userDepo . "/" . $userDir . "/" . $source . self::$config);

        foreach ((array) $source as $key => $value) {
            if ($value != 'NULL') {

                $data[$key] = $value;
            } else {
                $data[$key] = "";
            }
        }
        return $data;
    }

    public static function saveParametrs($userDir, $source, $data) {

        $param = simplexml_load_file(self::$userDepo . "/" . $userDir . "/" . $source . self::$config);

        foreach ($data as $key => $value) {

            $param->$key = "$value";
        }

        return $param->asXML(self::$userDepo . "/" . $userDir . "/" . $source . self::$config);
    }

}

?>