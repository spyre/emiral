<?php

session_start();

define('APP_NAME', 'FBSendMessage');



require_once __DIR__ . '/vendor/autoload.php';
require_once 'CONSTANTS.php';



$fb = new Facebook\Facebook([
		'app_id' => APP_ID,
		'app_secret' => APP_SECRET,
		'default_graph_version' => 'v2.5',
]);


$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional

$pth = 'http://localhost/'.APP_NAME.'/logincallback.php';
$loginUrl = $helper->getLoginUrl($pth, $permissions);

echo 'LOGIN URL: '.$pth.'<br/><br/>';

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';


