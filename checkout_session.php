<?php
	session_start();

	include('connection.php');

	$id = isset($_POST['item_id'])?$_POST['item_id']:'';
	$quantity = isset($_POST['quantity'])?$_POST['quantity']:'';
	$new_tax = isset($_POST['new_tax'])?$_POST['new_tax']:'';
	$subtotal_amount = isset($_POST['subtotal_amount'])?$_POST['subtotal_amount']:'';
	$new_final_total = isset($_POST['new_total'])?$_POST['new_total']:'';
	
	$quantity_array = $_SESSION["quantity_array"];
	$cart = $_SESSION["cart"];
	$i = 0;
	$index = -1;
	foreach($cart as $item) {
	    if($item == $id) {
	    	$index = $i;
	    	$index = $i;
	    	break;
	    }
	    $i = $i + 1;
	}
	$quantity_array[$index] = $quantity;
	$_SESSION["subtotal_amount"] = $subtotal_amount;
	$_SESSION["tax"] = $new_tax;
	$_SESSION["new_total"] = $new_final_total;
	$_SESSION["quantity_array"] = $quantity_array;
?>