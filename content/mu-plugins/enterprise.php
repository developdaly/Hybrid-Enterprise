<?php
/*
 * Plugin Name: Enterprise
 * Description: A WordPress plugin made for professional websites.
 * Version: 0.1
 * Author: Patrick Daly
 * Author URI: http://developdaly.com
 *
 * Copyright (c) 2012 Develop Daly
 * http://developdaly.com
 */

// Add custom post meta boxes
add_action( 'add_meta_boxes', 'enterprise_add_meta_boxes' );

// Save post meta boxes
add_action( 'save_post', 'enterprise_save_postdata' );


/**
 * Setup and add custom meta boxes.
 */
function enterprise_add_meta_boxes( $postType ) {
	$types = array('post', 'page');
	if ( in_array( $postType, $types ) ) {
		add_meta_box( 'enterprise-css',			__( 'Custom CSS',			'enterprise'), 'enterprise_inner_css_box', $postType );
		add_meta_box( 'enterprise-javascript',	__( 'Custom JavaScript',	'enterprise'), 'enterprise_inner_javascript_box', $postType );
	}
}

/**
 * Creates the inside of the JavaScript meta box.
 */
function enterprise_inner_javascript_box( $post ) {

	// Use nonce for verification
	wp_nonce_field( plugin_basename(__FILE__), 'enterprise_noncename' );

	// The actual fields for data entry
	echo '<p><label for="enterprise-javascript">Custom JavaScript (<strong>to be used only on this page</strong>) will be placed at the bottom of the document after all other JS:</label></p>';
	echo '<textarea id="enterprise-javascript" name="enterprise-javascript" cols="60" rows="5" tabindex="30" style="width: 99%;">'. get_post_meta( $post->ID, 'enterprise-javascript', true ) .'</textarea>';
}

/**
 * Creates the inside of the CSS meta box.
 */
function enterprise_inner_css_box( $post ) {

	// Use nonce for verification
	wp_nonce_field( plugin_basename(__FILE__), 'enterprise_noncename' );

	// The actual fields for data entry
	echo '<p><label for="enterprise-css">Custom CSS (<strong>to be used only on this page</strong>) will be placed at the bottom of <code>HEAD</code> after all enqueued CSS:</label></p>';
	echo '<textarea id="enterprise-css" name="enterprise-css" cols="60" rows="5" tabindex="30" style="width: 99%;">'. get_post_meta( $post->ID, 'enterprise-css', true ) .'</textarea>';
}

/**
 * Save the meta boxes.
 */
function enterprise_save_postdata( $post_id ) {
	
	// If auto-saving, don't want to do anything
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;
	
	// Verify savings with proper authorization
	if ( !wp_verify_nonce($_POST['enterprise_noncename'], plugin_basename(__FILE__) ) )
		return;
	
	// Check permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can('edit_page', $post_id ) )
			return;
	} else {
		if ( !current_user_can('edit_post', $post_id ) )
			return;
	}

	// Get posted variables
	$enterprise_javascript	= $_POST['enterprise-javascript'];
	$enterprise_css			= $_POST['enterprise-css'];
	
	// Update/add post meta
	update_post_meta( $post_id, 'enterprise-javascript',	$enterprise_javascript );
	update_post_meta( $post_id, 'enterprise-css',		$enterprise_css );
}