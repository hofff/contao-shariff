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
		$tpl->backend_url = $this->options['share_count'] ? $this->getBackendURL() : null;
		$tpl->url = $this->getURL();
		$tpl->mail_subject = $this->replaceTokens($this->options['mail_subject']);
		$tpl->mail_body = $this->replaceTokens($this->options['mail_body']);
		return $tpl->parse();
	}

	public function replaceTokens($content) {
		$tokens = array();
		$tokens['##url##'] = $this->getURL();

		$content = str_replace(array_keys($tokens), array_values($tokens), $content);

		return $content;
	}

	public function getURL() {
		if(isset($this->options['url']) && strlen($this->options['url'])) {
			return $this->options['url'];
		}
		return \Environment::get('base') . \Environment::get('request');
	}

	public function getBackendURL() {
		$url = \Environment::get('base') . 'system/modules/hofff_shariff/endpoints/counts.php';
		$url .= '?h=' . hash('sha256', \Config::get('encryptionKey') . $this->getURL() . \Config::get('encryptionKey'));
		return $url;
	}

}
