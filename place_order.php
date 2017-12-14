<?php
	session_start();

	include('connection.php');
	$errors = 0;
	$instructions = isset($_POST['instructions'])?$_POST['instructions']:'';
	$user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:'';
	$timestamp = date('Y-m-d G:i:s');
	$quantity_array = isset($_SESSION['quantity_array'])?$_SESSION['quantity_array']:'';
	$cart = isset($_SESSION['cart'])?$_SESSION['cart']:'';
	$size = isset($_SESSION['size'])?$_SESSION['size']:'';
	$subtotal_amount = isset($_SESSION['subtotal_amount'])?$_SESSION['subtotal_amount']:'';
	$new_tax = isset($_SESSION['new_tax'])?$_SESSION['new_tax']:'';
	$new_final_total = isset($_SESSION['new_total'])?$_SESSION['new_total']:'';
	
	$query = "INSERT INTO \"Orders\"(user_id,bill_amount,order_status,order_type,order_time,instructions,payment,store_id,address) VALUES('{$user_id}', '{$new_final_total}',1, 1, '{$timestamp}', '{$instructions}', 1, 1, '3230 E John Hinkle Pl') RETURNING id";

	$result = pg_query($conn, $query);

	if(!$result){
		die(pg_last_error());
	}
	if(!$result) {
		$error_message = pg_last_error();
		$errors = $errors + 1;
	}
	else {
		$row = pg_fetch_row($result);
		$order_id = $row[0];

		$query = 'SELECT * FROM "Menu" WHERE id IN ('.implode(",",$cart).')'; 
		$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");
		$i = 0;
		$total = 0;
		
		while ($row = pg_fetch_row($rs)) {
			$item_id = $row[0];
			$item_name = $row[2];
			$item_description = $row[3];
			$cost_small = $row[5];
			$cost_default = $row[4];
			$cost_large = $row[6];
			$item_photo = $row[7];
			$category_id = $row[1];
			$size_item = $size[$i];
			$cost = $cost_small;
			if($size_item == "Medium") {
				$cost = $cost_default;
			}
			$index = array_search('$item_id', $quantity_array);
			$i = 0;
			foreach($cart as $item) {
			    if($item != $ite_id) {
			    	break;
			    }
			    $i = $i + 1;
			}
			$q = $quantity_array[$i];
			$s = $size[$i];
			$cost_total = $cost * $q;
			$query = "INSERT INTO \"OrderDetails\"(order_id, menu_id, item_description, quantity, price, size) VALUES('{$order_id}', '{$item_id}', '{$item_description}', '1', '10.75', '{$s}')";

			$result = pg_query($conn, $query) or die("Cannot execute query: $query\n");

			if(!$result){
				die(pg_last_error());
				$errors = $errors + 1;
			}
		}
		if($errors > 0) {
			echo "Failed to place order. Please try again. If problem persists, please call 8123691390";
		} else {
			unset($_SESSION['quantity_array']);
			unset($_SESSION['cart']);
			unset($_SESSION['size']);
			unset($_SESSION['subtotal_amount']);
			unset($_SESSION['new_tax']);
			unset($_SESSION['new_total']);
			echo "Order placed successfully!";
		}
		
	}

?>