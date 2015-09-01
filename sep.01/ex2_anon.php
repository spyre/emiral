<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

		$info = 'pizza';

		$lambda = function(){
			echo 'Lambda function<br/>';
		};

		$cl = function() use(&$info){
			echo 'Information available: '.$info.'<br/>';
			$info = 'TEST';
		};



		$lambda();
		$cl();
		echo 'INFO: '.$info.'<br/>';

		$options = array('op1', 'op2', 'op3');
		array_walk($options, function($element){
			echo 'Optiune: '.$element.'<br/>';
		});

		$input = array(1, 2, 3, 4, 5);
		$output = array_filter($input, function ($v) { return $v > 2; });

		print_r($output);

		$addVat = 1.24;

		$prices = array(10, 200, 30, 33);
		array_walk($prices, function($em) use($addVat){
			echo 'Added: '.($em * $addVat).'<br/>';
		});
	?>
</body>
</html>