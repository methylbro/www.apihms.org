<?php

abstract class Controller {

    protected $_controller;
    protected $_action;
    protected $_model;
    protected $_view;

    public function __construct($model, $controller, $action) {
        $this->_controller = $controller;
        $this->_action     = $action;
        $this->_model      = new $model;
        $this->_view       = new View($controller, $action);
    }

    protected function assign($name, $value) {
        $this->_view->assign($name, $value);
    }

    public function _view($loaded_tpl_files) {
        $this->_view->render($loaded_tpl_files);
    }

}

?>