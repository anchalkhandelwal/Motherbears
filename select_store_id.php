<?php
	session_start();
    $_SESSION['store_id'] = $_GET['location'];
    header("Location: checkout.php");
?>