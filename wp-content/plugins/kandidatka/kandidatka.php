<?php
/**
 * @package SZ_Kandidatka
 * @version 0.1
 */

require_once __DIR__ . '/admin/meta-boxes.php';

/**
 * Plugin Name: Kandidátka
 * Plugin URI: https://github.com/stranazelenych/kandidatka
 * Description: Evidence kandidátů Strany zelených
 * Version: 0.1.0
 * Author: Strana zelených <info@zeleni.cz>
 * Author URI: http://zeleni.cz
 * Author: Filip Zrůst <filip.zrust@sinsir.net>
 * Author URI: http://sinsir.net
 * License: MIT
 */

/**
 * Registers the new post type "sz_kandidatka".
 *
 * @see register_post_type
 */
function sz_kandidatka_init() {
	register_post_type( 'sz_kandidatka', array(
		'labels' => array(
			'name' => 'Kandidátky',
			'singular_name' => 'Kandidátka',
			'name_admin_bar' => 'Vytvořit kandidátku',
			'all_items' => 'Přehled kandidátek',
			'add_new' => 'Vytvořit kandidátku',
			'add_new_item' => 'Vytvořit novou kandidátku',
			'edit_item' => 'Upravit kandidátku',
			'new_item' => 'Vytvořit kandidátku'
		),
		'public' => true,
		'capability_type' => 'page',
		'supports' => array(
			'title', 'editor', 'thumbnail', 'custom-fields',
			'page-attributes'
		),
		'rewrite' => array(
			'slug' => 'kandidatka'
		)
	));
}
add_action( 'init', 'sz_kandidatka_init' );

/**
 * Saves custom template for "sz_kandidatka" post.
 *
 * It uses metadata with "_sz_kandidatka_template" name.
 *
 * @param integer $post_id
 * @param object $post
 */
function sz_kandidatka_save_template( $post_id, $post ) {
	if ( ( 'sz_kandidatka' != $post->post_type ) ||
	     empty( $_POST['sz_kandidatka_template'] ) ) {
		return;
	}

	update_post_meta(
		$post->ID,
		'_sz_kandidatka_template',
		$_POST['sz_kandidatka_template']
	);
}
add_action( 'save_post', 'sz_kandidatka_save_template', 10, 2 );

/**
 * Loads a template from "kandidatka" custom template.
 *
 * @param string $template
 * @return string
 */
function sz_kandidatka_get_template_for_template_loader( $template ) {
	global $wp_query;

	$post = $wp_query->get_queried_object();
	if ( $post ) {
		$post_template = get_post_meta(
			$post->ID, '_sz_kandidatka_template', true
		);

		if ( !empty( $post_template ) && ( 'default' != $post_template ) ) {
			$template = get_stylesheet_directory() . '/' . $post_template;
		}
	}

	return $template;
}
add_filter(
	'template_include', 'sz_kandidatka_get_template_for_template_loader', 99
);

/**
 * Renders custom CSS for custom fields edits.
 */
function sz_kandidatka_admin_head() {
	?>
<style>
</style>
	<?php
}
//add_action( 'acf/input/admin_head', 'sz_kandidatka_admin_head' );
