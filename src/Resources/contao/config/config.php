<?php

$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'addthis';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'diaspora';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'facebook';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'flattr';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'flipboard';
// $GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'info';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'linkedin';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'mail';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'pinterest';
// $GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'print';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'qzone';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'reddit';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'stumbleupon';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'telegram';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'tencent';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'threema';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'tumblr';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'twitter';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'vk';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'weibo';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'whatsapp';
$GLOBALS['TL_CONFIG']['hofff_shariff_services'][] = 'xing';

$GLOBALS['TL_CTE']['links']['hofff_shariff']
    = \Hofff\Contao\Shariff\Frontend\ContentShariff::class;

$GLOBALS['FE_MOD']['miscellaneous']['hofff_shariff']
    = \Hofff\Contao\Shariff\Frontend\ModuleShariff::class;
