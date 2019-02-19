 <html>
	<head>
		<title>Delete Waiter</title>
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
				$sql = "SELECT * FROM waiters WHERE WaiterID ="
				. $_GET["id"];
				$result = $conn->query($sql);
				
				if($result->num_rows > 0){
					?>			
				<p><strong> Are you sure to delete the following Waiter</strong></p>
				<br>
				<br>
				<div>
				<form action="delete_waiter_result.php" method="post">
				<?php
				$row = $result->fetch_assoc();
				?>
					<p>Name:</p> <input type ="text" name="Name" value="<?php echo $row["Name"] ?>" readonly />
					<p>Age:</p> <input type ="text" name="Age" value="<?php echo $row["Age"] ?>" readonly/>
					<p>WaiterID:</p> <input type ="Number" name="id" value="<?php echo $row["WaiterID"] ?>" readonly />
					<br>
					
					<p><input type ="submit" value = "Delete Waiter"/></p>
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
					
					  