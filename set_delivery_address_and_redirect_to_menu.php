<?php

session_start();
$_SESSION['store_id'] = 1; // Main store for delivery

if(isset($_GET['address']) && $_GET['address'] == 'own'){
  $_SESSION['order_address'] = $_SESSION['address'];
} else {
	$address = isset($_POST['address'])?$_POST['address']:'';
	$city = isset($_POST['city'])?$_POST['city']:'';
	$pincode = isset($_POST['pin'])?$_POST['pin']:'';

	$final_address = $address.'|'.$city.'|'.$pincode;
	
	$_SESSION['order_address'] = $final_address;
}

if(isset( $_SESSION['user_id'])) {
    	header("Location: menu.php");
    } else {
    	header("Location: login.php");
    }
?>