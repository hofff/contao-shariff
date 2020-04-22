<?php

$GLOBALS['TL_DCA']['tl_module'] = call_user_func(function(array $dca) {
    $builder = new \Hofff\Contao\Shariff\Dca\ShariffDcaBuilder();
    $dca = $builder->build($dca, 'name,headline,type');

    return $dca;
}, $GLOBALS['TL_DCA']['tl_module'] ?? []);
