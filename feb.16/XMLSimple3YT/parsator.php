<?php


function http_get_contents($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_TIMEOUT, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	if(FALSE === ($retval = curl_exec($ch))) {
		echo curl_error($ch);
	} else {
		return $retval;
	}
}

$request_url = 'http://gdata.youtube.com/feeds/api/videos/sVKvNQgzPgY';
$result = http_get_contents($request_url);
print_r($result);
// $simpleXML = new SimpleXMLElement($result);

// print_r($simpleXML);

// $canal = 'UCwGog58wbTpXXcG9iWVb1hA';
$url = 'https://gdata.youtube.com/feeds/api/channels?q=soccer&start-index=11&max-results=10&v=2';

$ytString = file_get_contents($url);
$ytXML = simplexml_load_string($ytString);

echo 'YT SAIS: ';
print_r($ytXML);

echo '<hr/>';
echo '<hr/>';

$namespaces = $ytXML->getNamespaces(true);

echo '<hr/>';
echo '<hr/>';
