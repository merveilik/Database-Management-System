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
		<div ="auth">
			<p><strong> Assign a Waiter to an Assignment </strong> </p>
			<form action="assign_result.php" method="POST">
				<p> Waiter ID: </p> <input type="Number" name="WaiterID" />
				<p> Assignment ID: </p> <input type="Number" name="AssignmentID" />
				<br>
				<br>
				<input type="submit" />
				<br>
			
			</form>
		</div>
		<?php
		}
		?>
	</body>
</html>