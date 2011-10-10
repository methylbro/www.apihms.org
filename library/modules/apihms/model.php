<?php

class ApihmModel extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function getUrls() {
		$result = array();
		$xml = new SimpleXMLElement(file_get_contents(__DIR__.'/datas/association.xml'));
		foreach($xml->section->page as $element) {
			$result[$element->uri] = $element->url;
		}
		$xml = new SimpleXMLElement(file_get_contents(__DIR__.'/datas/actions.xml'));
		foreach($xml->section->page as $element) {
			$result[$element->uri] = $element->url;
		}
		return $result;
	}

	public function getUrlsForUrlWriter() {
		$urls = $this->getUrls();
		$result = array();
		foreach($urls as $uri => $url) {
			$result['/'.str_replace('/', '\/', $uri).'/'] = $url;
		}
		return $result;
	}

	public function getAssociation($page) {
		$xml = new SimpleXMLElement(file_get_contents(__DIR__.'/datas/association.xml'));
		foreach($xml->section->page as $element) {
			if ($element->uri==$page) {
				return $element;
			}
		}
	}

	public function getAssociations($fields) {
		$result = array();
		$xml = new SimpleXMLElement(file_get_contents(__DIR__.'/datas/association.xml'));
		foreach($xml->section->page as $element) {
			$r = array();
			foreach($fields as $f) {
				$r[] = $element->$f;
			}
			$result[] = $r;
		}
		return $result;
	}

	public function getAction($action) {
		$xml = new SimpleXMLElement(file_get_contents(__DIR__.'/datas/actions.xml'));
		foreach($xml->section->page as $element) {
			if ($element->uri==$action) {
				return $element;
			}
		}
	}

	public function getActions($fields) {
		$result = array();
		$xml = new SimpleXMLElement(file_get_contents(__DIR__.'/datas/actions.xml'));
		foreach($xml->section->page as $element) {
			$r = array();
			foreach($fields as $f) {
				$r[] = $element->$f;
			}
			$result[] = $r;
		}
		return $result;
	}

}

?>