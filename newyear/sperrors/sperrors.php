<?php
/*
 * Plugin Name: SPErrors
 * Plugin URI: https://github.com/spyre/emiral
 * Description: Operatii baze de date din WP
 * Author: Spyre
 * Author URI: https://github.com/spyre/emiral
 * License: GPL2
 */


add_action( 'save_post', 'my_save_post_function' );

add_action('admin_notices', 'notice_with_transient_function');

function my_save_post_function( $post_id ) {
	$error = false;

	// Do stuff.]
	$something_went_wrong = true;

	if ($something_went_wrong) {
		$error = new WP_Error($code, $msg);
	}

	if ($error) {
		// Handle error.
		set_transient("my_save_post_errors__", $error, 45);
	}

	return true;
}

function doer_of_stuff() {
	return new WP_Error( 'broke', __( "I've fallen and can't get up", "my_textdomain" ) );
}


function notice_with_transient_function(){
	global $post_id;
	global $user_id;
	echo 'NOTIFICATION TEST: '.$post_id.' '.$user_id.' END<br/><br/>';
	
	if ( $error = get_transient( "my_save_post_errors__" ) ) { ?>
	    <div class="error">
	        <p><?php print_r($error); ?>EEE</p>
	    </div><?php
	
	    delete_transient("my_save_post_errors_{$post_id}_{$user_id}");
	}
	
}