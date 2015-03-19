<?php

$GLOBALS['TL_DCA']['tl_module']['palettes']['hofff_shariff']
	= '{title_legend},name,headline,type'
	. ';{hofff_shariff_legend},hofff_shariff_services,hofff_shariff_url'
	. ',hofff_shariff_referrer_track,hofff_shariff_twitter_via'
	. ',hofff_shariff_orientation,hofff_shariff_theme'
	. ';{protected_legend:hide},protected'
	. ';{expert_legend:hide},guests,cssID,space';

$GLOBALS['TL_DCA']['tl_module']['fields']['hofff_shariff_services'] = array(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['hofff_shariff_services'],
	'exclude'	=> true,
	'inputType'	=> 'checkbox',
	'options'	=> array('facebook', 'twitter', 'googleplus', 'whatsapp', 'mail', 'info'),
	'reference'	=> &$GLOBALS['TL_LANG']['tl_module']['hofff_shariff_services_options'],
	'eval'		=> array(
		'mandatory'	=> true,
		'multiple'	=> true,
	),
	'sql'		=> "blob NULL",
	'sql'		=> "varchar(255) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['hofff_shariff_url'] = array(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['hofff_shariff_url'],
	'exclude'	=> true,
	'inputType'	=> 'text',
	'eval'		=> array(
		'rgxp'		=> 'url',
		'tl_class'	=> 'clr long',
	),
	'sql'		=> "varchar(1022) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['hofff_shariff_referrer_track'] = array(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['hofff_shariff_referrer_track'],
	'exclude'	=> true,
	'inputType'	=> 'text',
	'eval'		=> array(
		'tl_class'	=> 'clr w50',
	),
	'sql'		=> "varchar(255) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['hofff_shariff_twitter_via'] = array(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['hofff_shariff_twitter_via'],
	'exclude'	=> true,
	'inputType'	=> 'text',
	'eval'		=> array(
		'tl_class'	=> 'w50',
	),
	'sql'		=> "varchar(255) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['hofff_shariff_orientation'] = array(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['hofff_shariff_orientation'],
	'exclude'	=> true,
	'inputType'	=> 'select',
	'options'	=> array('horizontal', 'vertical'),
	'reference'	=> &$GLOBALS['TL_LANG']['tl_module']['hofff_shariff_orientation_options'],
	'eval'		=> array(
		'tl_class'	=> 'clr w50',
	),
	'sql'		=> "varchar(255) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_module']['fields']['hofff_shariff_theme'] = array(
	'label'		=> &$GLOBALS['TL_LANG']['tl_module']['hofff_shariff_theme'],
	'exclude'	=> true,
	'inputType'	=> 'select',
	'options'	=> array('standard', 'grey'),
	'reference'	=> &$GLOBALS['TL_LANG']['tl_module']['hofff_shariff_theme_options'],
	'eval'		=> array(
		'tl_class'	=> 'w50',
	),
	'sql'		=> "varchar(255) NOT NULL default ''",
);
