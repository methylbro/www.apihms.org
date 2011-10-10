<?php

class Apihms extends Module {

	static public $URLWriter;

    public function _bootstrap() {
    	if (!isset($_SESSION['apihms'])) {
    		$_SESSION['apihms'] = array();
    	}
        $this->_Core->url = (isset($_GET['url'])) ? $this->_Core->module('URLWriter')->findUrl($_GET['url']) : 'apihms/association/index';
        $this::$URLWriter = $this->_Core->module('URLWriter');
        require 'menu.php';
        require 'info.php';
        require 'actions-info.php';
        require 'model.php';
        require 'controller.php';
    }

}

?>