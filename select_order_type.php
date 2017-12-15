</!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- PAGE CSS -->
      <link rel="stylesheet" href="static/css/bootstrap_custom.css"/>
      <link rel="stylesheet" type="text/css" href="static/css/commons.css">
      <link rel="stylesheet" type="text/css" href="static/css/checkout.css">
</head>
<body class="dom-body">
      <?php include('header.php'); ?>
      <?php 
  		session_start();
		include 'connection.php';
	  ?>
      <?php
			 if(isset($_SESSION['first_name'])){
				echo '<div class="alert alert-primary" role="alert">Welcome back, '.$_SESSION["first_name"].'!<a class="btn btn-danger btn-sm float-right" href="signout.php" style="position:relative;top:-3px;">Logout</a></div>';
			 }
		?>
      <div class="container checkout">
      	<div class="jumbotron">
		    <h2 class="display-5">ORDER TYPE</h2>
		    <hr class="hrule" />
		     <div class="row">
				  <div class="col-sm-6">
				    <div class="card">
				      <div class="card-body">
				        <h4 class="card-title">Carryout</h4>
				        <p class="card-text">Get your freshly baked pizza directly from store with no delivery costs</p>
				        <a href="order_step1.php?type=carryout" ><img class="ordericons img-fluid" src="static/images/carryout.png" alt="carryout"></a>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-6">
				    <div class="card">
				      <div class="card-body">
				        <h4 class="card-title">Delivery</h4>
				        <p class="card-text">Get our delicious pizza at your doorstep with minimal delivery charges</p>
				        <a href="order_step1.php?type=delivery"><img class="ordericons img-fluid" src="static/images/delivery.png" alt="delivery"></a>
				      </div>
				    </div>
				  </div>
			</div>
		</div>
      </div>
      <?php include('footer.php') ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</html>