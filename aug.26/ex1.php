<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

		interface Food{
			function buy();
			function pay($amount);
		}

		class Pizza implements Food{
			function buy(){
				echo 'buying food...<br/>';
			}

			function pay($amount){
				echo 'Paying $'.$amount.'<br/>';
			}
		}

		$p1 = new Pizza();
		$p1->buy();
	?>
</body>
</html>