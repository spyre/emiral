<?php
session_start();

require_once 'FBConnection.php';



if(!isset($_SESSION['facebook_access_token'])){
	echo 'Token is not set!<br/>';
	die();
}

$token = $_SESSION['facebook_access_token'];

echo 'TEKKEN: '.$token.'<br/>';

$fb = FBConnection::getFBObject();

$fb->setDefaultAccessToken($token);

try {
	$response = $fb->get('/me');
	$userNode = $response->getGraphUser();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
	// When Graph returns an error
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}

echo 'Logged in as ' . $userNode->getName();
