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
				$sql ="INSERT INTO assignments(StartDate, EndDate, TableID, WaiterID)" .
					"VALUES('". $_POST['start'] . "','". $_POST['end'] ."','". $_POST['tableid'] ."','". $_POST['waiterid'] . "')";
					
				if($conn->query($sql) === TRUE){
					$sql2 ="INSERT INTO waitertoassignment(WaiterID,AssignmentID)" .
					"VALUES('". $_POST['waiterid'] . "','". $conn->insert_id ."')";
					if($conn->query($sql2) === TRUE){
					echo "Record has been created successfully <br/>";
					}
					else{
						echo "Error creating task: " . $conn->error;
					}
					echo "<a href='ListAssignments.php'>Go Back</a>";
				}
				else{
					echo "Error creating task: " . $conn->error;
				}
			}	
			$conn->close();
		}
		?>
	</body>
</html>