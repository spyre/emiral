<html>
<head><title>Php app</title></head>
<?php 
	include 'logger/Lemn.php';
?>
<body>
	HELLO<br/>
	<?php 
		$lemn = new Lemn();
		$lemn->scrie('pizza');
	?>
</body>
</html>