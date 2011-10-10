<?php

class MVC extends Module {

    const AUTOLOAD_CONTROLLER_CLASS = false;

    public function __loadModule() {
        $this->_Core->mvc_views = array();
    }

    public function _bootstrap() {
        require 'model.php';
        require 'view.php';
        require 'viewcontent.php';
        require 'controller.php';
    }

    public function _start() {
        $query      = explode('/', $this->_Core->url);
        $controller = array_shift($query);
        $action     = array_shift($query);
        $model      = rtrim($controller, 's').'Model';
        try {
	        $this->_Core->mvc_dispatch($model, $controller, $action, $query);
		} catch (Exception $e) {
			header("HTTP/1.1 404 Not Found");
			echo 'Page introuvable';
		}
    }

    public function _loadedModule($Module, $path) {
        $path.= 'views/';
        if (is_dir($path)) {
            $d = dir($path);
            $views = $this->_Core->mvc_views;
            while (false!==($entry=$d->read())) {
            	$entry = $path.$entry;
                if (is_file($entry) && strpos($entry, '.tpl.php')) {
                    $views[] = $entry;
                }
            }
            $d->close();
            $this->_Core->mvc_views = $views;
        }
    }

    public function _mvc_dispatch($model, $controller, $action, $params) {
        $ctrl = ucwords($controller).'Controller';
        if (class_exists($ctrl, self::AUTOLOAD_CONTROLLER_CLASS)) {
            if (get_parent_class($ctrl)=='Controller') {
                $dispatch = new $ctrl($model, $controller, $action);
                $this->_Core->mvc_action($dispatch, $action, $params);
                $dispatch->_view($this->_Core->mvc_views);
            } else {
                throw new Exception('Controller incorrect');
            }
        } else {
            throw new Exception('Controller introuvable');
        }
    }

    public function _mvc_action(Controller $dispatch, $action, $params) {
        $method = new ReflectionMethod(get_class($dispatch), $action);
        if ($method->getNumberOfRequiredParameters()<=count($params)) {
            $method->invokeArgs($dispatch, $params);
        } else {
            throw new Exception('Argument(s) manquant(s)');
        }
    }

}

?>