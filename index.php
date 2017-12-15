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
      <!-- PAGE CSS -->
      <link rel="stylesheet" href="static/css/bootstrap_custom.css"/>
      <link rel="stylesheet" type="text/css" href="static/css/commons.css">
   </head>
   <body class="dom-body">
      <?php include('header.php'); ?>

      <?php
         if(isset($_SESSION['first_name'])){
            echo '<div class="alert alert-primary" role="alert">Welcome back, '.$_SESSION["first_name"].'!<a class="btn btn-danger btn-sm float-right" href="signout.php" style="position:relative;top:-3px;">Logout</a></div>';
         }
         if(isset($_GET['error'])){
          echo '<div class="alert alert-danger" role="alert">Error: '.$_GET["error"].'</div>';
         }
      ?>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="d-block w-100" src="static/images/slider-1.png" alt="First slide">
               <div class="carousel-caption d-none d-md-block">
                  <h1>Welcome to Mother bear's Pizza</h1>
                  <p>The best in Bloomington</p>
                </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="static/images/slider-2.png" alt="Second slide">
               <div class="carousel-caption d-none d-md-block">
                  <h1>The Illinois Central (Medium)</h1>
                  <p><a class="btn btn-primary" href="#"><i class="fa fa-plus"></i>&nbsp;Order Now</a></p>
                </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="static/images/slider-3.png" alt="Third slide">
               <div class="carousel-caption d-none d-md-block">
                  <h1>The Summer Garden (Medium)</h1>
                  <p><a class="btn btn-primary" href="#"><i class="fa fa-plus"></i>&nbsp;Order Now</a></p>
                </div>
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="static/images/slider-4.png" alt="Fourth slide">
               <div class="carousel-caption d-none d-md-block">
                  <h1>Veggie Delight (Small)</h1>
                  <p><a class="btn btn-primary" href="#"><i class="fa fa-plus"></i>&nbsp;Order Now</a></p>
                </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
      </div>


      <div class="jumbotron">
    <h2 class="display-5">ORDER TYPE</h2>
    <hr class="hrule" />
      <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Carryout</h4>
        <p class="card-text">Get your freshly baked pizza directly from store with no delivery costs</p>
        <a href="order_step_1_redirect_menu.php?type=carryout" ><img class="ordericons img-fluid" src="static/images/carryout.png" alt="carryout"></a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Delivery</h4>
        <p class="card-text">Get our delicious pizza at your doorstep with minimal delivery charges</p>
        <a href="order_step_1_redirect_menu.php?type=delivery"><img class="ordericons img-fluid" src="static/images/delivery.png" alt="delivery"></a>
      </div>
    </div>
  </div>
</div>
</div>


<div class="jumbotron">
    <h2 class="display-5">TODAY'S DEALS</h2>
    <hr class="hrule" />
    <div class="row">
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">The Summer Garden (Medium)</h4>
        <p class="card-text">Loaded with veggies fresh from
the garden: Spinach, fresh Tomatoes, fresh Mushrooms, Red
Onions and Garlic. </p>
         <p>Original Price: 15.75$</p>
         <p>Deal Price: 10.99$</p>
        <a href="#" class="btn btn-primary">Order Now</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">The Illinois Central (Medium)</h4>
        <p class="card-text">Hoosier Ham and Bacon from the heartland to be topped with
Red Onions, Cheddar and Asiago Cheese.</p>
         <p>Original Price: 14.50$</p>
         <p>Deal Price: 9.05$</p>
        <a href="#" class="btn btn-primary">Order Now</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Veggie Delight (Small)</h4>
        <p class="card-text">A veghead’s nirvana. Fresh Mushrooms,
Onions, Green Peppers, Tomatoes, and Black and Green
Olives.</p>
         <p>Original Price: 8.75$</p>
         <p>Deal Price: 5.50$</p>
        <a href="#" class="btn btn-primary">Order Now</a>
      </div>
    </div>
  </div>
</div>
</div>

<?php include('footer.php') ?>
      
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   </body>
</html>