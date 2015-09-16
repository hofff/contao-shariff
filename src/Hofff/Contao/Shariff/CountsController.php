<?php

namespace Hofff\Contao\Shariff;

class CountsController {

	public function __construct() {
	}

	public function run() {
		while(ob_end_clean());

		if($this->precondition()) {
			header('Content-Type: application/json');
			echo json_encode($this->getShareCounts(\Input::get('url')));
		} else {
			header('HTTP/1.1 400 Bad Request');
		}
	}

	public function precondition() {
		if(!strlen(\Input::get('url'))) {
			return false;
		}

		$hash = hash('sha256', \Config::get('encryptionKey') . \Input::get('url') . \Config::get('encryptionKey'));

		return $hash == \Input::get('h');
	}

	public function getShareCounts($url) {
		return BackendFactory::getBackend()->get($url);
	}

}
