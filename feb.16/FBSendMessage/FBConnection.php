<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'CONSTANTS.php';

class FBConnection{
	
	public static function getFBObject(){
		$fb = new Facebook\Facebook([
				'app_id' => APP_ID,
				'app_secret' => APP_SECRET,
				'default_graph_version' => 'v2.5',
		]);
		
		return $fb;
	}
}