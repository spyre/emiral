<?php

require_once 'Resursa.php';

class ResursaProxy extends Resursa{
	
	private $resursa = NULL;
	
	private function init(){
		if($this->resursa == NULL){
			$this->resursa = new Resursa();
		}
		return $this->resursa;
	}
	
	public function getInfoProxied(){
		return $this->init();
	}
	
	
}