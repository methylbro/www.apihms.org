<?php

/**
 *
 *
 */
abstract class Module implements SPLObserver {
    protected $_Core;
    final public function __construct(Core &$Core) {
        $this->_Core = $Core;
        if (method_exists($this, '__loadModule')) {
            $this->__loadModule();
        }
    }
    public function core() {
        return $this->_Core;
    }
    final public function update(SplSubject $Core) {
        #$this->_Core = $Core;
        list($method, $arguments) = $this->_Core->trace();
        $method = '_'.$method;
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $arguments);
        }
    }
}

?>