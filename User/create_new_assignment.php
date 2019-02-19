<html>
	<head>
		<title>New Assignment</title>
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
				?>
				<div>
				<form action="create_new_assignment_result.php" method="post">
					<p>Start Date(YYYY-MM-DD): <input type ="Date" name="start" value="" required/></p>
					<p>End Date(YYYY-MM-DD): <input type ="Date" name="end" value="" required /></p>
				    <p>Table ID: <input type ="text" name="tableid" value="" required /></p>
				    <p>Waiter ID: <input type ="text" name="waiterid" value="" required /></p>
					<p><input type ="submit" value = "Create Assignment"/></p>
				</form>
				</div>
			<?php
			}
			$conn->close();
		}
		?>
	</body>
</html>
					
					