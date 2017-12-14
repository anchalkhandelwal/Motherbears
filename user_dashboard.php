<?php
session_start();
if(!isset($_SESSION["email"])) {
    header("Location: index.php");
}
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
	<div class="content-container user_dashboard">
	<?php 
include 'connection.php';
?>

	<div id="tabs">
		<ul class="user_profile_tabs">
			<li><a href="#tabs-1">Profile</a></li>
			<li><a href="#tabs-2">Check Status</a></li>
			<li><a href="#tabs-3">Past Orders</a></li>
		</ul>
		<div id="tabs-1">
			<?php
				$user_email = $_SESSION["email"];
				$user_id = $_SESSION["user_id"];
				$query = "SELECT * FROM \"Users\" WHERE email='{$user_email}'";

				$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");
				echo "<div class='edit_user_details'><a href='edit_profile.php'>EDIT</a></div>";
				echo "<div class='user_details'>";
				while ($row = pg_fetch_row($rs)) {
					unset($user_name);
					$first_name = $row[1];
					$last_name = $row[2];
					$email = $row[3];
					$address = $row[6];
					$phone = $row[4];
					echo "<div class='user_info'><span>Name: </span>".$first_name ." ". $last_name."</br>";
					echo "<span>Email: </span>".$email."</br>";
					echo "<span>Address: </span>".$address."</br>";
					echo "<span>Phone: </span>".$phone ."</br></div>";
				}
				echo "</div>";
				echo "<br>";
			?>
		</div>
		<div id="tabs-2">
			<?php
				$order_detail_query = "SELECT * FROM \"Orders\" O WHERE user_id='{$user_id}' AND o.order_status != 4";
				$result = pg_query($conn, $order_detail_query) or die("Cannot execute query: $order_detail_query \n");

				echo "<div class='order_details'><h2>Status Update</h2><table>";
				echo "<tr><th>Order ID</th><th>Item Name</th><th>Quantity</th><th>Amount</th><th>Size</th><th>Status</th></tr>";

				while ($row = pg_fetch_row($result)) {
					unset($order_id);
					$order_id = $row[0];
					$order_status = $row[3];
					
					$order_detail_query1 = "SELECT * FROM \"Menu\" M, \"OrderDetails\" OD, \"OrderStatus\" OS WHERE OD.order_id='{$order_id}' AND M.id = OD.menu_id AND OS.id ='{$order_status}'";
					$result1 = pg_query($conn, $order_detail_query1) or die("Cannot execute query: $order_detail_query1 \n");
					while ($row1 = pg_fetch_row($result1)) {
						unset($itemName,$price,$quantity,$size,$status);
						$itemName = $row1[2];
						$quantity = $row1[12];
						$price = $row1[13];
						$size = $row1[14];
						$status = $row1[16];
						echo "<tr>";
							echo "<td>".$order_id."</td>";
							echo "<td>".$itemName."</td>";
							echo "<td>".$quantity."</td>";
							echo "<td>".$price."</td>";
							echo "<td>".$size."</td>";
							echo "<td>".$status."</td>";
						echo "</tr>";
					}	
				}
				echo "</table></div>";
			?>
		</div>
		<div id="tabs-3">
			<?php 
				$order_detail_q = "SELECT * FROM \"Orders\" O WHERE user_id='{$user_id}' AND o.order_status = 4";
				$resultQ = pg_query($conn, $order_detail_q) or die("Cannot execute query: $order_detail_q \n");

				echo "<div class='order_details'><h2>Past Orders</h2><table>";
				echo "<tr><th>Order ID</th><th>Item Name</th><th>Quantity</th><th>Amount</th><th>Size</th><th>Status</th></tr>";

				while ($row = pg_fetch_row($resultQ)) {
					unset($order_id);
					$order_id = $row[0];
					$order_status = $row[3];
					
					$order_detail_query1 = "SELECT * FROM \"Menu\" M, \"OrderDetails\" OD, \"OrderStatus\" OS WHERE OD.order_id='{$order_id}' AND M.id = OD.menu_id AND OS.id ='{$order_status}'";
					$result1 = pg_query($conn, $order_detail_query1) or die("Cannot execute query: $order_detail_query1 \n");
					while ($row1 = pg_fetch_row($result1)) {
						unset($itemName,$price,$quantity,$size,$status);
						$itemName = $row1[2];
						$quantity = $row1[12];
						$price = $row1[13];
						$size = $row1[14];
						$status = $row1[16];
						echo "<tr>";
							echo "<td>".$order_id."</td>";
							echo "<td>".$itemName."</td>";
							echo "<td>".$quantity."</td>";
							echo "<td>".$price."</td>";
							echo "<td>".$size."</td>";
							echo "<td>".$status."</td>";
						echo "</tr>";
					}
				}
				echo "</table></div>";
			?>
		</div>
	</div>		


	<?php pg_close($con); ?>
	</div>
		<?php include('footer.php'); ?>
		
	
<?php
print_r($_SESSION);

?>
		
	
</body>
</html>