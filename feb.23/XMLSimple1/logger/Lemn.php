<?php 
	require_once __DIR__ . '/vendor/autoload.php';
	
	class Lemn{
		
		public static function scrie($mesaj, $averitzare = false){
			Logger::configure('logger/config.xml');
			$logger = Logger::getLogger("Foo");
			if($averitzare){
				$logger->warn($mesaj);
			}else{
				$logger->info($mesaj);
			}
			// $logger->info("This is an informational message.");
			// $logger->warn("I'm not feeling so good...");
		}
	}
	
	
	
	
	?>