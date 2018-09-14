<?php

class ControllerService {

    private $controller;
    private $view;
    protected $model;
    
    protected $post;
    protected $get;
    protected $request;
    
    protected $response = [];
    protected $user;
    protected $msg = "";
    
    public static $saveParam = array('action', 'render', 'handle', 'msg', 'core', 'error');

    public function __construct($controller) {

        $this->controller = $controller;
        
        $this->user = new UserService();
        
        $this->view = new ViewsService($this->user);
        
        $this->view->msg = &$this->msg;

        $this->view->response = &$this->response;

        $this->model = Routing::getModel();

        $requestService = new Request();

        $this->get = $requestService->getGet();

        $this->post = $requestService->getPost();

        $this->request = $requestService->getRequest();

        $this->response = Routing::callAction($this->controller);

        $this->view->render = Routing::renderControl($this->controller);
 
    }

    public function getViewer() {

        return $this->view;
    }
    
    public function getResponse(){
        
        return $this->response;
    }
}

?>
