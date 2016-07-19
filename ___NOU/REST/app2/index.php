<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h2>htapp</h2>
<?php

	if(!isset($_GET['param'])){
		echo 'param var not set<br/>';
	}else{
		echo 'param var = '.$_GET['param'].'<br/>';
	}

	if(!isset($_GET['param2'])){
		echo 'param2 var not set<br/>';
	}else{
		echo 'param var = '.$_GET['param2'].'<br/>';
	}

?>

</body>
</html>