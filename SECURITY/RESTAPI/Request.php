<?php


class RequestManager{
	
	private $systemId;
	private $apiKey;
	
	public function __construct($sysId, $apiK){
		$this->systemId = $sysId;
		$this->apiKey = $apiK;
	}
	
	public function updateEntity($id, $entityName, $valuePairs){
	
		$dataToSend = json_encode($valuePairs);
		$url = "https://$this->systemId:$this->apiKey@r3.minicrm.hu/Api/R3/$entityName/$id"; // -d '$dataToSend'";
		
		
		$curl = curl_init($url);
		
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($valuePairs));
		
		// Make the REST call, returning the result
		$response = curl_exec($curl);
		if (!$response) {
			print_r($response);
			echo 'NU O MERS<br/>';
				
			//die("Connection Failure.n");
		}else{
			echo 'O MERS<br/>'; 
			print_r($response);
		}
		echo '<br/>';
		echo '<br/>';
		echo '<br/>';
		echo 'Calling URL: '.$url.'<br/>';
	}
}



//  https://27336:hqXPJH3sxDrupjEgMdYon6ewbNKGFRti@r3.minicrm.hu/Api/R3/Project/1950
$rm = new RequestManager(27336, 'hqXPJH3sxDrupjEgMdYon6ewbNKGFRti');
$args = array('Name' => 'ROYAL PRESIDENT SRL (Ionut)2');
$rm->updateEntity(1950, 'Project', $args);