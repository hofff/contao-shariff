<?php

declare(strict_types=1);

namespace Hofff\Contao\Shariff;

class Util
{
    public static function prepareRendererParamsFromDatabaseRow(array $row): self
    {
        $params = [];

        foreach($row as $key => $value) {
            if(0 === strncmp($key, 'hofff_shariff_', 14)) {
                $params[substr($key, 14)] = $value;
            }
        }

        return $params;
    }
}
