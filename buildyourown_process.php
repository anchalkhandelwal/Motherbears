<?php
	session_start();

	include('connection.php');

	$name = isset($_POST['name'])?$_POST['name']:'';
	$description = isset($_POST['description'])?$_POST['description']:'';
	$price = isset($_POST['cost'])?$_POST['cost']:0;

	$query = "INSERT INTO \"Menu\"(category_id,item_name,item_desc,cost_default,cost_small,cost_large,item_photo) VALUES(1, '{$name}', '{$description}',{$price},0,0,'') RETURNING id;";
	// die($query);
	$result = pg_query($conn, $query);

	$arr = pg_fetch_array($result);

	if(!$result) {
		$error_message = pg_last_error();
		header("Location: buildyourown_step1.php?qerror=DB%20Error");
	}
	else {
		header("Location: menu.php?cart={$arr[0]}&size=Medium");
	}
?>