<?php

define('TL_SCRIPT', 'counts.php');
define('TL_MODE', 'FE');

$init = __DIR__ . '/../../../../../../system/initialize.php';
if(is_file($init)) { // module installed via symlinks from composer vendors
	require $init;
} else { // module copied into modules dir
	require __DIR__ . '/../../../initialize.php';
}

(new Hofff\Contao\Shariff\CountsController)->run();
