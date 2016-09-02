<?php

namespace Hofff\Contao\Shariff;

use Heise\Shariff\Backend;

class BackendFactory {

	private static $backend;

	public static function getBackend() {
		if(!isset(self::$backend)) {
			$options = array(
// 				'domain' => null,
				'cache'	=> array(
					'ttl'		=> 6 * 60 * 60,
					'cacheDir'	=> TL_ROOT . '/system/tmp',
				),
				'services' => array(
					'AddThis',
					'Facebook',
					'Flattr',
					'GooglePlus',
					'LinkedIn',
					'Pinterest',
					'Reddit',
					'StumbleUpon',
					'Xing',
				),
			);

			self::$backend = new Backend($options);
		}

		return self::$backend;
	}

	protected function __construct() {
	}

	protected function __clone() {
	}

}
