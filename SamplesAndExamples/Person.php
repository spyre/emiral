<?php

include 'SaveableClass.php';

class Person extends SaveableClass{
	
	public $name;
	public $age;
	
	public function __construct($name, $age){
		$this->name = $name;
		$this->age = $age;
	}

	
}

$p1 = new Person('jim', 23);


$p1->generateInsert();