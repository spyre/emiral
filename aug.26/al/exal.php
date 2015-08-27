<?php


		function __autoload($cn){
			echo 'Including: '.$cn.'<br/>';
			include 'classes/'.$cn.'.php';
		}
?>
<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php



		$f = new Food();
		$f->displayInfo();
		$d = new Drink();
		$d->displayInfo();

		phpinfo();
	?>
</body>
</html>