<?php

require_once __DIR__ . '/vendor/autoload.php';


class FBConnection{
	
	public static function getFBObject(){
		$fb = new Facebook\Facebook([
				'app_id' => '1521549781473163',
				'app_secret' => '83a8a70e514d59b593065f0ee10ff9c2',
				'default_graph_version' => 'v2.5',
		]);
		
		return $fb;
	}
}