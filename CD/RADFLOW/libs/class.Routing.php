<?php

class Routing {

    public static function getLink($anchor, $current_core) {

        if (isset($anchor['core'])) {

            $core = $anchor['core'];
            unset($anchor['core']);
        } else {

            $core = $current_core;
        }
        if (isset($anchor['action'])) {

            $action = $anchor['action'];
            unset($anchor['action']);
        }

        $url = '';
        foreach ($anchor as $key => $value) {

            $url = $url . $key . "=" . $value . "&";
        }

        if (\GLOBALVAR\MOD_REWRITE) {

            return (isset($action)) ? \GLOBALVAR\ROOT . "/" . $core . "/" . $action . "/?" . $url : \GLOBALVAR\ROOT . "/" . $core . "/?" . $url;
        } else {

            return (isset($action)) ? \GLOBALVAR\ROOT . "/?core=" . $core . "&action=" . $action . "&" . $url : \GLOBALVAR\ROOT . "/?core=" . $core . "&" . $url;
        }
    }

    public static function getModel() {

        if (file_exists(\GLOBALVAR\MODELS_PATH . '/' . $_GET['core'] . 'Data.php')) {

            require_once \GLOBALVAR\MODELS_PATH . '/' . $_GET['core'] . 'Data.php';

            $class = $_GET['core'] . "Data";

            return new $class();
        }
    }

    public static function callAction($controller) {

        $response = array();
        
        if (isset($_GET['action']) && !empty($_GET['action'])) {

            if (method_exists($controller, 'action_' . $_GET['action'])) {

                $response = call_user_func(array($controller, 'action_' . $_GET['action']));
            }
        }

        if (method_exists($controller, 'action_main')) {

            $response  = array_merge($response ,call_user_func(array($controller, 'action_main')));
        }

        return $response;
    }

    public static function renderControl($controller) {

        $render = FALSE;

        if (isset($_GET['render'])) {

            $render = $_GET['render'];

            if (method_exists($controller, 'beforeRender_' . $_GET['render'])) {

                $return = call_user_func(array($controller, 'beforeRender_' . $_GET['render']));
                if ($return === FALSE) {

                    $render = FALSE;
                }
            }
        }

        return $render;
    }

}

?>