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
			
			$conn = new mysqli($servername, $username, $password, $dbname);
			
			if($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			else{

				$sql="DELETE FROM waitertoassignment WHERE AssignmentID IN (SELECT AssignmentID FROM assignments WHERE TableID='". $_POST['id']."')";
				if($conn->query($sql) === TRUE) {
				echo "All related assignments to this table are deleted!<br/>";
				}
				else{
					echo "Error deleting record from relation: " . $conn->error;
				}

				$sql2 ="DELETE FROM Tables"
				." WHERE TableID = " . $_POST['id']; 
					
				if($conn->query($sql2) === TRUE) {
					echo "Record has been deleted successfully from Tables<br/>";
				}
				else{
					echo "Error deleting record: " . $conn->error;
				}
				 
				$sql3="DELETE FROM assignments"
				." WHERE TableID = " . $_POST['id']; 
				
				if($conn->query($sql3) === TRUE) {
					echo "<a href='ListTables.php'>Go Back</a>";			
			}
		}
				$conn->close();
}
		?>
	</body>
</html>