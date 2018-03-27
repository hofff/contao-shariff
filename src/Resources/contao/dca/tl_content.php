<?php

call_user_func(function() {
    $builder = new \Hofff\Contao\Shariff\Dca\ShariffDcaBuilder();
    $builder->build($GLOBALS['TL_DCA']['tl_content']);
});
