<html>
	<head>
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
			<div id="menu">
				<strong>Welcome to Head-Waiter Panel. Your ID: <?php echo $_SESSION['id'] ?> </strong>
				<br>
				<br>
				<br>
				<br>
				<a href="/Project3/User/ListAssignments.php" >List Assignments</a>
				<br>
				<br>
				<a href="/Project3/User/assign.php" >Assign a Waiter to an Assignment</a>
				<br>
				<br>
				<br>
				<a href="/Project3/User/logout.php" >Log out</a>
			</div>
		<?php
		}
		?>
	</body>

</html>