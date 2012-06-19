<?php

/*
Plugin Name: Inline Quote Tag
Plugin URI: http://wordpress.org/extend/plugins/inline-quote-tag/
Description: Insert HTML inline quote tags.
Version: 1.2
Author: Ben Huson
Author URI: http://www.benhuson.co.uk/
License: GPL2
*/

/*
Copyright 2010 Ben Huson (http://www.benhuson.co.uk)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class Q_Tag {
	
	/**
	 * Constructor
	 */
	function Q_Tag() {
		add_action( 'admin_init', array( $this, 'admin_init' ) );
	}
	
	/**
	 * Admin Init
	 */
	function admin_init() {
		$this->add_buttons();
	}
	
	/**
	 * Add Buttons
	 * Adds buttons to the Rich Editor.
	 */
	function add_buttons() {
	
		// Don't bother doing this stuff if the current user lacks permissions
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
			return;
		
		// Add only in Rich Editor mode
		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_buttons', array( $this, 'register_map_button' ) );
			add_filter( 'mce_external_plugins', array( $this, 'add_map_plugin' ) );
		}
	}
	
	/**
	 * Register Map Button
	 * This function adds inline quote button to the editor.
	 *
	 * @param $buttons array Editor buttons.
	 * @return array Buttons.
	 */
	function register_map_button( $buttons ) {
		array_push( $buttons, 'separator', 'qtag' );
		return $buttons;
	}
	
	/**
	 * Load TinyMCE Inline Quote Plugin
	 * Add the Inline Quote button to the editor.
	 *
	 * @param $plugin_array array TinyMCE plugins.
	 * @return array Plugins.
	 */
	function add_map_plugin( $plugin_array ) {
		$plugin_array['qtag'] = WP_PLUGIN_URL . '/inline-quote-tag/js/tinymce/plugins/qtag/editor_plugin.js';
		return $plugin_array;
	}
	
}

global $q_tag;
$q_tag = new Q_Tag();

?>