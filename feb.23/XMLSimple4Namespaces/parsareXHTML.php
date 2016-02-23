<html>
<head><title>Php app</title></head>
<?php 
	// include 'vendor/autoload.php';
?>
<body>
	HELLO<br/>
	<?php 
		$document = simplexml_load_file('sample.html');
		echo 'Documentul este: ';
		print_r($document);
		echo '<hr/>';
		
		$ns = $document->getNamespaces(true);
		echo 'Namespace este: ';
		print_r($ns);
		echo '<br/>';
		
		echo 'Namespace de interes: '.$ns['xdc'].'<br/>';
		echo '<hr/>';
		
	?>
</body>
</html>