<?php

session_start();

define('APP_NAME', 'FBSendMessage');

require_once __DIR__ . '/vendor/autoload.php';




$fb = new Facebook\Facebook([
		'app_id' => '926670394112713',
		'app_secret' => '89981492555568c12b4596854c5f9faa',
		'default_graph_version' => 'v2.5',
]);


$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/'.APP_NAME.'/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';


