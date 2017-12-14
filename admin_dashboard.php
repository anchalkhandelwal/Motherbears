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
      <link rel="stylesheet" type="text/css" href="static/css/admin_dashboard.css">
</head>
<body class="dom-body">
      <?php include('header.php'); ?>
      <?php
       if(isset($_SESSION['first_name'])){
        echo '<div class="alert alert-primary" role="alert">Welcome back, '.$_SESSION["first_name"].'!<a class="btn btn-danger btn-sm float-right" href="signout.php" style="position:relative;top:-3px;">Logout</a></div>';
       }
    ?>
      <?php 
  		  session_start();
		    include 'connection.php';
	     ?>

      <?php
        echo '<div class="container">';
        if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
          echo '<h1 class="allorders heading">Admin - All Orders</h1>
                <div class="table">
                <table>
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>User ID</th>
                      <th>Bill Amount</th>
                      <th>Order Type</th>
                      <th>Order Time</th>
                      <th>Instructions</th>
                      <th>Payment Method</th>
                      <th>Store</th>
                      <th>Delivery Address</th>
                      <th>Order Status</th>
                      <th>Change Order Status</th>
                      <th>View Order Details</th>
                    </tr>
                  </thead>
                  <tbody>
                ';
          $query = 'SELECT * FROM "Orders" ORDER BY order_time DESC'; 
          $rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");
          while ($row = pg_fetch_row($rs)) {
            $order_id = $row[0];
            $user_id = $row[1];
            $bill_amount = $row[2];
            $order_status = $row[3];
             if($order_status == 1) {
              $order_status_string = "PLACED";
            } else if ($order_status == 2) {
              $order_status_string = "BEING PREPARED";
            } else if ($order_status == 3) {
              $order_status_string = "OUT FOR DELIVERY";
            } else if ($order_status == 4) {
              $order_status_string = "DELIVERED";
            } else if ($order_status == 5) {
              $order_status_string = "READY";
            }
            $order_type = $row[4];
            if($order_type == 1) {
              $order_type_string = "DELIVERY";
            } else {
              $order_type_string = "CARRYOUT";
            }
            $order_time = $row[5];
            $instructions = $row[6];
            $payment = $row[7];
            if($payment == 1) {
              $payment_string = "CASH ON DELIVERY";
            } else {
              $payment_string = "ONLINE PAYMENT";
            }
            $store_id = $row[8];
            if($store_id == 1) {
              $store_string = "Mother Bear’s Pizza Campus. 1428 E 3rd St, Bloomington, IN 47401";
            } else {
              $store_string = "Mother Bear’s Pizza West. 2980 W Whitehall Crossing Blvd, Bloomington, IN 47404";
            }
            $address = $row[9];
            echo  '<tr>
              <td>'.$order_id.'</td>
              <td>'.$user_id.'</td>
              <td>'.$bill_amount.'</td>
              <td>'.$order_type_string.'</td>
              <td>'.$order_time.'</td>
              <td>'.$instructions.'</td>
              <td>'.$payment_string.'</td>
              <td>'.$store_string.'</td>
              <td>'.$address.'</td>
              <td id="order_status_change'.$order_id.'">'.$order_status_string.'</td>
              <td><select class="order_status_select" data-order-id='.$order_id.'>
                    <option value="0">-SELECT-</option>
                    <option data-order-id='.$order_id.' value="1">PLACED</option>
                    <option data-order-id='.$order_id.' value="2">BEING PREPARED</option>
                    <option data-order-id='.$order_id.' value="3">OUT FOR DELIVERY</option>
                    <option data-order-id='.$order_id.' value="4">DELIVERED</option>
                    <option data-order-id='.$order_id.' value="5">READY</option>
                  </select></td>
              <td><button class="view_btn btn btn-primary" data-order-id='.$order_id.' type="button">View</button></td>
            </tr>';
          }
          echo '</div>';
        } else {
          echo "You don't have permission to access this page.";
        }
        echo '</div>';
      ?>
      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <span class="close close_btn">&times;</span>
          <div class="orderdetails">
            <div class="row">
              <div class="col-sm-10">
                <p class="item_name">Item</p>
              </div>
              <div class="col-sm-2">
                <p class="quantity">Quantity</p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-10">
                <p class="item_name">Veggie Delight</p>
                <p class="item_desc">Has all the veggies - Medium</p>
              </div>
              <div class="col-sm-2">
                <p class="quantity">1 Pizza</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      </body>
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">

$('.order_status_select').on("change", function () {
  var order_status = $(this).val();
  if(order_status !=0) {
  var order_id = parseInt(this.getAttribute("data-order-id"));
  var order_text = "#order_status_change" + order_id;
  var order_status_string = "";
  if(order_status == 1) {
              order_status_string = "PLACED";
            } else if (order_status == 2) {
              order_status_string = "BEING PREPARED";
            } else if (order_status == 3) {
              order_status_string = "OUT FOR DELIVERY";
            } else if (order_status == 4) {
              order_status_string = "DELIVERED";
            } else if (order_status == 5) {
              order_status_string = "READY";
            }
  $(order_text).text(order_status_string);
  $.ajax({
       type: 'POST',
         url: 'change_order_status.php',
         data: { order_id: order_id, order_status: order_status},
         success: function(data){  
            alert("Status Updated!");  
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert("error: " + textStatus);
            alert("error thrown: " + errorThrown);
            alert("error jqXHR: " + jqXHR.status);
          }
    });
  }
});
$('.view_btn').on("click", function () {
  var modal = document.getElementById('myModal');
  var order_id = parseInt(this.getAttribute("data-order-id"));
  $.ajax({
       type: 'POST',
         url: 'show_order_details.php',
         data: { order_id: order_id},
         success: function(data){  
            alert(data);  
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert("error: " + textStatus);
            alert("error thrown: " + errorThrown);
            alert("error jqXHR: " + jqXHR.status);
          }
    });
  modal.style.display = "block";
});
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  var modal = document.getElementById('myModal');
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    var modal = document.getElementById('myModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</html>