<?php

$GLOBALS['TL_DCA']['tl_page'] = call_user_func(function(array $dca) {
    $dca['palettes']['__selector__'][] = 'hofff_shariff_share_counts';
    $dca['palettes']['root'] .= ';{hofff_shariff_legend},hofff_shariff_share_counts';

    $dca['subpalettes']['hofff_shariff_share_counts'] = 'hofff_shariff_cache_ttl'
        . ',hofff_shariff_facebook_app_id,hofff_shariff_facebook_secret';

    $dca['fields']['hofff_shariff_share_counts'] = [
        'label'     => &$GLOBALS['TL_LANG']['tl_page']['hofff_shariff_share_counts'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => [
            'submitOnChange' => true,
            'tl_class'       => 'clr',
        ],
        'sql'       => 'char(1) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_cache_ttl'] = [
        'label'     => &$GLOBALS['TL_LANG']['tl_page']['hofff_shariff_cache_ttl'],
        'exclude'   => true,
        'inputType' => 'text',
        'default'   => 6 * 60 * 60,
        'eval'      => [
            'rgxp'     => 'digit',
            'tl_class' => 'clr w50',
        ],
        'sql'       => 'int(10) unsigned NULL',
    ];

    $dca['fields']['hofff_shariff_facebook_app_id'] = [
        'label'     => &$GLOBALS['TL_LANG']['tl_page']['hofff_shariff_facebook_app_id'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'tl_class' => 'clr w50',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_facebook_secret'] = [
        'label'     => &$GLOBALS['TL_LANG']['tl_page']['hofff_shariff_facebook_secret'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'tl_class' => 'w50',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    return $dca;
}, $GLOBALS['TL_DCA']['tl_page'] ?? []);
