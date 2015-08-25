<?php

	$correctUsername = 'jon';
	$correctPassword = 'snow';

	$newURL = '';

	function login(){
		$un = $_GET['username'];
		$pwd = $_GET['password'];

		global $correctUsername;
		global $correctPassword;

		global $newURL;

		if($un == $correctUsername && $pwd == $correctPassword){
			$newURL = 'welcome.php';
		}else{
			$newURL = 'login.php';
		}
	}

	login();

	header('Location: '.$newURL);
?>
<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

		echo 'LOGIN: '.$newURL.'<br/>';

	?>
</body>
</html>