<?php
session_start();
?>
<!doctype html>
<html lang="en">
   <head>
      <title>MotherBears | Home</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script src="script.js" type="text/javascript"></script>
      <!-- PAGE CSS -->
      <link rel="stylesheet" href="static/css/bootstrap_custom.css"/>
      <link rel="stylesheet" type="text/css" href="static/css/commons.css">
	   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	   <link rel="stylesheet" type="text/css" href="static/css/style.css">
	   
	   	<script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  
  </script>
   </head>
	
<body class="dom-body">
		<?php include('header.php'); ?>

		<?php
			 if(isset($_SESSION['first_name'])){
				echo '<div class="alert alert-primary" role="alert">Welcome back, '.$_SESSION["first_name"].'!<a class="btn btn-danger btn-sm float-right" href="signout.php" style="position:relative;top:-3px;">Logout</a></div>';
			 }
		?>
	<div class="content-container">
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">View All</a></li>
			<li><a href="#tabs-2">Pizza</a></li>
			<li><a href="#tabs-3">Pasta</a></li>
			<li><a href="#tabs-4">Drinks</a></li>
			<li><a href="#tabs-5">Others</a></li>
		  </ul>
		  <div id="tabs-1">
			<p> <?php include('view_all_menu.php'); ?></p>
		  </div>
		  <div id="tabs-2">
			<p><?php 
				$category_id = 1;
				include('pizza_menu.php'); ?></p>
		  </div>
		  <div id="tabs-3">
			<p><?php 
				$category_id = 2;
				include('pizza_menu.php'); ?></p></p>
		  </div>
		  <div id="tabs-4">
			<p><?php 
				$category_id = 3;
				include('pizza_menu.php'); ?></p></p>
		  </div>
		  <div id="tabs-5">
			<p><?php 
				$category_id = 4;
				include('pizza_menu.php'); ?></p></p>
		  </div>
			
	</div>		
	</div>
		<?php include('footer.php'); ?>
		
		<?php
		 if (!array_key_exists('cart', $_SESSION) || !is_array($_SESSION['cart'])){
				$_SESSION['cart']=array();
		 }
		 if (!array_key_exists('size', $_SESSION) || !is_array($_SESSION['size'])){
				$_SESSION['size']=array();
		 }

		if(isset($_GET['cart'])){
			array_push($_SESSION['cart'], $_GET['cart']);
		}
		
		if(isset($_GET['size'])){
			array_push($_SESSION['size'], $_GET['size']);
		}
		
		
		?>
		
	

		
	<script>
	$(document).ready(function () {
		$("#menu_page").removeClass("btn-light");
	   	$("#menu_page").addClass( "btn-warning");
	});
		$( '.item_size_selection' ).on('change', function() {
			var str = this.value;
			$(this).parent().find('.item_cost span').text(str);
		});		
		
	</script>
</body>
</html>