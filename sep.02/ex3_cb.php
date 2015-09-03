<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

	$d = function(){
		echo 'test<br/>';
	};

	$d2 = function(){
		echo 'test2<br/>';
	};

	$d();
	$d2();

	$mul = 10;

	$q = function($p) use(&$mul){
		echo 'Multiply by 10: '.($p * $mul).'<br/>';
	};

	$q(7);

	echo '<br/><br/><br/>';
	function alter(&$param){
		$param = 100;
	}

	$val = 8;
	alter($val);

	echo 'Val::: '.$val.'<br/>';





	?>
</body>
</html>