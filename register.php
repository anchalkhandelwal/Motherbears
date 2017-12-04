<?php 
$pwd_error = isset($_GET['error'])?$_GET['error']:'';
?>
<!doctype html>
<html lang="en">
   <head>
      <title>MotherBears | Register</title>
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

    <?php include('header.php') ?>

      <div class="jumbotron">
    <h2 class="display-5">Registration Form</h2>
    <hr class="hrule" />
    <div class="card">
      <div class="card-body">
        <p class="card-text">
          <form class="form-horizontal" role="form" action="registration-process.php" method="POST">
              <div class="row">
                  <div class="col-md-3 field-label-responsive">
                      <label for="fname">First Name</label>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                              <input type="text" name="fname" class="form-control" id="fname"
                                     placeholder="John" required autofocus>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-control-feedback">
                              <span class="text-danger align-middle">
                                  <!-- Put name validation error messages here -->
                              </span>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3 field-label-responsive">
                      <label for="lname">Last Name</label>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                              <input type="text" name="lname" class="form-control" id="lname"
                                     placeholder="Doe" required autofocus>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-control-feedback">
                              <span class="text-danger align-middle">
                                  <!-- Put name validation error messages here -->
                              </span>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3 field-label-responsive">
                      <label for="email">E-Mail Address</label>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                              <input type="text" name="email" class="form-control" id="email"
                                     placeholder="you@example.com" required autofocus>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-control-feedback">
                              <span class="text-danger align-middle">
                                  <!-- Put e-mail validation error messages here -->
                              </span>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3 field-label-responsive">
                      <label for="phone">Phone Number</label>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-phone"></i></div>
                              <input type="text" name="phone" class="form-control" id="phone"
                                     placeholder="9999900000" pattern="[0-9]{10}"required autofocus>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-control-feedback">
                              <span class="text-danger align-middle">
                                  <!-- Put e-mail validation error messages here -->
                              </span>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3 field-label-responsive">
                      <label for="password">Password</label>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group has-danger">
                          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                              <input type="password" name="password" class="form-control" id="password"
                                     placeholder="Password" required>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-control-feedback">
                              <span class="text-danger align-middle">
                                  <?php if($pwd_error!=''){ echo '<i class="fa fa-close">'; echo $pwd_error;} ?></i>
                              </span>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3 field-label-responsive">
                      <label for="password">Confirm Password</label>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                              <div class="input-group-addon" style="width: 2.6rem">
                                  <i class="fa fa-repeat"></i>
                              </div>
                              <input type="password" name="password-confirmation" class="form-control"
                                     id="password-confirm" placeholder="Password" required>
                          </div>
                      </div>
                  </div>
              </div>
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
                      <label for="pin">Pin Code</label>
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
                      <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
                  </div>
              </div>
          </form>

        </p>
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