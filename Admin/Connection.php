 <?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 
 //Create connection_aborted
 $conn = new mysqli($servername, $user_name, $password);
 
 //Check connection
 if ($conn->connect_error){
	 die("Connection failed: " . $conn->connect_error);
 }
 
 echo "Connected successfully";
 
 $conn->close();
 ?>