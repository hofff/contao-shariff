<?php

define('TL_SCRIPT', 'counts.php');

define('TL_MODE', 'FE');
require __DIR__ . '/../../../initialize.php';

(new Hofff\Contao\Shariff\CountsController)->run();
