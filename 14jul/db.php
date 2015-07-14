<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php

		echo 'test2';

		class DbLink{

			private $servername = "localhost";
			private $username = "root";
			private $password = "1234";
			private $dbname = "demousers";
			private $conn;

			function connect(){
				echo 'Obtaining connection...<br/>';
				$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);	
				if ($this->conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 
			}

			function disconnect(){
				$this->conn->close();
			}

			function DbLink(){
				echo 'Constructor called<br/>';
				$this->connect();
			}
			
			function findUsers(){
				$sql = 'SELECT * FROM users';
				$result = $this->conn->query($sql);

				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br/>";
				    }
				} else {
				    echo "Nothing to display";
				}

			}

		}

		$link = new DbLink();
		$link->findUsers();
		$link->disconnect();

	?>
</body>
</html>