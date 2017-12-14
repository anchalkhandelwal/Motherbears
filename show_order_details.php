<?php
	session_start();

	include('connection.php');

	$order_id = isset($_POST['order_id'])?$_POST['order_id']:'';


	
	$query = 'SELECT * FROM "OrderDetails" WHERE order_id='.$order_id; 
	$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");

	echo '<div class="row">
              <div class="col-sm-12">
                <p class="item_name">Order Details For Order Number: '.$order_id.'</p>
              </div>
            </div>
			<div class="row">
              <div class="col-sm-10">
                <p class="item_name">Item</p>
              </div>
              <div class="col-sm-2">
                <p class="quantity">Quantity</p>
              </div>
            </div>';
	while ($row = pg_fetch_row($rs)) {
		$id = $row[0];
		$order_id = $row[1];
		$item_description = $row[3];
		$menu_id = $row[2];
		$quantity = $row[4];
		$price = $row[5];
		$size = $row[6];
		
		$query = 'SELECT * FROM "Menu" WHERE id='.$menu_id; 
		$result = pg_query($conn, $query) or die("Cannot execute query: $query\n");
		while ($row2 = pg_fetch_row($result)) {
			$id = $row2[0];
			$item_name = $row2[2];
		}
		echo '
            <div class="row">
              <div class="col-sm-10">
                <p class="item_name">'.$item_name.'</p>
                <p class="item_desc">'.$item_description.' - '.$size.'</p>
              </div>
              <div class="col-sm-2">
                <p class="quantity">'.$quantity.'</p>
              </div>
            </div>';
	}
?>