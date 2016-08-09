<?php

	// request-ul trebuie sa fie de tip GET: 

	// http://localhost/wc-api/v2/products?oauth_consumer_key=ck_d9429ebdc8b8a0be514568861b97bf3c03188eb4&oauth_timestamp=1470732807&oauth_nonce=gIGviP&oauth_signature=/r2uRWf9t4xeDfybRSS+m6BJGf+k1d7MYvyJx2KKzEk=&oauth_signature_method=HMAC-SHA1

	require 'class-wc-api-client-authentication.php';


	$CK = 'ck_d9429ebdc8b8a0be514568861b97bf3c03188eb4';
	$CS = 'cs_e6f710006cf10c941b29896c932e11aed0fc3cf7';
	$obj = new WC_API_Client_Authentication('http://localhost/wc-api/v2/products', $CK, $CS);

	echo 'REZULTAT SEMNATURA<br/>';

/*		$params = array_merge( $params, array(
			'oauth_consumer_key'     => 'ck_4b5e1879885edfaabec78366d1a23aba57c146d3',
			'oauth_timestamp'        => time(),
			'oauth_nonce'            => sha1( microtime() ),
			'oauth_signature_method' => 'HMAC-' . 'SHA256',
		) );
*/
		$paramsok = array(
			'oauth_consumer_key'     => $CK,
			'oauth_timestamp'        => time(),
			'oauth_nonce'            => sha1( microtime() ),
			'oauth_signature_method' => 'HMAC-' . 'SHA256',
		);
	print_r($obj->generate_oauth_signature($paramsok, 'GET'));


	// creare semnatura: https://dev.twitter.com/oauth/overview/creating-signatures
	// explicatii nonce: https://www.tipsandtricks-hq.com/introduction-to-wordpress-nonces-5357

	// autoload

?>