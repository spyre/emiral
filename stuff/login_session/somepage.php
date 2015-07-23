<?php
	session_start();
?>
<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

		$un = $_SESSION['un'];
		$logged = $_SESSION['logged'];

		echo 'Logged in: '.$un.'<br/>';
	?>
</body>
</html>