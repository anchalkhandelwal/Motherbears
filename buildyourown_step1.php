<?php
session_start();

include('connection.php');

// if(isset($_GET['location']) && $_GET['location']!=''){
//   $_SESSION['orderstorelocation'] = $_GET['location'];
// }
// if(isset($_GET['address']) && $_GET['address']!=''){
//   $_SESSION['orderaddress'] = $_SESSION['address'];
// }
// $address = isset($_POST['address'])?$_POST['address']:'';
// $city = isset($_POST['city'])?$_POST['city']:'';
// $pincode = isset($_POST['pin'])?$_POST['pin']:'';

// $final_address = $address.'|'.$city.'|'.$pincode;
// if($final_address == "||"){
//   if(!isset($_SESSION['orderstorelocation']) && !isset($_SESSION['orderaddress'])){
//     header("Location: order_step1.php?error=cannot%20determine%20order%20address");
//   }
// }
// else {
//   $_SESSION['orderaddress'] = $final_address;
// }

$query_error = isset($_GET['qerror'])?$_GET['qerror']:'';

  $query = "SELECT * FROM \"Meats\"";
  // die($query);
  $result = pg_query($conn, $query);
  $meat = array();

  if(!$result) {
    header("Location: login.php?error=Network%20is%20down");
  }
  else {
    $numrows = pg_numrows($result);

    if($numrows == 0){
      header("Location: login.php?error=Something%20is%20Wrong");  
    }
    else {
      while ($row = pg_fetch_row($result)) {
        array_push($meat, $row);
      }
    }
  }

  $query = "SELECT * FROM \"Cheese\"";
  // die($query);
  $result = pg_query($conn, $query);
  $cheese = array();

  if(!$result) {
    header("Location: login.php?error=Network%20is%20down");
  }
  else {
    $numrows = pg_numrows($result);

    if($numrows == 0){
      header("Location: login.php?error=Something%20is%20Wrong");  
    }
    else {
      while ($row = pg_fetch_row($result)) {
        array_push($cheese, $row);
      }
    }
  }

  $query = "SELECT * FROM \"CrustTypes\"";
  // die($query);
  $result = pg_query($conn, $query);
  $crust = array();

  if(!$result) {
    header("Location: login.php?error=Network%20is%20down");
  }
  else {
    $numrows = pg_numrows($result);

    if($numrows == 0){
      header("Location: login.php?error=Something%20is%20Wrong");  
    }
    else {
      while ($row = pg_fetch_row($result)) {
        array_push($crust, $row);
      }
    }
  }

  $query = "SELECT * FROM \"Sauces\"";
  // die($query);
  $result = pg_query($conn, $query);
  $sauce = array();

  if(!$result) {
    header("Location: login.php?error=Network%20is%20down");
  }
  else {
    $numrows = pg_numrows($result);

    if($numrows == 0){
      header("Location: login.php?error=Something%20is%20Wrong");  
    }
    else {
      while ($row = pg_fetch_row($result)) {
        array_push($sauce, $row);
      }
    }
  }

  $query = "SELECT * FROM \"Veggies\"";
  // die($query);
  $result = pg_query($conn, $query);
  $veggie = array();

  if(!$result) {
    header("Location: login.php?error=Network%20is%20down");
  }
  else {
    $numrows = pg_numrows($result);

    if($numrows == 0){
      header("Location: login.php?error=Something%20is%20Wrong");  
    }
    else {
      while ($row = pg_fetch_row($result)) {
        array_push($veggie, $row);
      }
    }
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
      <style>
        .card {
          border: none;
        }
      </style>
   </head>
   <body class="dom-body">
      <?php include('header.php'); ?>

      <?php if($query_error!=''){
      echo '<div class="alert alert-danger" role="alert">Query Error:'.$query_error.'</div>';
    } ?>

      <div class="jumbotron">
         <h2 class="display-5">Build your own pizza &nbsp; &nbsp; &nbsp; Total: <span id="price">0.0$</span><span style="float:right; color: #efefef;">
          <form id="targetform" action="buildyourown_process.php" method="post">
          <input type="hidden" name="name" id="name">
          <input type="hidden" name="description" id="description">
          <input type="hidden" name="cost" id="cost">

          <button class="btn btn-primary" id="continuecart" style="display:block;margin: 0px auto" role="button">Continue to Cart&nbsp;<i class="fa fa-arrow-circle-right"></i></button></span></h2>
          <form>
         <hr class="hrule" />
         <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
               <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Crust Type</a>
                  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cheese</a>
                  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Sauce</a>
                  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Meats</a>
                  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-veggies" role="tab" aria-controls="v-pills-veggies" aria-selected="false">Veggies</a>
               </div>
            </div>
            <form action="checkout.php" method="POST">
              <input id="crusttype" type="hidden" name="crusttype">
              <input id="cheese" type="hidden" name="cheese">
              <input id="sauce" type="hidden" name="sauce">
              <input id="meats" type="hidden" name="meats">
              <input id="veggies" type="hidden" name="veggies">
              <input id="submit" type="submit" value="submit" style="display:none;">
            </form>
            <div class="col-sm-8">
               <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="row">
                      <div class="col-sm-3">
                        <div class="card card-crust">
                          <img class="card-img-top" src="static/images/crust-1.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $crust[0][1]; ?></h4>
                            <p id="<?php echo "crust-{$crust[0][0]}"; ?>"><?php echo  $crust[0][2]; ?>$</p>
                            <p class="card-text">
                              
                            </p>
                            <a href="#" id="select_original_crust" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-crust">
                          <img class="card-img-top" src="static/images/crust-2.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $crust[1][1]; ?></h4>
                            <p id="<?php echo "crust-{$crust[1][0]}"; ?>"><?php echo  $crust[1][2]; ?>$</p>
                            <p class="card-text"></p>
                            <a href="#" id="select_thin_crust" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-crust">
                          <img class="card-img-top" src="static/images/crust-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $crust[2][1]; ?></h4>
                            <p id="<?php echo "crust-{$crust[2][0]}"; ?>"><?php echo  $crust[2][2]; ?>$</p>
                            <p class="card-text"></p>
                            <a href="#" id="select_handtossed_crust" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-crust">
                          <img class="card-img-top" src="static/images/crust-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $crust[3][1]; ?></h4>
                            <p id="<?php echo "crust-{$crust[3][0]}"; ?>"><?php echo  $crust[3][2]; ?>$</p>
                            <p class="card-text"></p>
                            <a href="#" id="select_orinal_stuffed_crust" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                      <div class="row">
                      <div class="col-sm-3">
                        <div class="card card-cheese">
                          <img class="card-img-top" src="static/images/cheese-1.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $cheese[0][1]; ?></h4>
                            <p id="<?php echo "cheese-{$cheese[0][0]}"; ?>"><?php echo  $cheese[0][2]; ?>$</p>
                            <p class="card-text">
                              
                            </p>
                            <a href="#" id="select_american_cheese" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-cheese">
                          <img class="card-img-top" src="static/images/cheese-2.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $cheese[1][1]; ?></h4>
                            <p id="<?php echo "cheese-{$cheese[1][0]}"; ?>"><?php echo  $cheese[1][2]; ?>$</p>
                            <p class="card-text"></p>
                            <a href="#" id="select_provolone" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-cheese">
                          <img class="card-img-top" src="static/images/cheese-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $cheese[2][1]; ?></h4>
                            <p id="<?php echo "cheese-{$cheese[2][0]}"; ?>"><?php echo  $cheese[2][2]; ?>$</p>
                            <p class="card-text"></p>
                            <a href="#" id="select_mozzarella" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-cheese">
                          <img class="card-img-top" src="static/images/cheese-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $cheese[3][1]; ?></h4>
                            <p id="<?php echo "cheese-{$cheese[3][0]}"; ?>"><?php echo  $cheese[3][2]; ?>$</p>
                            <p class="card-text"></p>
                            <a href="#" id="select_pepperjack" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                      <div class="row">
                      <div class="col-sm-3">
                        <div class="card card-sauce">
                          <img class="card-img-top" src="static/images/sauce-1.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $sauce[0][1]; ?></h4>
                            <p id="<?php echo "sauce-{$sauce[0][0]}"; ?>"><?php echo  $sauce[0][2]; ?>$</p>
                            <p class="card-text">
                              
                            </p>
                            <a href="#" id="select_marinara_sauce" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-sauce">
                          <img class="card-img-top" src="static/images/sauce-2.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $sauce[1][1]; ?></h4>
                            <p id="<?php echo "sauce-{$sauce[1][0]}"; ?>"><?php echo  $sauce[1][2]; ?>$</p>
                            <p class="card-text"></p>
                            <a href="#" id="select_tomato_sauce" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-sauce">
                          <img class="card-img-top" src="static/images/sauce-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $sauce[2][1]; ?></h4>
                            <p id="<?php echo "sauce-{$sauce[2][0]}"; ?>"><?php echo  $sauce[2][2]; ?>$</p>
                            <p class="card-text"></p>
                            <a href="#" id="select_garlic_sauce" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-sauce">
                          <img class="card-img-top" src="static/images/sauce-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $sauce[3][1]; ?></h4>
                            <p id="<?php echo "sauce-{$sauce[3][0]}"; ?>"><?php echo  $sauce[3][2]; ?>$</p>
                            <p class="card-text"></p>
                            <a href="#" id="select_barbeque_sauce" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                      <div class="row">
                      <div class="col-sm-3">
                        <div class="card card-meat">
                          <img class="card-img-top" src="static/images/meat-1.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $meat[0][1]; ?></h4>
                            <p id="<?php echo "meat-{$meat[0][0]}"; ?>"><?php echo  $meat[0][2]; ?>$</p>
                            <p class="card-text">
                              
                            </p>
                            <a href="#" id="select_pepperoni" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-meat">
                          <img class="card-img-top" src="static/images/meat-2.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $meat[1][1]; ?></h4>
                            <p id="<?php echo "meat-{$meat[1][0]}"; ?>"><?php echo  $meat[1][2]; ?>$</p>
                            <p class="card-text">
                              
                            </p>
                            <a href="#" id="select_chicken" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-meat">
                          <img class="card-img-top" src="static/images/meat-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $meat[2][1]; ?></h4>
                            <p id="<?php echo "meat-{$meat[2][0]}"; ?>"><?php echo  $meat[2][2]; ?>$</p>
                            <p class="card-text">
                        
                            </p>
                            <a href="#" id="select_ham" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-meat">
                          <img class="card-img-top" src="static/images/meat-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $meat[3][1]; ?></h4>
                            <p id="<?php echo "meat-{$meat[3][0]}"; ?>"><?php echo  $meat[3][2]; ?>$</p>
                            <p class="card-text">
                            
                            </p>
                            <a href="#" id="select_bacon" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-veggies" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                      <div class="row">
                      <div class="col-sm-3">
                        <div class="card card-veggie">
                          <img class="card-img-top" src="static/images/veggie-1.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $veggie[0][1]; ?></h4>
                            <p id="<?php echo "veggie-{$veggie[0][0]}"; ?>"><?php echo  $veggie[0][2]; ?>$</p>
                            <p class="card-text">
                              
                            </p>
                            <a href="#" id="select_onions" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-veggie">
                          <img class="card-img-top" src="static/images/veggie-2.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $veggie[1][1]; ?></h4>
                            <p id="<?php echo "veggie-{$veggie[1][0]}"; ?>"><?php echo  $veggie[1][2]; ?>$</p>
                            <p class="card-text">
                              
                            </p>
                            <a href="#" id="select_banana_pepper" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-veggie">
                          <img class="card-img-top" src="static/images/veggie-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $veggie[2][1]; ?></h4>
                            <p id="<?php echo "veggie-{$veggie[2][0]}"; ?>"><?php echo  $veggie[2][2]; ?>$</p>
                            <p class="card-text">
                             
                            </p>
                            <a href="#" id="select_green_pepper" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-veggie">
                          <img class="card-img-top" src="static/images/veggie-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title"><?php echo $veggie[3][1]; ?></h4>
                            <p id="<?php echo "veggie-{$veggie[3][0]}"; ?>"><?php echo  $veggie[3][2]; ?>$</p>
                            <p class="card-text">
                              
                            </p>
                            <a href="#" id="select_sliced_tomatoes" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
               </div>
            </div>
            <div class="col-sm-1"></div>
         </div>
      </div>

  <?php include('footer.php') ?>
      
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script>

        $(document).ready(function() {

          var total_price = 0.0;
          var crust_price = 0.0;
          var meat_price = 0.0;
          var veggie_price = 0.0;
          var sauce_price = 0.0;
          var cheese_price = 0.0;

          var css_default = $('#select_bacon').closest('.card').css('border-width');

          $('#select_original_crust').click(function() {
            var value = $('#crust-1').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_original_crust').closest('.card').css('border-width') != css_default) {
              $('#select_original_crust').closest('.card').css('border','none');
              crust_price = 0;
            }
            else {
              $('.card-crust').css('border','none');
            $('#select_original_crust').closest('.card').css('border','2px solid darkred');
            crust_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_thin_crust').click(function() {
            var value = $('#crust-2').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_thin_crust').closest('.card').css('border-width') != css_default) {
              $('#select_thin_crust').closest('.card').css('border','none');
              crust_price = 0;
            }
            else {
              $('.card-crust').css('border','none');
            $('#select_thin_crust').closest('.card').css('border','2px solid darkred');
            crust_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_handtossed_crust').click(function() {
            var value = $('#crust-3').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_handtossed_crust').closest('.card').css('border-width') != css_default) {
              $('#select_handtossed_crust').closest('.card').css('border','none');
              crust_price = 0;
            }
            else {
              $('.card-crust').css('border','none');
            $('#select_handtossed_crust').closest('.card').css('border','2px solid darkred');
            crust_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_orinal_stuffed_crust').click(function() {
            var value = $('#crust-4').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_orinal_stuffed_crust').closest('.card').css('border-width') != css_default) {
              $('#select_orinal_stuffed_crust').closest('.card').css('border','none');
              crust_price = 0;
            }
            else {
              $('.card-crust').css('border','none');
            $('#select_orinal_stuffed_crust').closest('.card').css('border','2px solid darkred');
            crust_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });


          $('#select_american_cheese').click(function() {
            var value = $('#cheese-1').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_american_cheese').closest('.card').css('border-width') != css_default) {
              $('#select_american_cheese').closest('.card').css('border','none');
              cheese_price = 0;
            }
            else {
              $('.card-cheese').css('border','none');
            $('#select_american_cheese').closest('.card').css('border','2px solid darkred');
            cheese_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_provolone').click(function() {
            var value = $('#cheese-2').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_provolone').closest('.card').css('border-width') != css_default) {
              $('#select_provolone').closest('.card').css('border','none');
              cheese_price = 0;
            }
            else {
              $('.card-cheese').css('border','none');
            $('#select_provolone').closest('.card').css('border','2px solid darkred');
            cheese_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_mozzarella').click(function() {
            var value = $('#cheese-3').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_mozzarella').closest('.card').css('border-width') != css_default) {
              $('#select_mozzarella').closest('.card').css('border','none');
              cheese_price = 0;
            }
            else {
              $('.card-cheese').css('border','none');
            $('#select_mozzarella').closest('.card').css('border','2px solid darkred');
            cheese_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_pepperjack').click(function() {
            var value = $('#cheese-4').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_pepperjack').closest('.card').css('border-width') != css_default) {
              $('#select_pepperjack').closest('.card').css('border','none');
              cheese_price = 0;
            }
            else {
              $('.card-cheese').css('border','none');
            $('#select_pepperjack').closest('.card').css('border','2px solid darkred');
            cheese_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });


          $('#select_marinara_sauce').click(function() {
            var value = $('#sauce-1').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_marinara_sauce').closest('.card').css('border-width') != css_default) {
              $('#select_marinara_sauce').closest('.card').css('border','none');
              sauce_price = 0;
            }
            else {
              $('.card-sauce').css('border','none');
            $('#select_marinara_sauce').closest('.card').css('border','2px solid darkred');
            sauce_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });

          $('#select_tomato_sauce').click(function() {
            var value = $('#sauce-2').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_tomato_sauce').closest('.card').css('border-width') != css_default) {
              $('#select_tomato_sauce').closest('.card').css('border','none');
              sauce_price = 0;
            }
            else {
              $('.card-sauce').css('border','none');
            $('#select_tomato_sauce').closest('.card').css('border','2px solid darkred');
            sauce_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });

          $('#select_garlic_sauce').click(function() {
            var value = $('#sauce-3').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_garlic_sauce').closest('.card').css('border-width') != css_default) {
              $('#select_garlic_sauce').closest('.card').css('border','none');
              sauce_price = 0;
            }
            else {
              $('.card-sauce').css('border','none');
            $('#select_garlic_sauce').closest('.card').css('border','2px solid darkred');
            sauce_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });

          $('#select_barbeque_sauce').click(function() {
            var value = $('#sauce-4').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_barbeque_sauce').closest('.card').css('border-width') != css_default) {
              $('#select_barbeque_sauce').closest('.card').css('border','none');
              sauce_price = 0;
            }
            else {
              $('.card-sauce').css('border','none');
            $('#select_barbeque_sauce').closest('.card').css('border','2px solid darkred');
            sauce_price = value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });

          $('#select_pepperoni').click(function() {
            var value = $('#meat-1').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_pepperoni').closest('.card').css('border-width') != css_default) {
              $('#select_pepperoni').closest('.card').css('border','none');
              meat_price = meat_price-value;
            }
            else {
            $('#select_pepperoni').closest('.card').css('border','2px solid darkred');
            meat_price +=value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_chicken').click(function() {
            var value = $('#meat-2').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_chicken').closest('.card').css('border-width') != css_default) {
              $('#select_chicken').closest('.card').css('border','none');
              meat_price = meat_price-value;
            }
            else {
            $('#select_chicken').closest('.card').css('border','2px solid darkred');
            meat_price += value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_ham').click(function() {
            var value = $('#meat-3').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_ham').closest('.card').css('border-width') != css_default) {
              $('#select_ham').closest('.card').css('border','none');
              meat_price = meat_price-value;
            }
            else {
            $('#select_ham').closest('.card').css('border','2px solid darkred');
            meat_price +=value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_bacon').click(function() {
            var value = $('#meat-4').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_bacon').closest('.card').css('border-width') != css_default) {
              $('#select_bacon').closest('.card').css('border','none');
              meat_price = meat_price-value;
            }
            else {
            $('#select_bacon').closest('.card').css('border','2px solid darkred');
            meat_price += value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });


          $('#select_onions').click(function() {
            var value = $('#veggie-1').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_onions').closest('.card').css('border-width') != css_default) {
              $('#select_onions').closest('.card').css('border','none');
              veggie_price = veggie_price-value;
            }
            else {
            $('#select_onions').closest('.card').css('border','2px solid darkred');
            veggie_price+= value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_banana_pepper').click(function() {
            var value = $('#veggie-2').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_banana_pepper').closest('.card').css('border-width') != css_default) {
              $('#select_banana_pepper').closest('.card').css('border','none');
              veggie_price = veggie_price-value;
            }
            else {
            $('#select_banana_pepper').closest('.card').css('border','2px solid darkred');
            veggie_price+= value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_green_pepper').click(function() {
            var value = $('#veggie-3').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_green_pepper').closest('.card').css('border-width') != css_default) {
              $('#select_green_pepper').closest('.card').css('border','none');
              veggie_price = veggie_price-value;
            }
            else {
            $('#select_green_pepper').closest('.card').css('border','2px solid darkred');
            veggie_price+= value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });
          $('#select_sliced_tomatoes').click(function() {
            var value = $('#veggie-4').text();
            value = parseFloat(value.slice(0,-1));
            if($('#select_sliced_tomatoes').closest('.card').css('border-width') != css_default) {
              $('#select_sliced_tomatoes').closest('.card').css('border','none');
              veggie_price = veggie_price-value;
            }
            else {
            $('#select_sliced_tomatoes').closest('.card').css('border','2px solid darkred');
            veggie_price += value;
            }
            total_price = crust_price + meat_price + cheese_price + sauce_price + veggie_price;
            $('#price').html(total_price+"$");
          });

          $('#continuecart').click(function() {
            $('#name').val("Build Your Own");
            var descriptionString = "";
            $('.card').each(function(i, obj) {
              if($(this).css('border-width') == "2px") {
                descriptionString += $(this).find('.card-title').text();
                descriptionString += ", ";
              }
            });
            descriptionString = descriptionString.slice(0,-2);
            $('#description').val(descriptionString);
            var price = $('#price').text();
            price = price.slice(0,-1);
            $('#cost').val(price);
            $('#targetform').submit();
          });
        });
      </script>  

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   </body>
</html>