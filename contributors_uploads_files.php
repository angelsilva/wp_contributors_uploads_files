<?php

/**
* Plugin Name: Contributors Upload Files
* Plugin URI: http://www.example.com
* Description: Allow to contributors Uploads Files
* Version: 1.0.0
* Author: Example
* Author URI: http://www.example.com
* License: GPL2
*/

if(!function_exists('wp_get_current_user')) {
    include(ABSPATH . "wp-includes/pluggable.php"); 
}

add_action('admin_init', 'allow_contributor_uploads');
 
function allow_contributor_uploads() {
	$contributor = get_role('contributor');
	$contributor->add_cap('upload_files');
}

add_action( 'init', 'contributors_uploads_files_update' );

function contributors_uploads_files_update()
{
	if (!class_exists('WP_AutoUpdate')) 
		require_once ( 'wp_autoupdate.php' );

	$plugin_current_version = '1.0.0';
	$plugin_remote_path = 'https://wpdev.yoemprendo.online/update.php?plugin=contributors_uploads_files';
	$plugin_slug = plugin_basename( __FILE__ );
	$license_user = '';
	$license_key = '';
	new WP_AutoUpdate ( $plugin_current_version, $plugin_remote_path, $plugin_slug, $license_user, $license_key );
}