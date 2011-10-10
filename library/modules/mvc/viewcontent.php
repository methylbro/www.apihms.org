<?php

class ViewContent {

    protected $tpl_file;
    protected $variables = array();

    public function  __construct($tpl, array $variables) {
        $this->tpl_file  = $tpl;
        $this->variables = $variables;
    }

    public function  __toString() {
        $content = function($tpl, $variables) {
            extract($variables);
            unset($variables);
            include $tpl;
        };
        $content($this->tpl_file, $this->variables);
        return '';
    }

}

?>
