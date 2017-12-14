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
	  
   </head>
	
<body class="dom-body">
		<?php include('header.php'); ?>

		<?php
			 if(isset($_SESSION['first_name'])){
				echo '<div class="alert alert-primary" role="alert">Welcome back, '.$_SESSION["first_name"].'!<a class="btn btn-danger btn-sm float-right" href="signout.php" style="position:relative;top:-3px;">Logout</a></div>';
			 }
		?>
	<div class="content-container">
	<?php 
include 'connection.php';


//$query = "INSERT INTO \"Orders\"(user_id,bill_amount,order_status,order_type,
//order_time,instructions,payment,store_id,address) 
//VALUES('{$user_id}', '{$new_final_total}',1, 
//1, '{$timestamp}', '{$instructions}', 1, 1, '3230 E John Hinkle Pl') RETURNING id";

$user_email = $_SESSION["email"];
$query = "SELECT * FROM \"Users\" WHERE email='{$user_email}'";

$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");
	echo "<div class='user_details'><form class='form-horizontal' role='form' action='user-update-process.php' method='GET'>";
while ($row = pg_fetch_row($rs)) {
	//unset($user_name);
	$user_id = $row[0];
	$first_name = $row[1];
	$last_name = $row[2];
	$email = $row[3];
	$address = $row[6];
	$phone = $row[4];
	echo "<input type='hidden' value='".$user_id."' name='user_id'/>";
	echo "First Name:<input type='text' value='".$first_name."' name='first_name'/>";
	echo "Last Name:<input type='text' value='".$last_name."' name='last_name'/>";
	echo "Address:<input type='text' value='".$address."' name='address'/>";
	echo "Phone:<input type='text' value='".$phone."' name='phone'/>";
	echo "<input type='submit' value='Save' />";
}
echo "</form></div>";
?>

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
                              <input type="email" name="email" class="form-control" id="email"
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

<?php
pg_close($con); 
?>
	</div>
		<?php include('footer.php'); ?>
		
	
<?php
print_r($_SESSION);

?>
		
	
</body>
</html>