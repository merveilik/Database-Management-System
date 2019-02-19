<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		$msg = "Please <a href = 'http://Localhost/Project3/UserLogin.php'>log in</a> to view this page";
		echo $msg;
	}
	else{
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
			
			$givenStart="";
			$givenEnd="";
			$sql3 = "SELECT * FROM assignments WHERE AssignmentID = '".$_POST['AssignmentID']."'";
			$foo = TRUE;
			$result3 = $conn->query($sql3);
			if($result3->num_rows > 0){
				$row = $result3->fetch_assoc();
				$givenStart=$row['StartDate'];
				$givenEnd=$row['EndDate'];
			}
			
						
			$sql2 ="SELECT * FROM assignments WHERE AssignmentID IN (SELECT AssignmentID FROM waitertoassignment WHERE WaiterID='".$_POST['WaiterID']."')";
			$result = $conn->query($sql2);
			if($result->num_rows > 0){
				$start="";
				$end="";
				while($row = $result->fetch_assoc()){
					
					$start=$row['StartDate'];
					$end=$row['EndDate'];
					
					if( ((strcmp($givenStart,$start)>0) and (strcmp($givenStart,$end) <0)) or
					    ((strcmp($givenEnd,$start)>0) and (strcmp($givenEnd,$end) <0)) and ($_POST['AssignmentID']!=$row['AssignmentID']) ){
							$foo = FALSE;
						}
				}
			}
			
			if($foo){
			//Insert te record
				$sql ="INSERT INTO waitertoassignment(WaiterID, AssignmentID)" .
					"VALUES('". $_POST['WaiterID'] . "','". $_POST['AssignmentID'] . "')";
					
				if($conn->query($sql) === TRUE) {
					echo "Assignment has been done succesfully! <br/>";
					echo "<a href='Home.php'>Go Back</a>";
				}
				else{
					echo "Error creating record: " . $conn->error;
				}

				

		   //   	$sql4 ="INSERT INTO assignments(WaiterID, AssignmentID)" .
					// "VALUES('". $_POST['WaiterID'] . "','". $_POST['AssignmentID'] . "')";

			}
			else{
				?>
				<div margin-top="150px" color="red">
				<p align="center"><strong>UUUUPS! Cannot assign more than one task to an employee for the same time interval!</strong></p>
				<br>
				<a align="center" href='index.php'>Go Back</a>
				</div>
				<?php

			}
		}
		$conn->close();
	}
	?>