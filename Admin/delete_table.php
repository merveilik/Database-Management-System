 <html>
	<head>
		<title>Delete Table</title>
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
				$sql = "SELECT * FROM Tables WHERE TableID ="
				. $_GET["id"];
				$result = $conn->query($sql);
				
				if($result->num_rows > 0){
					?>			
				<p><strong> Are you sure to delete the following Table</strong></p>
				<br>
				<br>
				<div>
				<form action="delete_table_result.php" method="post">
				<?php
				$row = $result->fetch_assoc();
				?>
					<p>Table ID: <input type ="Number" name="id" value="<?php echo $row["TableID"] ?>" readonly /></p>
					<p>Number of Seats: <input type ="Number" name="NumberOfSeats" value="<?php echo $row["NumberOfSeats"] ?>" readonly /></p>
					<p><input type ="submit" value = "Delete Table"/></p>
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
					
					  