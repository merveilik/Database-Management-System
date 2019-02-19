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
				$sql ="DELETE FROM waiters"
				." WHERE WaiterID = " . $_POST['id']; 
					
				if($conn->query($sql) === TRUE) {
					echo "Record has been deleted successfully from Waiters<br/>";
				}
				else{
					echo "Error deleting record: " . $conn->error;
				}
				
				
				$sql2="DELETE FROM waitertoassignment"
				." WHERE WaiterID = " . $_POST['id'];
 
				
				if($conn->query($sql2) === TRUE) {
					echo "All assignments on this waiter are deleted!<br/>";
				}
				else{
					echo "Error deleting record from relation: " . $conn->error;
				}

				$sql3="DELETE FROM assignments"
				." WHERE WaiterID = " . $_POST['id'];
				if($conn->query($sql3) === TRUE) {
					echo "Record has been deleted successfully from Assignments<br/>";
					echo "<a href='ListWaiters.php'>Go Back</a>";

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