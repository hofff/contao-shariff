<?php

$GLOBALS['TL_DCA']['hofff_shariff'] = call_user_func(function(array $dca) {
    $dca['palettes']['hofff_shariff'] = ';{hofff_shariff_legend},hofff_shariff_services'
        . ',hofff_shariff_url,hofff_shariff_title'
        . ',hofff_shariff_orientation,hofff_shariff_theme'
        . ',hofff_shariff_referrer_track,hofff_shariff_share_count'
        . ';{hofff_shariff_flattr_legend},hofff_shariff_flattr_user,hofff_shariff_flattr_category'
        . ';{hofff_shariff_mail_legend},hofff_shariff_mail_subject,hofff_shariff_mail_body'
        . ';{hofff_shariff_pinterest_legend},hofff_shariff_media_url'
        . ';{hofff_shariff_twitter_legend},hofff_shariff_twitter_via';

    $dca['fields']['hofff_shariff_services'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['services'],
        'exclude'   => true,
        'inputType' => 'checkboxWizard',
        'options'   => $GLOBALS['TL_CONFIG']['hofff_shariff_services'],
        'reference' => &$GLOBALS['TL_LANG']['hofff_shariff']['service_options'],
        'eval'      => [
            'mandatory' => true,
            'multiple'  => true,
        ],
        'sql'       => 'blob NULL',
    ];

    $dca['fields']['hofff_shariff_url'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['url'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'rgxp'     => 'url',
            'tl_class' => 'clr long',
        ],
        'sql'       => 'varchar(1022) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_title'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['title'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'tl_class' => 'clr long',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_orientation'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['orientation'],
        'exclude'   => true,
        'inputType' => 'select',
        'options'   => ['horizontal', 'vertical'],
        'reference' => &$GLOBALS['TL_LANG']['hofff_shariff']['orientation_options'],
        'eval'      => [
            'tl_class' => 'clr w50',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_theme'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['theme'],
        'exclude'   => true,
        'inputType' => 'select',
        'options'   => ['standard', 'grey', 'white'],
        'reference' => &$GLOBALS['TL_LANG']['hofff_shariff']['theme_options'],
        'eval'      => [
            'tl_class' => 'w50',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_referrer_track'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['referrer_track'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'tl_class' => 'clr w50',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_share_count'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['share_count'],
        'exclude'   => true,
        'inputType' => 'checkbox',
        'eval'      => [
            'tl_class' => 'w50 cbx m12',
        ],
        'sql'       => 'char(1) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_flattr_user'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['flattr_user'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'tl_class' => 'clr w50',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_flattr_category'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['flattr_category'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'tl_class' => 'w50',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_mail_subject'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['mail_subject'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'decodeEntities' => true,
            'tl_class'       => 'clr long',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_mail_body'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['mail_body'],
        'exclude'   => true,
        'inputType' => 'textarea',
        'eval'      => [
            'decodeEntities' => true,
            'tl_class'       => 'clr',
        ],
        'sql'       => 'text NULL',
    ];

    $dca['fields']['hofff_shariff_media_url'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['media_url'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'rgxp'     => 'url',
            'tl_class' => 'clr long',
        ],
        'sql'        => 'varchar(1022) NOT NULL default \'\'',
    ];

    $dca['fields']['hofff_shariff_twitter_via'] = [
        'label'     => &$GLOBALS['TL_LANG']['hofff_shariff']['twitter_via'],
        'exclude'   => true,
        'inputType' => 'text',
        'eval'      => [
            'tl_class' => 'clr w50',
        ],
        'sql'       => 'varchar(255) NOT NULL default \'\'',
    ];

    return $dca;
}, $GLOBALS['TL_DCA']['hofff_shariff'] ?? []);
