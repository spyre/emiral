<?php
/**
 * @version 1.0
 */
/*
Plugin Name: WCLocal
Plugin URI: http://www.spyre.com
Description: Spyre WC Local
Author: Spyre
Version: 1.0
Author URI: http://www.spyre.com
*/

require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\Client;

function wcConnect(){
	$woocommerce = new Client(
			'http://localhost/zecl_workspace/wp3', // Your store URL
			'ck_4b5e1879885edfaabec78366d1a23aba57c146d3', // Your consumer key
			
			'cs_70b95846aa07b5be92e84d876b414218203a5268', // Your consumer secret
			[
					'wp_api' => true, // Enable the WP REST API integration
					'version' => 'wc/v1' // WooCommerce WP REST API version
			]
			);
	return $woocommerce;
}


function test1WC(){
	$wcconn = wcConnect();
	// print_r($wcconn->get('products'));
	print_r($wcconn);
	echo '<br/>';
	echo '<br/>';
	echo '<br/>';
	print_r($wcconn->get(''), array());
}

function testNonce(){
	wp_nonce_field( 'delete-comment_'.$comment_id );
}

?>