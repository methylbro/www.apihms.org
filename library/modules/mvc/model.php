<?php

abstract class Model {

    protected $_model;
    protected $_table;

    public function __construct() {
        $this->_model = get_class($this);
        $this->_table = strtolower(str_replace('Model', null, $this->_model));
    }

}

?>