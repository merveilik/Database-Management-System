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
				$sql ="DELETE FROM headwaiters"
				." WHERE UserID = " . $_POST['id']; 
					
				if($conn->query($sql) === TRUE) {
					echo "Record has been deleted successfully from Head-Waiters<br/>";
					echo "<a href='ListHeadWaiters.php'>Go Back</a>";
				}
				else{
					echo "Error deleting record from Head-Waiters: " . $conn->error;
				}
				
			}
			$conn->close();
		}
		?>
	</body>
</html>