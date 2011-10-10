<?php
class View {

    const TPL_MAIN = 'page';
    const TPL_FILE = '.tpl.php';

    protected $variables = array();
    protected $_controller;
    protected $_action;

    protected function findTplFiles($loaded_tpl_files) {
        $page = $content = null;
        $pattern = array($this->_controller, $this->_controller.'-'.$this->_action);
        if (array_key_exists('id', $this->variables)) {
            $pattern[] = $this->_controller.'-'.$this->_action.'-'.$this->variables['id'];
        }
        $nb_pattern = count($pattern);
        $nb_files   = count($loaded_tpl_files);
        for ($i=0; $i<$nb_pattern; $i++) {
            for ($j=0; $j<$nb_files; $j++) {
                $name = basename($loaded_tpl_files[$j]);
                if ($name==self::TPL_MAIN.self::TPL_FILE || $name==self::TPL_MAIN.'-'.$pattern[$i].self::TPL_FILE) {
                    $page = $loaded_tpl_files[$j];
                }
                if ($name==$pattern[$i].self::TPL_FILE) {
                    $content = $loaded_tpl_files[$j];
                }
            }
        }
        return array($page, $content);
    }

    public function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action     = $action;
    }

    public function assign($name, $value) {
        $this->variables[$name] = $value;
    }

    public function render($loaded_tpl_files) {
        $page = function($tpl, $tpl_content, $variables) {
            extract($variables);
            $content = new ViewContent($tpl_content, $variables);
            unset($tpl_content, $variables);
            include $tpl;
        };
        list($tpl_page, $tpl_content) = $this->findTplFiles($loaded_tpl_files);
        $page($tpl_page, $tpl_content, $this->variables);
    }

}

?>