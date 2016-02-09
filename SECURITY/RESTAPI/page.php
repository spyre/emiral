<?php 

/// http://www.sitepoint.com/wordpress-json-rest-api/
/// https://bshaffer.github.io/oauth2-server-php-docs/cookbook/


/**
$ curl -X DELETE --user admin:admin http://localhost/zecl_workspace/wp3/wp-json/wp/v2/posts/38


*** ALL POSTS:
			  http://localhost/zecl_workspace/wp3/wp-json/wp/v2/posts
*** ASTA MERGE:
 curl -X POST http://localhost/zecl_workspace/wp3/wp-json/wp/v2/posts -d '{"title":"My New Title"}'

 curl --user admin:admin -X POST http://localhost/zecl_workspace/wp3/wp-json/wp/v2/posts -d '{"title":"My New Title", "content":"SOME NEW CONTENT", "excerpt":"SOME EXCERPT"}'




 */


function getAllPosts(){

	$curl = curl_init();
	
	
	
	curl_setopt_array($curl, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_URL => 'http://localhost/zecl_workspace/wp3/wp-json/wp/v2/posts'
	));
	$result = curl_exec($curl);
	curl_close($curl);
	
	return $result;

}

// https://github.com/WP-API/Basic-Auth
// https://github.com/WP-API/WP-API/issues/509 - adaugare HTTPHEADER autentificare (pentru basic authentication)

function postPost(){
	$curl = curl_init();
	// Set some options - we are passing in a useragent too here  
	/// curl -X POST http://demo.wp-api.org/wp-json -d '{"title":"My New Title"}'
	
	
	curl_setopt($curl, CURLOPT_HTTPHEADER,
			array(
					"Authorization: Basic " . base64_encode('admin' . ":" . 'admin')
			));
	
	curl_setopt_array($curl, array(
// 			CURLOPT_HTTPHEADER => "Authorization: Basic " . base64_encode('admin' . ":" . 'admin'),
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'http://localhost/zecl_workspace/wp3/wp-json/wp/v2/posts', 
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => array(
					'title' => 'KEKMAN'
			)
	));
	// Send the request & save response to $resp
	$resp = curl_exec($curl);
	// Close request to clear up some resources
	echo 'RESPONSE IS::::';
	print_r($resp);
	echo 'END.<br/>';
	curl_close($curl);
}





?>

<html>
<head><title>Php app</title></head>
<?php 
	// include 'vendor/autoload.php';
?>
<body>
	HELLO<br/>
	<hr/>
	<?php 
	postPost();
	echo '<hr/><hr/>';
	// echo 'RESULT:'.'<br/>';
	// print_r(getAllPosts());
		
	?>
</body>
</html>
<?php
// http://localhost/zecl_workspace/wp3