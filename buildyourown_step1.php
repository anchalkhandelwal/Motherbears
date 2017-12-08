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

      <div class="jumbotron">
         <h2 class="display-5">Build your own pizza <span style="float:right; color: #efefef;"><a class="btn btn-primary" id="continuecart" style="display:block;margin: 0px auto" role="button" href="checkout.php">Continue to Cart&nbsp;<i class="fa fa-arrow-circle-right"></i></a></span></h2>
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
                            <h4 class="card-title">Original Crust</h4>
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
                            <h4 class="card-title">Thin Crust</h4>
                            <p class="card-text"></p>
                            <a href="#" id="select_thin_crust" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-crust">
                          <img class="card-img-top" src="static/images/crust-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Hand Tossed Crust</h4>
                            <p class="card-text"></p>
                            <a href="#" id="select_handtossed_crust" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-crust">
                          <img class="card-img-top" src="static/images/crust-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Original Stuffed Crust</h4>
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
                            <h4 class="card-title">American Cheese</h4>
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
                            <h4 class="card-title">Provolone</h4>
                            <p class="card-text"></p>
                            <a href="#" id="select_provolone" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-cheese">
                          <img class="card-img-top" src="static/images/cheese-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Mozzarella</h4>
                            <p class="card-text"></p>
                            <a href="#" id="select_mozzarella" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-cheese">
                          <img class="card-img-top" src="static/images/cheese-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Pepperjack</h4>
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
                            <h4 class="card-title">Classic Marinara</h4>
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
                            <h4 class="card-title">Tomato Sauce</h4>
                            <p class="card-text"></p>
                            <a href="#" id="select_tomato_sauce" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-sauce">
                          <img class="card-img-top" src="static/images/sauce-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Garlic Parmesan</h4>
                            <p class="card-text"></p>
                            <a href="#" id="select_garlic_sauce" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-sauce">
                          <img class="card-img-top" src="static/images/sauce-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Barbeque</h4>
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
                            <h4 class="card-title">Pepperoni</h4>
                            <p class="card-text">
                              <select name="item_size" class="item_size_selection"><option value="8.75" selected="selected">1</option><option value="15.75">2</option><option value="23.25">3</option></select>
                            </p>
                            <a href="#" id="select_pepperoni" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-meat">
                          <img class="card-img-top" src="static/images/meat-2.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Grilled Chicken</h4>
                            <p class="card-text">
                              <select name="item_size" class="item_size_selection"><option value="8.75" selected="selected">1</option><option value="15.75">2</option><option value="23.25">3</option></select>
                            </p>
                            <a href="#" id="select_chicken" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-meat">
                          <img class="card-img-top" src="static/images/meat-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Ham</h4>
                            <p class="card-text">
                              <select name="item_size" class="item_size_selection"><option value="8.75" selected="selected">1</option><option value="15.75">2</option><option value="23.25">3</option></select>
                            </p>
                            <a href="#" id="select_ham" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-meat">
                          <img class="card-img-top" src="static/images/meat-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Bacon</h4>
                            <p class="card-text">
                              <select name="item_size" class="item_size_selection"><option value="8.75" selected="selected">1</option><option value="15.75">2</option><option value="23.25">3</option></select>
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
                            <h4 class="card-title">Red Onions</h4>
                            <p class="card-text">
                              <select name="item_size" class="item_size_selection"><option value="8.75" selected="selected">1</option><option value="15.75">2</option><option value="23.25">3</option></select>
                            </p>
                            <a href="#" id="select_onions" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-veggie">
                          <img class="card-img-top" src="static/images/veggie-2.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Banana Peppers</h4>
                            <p class="card-text">
                              <select name="item_size" class="item_size_selection"><option value="8.75" selected="selected">1</option><option value="15.75">2</option><option value="23.25">3</option></select>
                            </p>
                            <a href="#" id="select_banana_pepper" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-veggie">
                          <img class="card-img-top" src="static/images/veggie-3.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Green Peppers</h4>
                            <p class="card-text">
                              <select name="item_size" class="item_size_selection"><option value="8.75" selected="selected">1</option><option value="15.75">2</option><option value="23.25">3</option></select>
                            </p>
                            <a href="#" id="select_green_pepper" class="btn btn-primary">Select</a>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="card card-veggie">
                          <img class="card-img-top" src="static/images/veggie-4.png" alt="Card image cap">
                          <div class="card-body">
                            <h4 class="card-title">Sliced Tomatoes</h4>
                            <p class="card-text">
                              <select name="item_size" class="item_size_selection"><option value="8.75" selected="selected">1</option><option value="15.75">2</option><option value="23.25">3</option></select>
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
          $('#select_original_crust').click(function() {
            $('.card-crust').css('border','none')
            $('#select_original_crust').closest('.card').css('border','2px solid darkred');
          });
          $('#select_thin_crust').click(function() {
            $('.card-crust').css('border','none')
            $('#select_thin_crust').closest('.card').css('border','2px solid darkred');
          });
          $('#select_handtossed_crust').click(function() {
            $('.card-crust').css('border','none')
            $('#select_handtossed_crust').closest('.card').css('border','2px solid darkred');
          });
          $('#select_orinal_stuffed_crust').click(function() {
            $('.card-crust').css('border','none')
            $('#select_orinal_stuffed_crust').closest('.card').css('border','2px solid darkred');
          });


          $('#select_american_cheese').click(function() {
            $('.card-cheese').css('border','none')
            $('#select_american_cheese').closest('.card').css('border','2px solid darkred');
          });
          $('#select_provolone').click(function() {
            $('.card-cheese').css('border','none')
            $('#select_provolone').closest('.card').css('border','2px solid darkred');
          });
          $('#select_mozzarella').click(function() {
            $('.card-cheese').css('border','none')
            $('#select_mozzarella').closest('.card').css('border','2px solid darkred');
          });
          $('#select_pepperjack').click(function() {
            $('.card-cheese').css('border','none')
            $('#select_pepperjack').closest('.card').css('border','2px solid darkred');
          });


          $('#select_marinara_sauce').click(function() {
            $('.card-sauce').css('border','none')
            $('#select_marinara_sauce').closest('.card').css('border','2px solid darkred');
          });
          $('#select_tomato_sauce').click(function() {
            $('.card-sauce').css('border','none')
            $('#select_tomato_sauce').closest('.card').css('border','2px solid darkred');
          });
          $('#select_garlic_sauce').click(function() {
            $('.card-sauce').css('border','none')
            $('#select_garlic_sauce').closest('.card').css('border','2px solid darkred');
          });
          $('#select_barbeque_sauce').click(function() {
            $('.card-sauce').css('border','none')
            $('#select_barbeque_sauce').closest('.card').css('border','2px solid darkred');
          });


          $('#select_pepperoni').click(function() {
            $('.card-meat').css('border','none')
            $('#select_pepperoni').closest('.card').css('border','2px solid darkred');
          });
          $('#select_chicken').click(function() {
            $('.card-meat').css('border','none')
            $('#select_chicken').closest('.card').css('border','2px solid darkred');
          });
          $('#select_ham').click(function() {
            $('.card-meat').css('border','none')
            $('#select_ham').closest('.card').css('border','2px solid darkred');
          });
          $('#select_bacon').click(function() {
            $('.card-meat').css('border','none')
            $('#select_bacon').closest('.card').css('border','2px solid darkred');
          });


          $('#select_onions').click(function() {
            $('.card-veggie').css('border','none')
            $('#select_onions').closest('.card').css('border','2px solid darkred');
          });
          $('#select_banana_pepper').click(function() {
            $('.card-veggie').css('border','none')
            $('#select_banana_pepper').closest('.card').css('border','2px solid darkred');
          });
          $('#select_green_pepper').click(function() {
            $('.card-veggie').css('border','none')
            $('#select_green_pepper').closest('.card').css('border','2px solid darkred');
          });
          $('#select_sliced_tomatoes').click(function() {
            $('.card-veggie').css('border','none')
            $('#select_sliced_tomatoes').closest('.card').css('border','2px solid darkred');
          });
        });
      </script>  

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   </body>
</html>