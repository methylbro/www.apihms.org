<?php

class ApihmsMenu extends ViewContent {

	public function __construct($menu, $URLWriter, $currentURL=null, $class=null) {
		$this->variables = array(
			'elements'   => $menu,
			'URLWriter'  => $URLWriter,
			'currentUrl' => $currentURL,
			'class'      => $class
		);
		$this->tpl_file = __DIR__.'/views/menu.tpl.php';
	}

}

?>