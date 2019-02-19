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
	$username = $_POST["username"];
	$pass = $_POST["password"];
	
	$sql = "SELECT username FROM admins WHERE Username ='" .$username."' AND Password='" .$pass."'";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0) {
		session_start();
		$_SESSION['Username'] = $username;
		
		header("Location:Admin/Home.php");
		die();
	}
	else{
		$conn->close();
		die("Wrong username or password");
	}
}

?>