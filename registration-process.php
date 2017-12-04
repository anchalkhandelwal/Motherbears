<?php
include('connection.php');

	$firstName = isset($_POST['fname'])?$_POST['fname']:'';
	$lastName = isset($_POST['lname'])?$_POST['lname']:'';
	$email = isset($_POST['email'])?$_POST['email']:'';
	$phone = isset($_POST['phone'])?$_POST['phone']:'';
	$pass = isset($_POST['password'])?$_POST['password']:'';
	$newpass = isset($_POST['password-confirmation'])?$_POST['password-confirmation']:'';
	$address = isset($_POST['address'])?$_POST['address']:'';
	$pincode = isset($_POST['pin'])?$_POST['pin']:'';

	if($pass != $newpass){
		header("Location: register.php?error=Password%20Mismatch!");
	}

	$query = 'INSERT INTO "Users" VALUES('.$firstName.', '.$lastName.','.$email.', '.$phone.', '.$pass.', '.$address.')';
	// die($query);
	$result = pg_query($conn, $query);

	if(!$result) {
		echo "Could not fetch the current messages! Error: ".pg_last_error()."<br>";
	}

?>