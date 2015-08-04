<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php


	
		class Food{
			function __construct(){
				echo '<br/>constructor 0<br/>';

				   	$a = func_get_args(); 
			        $i = func_num_args(); 
			        echo 'a = ';
					print_r($a);
					echo '<br/> i = ';
					print_r($i);
					echo '<br/>';
					$f='__construct'.$i;
			        if (method_exists($this,$f)) { 
			            call_user_func_array(array($this,$f),$a); 
			        } 
			}

			function __construct1($x){
				echo '<br/>construcotr 1, x = '.$x.'<br/>';
			}

			function __construct2($x, $y){
				echo '<br/>constructor 2, x = '.$x.' y = '.$y.'<br/>';
			}
			function __construct3($x, $y, $z){
				echo '<br/>constructor 2, x = '.$x.' y = '.$y.' z = '.$z.'<br/>';
			}
		}



		$f = new Food(10, 20, 'pizza');



	?>
</body>
</html>