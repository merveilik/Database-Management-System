 <html>
	<head>
		<title>Waiters</title>
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
	<p><strong> List of Waiters</strong></p>
		<?php
			$servername = 'localhost';
			$username = "root";
			$password = "";
			$dbname = "project3";
			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			else{
				$sql = "SELECT * FROM waiters";
				$result = $conn->query($sql);
				
				if( $result->num_rows > 0){
					?>
					<table id="table1">
						<tr>
							<th>   Delete        </th>
							<th>Name</th>
							<th>Age</th>
							<th>WaiterID</th>
						</tr>
					<?php
					
					while($row = $result->fetch_assoc()){
						?>
						<tr>
							<td>
								<a href = "delete_waiter.php?id=<?php echo $row["WaiterID"]; ?>"><i class="fa fa-close"></i></a></td>
							
							<td><?php echo $row["Name"]; ?></td>
							<td><?php echo $row["Age"]; ?></td>
							<td><?php echo $row["WaiterID"]; ?></td>
						</tr>
						<?php
					}
					?>
					</table>
					<br>
					<br>
					<a href = "create_new_waiter.php">  Add new Waiter </a>
					<?php
				}
				else{
					echo "No result found!";
					?>
					<br>
					<a href = "create_new_waiter.php">  Add new Waiter </a>
					<?php
				}	
			}
			$conn->close();
		}
		?>
	</body>
</html> 