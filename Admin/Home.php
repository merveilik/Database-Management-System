<html>
<head>
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
			<div id="menu">
				<strong>Welcome <?php echo $_SESSION['Username'] ?> to Admin Panel </strong>
				<br>
				<br>
				<a href="/Project3/Admin/ListHeadWaiters.php" >List Head-Waiters</a>
				<br>
				<br>
				<a href="/Project3/Admin/ListTables.php">List Tables</a>
				<br>
				<br>
				<a href="/Project3/Admin/ListWaiters.php">List Waiters</a>
				<br>
				<br>
<!-- 			<a href="/Project3/Admin/spAdmin.php">Search Project</a>
 -->				
  				<br>
				<br>
				<a href="/Project3/Admin/logout.php" >Log out</a>
			</div>
		<?php
		}
		?>
	</body>

</html>