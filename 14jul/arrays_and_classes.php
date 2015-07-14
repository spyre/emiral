<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

		class User{

			public $username;
			public $password;
		}

		$u1 = new User();
		$u1->username = 'John';
		$u1->password = '1234';

		$u2 = new User();
		$u2->username = 'Bill';
		$u2->password = '4444';

		$users = array();
		$users[0] = $u1;
		$users[1] = $u2;

		foreach($users as $user){
			echo 'Username: '.$user->username.' password: '.$user->password.'<br/>';
		}

	?>
</body>
</html>