<?php
/*
 * Plugin Name: XLS File Upload
 * Plugin URI: https://github.com/spyre/emiral
 * Description: working with PhpExcel and WP
 * Author: Spyre Alex
 * Version: 1.0
 * Author URI: https://github.com/spyre/emiral
 */
function contact_form_markup() {
	$form_action = get_permalink ();
	
	$markup = <<<EOT

<div id="commentform"><h3>File Upload Form</h3>
     
   <form action="{$form_action}" method="post" enctype="multipart/form-data" style="text-align: left">
   <p><label for="attachment"><small>Attachment</small></label> <input type="file" name="attachment" id="attachment" /></p>
   <p><input name="send" type="submit" id="send" value="Send" /></p>
   <input type="hidden" name="contact_form_submitted" value="1">
   </form>
</div>

EOT;
	
	return $markup;
}

add_shortcode ( 'contact_form', 'contact_form_markup' );
function contact_form_process() {
	
	if (! isset ( $_POST ['contact_form_submitted'] )){
		return;
	}
	
	
	if (! $_FILES ['attachment'] ['error'] == 4) { // fisier uploadat 
		if ($_FILES ['attachment'] ['error'] == 0 && is_uploaded_file ( $_FILES ['attachment'] ['tmp_name'] )) {
			// echo 'FILE WAS SENT! --- '.$_FILES ['attachment'] ['tmp_name'].'<br/>';
			$file = wp_upload_bits( $_FILES['attachment']['name'], null, @file_get_contents( $_FILES['attachment']['tmp_name'] ) );
		} else {
			wp_die ( 'Error: there was a problem with file upload. Try again later.' );
		}
	}
	
	header ( 'Location: ' . $_SERVER ['HTTP_REFERER'] );
	exit ();
}

add_action ( 'init', 'contact_form_process' );

?>