<?php
	session_start();

	include('connection.php');

	$id = isset($_POST['item_id'])?$_POST['item_id']:'';
	
	
	$quantity_array = $_SESSION["quantity_array"];
	$cart = $_SESSION["cart"];
	$size = $_SESSION["size"];
	
	$i = 0;
	$index = -1;
	$new_cart = array();
	$new_size = array();
	$new_quantity_array = array();
	foreach($cart as $item) {
	    if($item != $id) {
	    	array_push($new_cart, $item);
	    	array_push($new_size, $size[$i]);
	    	array_push($new_quantity_array, $quantity_array[$i]);
	    }
	    $i = $i + 1;
	}

	
	$_SESSION["subtotal_amount"] = $subtotal_amount;
	$_SESSION["tax"] = $new_tax;
	$_SESSION["new_total"] = $new_final_total;
	$_SESSION["quantity_array"] = $new_quantity_array;
	$_SESSION["cart"] = $new_cart;
	$_SESSION["size"] = $new_size;


?>