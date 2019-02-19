  <html>
	<head>
		<title>Result</title>
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
				//Insert te record
				$sql ="DELETE FROM assignments"
				." WHERE AssignmentID = " . $_POST['id']; 
					
				if($conn->query($sql) === TRUE) {
					echo "Record has been deleted successfully from Assignments <br/>";
				}
				else{
					echo "Error deleting record: " . $conn->error;
				}
				
				$sql2 ="DELETE FROM waitertoassignment"
				." WHERE AssignmentID = " . $_POST['id']; 
					
				if($conn->query($sql2) === TRUE) {
					echo "Record has been deleted successfully from waitertotask<br/>";
					echo "<a href='ListAssignments.php'>Go Back</a>";
				}
				else{
					echo "Error deleting record: " . $conn->error;
				}
				
			}
			$conn->close();
		}
		?>
	</body>
</html>