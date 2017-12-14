<?php
	session_start();

	include('connection.php');

	$email = isset($_POST['email'])?$_POST['email']:'';
	$pass = isset($_POST['password'])?$_POST['password']:'';

	$query = "SELECT * FROM \"Users\" WHERE email='{$email}' AND password='{$pass}'";
	// die($query);
	$result = pg_query($conn, $query);

	if(!$result) {
		header("Location: login.php?error=Invalid%20Credentials");
	}
	else {
		$numrows = pg_numrows($result);

		if($numrows == 0){
			header("Location: login.php?error=Invalid%20Credentials");	
		}
		else {
			while ($row = pg_fetch_row($result)) {
				$_SESSION["user_id"]= $row[0];
				$_SESSION["first_name"]= $row[1];
				$_SESSION["last_name"]= $row[2];
				$_SESSION["email"]= $row[3];
				$_SESSION["phone"]= $row[4];
				$_SESSION["address"]= $row[6];
				if($_SESSION["user_id"] == 9) {
					$_SESSION["is_admin"] = true;
				}
			}
			if(isset($_SESSION["is_admin"])) {
				header("Location: admin_dashboard.php");
			} else {
				header("Location: index.php");
			}
		}
	}
?>