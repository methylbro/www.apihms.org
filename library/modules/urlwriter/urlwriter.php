<?php

class URLWriter extends Module {

    public function _bootstrap() {
        $this->_Core->url = (isset($_GET['url'])) ? $this->findUrl($_GET['url']) : 'index';
    }

	public function getUrls() {
		$result = array();
		$xml = new SimpleXMLElement(file_get_contents(__DIR__.'/../apihms/datas/association.xml'));
		foreach($xml->section->page as $element) {
			$result[(string)$element->uri] = (string)$element->url;
		}
		$xml = new SimpleXMLElement(file_get_contents(__DIR__.'/../apihms/datas/actions.xml'));
		foreach($xml->section->page as $element) {
			$result[(string)$element->uri] = (string)$element->url;
		}
		return $result;
	}

    public function findUrl($alias) {
    	$u = $this->getUrls();
		if (in_array($alias, $u)) {
			return array_search($alias, $u);
		} else {
			return $alias;
    	}
    }

    public function findAlias($system) {
    	$u = $this->getUrls();
		if (array_key_exists((string)$system, $u)) {
			return $u[(string)$system];
		} else {
			return $system;
    	}
    }

}

?>