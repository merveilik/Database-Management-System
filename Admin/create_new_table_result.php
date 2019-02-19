<html>
	<head>
		<title>Result</title>
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
				//Insert te record
				$sql ="INSERT INTO Tables(NumberOfSeats)" .
					"VALUES('". $_POST['NumberOfSeats']. "')";
					
				if($conn->query($sql) === TRUE) {
					echo "Record has been created successfully <br/>";
				}
				else{
					echo "Error creating project: " . $conn->error;
				}
				
				//TODO: OTOMATİK ATAMA YAPILACAK HERE
			// <!-- 	$lastID = $conn->insert_id;		
				
			// 	$sql2 = "SELECT UserID FROM ProjectManagers";
			// 	$result = $conn->query($sql2);
			// 	$foo = TRUE;
				
			// 	if( !($result->num_rows > 0)){
			// 		echo("There is no project manager to automatic assignment!");
			// 		$foo=FALSE;
			// 	} -->
				
			// <!-- 	else{
			// 		while($row = $result->fetch_assoc()){
			// 			$sql4 = "SELECT ProjectID FROM managertoproject WHERE ManagerID = '".$row['UserID']."'";
			// 			$result2 = $conn->query($sql4);
			// 			if($result2->num_rows <= 0){
			// 				$sql5 ="INSERT INTO managertoproject(ManagerID, ProjectID)" .
			// 				"VALUES('". $row['UserID'] . "','". $lastID . "')";
			// 				if($conn->query($sql5) === TRUE){
			// 					echo "A manager found with no assignment on him! ID: ".$row['UserID'];
			// 					$foo=FALSE;
			// 					break;
			// 				}
			// 			}

			// 		}
			// 	} -->
			// <!-- 	if($foo){
			// 		$sql6 = "SELECT * FROM managertoproject GROUP BY ManagerID ORDER BY COUNT(ProjectID) ASC";
			// 		$result3 = $conn->query($sql6);	
			// 		if($result3->num_rows > 0){
			// 			$row3 = $result3->fetch_assoc();
			// 			$sql7 ="INSERT INTO managertoproject(ManagerID, ProjectID)" .
			// 			"VALUES('". $row3['ManagerID'] . "','". $lastID . "')";
			// 			if($conn->query($sql7) === TRUE){
			// 				echo "Automatically a project manager assigned to project with id: ". $row3['ManagerID'];
			// 			}
			// 		}
			// 		else{
			// 			echo("No manager found as default to automatic assignment!");
			// 		}
			// 	} -->
				echo "<a href='ListTables.php'>Go Back</a>";

			}
			$conn->close();
		}
		?>
	</body>
</html>