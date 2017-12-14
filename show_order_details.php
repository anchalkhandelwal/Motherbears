<?php
	session_start();

	include('connection.php');

	$order_id = isset($_POST['order_id'])?$_POST['order_id']:'';

	
	$query = 'SELECT * FROM "OrderDetails" WHERE order_id='.$order_id; 
	$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");

	while ($row = pg_fetch_row($rs)) {
		$id = $row[0];
		$order_id = $row[1];
		$item_description = $row[3];
		$menu_id = $row[2];
		$item_description = $row[4];
		$quantity = $row[5];
		$price = $row[6];
		$size = $row[7];
		
		$query = 'SELECT * FROM "Menu" WHERE id='.$menu_id; 
		$result = pg_query($conn, $query) or die("Cannot execute query: $query\n");
		while ($row2 = pg_fetch_row($result)) {
			$id = $row2[0];
			$category_id = $row2[1];
			$item_name = $row2[2];
			$item_description = $row2[3];
			$item_description = $row2[4];
			$cost_default = $row2[5];
			$cost_small = $row2[6];
			$cost_large = $row2[7];
		}
		echo $item_name.'name';
		echo $size;
		echo $price;
		echo $quantity;
		echo $item_description;
	}
?>