<?php
	session_start();
?>
<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php
		if($_SESSION['logged'] != null){
			echo 'you are logged in<br/>';
		}else{
			echo 'you are not logged in<br/>';
		}
		echo 'test2';
	?>
</body>
</html>