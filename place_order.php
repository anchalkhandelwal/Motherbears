<?php
	session_start();

	include('connection.php');

	$instructions = isset($_POST['instructions'])?$_POST['instructions']:'';
	$user_id = 9;
	$timestamp = date('Y-m-d G:i:s');
	$quantity_array = isset($_SESSION['quantity_array'])?$_SESSION['quantity_array']:'';
	$cart = isset($_SESSION['cart'])?$_SESSION['cart']:'';
	$subtotal_amount = isset($_SESSION['subtotal_amount'])?$_SESSION['subtotal_amount']:'';
	$new_tax = isset($_SESSION['new_tax'])?$_SESSION['new_tax']:'';
	$new_final_total = isset($_SESSION['quantity_array'])?$_SESSION['new_total']:'';
	
	// $query = "INSERT INTO \"Orders\"(user_id,bill_amount,order_status,order_type,order_time,instructions,payment,store_id,address) VALUES('{$user_id}', '{$new_final_total}',1, 1, '{$timestamp}', '{$instructions}', 1, 1, "3230 E John Hinkle Pl")";
	// // die($query);
	// $result = pg_query($conn, $query);

	// if(!$result){
	// 	die(pg_last_error());
	// }

	// if(!$result) {
	// 	$error_message = pg_last_error();
	// 	echo $error_message;
	// 	// header("Location: register.php?qerror=Insert%20Error");
	// }
	// else {
	// 	echo "success";
	// }

?>