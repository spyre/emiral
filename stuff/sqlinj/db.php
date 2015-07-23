<html>
<head>
	<title>Hello</title>
</head>
<body>
	<?php


		class DbLink{

			private $servername = "localhost";
			private $username = "root";
			private $password = "1234";
			private $dbname = "sqlinj";
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

			function findUserByIdSecure($id){
				$sql = 'SELECT * FROM users where id = '.$id;
				$result = $this->conn->query($sql);

				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				        print_r($row);
				        echo '<br/>';
				    }
				} else {
				    echo "Nothing to display";
				}

			}

		}


	if(isset($_REQUEST['userid']) && $_REQUEST['userid'] != null){
		$link = new DbLink();
		$link->findUserByIdSecure($_REQUEST['userid']);
		$link->disconnect();
	}else{
		echo 'nothing to select!<br/>';
	}



	?>

	<form>
		User id: <input type="text" name="userid"/>
		<br/>
		<input type="submit"/>
	</form>
</body>
</html>