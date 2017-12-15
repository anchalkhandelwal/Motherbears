<?php
	session_start();
    $_SESSION['store_id'] = $_GET['location'];
    if(isset( $_SESSION['user_id'])) {
    	header("Location: menu.php");
    } else {
    	header("Location: login.php");
    }
?>