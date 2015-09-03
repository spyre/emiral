<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

		echo 'test2<br/>';

		class Pizza{

			protected $name;
			protected $description;
			protected $price;

			public function __construct(){
				echo 'Baking pizza...<br/>';
			}

			

			public function __get($prop){
				if(property_exists($this, $prop)){
					return $this->$prop;
				}else{
					echo "Property '$prop' not defined on Pizza<br/>";
				}
			}

			public function __set($prop, $value){
				if(property_exists($this, $prop)){
					$this->$prop = $value;
				}else{
					echo "Property '$prop' not defined on Pizza<br/>";
				}
			}

			public function  __isset($property)
			{
			  return isset($this->$property);
			}
			 
			public function __toString(){
				return 'Pizza name: '.$this->name.' description: '.$this->description.' Pret: '.$this->price.'<br/>';
			}


			/*** 
				serializare 
			***/
			// specificare proprietati ale obiectului ce vor fi serializate - 'salvate' intr-un format 'comprimat'
			public function __sleep(){
				return array('name', 'description');
			}
			
			public function __wakeup(){
				// functie apelata in momentul in care obiectul 
				echo 'Loading...<br/>'; 
			}

			public function displayInfo(){
				echo 'Informatie: '.$this->name.'<br/>';
			}



		}

		$p = new Pizza();
		$p->name = 'hi';
		$p->price = 88.25;
		$p->description = 'Pizza calzzone mare';
		echo 'Nume: '.$p->name.'<br/>';

		echo isset($p->name); // true
		echo '<br/>';
		echo $p;

		echo '<br><h4>Serializare</h4><br/>';
		$pizzaLaPachet = serialize($p);
		echo 'Serializata: ';
		print_r($pizzaLaPachet);
		$pizzaScoasaDinCutie = unserialize($pizzaLaPachet);
		echo '<br/>';
		echo 'Unserializata: '.$pizzaScoasaDinCutie.'<br/>';

		echo '<br/>';
		echo '<br/>';

		$p->displayInfo();

	?>
</body>
</html>