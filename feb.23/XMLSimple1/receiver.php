<html>
<head><title>Php app</title></head>
<?php 
	include 'logger/Lemn.php';
?>
<body>
	HELLO<br/>
	<?php 
		$lemn = new Lemn();
		$lemn->scrie('pizza2');
		$results = print_r($_REQUEST, true);
		$lemn->scrie('REZULTATE: '.$results);
		$results = print_r($_POST, true);
		$lemn->scrie('REZULTATE POST: '.$results);
	?>
</body>
</html>