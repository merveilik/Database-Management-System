<html>
	<head>
		<title>Assignments</title>
		<link rel="stylesheet" type="text/css" href="../design.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<p><strong> List of Assignments</strong></p>
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
				$sql = "SELECT * FROM assignments";
				$result = $conn->query($sql);	

				

							
				if( $result->num_rows > 0){
					?>
					<table id="table1">
						<tr>
							<th>      Delete     </th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Table ID</th>
							<th>Waiter ID</th>
							<th>Assignment ID</th>
						</tr>
					<?php
					
					//output data of each row
					while($row = $result->fetch_assoc()){
						?>
						<tr>
							<td>
							<a href = "delete_assignment.php?id=<?php echo $row["AssignmentID"]; ?>"><i class="fa fa-close"></i></a>


							<td><?php echo $row["StartDate"]; ?></td>
							<td><?php echo $row["EndDate"]; ?></td>
							<td><?php echo $row["TableID"]; ?></td>
							<td><?php echo $row["WaiterID"]; ?></td>
							<td><?php echo $row["AssignmentID"]; ?></td>
						</tr>

					<?php
					}
					?>
					</table>
					<br>
					<br>
					<a href = "create_new_assignment.php">  Add new Assignment </a>
					<?php
				}
				else{
					echo "No result found!";
					?>
					<a href = "create_new_assignment.php">  Add new Assignment </a>
					<?php
				}	
			}
			$conn->close();
		}
		?>
	</body>
</html> 