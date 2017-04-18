<?php
/**
 * Library Plugin
 *
 * @link              http://www.asia.si.edu
 * @since             1.0.0
 * @package           Fs_Library
 *
 * @wordpress-plugin
 * Plugin Name:       Library Plugin
 * Plugin URI:        https://github.com/FreerSackler/DocentTrainingSite
 * Description:       Enables books to be entered into a library catalog for display and search on a website.
 * Version:           1.0.0
 * Author:            Freer|Sackler
 * Author URI:        http://www.asia.si.edu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fs-library
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


function cptui_register_my_cpts_library() {

	/**
	 * Post Type: Library.
	 */

	$labels = array(
		"name" => __( 'Library', 'twentyseventeen' ),
		"singular_name" => __( 'Library', 'twentyseventeen' ),
		"menu_name" => __( 'Library', 'twentyseventeen' ),
		"all_items" => __( 'All Books', 'twentyseventeen' ),
		"add_new_item" => __( 'Add New Book', 'twentyseventeen' ),
		"edit_item" => __( 'Edit Book', 'twentyseventeen' ),
		"new_item" => __( 'New Book', 'twentyseventeen' ),
		"view_item" => __( 'View Book', 'twentyseventeen' ),
		"search_items" => __( 'Search Library', 'twentyseventeen' ),
		"not_found" => __( 'No Books found', 'twentyseventeen' ),
		"not_found_in_trash" => __( 'No Books found in Trash', 'twentyseventeen' ),
	);

	$args = array(
		"label" => __( 'Library', 'twentyseventeen' ),
		"labels" => $labels,
		"description" => "A selection of books in the docent library.",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "library", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-book-alt",
		"supports" => array( "title", "excerpt", "thumbnail" ),
		"taxonomies" => array( "subject" ),
	);

	register_post_type( "library", $args );
}

add_action( 'init', 'cptui_register_my_cpts_library' );


function cptui_register_my_taxes_subject() {

	/**
	 * Taxonomy: Subjects.
	 */

	$labels = array(
		"name" => __( 'Subjects', 'twentyseventeen' ),
		"singular_name" => __( 'Subject', 'twentyseventeen' ),
	);

	$args = array(
		"label" => __( 'Subjects', 'twentyseventeen' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Subjects",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'subject', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "subject", array( "library" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_subject' );


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_library',
		'title' => 'Library',
		'fields' => array (
			array (
				'key' => 'field_58f65e4d7b7a6',
				'label' => 'Author Last Name',
				'name' => 'fs_author_last_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 200,
			),
			array (
				'key' => 'field_58f65e7d7b7a7',
				'label' => 'Author First Name',
				'name' => 'fs_author_first_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 200,
			),
			array (
				'key' => 'field_58f65e9e7b7a8',
				'label' => 'Call Number',
				'name' => 'fs_call_number',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 50,
			),
			array (
				'key' => 'field_58f65eb67b7a9',
				'label' => 'Publication Location',
				'name' => 'fs_publication_location',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 200,
			),
			array (
				'key' => 'field_58f65ec67b7aa',
				'label' => 'Publisher',
				'name' => 'fs_publisher',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 200,
			),
			array (
				'key' => 'field_58f65ef97b7ab',
				'label' => 'Publication Year',
				'name' => 'fs_publication_year',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 20,
			),
			array (
				'key' => 'field_58f65f117b7ac',
				'label' => 'Web Link',
				'name' => 'fs_web_link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 600,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'library',
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
