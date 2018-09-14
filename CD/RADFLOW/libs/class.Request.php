<?php

class Request {

    private $request = array();
    private $post = array();
    private $get = array();

    public function __construct() {

        if (!empty($_GET)) {

            foreach ($_GET as $key => $value) {

                if (!in_array($key, ControllerService::$saveParam)) {

                    $this->get[$key] = $value;
                    $this->request[$key] = $value;
                }
            }
        }

        if (isset($_POST)) {

            foreach ($_POST as $key => $value) {

                $this->post[$key] = $value;
                $this->request[$key] = $value;
            }
        }
    }

    public function getPost() {

        return $this->post;
    }

    public function getGet() {

        return $this->get;
    }

    public function getRequest() {

        return $this->request;
    }

}

?>