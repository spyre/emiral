<?php
class Resursa{
	
	protected $informatie;
	
	public function Resursa(){
		echo 'LOADING RESOURCES FROM SERVER!!!!!!!<br/>';
		$json = file_get_contents('http://api.fixer.io/latest?base=RON');
		$this->informatie = json_decode($json);
	}
	
	public function getInformatie(){
		return $this->informatie;
	}
}