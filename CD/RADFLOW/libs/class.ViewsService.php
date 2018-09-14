<?php

class ViewsService {

// Initialization in Class BootUp.php    
    public $core;
    public $render;
    protected $user;
    public $msg;

    public function __construct($user) {

        $this->user = $user;
    }

// render(string - name of included file, string or array(string) - permission rules)
    public function render($temp, $permit = NULL) {

// pokud je nastaveno opravneni, je provedena autorizace uzivatele
        if (!empty($permit)):

            if (!$this->user->isAllowed($permit)) {

                ErrorLogHandling::register("Unauthorized access attempted . TEMP: $temp  " . __LINE__ . " ,method: " . __METHOD__);
                return FALSE;
            }

        endif;

        if ($this->render == $temp) {

            $path = \GLOBALVAR\VIEWS_PATH . "/" . $this->core . "/" . $temp . '.php';

            if (file_exists($path)) {

                require_once $path;
            } else {

                require_once \GLOBALVAR\VIEWS_PATH . "/error/index.php";
            }
        }
    }

    public function embed($file) {

        if (file_exists(\GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/' . $file)) {

            include \GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/' . $file;
        }
    }

    public function write($str) {

        if (!empty($str)) {

            echo htmlspecialchars($str);
        }
    }

    function print_($key) {
        
        if (is_array($key)) {
            
            $response = $this->response;
            
            for($i = 0; $i < (count($key) - 1); $i++){
                
                if(isset($response[$key[$i]])){
                    
                    $response = $response[$key[$i]];
                };
            };
            
            if(isset($response[$key[count($key) - 1]])){ echo htmlspecialchars($response[$key[count($key) - 1]]);}
            
        } else {       

            if (isset($this->response[$key])) {

                echo htmlspecialchars($this->response[$key]);
            }
        }
    }

    function var_($key) {

        if (is_array($key)) {
            
            $response = $this->response;
            
            for($i = 0; $i < (count($key) - 1); $i++){
                
                if(isset($response[$key[$i]])){
                    
                    $response = $response[$key[$i]];
                };
            };
            
            if(isset($response[$key[count($key) - 1]])){ return $response[$key[count($key) - 1]];}
            
        } else {
            
            if (isset($this->response[$key])) {

                return $this->response[$key];
            }
        }
    }

    public function getFormHead($anchor) {

        $head = "";

        $anchor['core'] = isset($anchor['core']) ? $anchor['core'] : $this->core;

        foreach ($anchor as $key => $value) {

            $head = $head . "<input type='hidden' id=" . $key . " name=" . $key . " value=" . $value . ">";
        }

        echo $head;
    }

    public function link($anchor) {

        echo Routing::getLink($anchor, $this->core);
    }

    public function render_header() {

        if (file_exists(\GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/header.php')) {

            include \GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/header.php';
        } else {

            include \GLOBALVAR\BASE_PATH . '/req/header.php';
        }
    }

    public function render_navi() {

        if (file_exists(\GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/navi.php')) {

            include \GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/navi.php';
        } else {

            include \GLOBALVAR\BASE_PATH . '/req/navi.php';
        }
    }

    public function render_foot() {

        if (file_exists(\GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/foot.php')) {

            include \GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/foot.php';
        } else {

            include \GLOBALVAR\BASE_PATH . '/req/foot.php';
        }
    }

    public function render_page() {

        include \GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/index.php';
    }

    public function render_webHead() {

        include \GLOBALVAR\VIEWS_PATH . '/' . $this->core . '/head.php';
    }

    public function get_msg() {

        echo htmlspecialchars($this->msg);
    }

}

?>