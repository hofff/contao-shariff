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

		$verify = \Input::get('p');
		$verify = strtr($verify, '-_', '+/') . str_repeat('=', max(0, strlen($verify) % 4 - 1));
		$verify = \Encryption::decrypt($verify);

		return \Input::get('url') == $verify;
	}

	public function getShareCounts($url) {
		return BackendFactory::getBackend()->get($url);
	}

}
