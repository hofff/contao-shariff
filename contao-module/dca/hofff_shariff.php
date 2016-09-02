<?php

return call_user_func(function() {
	System::loadLanguageFile('hofff_shariff');

	$dca = array();

	$dca['palettes']['hofff_shariff'] = ';{hofff_shariff_legend},hofff_shariff_services'
		. ',hofff_shariff_url,hofff_shariff_title'
		. ',hofff_shariff_orientation,hofff_shariff_theme'
		. ',hofff_shariff_referrer_track,hofff_shariff_share_count'
		. ';{hofff_shariff_flattr_legend},hofff_shariff_flattr_user,hofff_shariff_flattr_category'
		. ';{hofff_shariff_mail_legend},hofff_shariff_mail_subject,hofff_shariff_mail_body'
		. ';{hofff_shariff_pinterest_legend},hofff_shariff_media_url'
		. ';{hofff_shariff_twitter_legend},hofff_shariff_twitter_via';

	$dca['fields']['hofff_shariff_services'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['services'],
		'exclude'	=> true,
		'inputType'	=> 'checkboxWizard',
		'options'	=> $GLOBALS['TL_CONFIG']['hofff_shariff_services'],
		'reference'	=> &$GLOBALS['TL_LANG']['hofff_shariff']['service_options'],
		'eval'		=> array(
			'mandatory'	=> true,
			'multiple'	=> true,
		),
		'sql'		=> "blob NULL",
	);

	$dca['fields']['hofff_shariff_url'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['url'],
		'exclude'	=> true,
		'inputType'	=> 'text',
		'eval'		=> array(
			'rgxp'		=> 'url',
			'tl_class'	=> 'clr long',
		),
		'sql'		=> "varchar(1022) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_title'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['title'],
		'exclude'	=> true,
		'inputType'	=> 'text',
		'eval'		=> array(
			'tl_class'	=> 'clr long',
		),
		'sql'		=> "varchar(255) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_orientation'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['orientation'],
		'exclude'	=> true,
		'inputType'	=> 'select',
		'options'	=> array('horizontal', 'vertical'),
		'reference'	=> &$GLOBALS['TL_LANG']['hofff_shariff']['orientation_options'],
		'eval'		=> array(
			'tl_class'	=> 'clr w50',
		),
		'sql'		=> "varchar(255) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_theme'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['theme'],
		'exclude'	=> true,
		'inputType'	=> 'select',
		'options'	=> array('standard', 'grey', 'white'),
		'reference'	=> &$GLOBALS['TL_LANG']['hofff_shariff']['theme_options'],
		'eval'		=> array(
			'tl_class'	=> 'w50',
		),
		'sql'		=> "varchar(255) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_referrer_track'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['referrer_track'],
		'exclude'	=> true,
		'inputType'	=> 'text',
		'eval'		=> array(
			'tl_class'	=> 'clr w50',
		),
		'sql'		=> "varchar(255) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_share_count'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['share_count'],
		'exclude'	=> true,
		'inputType'	=> 'checkbox',
		'eval'		=> array(
			'tl_class'	=> 'w50 cbx m12',
		),
		'sql'		=> "char(1) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_flattr_user'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['flattr_user'],
		'exclude'	=> true,
		'inputType'	=> 'text',
		'eval'		=> array(
			'tl_class'	=> 'clr w50',
		),
		'sql'		=> "varchar(255) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_flattr_category'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['flattr_category'],
		'exclude'	=> true,
		'inputType'	=> 'text',
		'eval'		=> array(
			'tl_class'	=> 'w50',
		),
		'sql'		=> "varchar(255) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_mail_subject'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['mail_subject'],
		'exclude'	=> true,
		'inputType'	=> 'text',
		'eval'		=> array(
			'decodeEntities'=> true,
			'tl_class'	=> 'clr long',
		),
		'sql'		=> "varchar(255) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_mail_body'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['mail_body'],
		'exclude'	=> true,
		'inputType'	=> 'textarea',
		'eval'		=> array(
			'decodeEntities'=> true,
			'tl_class'	=> 'clr',
		),
		'sql'		=> "text NULL",
	);

	$dca['fields']['hofff_shariff_media_url'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['media_url'],
		'exclude'	=> true,
		'inputType'	=> 'text',
		'eval'		=> array(
			'rgxp'		=> 'url',
			'tl_class'	=> 'clr long',
		),
		'sql'		=> "varchar(1022) NOT NULL default ''",
	);

	$dca['fields']['hofff_shariff_twitter_via'] = array(
		'label'		=> &$GLOBALS['TL_LANG']['hofff_shariff']['twitter_via'],
		'exclude'	=> true,
		'inputType'	=> 'text',
		'eval'		=> array(
			'tl_class'	=> 'clr w50',
		),
		'sql'		=> "varchar(255) NOT NULL default ''",
	);

	return $dca;
});
