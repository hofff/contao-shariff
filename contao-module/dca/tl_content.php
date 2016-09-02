<?php

call_user_func(function() {
	$dca = include TL_ROOT . '/system/modules/hofff_shariff/dca/hofff_shariff.php';

	$GLOBALS['TL_DCA']['tl_content']['palettes']['hofff_shariff']
		= '{type_legend},type,headline'
		. $dca['palettes']['hofff_shariff']
		. ';{protected_legend:hide},protected'
		. ';{expert_legend:hide},guests,cssID,space'
		. ';{invisible_legend:hide},invisible,start,stop';

	$GLOBALS['TL_DCA']['tl_content']['fields'] = array_replace(
		$GLOBALS['TL_DCA']['tl_content']['fields'],
		$dca['fields']
	);
});
