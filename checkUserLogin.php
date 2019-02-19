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
	$id = $_POST["id"];
	$pass = $_POST["password"];
	
	$sql = "SELECT UserID FROM headwaiters WHERE UserID ='" .$id."' AND Password='" .$pass."'";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0) {
		session_start();
		$_SESSION['id'] = $id;
		
		header("Location:User/Home.php");
		die();
	}
	else{
		$conn->close();
		die("Wrong userID or password");
	}
}

?>