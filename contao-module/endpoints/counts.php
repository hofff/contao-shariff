<?php

define('TL_SCRIPT', 'counts.php');
define('TL_MODE', 'FE');

foreach([
    __DIR__ . '/../../../initialize.php', // system/modules (Contao 3.5 and Contao 4 if installed manually)
    __DIR__ . '/../../../../../../../system/initialize.php', // Contao 3.5 with Composer
    __DIR__ . '/../../../../../../system/initialize.php', // Contao 4 with Composer
] as $script) {
    if(file_exists($script)) {
        require_once $script;
        break;
    }
}

(new Hofff\Contao\Shariff\CountsController)->run();
