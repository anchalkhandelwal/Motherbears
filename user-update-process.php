<?php
include('connection.php');

	$firstName = isset($_GET['first_name'])?$_GET['first_name']:'';
	$lastName = isset($_GET['last_name'])?$_GET['last_name']:'';
	//$email = isset($_POST['email'])?$_POST['email']:'';
	$phone = isset($_GET['phone'])?$_GET['phone']:'';
	//$pass = isset($_POST['password'])?$_POST['password']:'';
	//$newpass = isset($_POST['password-confirmation'])?$_POST['password-confirmation']:'';
	$address = isset($_GET['address'])?$_GET['address']:'';
	$user_id = isset($_GET['user_id'])?$_GET['user_id']:'';
	//$pincode = isset($_POST['pin'])?$_POST['pin']:'';

	

	$query = "UPDATE \"Users\" SET first_name = '{$firstName}',last_name = '{$lastName}',phone = '{$phone}',address = '{$address}' WHERE id='{$user_id}'";
	// die($query);
	$result = pg_query($conn, $query);

	echo "Details Updated";
	if(!$result){
		die(pg_last_error());
	}

	/*
	if(!$result) {
		$error_message = pg_last_error();
		header("Location: user_dashboard.php?qerror=Insert%20Error");
	}
	else {
		header("Location: user_dashboard.php?success=success");
	}*/
	
?>