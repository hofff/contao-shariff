<?php

call_user_func(function() {
	$dca = include TL_ROOT . '/system/modules/hofff_shariff/dca/hofff_shariff.php';

	$GLOBALS['TL_DCA']['tl_module']['palettes']['hofff_shariff']
		= '{title_legend},name,headline,type'
		. $dca['palettes']['hofff_shariff']
		. ';{protected_legend:hide},protected'
		. ';{expert_legend:hide},guests,cssID,space';

	$GLOBALS['TL_DCA']['tl_module']['fields'] = array_replace(
		$GLOBALS['TL_DCA']['tl_module']['fields'],
		$dca['fields']
	);
});
