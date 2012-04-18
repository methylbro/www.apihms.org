<?php

class ApihmsController extends Controller {

	private function setInfos(ApihmsInfo $ApihmsInfo=null, $show=null, $redirect=null) {
		if (!is_null($ApihmsInfo)) {
			$name = get_class($ApihmsInfo);
			if (!isset($_SESSION['apihms'][$name])) {
				$_SESSION['apihms'][$name] = null;
			}
			if (!is_null($show)) {
				$show = $ApihmsInfo::show($show);
				$_SESSION['apihms'][$name] = $show;
				if (!is_null($redirect)) {
					header('HTTP/1.1 303 See Other');
					header('Location: /'.Apihms::$URLWriter->findAlias($redirect));
				}
			} elseif (!is_null($_SESSION['apihms'][$name])) {
				$show = $_SESSION['apihms'][$name];
			} else {
				$show = true;
			}
			$ApihmsInfo->visible($show);
		}
		$this->assign('infos', $ApihmsInfo);
	}

	private function prepare($Page, ApihmsMenu $ApihmsMenu, ApihmsMenu $ApihmsQuickLinkMenu) {
		$this->assign('URLWriter',   Apihms::$URLWriter);
		$this->assign('menu', 		 $ApihmsMenu);
		$this->assign('quick_links', $ApihmsQuickLinkMenu);
		$this->assign('page', 		 $Page);
	}

	public function association($page, $show_infos=null) {
		$page = 'apihms/association/'.$page;
		if (!$Apihms=$this->_model->getAssociation($page)) {
			throw new Exception('Données introuvables');
		}
		$this->prepare(
			$Apihms,
			new ApihmsMenu(
				$this->_model->getAssociations(array('uri', 'title', 'hide')),
				Apihms::$URLWriter,
				$page,
				'menu'
			),
			new ApihmsMenu(
				array(
					array($page, 'Association'),
					array('apihms/actions/transports-universitaires', 'Actions')
				),
				Apihms::$URLWriter,
				$page,
				'content'
			)
		);
		$actions = $this->_model->getActions(array('uri', 'title'));
		shuffle($actions);
		$this->setInfos(
			new ApihmsActionsInfo(
				$actions,
				Apihms::$URLWriter,
				$page
			),
			$show_infos,
			$page
		);
	}

	public function actions($action) {
		$action = 'apihms/actions/'.$action;
		if (!$Apihms=$this->_model->getAction($action)) {
			throw new Exception('Données introuvables');
		}
		$this->prepare(
			$Apihms,
			new ApihmsMenu(
				$this->_model->getActions(array('uri', 'title')),
				Apihms::$URLWriter,
				$action,
				'menu'
			),
			new ApihmsMenu(
				array(
					array('apihms/association/index', 'Association'),
					array($action, 'Actions')
				),
				Apihms::$URLWriter,
				$action,
				'content'
			)
		);
		$this->setInfos();
	}
}

?>