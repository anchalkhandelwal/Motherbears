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
		header("Location: register.php?normalerror=Password%20Mismatch!");
	}

	if(strlen($firstName)<3 || strlen($firstName)>50){
		header("Location: register.php?normalerror=InValid%20First%20Name");
	}

	if(strlen($lastName)<3 || strlen($lastName)>50){
		header("Location: register.php?normalerror=InValid%20Last%20Name");
	}

	if(strlen($address)<3 || strlen($address)>500){
		header("Location: register.php?normalerror=InValid%20Address");
	}

	if(strlen($pincode)<3 || strlen($pincode)>50){
		header("Location: register.php?normalerror=InValid%20Pincode");
	}

	$query = "INSERT INTO \"Users\"(first_name,last_name,email,phone,password,address) VALUES('{$firstName}', '{$lastName}','{$email}', '{$phone}', '{$pass}', '{$address}')";
	// die($query);
	$result = pg_query($conn, $query);

	if(!$result){
		die(pg_last_error());
	}

	if(!$result) {
		$error_message = pg_last_error();
		header("Location: register.php?qerror=Insert%20Error");
	}
	else {
		header("Location: register.php?success=success");
	}

?>