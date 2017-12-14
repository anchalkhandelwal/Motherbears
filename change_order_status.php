<?php
	session_start();

	include('connection.php');

	$order_id = isset($_POST['order_id'])?$_POST['order_id']:'';
	$order_status = isset($_POST['order_status'])?$_POST['order_status']:'';
	
	$query = "UPDATE \"Orders\" SET order_status = '{$order_status}' WHERE id='{$order_id}'";
	// die($query);
	$result = pg_query($conn, $query);

	echo "Details Updated";
	if(!$result){
		die(pg_last_error());
	}

?>