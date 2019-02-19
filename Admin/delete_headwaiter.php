 <html>
	<head>
		<title>Delete Head-Waiter</title>
	</head>
	<body>
	<?php 
		session_start();
		if(!isset($_SESSION['Username'])){
			$msg = "Please <a href = 'http://Localhost/Project3/AdminLogin.php'>log in</a> to view this page";
			echo $msg;
		}
		else{
			?>
	
		<?php
			$servername = 'localhost';
			$username = "root";
			$password = "";
			$dbname = "project3";
			
			//Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			//Check connection
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			else{
				$sql = "SELECT * FROM headwaiters WHERE UserID ="
				. $_GET["id"];
				$result = $conn->query($sql);
				
				if($result->num_rows > 0){
					?>			
				<p><strong> Are you sure to delete the following Head-Waiter</strong></p>
				<br>
				<br>
				<div>
				<form action="delete_headwaiter_result.php" method="post">
				<?php
				$row = $result->fetch_assoc();
				?>
					<p>Password: <input type ="text" name="password" value="<?php echo $row["Password"] ?>" readonly/></p>
					<p>User ID: <input type ="Number" name="id" value="<?php echo $row["UserID"] ?>" readonly /></p>
					
					<p><input type ="submit" value = "Delete Head-Waiter"/></p>
				</form>
				</div>
				<?php
				}
				else{
					echo "Record does not exist";
				}
			}
			$conn->close();
		}
			?>
	</body>
</html>
					
					  