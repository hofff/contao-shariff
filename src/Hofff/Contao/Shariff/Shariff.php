<?php

namespace Hofff\Contao\Shariff;

class Shariff {

	public static function createFromDBRow($row) {
		$options = array();
		foreach($row as $key => $value) {
			if(0 === strncmp($key, 'hofff_shariff_', 14)) {
				$options[substr($key, 14)] = $value;
			}
		}
		return new self($options);
	}

	private $options;

	public function __construct(array $options = null) {
		$this->options = (array) $options;
	}

	public function embed() {
		$tpl = new \FrontendTemplate('hofff_shariff');
		$tpl->setData($this->options);
		$tpl->backendURL = $this->options['share_count'] ? $this->getBackendURL() : null;
		$tpl->url = $this->getURL();
		return $tpl->parse();
	}

	public function getURL() {
		if(isset($this->options['url']) && strlen($this->options['url'])) {
			return $this->options['url'];
		}
		$url = \Environment::get('base') . \Environment::get('request');
		$url = preg_replace('@(\\?|&)shariff=counts($|&)@', '$1', $url, 1);
		$url = preg_replace('@(\\?|&)url=[^&]*($|&)@', '$1', $url, 1);
		$url = rtrim($url, '?');
		return $url;
	}

	public function getBackendURL() {
		$url = \Environment::get('base') . \Environment::get('request');
		$url .= false === strpos($url, '?') ? '?' : '&';
		$url .= 'shariff=counts';
		return $url;
	}

	public function isBackendRequested() {
		return \Input::get('shariff') == 'counts' && \Input::get('url') == $this->getURL();
	}

	public function sendCountsIfBackendRequested() {
		if($this->isBackendRequested()) {
			$this->sendCounts();
		}
	}

	public function sendCounts() {
		while(ob_end_clean());
		header('Content-Type: application/json');
		echo json_encode($this->getShareCounts());
		exit;
	}

	public function getShareCounts() {
		return BackendFactory::getBackend()->get($this->getURL());
	}

}
