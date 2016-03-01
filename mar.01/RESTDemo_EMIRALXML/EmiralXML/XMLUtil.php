<?php

require_once 'Produs.php';

class XMLUtil{
	
	public static function saveOne($titluRoot, $titluElement, Produs $p){
		/* create a dom document with encoding utf8 */
		// $domtree = new DOMDocument('1.0', 'UTF-8');
		
		// var_dump(get_object_vars($test));
		
		
		
		$domtree = new DOMDocument();
		/* create the root element of the xml tree */
		$xmlRoot = $domtree->createElement($titluRoot);
		
		
		/* append it to the document created */
		$xmlRoot = $domtree->appendChild($xmlRoot);
		
		
		$currentTrack = $domtree->createElement($titluElement);
		$currentTrack = $xmlRoot->appendChild($currentTrack);
		
		$elements = get_object_vars($p);
		
		
		foreach($elements as $titlu => $continut){
			$currentTrack->appendChild($domtree->createElement($titlu,$continut));
		}
		
		/* you should enclose the following two lines in a cicle */
// 		$currentTrack->appendChild($domtree->createElement('nume','Pizza'));
// 		$currentTrack->appendChild($domtree->createElement('pret','22.22'));
		
		
		/* get the xml printed */
		// echo $domtree->saveXML();
		return $domtree->saveXML();
	}
	
	
	// TODO: cod pentru mai multe
	
}
function findProducts(){
	//Header('Content-type: text/xml');
		
	// TEST
		
	$dao = new XMLUtil();
	$prod = new Produs();
	$prod->id = 123;
	$prod->nume = "Pizza";
	$prod->pret = 33.23;
		
	echo $dao->saveOne('produse', 'produs', $prod);
}

findProducts();
