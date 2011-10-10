<?php

class ApihmsActionsInfo extends ApihmsInfo {

	public function __construct($Actions, $URLWriter, $currentURL=null, $class=null) {
		parent::__construct($URLWriter, $currentURL, $class);
		$this->assign(
			array(
				'title' => "Les actions de l'APIHMS",
				'actions' => $Actions,
				'nombre' => 4
			)
		);
		$this->tpl_file = __DIR__.'/views/actions-info.tpl.php';
	}

}

?>