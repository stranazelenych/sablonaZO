<?php
/**
 * WordPress overrides.
 *
 * @package SZ_Kandidatka
 * @version 0.1
 */

/**
 * @see sz_kandidatka_template_dropdown
 */
require_once __DIR__ . '/template.php';

/**
 * @see sz_kandidatka_get_templates
 */
require_once __DIR__ . '/theme.php';

/**
 * Display page attributes form fields.
 *
 * @param object $post
 */
function sz_kandidatka_attributes_meta_box( $post ) {
	if ( ( 'sz_kandidatka' != $post->post_type ) ||
	     !count( sz_kandidatka_get_templates() ) ) {
		return;
	}

	$template = !empty( $post->_sz_kandidatka_template ) ? $post->_sz_kandidatka_template : false;
    ?>
<p><strong><?php _e('Template') ?></strong></p>
<label class="screen-reader-text" for="page_template"><?php _e('Page Template') ?></label><select name="sz_kandidatka_template" id="sz_kandidatka_template">
<option value='default'><?php _e('Default Template'); ?></option>
<?php sz_kandidatka_template_dropdown( $template ); ?>
</select>
<?php
}

function sz_kandidatka_add_template_metabox() {
    add_meta_box(
		'szkandidatkadiv',
		'Vlasnosti kandidátky',
		'sz_kandidatka_attributes_meta_box',
		'sz_kandidatka',
		'side',
		'core'
	);
}
add_action(
	'add_meta_boxes_sz_kandidatka', 'sz_kandidatka_add_template_metabox'
);
