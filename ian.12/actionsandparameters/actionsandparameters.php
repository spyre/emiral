<?php
/*
 * Plugin Name: Actions and parameters
 * Plugin URI: https://github.com/spyre/emiral
 * Description: Apelarea metodelor si actiunilor wordpress
 * Author: Emiral
 * Author URI: https://github.com/spyre/emiral
 * License: GPL2
 */

function echo_comment_id( $comment_id ) {
	echo 'Comment ID ' . $comment_id . ' could not be found';
}
add_action( 'comment_id_not_found', 'echo_comment_id', 10, 1 );