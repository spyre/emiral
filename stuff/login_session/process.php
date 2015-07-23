<?php
	session_start();
?>
<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];

		$_SESSION['un'] = $username;
		$_SESSION['logged'] = true;

		echo "Welcome, $username, your password is: $password<br/>";
	?>
</body>
</html>