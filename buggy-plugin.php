<?php
/*
Plugin Name: Debug Me - Single Page Plugin
Description: A buggy plugin for debugging assessment.
Version: 1.0
Author: Dev Test
*/

add_action( 'init', 'debug_plugin_shortcodes' );
function debug_plugin_shortcodes() {
	add_shortcode( 'debug_form', 'render_debug_form' );
}

// References:
// https://developer.wordpress.org/apis/security/sanitizing/
// https://developer.wordpress.org/apis/security/escaping/
function render_debug_form() {
	if ( $_POST['submit'] ) {
		$name = $_POST['name']; // Missing sanitization
		return '<div>Thank you, ' . $name . '</div>'; // XSS vulnerability
	}

	// Deprecated function usage and invalid form action
	$form = '<form method="POST">
        <input type="text" name="name" placeholder="Enter your name">
        <input type="submit" name="submit" value="Submit">
    </form>';

	return $form;
}

/**
 * Instructions:
 *
 * The code below must add an admin menu page, there is a bug in the hook used.
 * Find out how to add a menu page in the WordPress admin area and fix the hook.
 */
// References: https://developer.wordpress.org/reference/functions/add_menu_page/
// Broken hook (should be admin_menu or similar)
add_action( 'adminpanel_menu', 'debug_add_menu' );

function debug_add_menu() {
	add_page( 'Debug Settings', 'Debug Settings', 'manage_options', 'debug-settings', 'debug_settings_page' );
}

function debug_settings_page() {
	echo '<h1>Debug Settings</h1>';
}
