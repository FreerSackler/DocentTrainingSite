<?php
/**
 * Exhibitions Training Plugin
 *
 * @link              http://www.asia.si.edu
 * @since             1.0.0
 * @package           Fs_Exhibitions
 *
 * @wordpress-plugin
 * Plugin Name:       Exhibitions Training Plugin
 * Plugin URI:        https://github.com/FreerSackler/DocentTrainingSite
 * Description:       Post type for exhibitions training modules.
 * Version:           1.0.0
 * Author:            Freer|Sackler
 * Author URI:        http://www.asia.si.edu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fs-exhibitions
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


function cptui_register_my_cpts_training() {

	/**
	 * Post Type: Exhibitions.
	 */

	$labels = array(
		"name" => __( 'Exhibitions', 'twentyseventeen' ),
		"singular_name" => __( 'Exhibitions', 'twentyseventeen' ),
	);

	$args = array(
		"label" => __( 'Exhibitions', 'twentyseventeen' ),
		"labels" => $labels,
		"description" => "Past, present, future exhibits.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "exhibitions", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-awards",
		"supports" => array( "title", "editor", "thumbnail", "revisions" ),
		"taxonomies" => array( "category", "post_tag" ),
	);

	register_post_type( "exhibitions", $args );
}

add_action( 'init', 'cptui_register_my_cpts_training' );




function cptui_register_my_taxes_gallery() {

	/**
	 * Taxonomy: Galleries.
	 */

	$labels = array(
		"name" => __( 'Galleries', 'twentyseventeen' ),
		"singular_name" => __( 'Gallery', 'twentyseventeen' ),
	);

	$args = array(
		"label" => __( 'Galleries', 'twentyseventeen' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Galleries",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'gallery', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "gallery", array( "exhibitions" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_gallery' );


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_exhibitions',
		'title' => 'Exhibitions',
		'fields' => array (
			array (
				'key' => 'field_58f6855d359bb',
				'label' => 'Web Link',
				'name' => 'fs_web_link',
				'type' => 'text',
				'instructions' => 'URL for exhibition webpage.',
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 500,
			),
			array (
				'key' => 'field_58f685e1359bd',
				'label' => 'Opening Date',
				'name' => 'fs_opening_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_58f685f2359be',
				'label' => 'Closing Date',
				'name' => 'fs_closing_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_58f68621359bf',
				'label' => 'PDF materials',
				'name' => 'fs_pdf_materials',
				'type' => 'file',
				'save_format' => 'object',
				'library' => 'all',
			),
			array (
				'key' => 'field_58f68650359c0',
				'label' => 'Audio files',
				'name' => 'fs_audio_files',
				'type' => 'file',
				'save_format' => 'object',
				'library' => 'all',
			),
			array (
				'key' => 'field_58f6866c359c1',
				'label' => 'Presenter(s)',
				'name' => 'fs_presenter',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 300,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'exhibitions',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

