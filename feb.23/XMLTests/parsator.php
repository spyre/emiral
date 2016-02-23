<html>
<head><title>Php app</title></head>
<?php 
	// include 'vendor/autoload.php';
?>
<body>
	HELLO<br/>
	<?php 
	$fisier = simplexml_load_file('some.xml');
	
	$spatiiDeNume = $fisier->getNamespaces(true);
	$probabilPizzaHut = $spatiiDeNume['ph'];
	print_r($spatiiDeNume);
	echo '<hr/>';
	echo '<hr/>';
	// print_r($fisier);
	foreach($fisier->food as $haleala){
		$ph = $haleala->children($probabilPizzaHut); //children('http://www.pizzahut.com/ns/');
		print_r($haleala);
// 		echo $haleala->name;
		echo '<br/>';
		print_r($ph);
		echo '<hr/>';
	}
	?>
</body>
</html>