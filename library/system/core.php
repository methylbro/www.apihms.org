<?php

class Core implements SplSubject {

    private $tmp       = array('loading', null);
    private $variables = array();
    private $_modules  = array();

    public function __construct() {
        $this->url = (isset($_GET['url'])) ? $_GET['url'] : null;
    }

    public function __get($name) {
        return $this->variables[$name];
    }

    public function __set($name, $value) {
        return $this->variables[$name] = $value;
    }

    public function __call($name, $arguments) {
        $this->tmp = array($name, $arguments);
        return $this->notify();
    }

    public function attach(SPLObserver $Module) {
        $this->_modules[get_class($Module)] = $Module;
        return $this;
    }

    public function detach(SPLObserver $Module) {
        $module_name = get_class($Module);
        if (in_array($module_name, $this->_modules)) {
            unset($this->_modules[$module_name]);
        }
        return $this;
    }

    public function notify() {
        $result = array();
        foreach($this->_modules as $module_name => $Module) {
            $result[$module_name] = $Module->update($this);
        }
        return $result;
    }

    public function trace() {
        return $this->tmp;
    }

    public function module($module) {
        return $this->_modules[$module];
    }

}

?>