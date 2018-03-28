<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff\Dca;

use Contao\Controller;
use Contao\System;

class ShariffDcaBuilder
{
    /** @var array */
    private $dcaTemplate;

    public function __construct()
    {
        System::loadLanguageFile('hofff_shariff');
        Controller::loadDataContainer('hofff_shariff');
        $this->dcaTemplate = $GLOBALS['TL_DCA']['hofff_shariff'];
    }

    public function build(array $dca): array
    {
        $dca['palettes']['hofff_shariff']
            = '{type_legend},type,headline'
                . $this->dcaTemplate['palettes']['hofff_shariff']
            . ';{protected_legend:hide},protected'
            . ';{expert_legend:hide},guests,cssID,space'
            . ';{invisible_legend:hide},invisible,start,stop';

        $dca['fields'] = array_replace(
            $dca['fields'],
            $this->dcaTemplate['fields']
        );

        return $dca;
    }
}
