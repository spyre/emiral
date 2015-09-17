<?php

// download as file
function setHeaders(){
	header("Content-type: text/csv");
	header("Content-Disposition: attachment; filename=file.csv");
	header("Pragma: no-cache");
	header("Expires: 0");

}

setHeaders();

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'backupsite';


?>

	<?php
		
		define('separator', '^');
		
		$con = new  mysqli($host, $user, $password,$db);

		$q = 'select shop.*, joomla.username, joomla.password from kp1ge_jshopping_users shop inner join kp1ge_users joomla on shop.user_id = joomla.id;';
		$results = $con->query($q);

		$array_results = array();
		while($rand = $results->fetch_assoc()){
			$array_results[] = $rand;
		}

		$output = array();

		$rand_tituri_coloane = '';
		foreach(array_keys($array_results[0]) as $key){
			$rand_tituri_coloane.=$key.separator;
		}
		$output[] = $rand_tituri_coloane;

		foreach($array_results as $rand){
			$rand_csv = '';
			foreach($rand as $k => $v){
				$rand_csv.= $v.separator;

			}
			$output[] = $rand_csv;
		}

	

		foreach($output as $csv){
			// echo 'Linie CSV: '.$csv.'<br/>';
			echo $csv."\n";
		}
		
	?>
