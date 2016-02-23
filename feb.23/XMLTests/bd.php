<?php


	$produse = simplexml_load_file('produse.xml');
	
	
	$conexiune = new mysqli('localhost', 'root', '', 'central');
	
	
	foreach($produse->produs as $produs){
		echo 'Nume produs: '.$produs->nume.'<br/>';
		$conexiune->query( "INSERT INTO produse(nume, pret) values('$produs->nume', $produs->pret)");
	}
	
	
	