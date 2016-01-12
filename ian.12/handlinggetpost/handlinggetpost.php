<?php
/*
 * Plugin Name: Handling GET and POST like a bauss
 * Plugin URI: https://github.com/spyre/emiral
 * Description: Operatii baze de date din WP
 * Author: Emiral
 * Author URI: https://github.com/spyre/emiral
 * License: GPL2
 */

function user_is_not_logged_in(){
	prefix_send_email_to_admin(false);
}

function user_is_logged_in(){
	prefix_send_email_to_admin(true);
}

function prefix_send_email_to_admin($logged) {
	/**
	 * At this point, $_GET/$_POST variable are available
	 *
	 * We can do our normal processing here
	 */

	// Sanitize the POST field
	// Generate email content
	// Send to appropriate email
	echo '<h1>TEST</h1>';
	echo '<span style="background-color: #FF0000">PROCESSED ACTION, SEND TO profix_send_email_to_admin() METHOD</span><br/>';
	print_r($_POST);
	echo '<br/>';
	if($logged){
		echo '<h4>User is logged in</h4>';
	}else{
		echo '<h4>User is NOT logged in</h4>';
	}
	echo '<br/>';
	
}
add_action( 'admin_post_nopriv_contact_form', 'user_is_not_logged_in');
add_action( 'admin_post_contact_form', 'user_is_logged_in' );