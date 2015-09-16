<?php

namespace Hofff\Contao\Shariff;

class ContentShariff extends \ContentElement {

	protected $shariff;

	public function __construct($element) {
		parent::__construct($element);
	}

	public function generate() {
		if(TL_MODE == 'BE') {
			$tpl = new \BackendTemplate('be_wildcard');
			$tpl->wildcard = '### Shariff ###';
			$tpl->title = $this->headline;
			$tpl->id = $this->id;
			$tpl->link = $this->name;
			$tpl->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
			return $tpl->parse();
		}

		$this->strTemplate = 'ce_hofff_shariff';

		return parent::generate();
	}

	protected function compile() {
		$this->Template->shariff = Shariff::createFromDBRow($this->arrData);
	}

}
