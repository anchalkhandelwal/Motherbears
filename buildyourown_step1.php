<?php
session_start();

if(isset($_GET['location']) && $_GET['location']!=''){
  $_SESSION['orderstorelocation'] = $_GET['location'];
}
if(isset($_GET['address']) && $_GET['address']!=''){
  $_SESSION['orderaddress'] = $_SESSION['address'];
}
$address = isset($_POST['address'])?$_POST['address']:'';
$city = isset($_POST['city'])?$_POST['city']:'';
$pincode = isset($_POST['pin'])?$_POST['pin']:'';

$final_address = $address.'|'.$city.'|'.$pincode;
if($final_address == "||"){
  if(!isset($_SESSION['orderstorelocation']) && !isset($_SESSION['orderaddress'])){
    header("Location: order_step1.php?error=cannot%20determine%20order%20address");
  }
}
else {
  $_SESSION['orderaddress'] = $final_address;
}

?>
<!doctype html>
<html lang="en">
   <head>
      <title>MotherBears | Build your own Pizza</title>
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

<?php include('footer.php') ?>
      
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   </body>
</html>