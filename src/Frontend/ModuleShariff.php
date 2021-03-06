<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff\Frontend;

use Contao\Module;
use Contao\ModuleModel;
use Contao\System;
use Hofff\Contao\Shariff\ShariffRenderer;
use Hofff\Contao\Shariff\Util;

class ModuleShariff extends Module
{
    public function __construct(ModuleModel $element, string $column = 'main')
    {
        parent::__construct($element, $column);
    }

    public function generate(): string
    {
        if(TL_MODE == 'BE') {
            $tpl = new \BackendTemplate('be_wildcard');
            $tpl->wildcard = '### Shariff ###';
            $tpl->title = $this->headline;
            $tpl->id = $this->id;
            $tpl->link = $this->name;
            $tpl->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $tpl->parse();
        }

        $this->strTemplate = 'mod_hofff_shariff';

        return parent::generate();
    }

    protected function compile(): void
    {
        /** @var ShariffRenderer $renderer */
        $renderer = System::getContainer()->get(ShariffRenderer::class);
        $params = Util::prepareRendererParamsFromDatabaseRow($this->arrData);
        $rootPageId = (int) $GLOBALS['objPage']->rootId;

        $this->Template->shariff = $renderer->render($params, $rootPageId);
    }
}
