<?php
/**
 * WordPress overrides.
 *
 * @package SZ_Kandidatka
 * @version 0.1
 */

/**
 * @see sz_kandidatka_get_templates
 */
require_once __DIR__ . '/theme.php';

/**
 * {@internal Missing Short Description}}
 *
 * @param unknown_type $default
 */
function sz_kandidatka_template_dropdown( $default = '' ) {
	$templates = sz_kandidatka_get_templates();
	ksort( $templates );
	foreach ( array_keys( $templates ) as $template ) {
		if ( $default == $templates[$template] ) {
			$selected = " selected='selected'";
		} else  {
			$selected = '';
		}
		echo "\n\t<option value='$templates[$template]' $selected>$template</option>";
	}
}
