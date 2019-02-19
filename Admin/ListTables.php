<html>
	<head>
		<title>Tables</title>
		<link rel="stylesheet" type="text/css" href="../design.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	<p><strong> List of Tables</strong></p>
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
				//List records
				$sql = "SELECT * FROM Tables";
				$result = $conn->query($sql);
				
				if( $result->num_rows > 0){
					?>
					<table id="table1">
						<tr>
							<th>     Delete      </th>
							<th>Table ID</th>
							<th>Number of Seats</th>
						</tr>
					<?php
					
					//output data of each row
					while($row = $result->fetch_assoc()){
					?>
						<tr>
							<td>
								<a href = "delete_table.php?id=<?php echo $row["TableID"]; ?>"><i class="fa fa-close"></i></a></td>
							
							<td><?php echo $row["TableID"]; ?></td>
							<td><?php echo $row["NumberOfSeats"]; ?></td>

						</tr>
						<?php
					}
					?>
					</table>
					<br>
					<br>
					<a href = "create_new_table.php">  Add new Table </a>
					<?php
				}
				else{
					echo "No result found!";
					?>
					<br>
					<a href = "create_new_table.php"> Add new Table </a>
					<?php 

				}	
			}
			$conn->close();
		}
		?>
	</body>
</html> 