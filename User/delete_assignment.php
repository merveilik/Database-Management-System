 <html>
	<head>
		<title>Delete Assignment</title>
	</head>
	<body>
	<?php 
		session_start();
		if(!isset($_SESSION['id'])){
			$msg = "Please <a href = 'http://Localhost/Project3/UserLogin.php'>log in</a> to view this page";
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
				$sql = "SELECT * FROM assignments WHERE AssignmentID ="
				. $_GET["id"];
				$result = $conn->query($sql);
				
				if($result->num_rows > 0){
					?>			
				<p><strong> Are you sure to delete the following Assignment</strong></p>
				<br>
				<br>
				<div>
				<form action="delete_assignment_result.php" method="post">
				<?php
				$row = $result->fetch_assoc();
				?>
					<p>Start Date: <input type ="Date" name="start" value="<?php echo $row["StartDate"] ?>" readonly/></p>
					<p>End Date: <input type ="Date" name="end" value="<?php echo $row["EndDate"] ?>"readonly /></p>
					<p>Table ID: <input type ="text" name="tableid" value="<?php echo $row["TableID"] ?>" readonly /></p>
					<p>Waiter ID: <input type ="text" name="waiterid" value="<?php echo $row["WaiterID"] ?>" readonly /></p>
					<p>Assignment ID: <input type ="text" name="id" value="<?php echo $row["AssignmentID"] ?>" readonly /></p>
					
					<p><input type ="submit" value = "Delete Assignment"/></p>
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
					
					  