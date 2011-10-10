<?php

abstract class ApihmsInfo extends ViewContent {

	static public function show($v) {
		return $v!='remove' ? true : false;
	}

	public function __construct($URLWriter, $currentURL=null, $class=null) {
		$url = new StdClass;
		$url->show   = $currentURL.'/show';
		$url->remove = $currentURL.'/remove';
		$this->assign(
			array(
				'URLWriter'  => $URLWriter,
				'currentUrl' => $currentURL,
				'infoURL'	 => $url,
				'class'      => $class
			)
		);
	}

    public function assign($name, $value=null) {
    	if (is_array($name)) {
    		$this->variables = array_merge($this->variables, $name);
    	} else {
	        $this->variables[$name] = $value;
		}
    }

	public function visible($visible) {
		$this->variables['visible'] = $visible;
	}

}

?>