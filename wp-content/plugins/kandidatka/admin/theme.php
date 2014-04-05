<?php
/**
 * WordPress overrides.
 *
 * @package SZ_Kandidatka
 * @version 0.1
 */

/**
 * Get the Page Templates available in this theme
 *
 * @return array Key is the template name, value is the filename of the template
 */
function sz_kandidatka_get_templates() {
	return array_flip( wp_get_theme()->get_page_templates() );
}
