<?php
session_start();
?>
<!doctype html>
<html lang="en">
   <head>
      <title>MotherBears | Address</title>
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
         if(isset($_GET['error'])){
          echo '<div class="alert alert-danger" role="alert">Error: '.$_GET["error"].'</div>';
         }
      ?>

      <?php
        if($_GET['type']=="delivery"){
          $_SESSION['order_type_selected'] = 1;

          echo '<div class="jumbotron">
   <h2 class="display-5">Select an Address</h2>
   <hr class="hrule" />
   <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Address</h4>
               <p class="card-text">Please provide us an address to deliver your pizza</p>
               <form class="form-horizontal" role="form" action="set_delivery_address_and_redirect_to_menu.php" method="POST">
                  <div class="row">
                     <div class="col-md-3 field-label-responsive">
                        <label for="address">Home Address</label>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem">
                                 <i class="fa fa-home"></i>
                              </div>
                              <input type="text" name="address" class="form-control"
                                 id="address" placeholder="Address" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3 field-label-responsive">
                        <label for="city">City</label>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem">
                                 <i class="fa fa-globe"></i>
                              </div>
                              <input type="text" name="city" class="form-control"
                                 id="city" placeholder="City" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3 field-label-responsive">
                        <label for="pin">Zip Code</label>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem">
                                 <i class="fa fa-map-marker"></i>
                              </div>
                              <input type="text" name="pin" class="form-control"
                                 id="pin" pattern="[0-9]{5}" placeholder="47408" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3"></div>
                     <div class="col-md-6">
                        <button type="submit" style="display:block;margin: 0px auto" class="btn btn-success">Continue&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-sm-2"></div>
  </div>';
  if(isset($_SESSION['first_name'])){
    echo '<hr class="hrule-light" />
      <div class="row">
        <a class="btn btn-primary" href="set_delivery_address_and_redirect_to_menu.php?address=own" style="display:block;margin: 0px auto" role="button">Select my Home Address&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
      </div>';
  }
    echo '</div></div>';

        }
        else if($_GET['type']=="carryout"){
          $_SESSION['order_type_selected'] = 2;
          echo '<div class="jumbotron">
    <h2 class="display-5">Choose a Store Location</h2>
    <hr class="hrule" />
      <div class="row">
      <div class="col-sm-2"></div>
  <div class="col-sm-4">
    <a href="select_store_id_and_redirect_to_menu.php?location=1">
    <div class="card card-hover">
      <div class="card-body">
        <h4 class="card-title">Mother Bear’s Pizza Campus</h4>
        <p class="card-text">(812) 332-4495</p>
        <p class="card-text"> 1428 E 3rd St Bloomington, IN 47401</p>
        <img class="img-fluid" src="static/images/motherbearscampus.png" alt="campus">
      </div>
    </div>
    </a>
  </div>
  <div class="col-sm-4">
    <a href="select_store_id_and_redirect_to_menu.php?location=2">
    <div class="card card-hover">
      <div class="card-body">
        <h4 class="card-title">Mother Bear\'s Pizza West</h4>
        <p class="card-text">(812) 287-7366</p>
    <p class="card-text">2980 W Whitehall Crossing Blvd Bloomington</p>
        <img class="img-fluid" src="static/images/motherbearseast.png" alt="east">
      </div>
    </div>
    </a>
  </div>
  <div class="col-sm-2"></div>
</div>
</div>';

        }
        else {
          header("Location: index.php?error=Please%20select%20a%20Delivery%20Type");
        }
      ?>

<?php include('footer.php') ?>
      
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   </body>
</html>