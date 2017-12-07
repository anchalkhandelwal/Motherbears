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
      <div class="container checkout">
      	<h1 class="heading">My order</h1>
  		<div class="order_info">
  			<?php
				$user_email = $_SESSION["email"];
				$cart = array(3,10,30);  
				session_unset(); 
				$_SESSION['cart'] = $cart;
				$quantity_array = array();
				$size = array("Small","Large","Medium"); 
				$no_items = false;
  				if (isset($_SESSION['cart'])) {
  					$cart = $_SESSION['cart'];  
  					$size_of_cart = sizeof($cart);
					if($size_of_cart == 0) {
						$no_items = true;
  					}
  				}
  				if($no_items == true) {
  					echo '<p class="no_items">You have no items in the cart!</p>';
  				}
  			?>
      		<div class="row item_list">
      			<?php
      			if($no_items == false) {
	      			echo '<div class="col-sm-7 item_header center bold">
		      			<p class="item_name">Item</p>
		      		</div>
		      		<div class="col-sm-2 quantity_section center bold">
		      			<p class="center">Quantity</p>
		      		</div>
		      		<div class="col-sm-2 price_section center bold">
		      			<p class="amount_header">Price</p>
		      		</div>
					<div class="col-sm-1 right">
		      		</div>';
		      	}
		      	?>
	      		<?php 
	      		$cart = array(3,10,30);  
	      		if($no_items == false) {
					$query = 'SELECT * FROM "Menu" WHERE id IN ('.implode(",",$cart).')'; 
					$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");
					$i = 0;
					$total = 0;
					while ($row = pg_fetch_row($rs)) {
						$item_id = $row[0];
						$item_name = $row[2];
						$item_description = $row[3];
						$cost_small = $row[5];
						$cost_default = $row[4];
						$cost_large = $row[6];
						$item_photo = $row[7];
						$category_id = $row[1];
						$size_item = $size[$i];
						$cost = $cost_small;
						if($size_item == "Medium") {
							$cost = $cost_default;
						}
						array_push($quantity_array, 1);
						$divider = ' - ';
						if($category_id == 3) {
							$size_item = '';
							$divider = '';
						}
						if($size_item == "Large") {
							$cost = $cost_large;
						} 
						echo '<div class="col-sm-7 item">
		      					<p class="item_name">'.$item_name.$divider.$size_item.'</p>
		      					<p class="item_description">'.$item_description.'</p>
		      				</div>';
		      			$quantity_id = 'quantity'.$item_id;
		      			$cost_id = 'cost'.$item_id;
		      			echo '<div class="col-sm-2 quantity_section center bold">
		      					<input type="text" data-menu-id="'.$item_id.'" data-quantity="1" data-cost="'.$cost.'" class="quantity" id="'.$quantity_id.'" max-length=2 value="1"/>
		      				</div>
		      				<div class="col-sm-2 price_section center bold">
		      					<p id="'.$cost_id.'">$'.$cost.'</p>
		      				</div>
		      				<div class="col-sm-1">
		      					<button type="button" class="close btn_cross" aria-label="Close" data-menu-id="'.$item_id.'">
	  								<span aria-hidden="true">&times;</span>
								</button>
		      				</div>';
		      			$i = $i + 1;
		      			$total = $total + $cost;
					}
					pg_close($con); 
				$tax = 0.10 * $total;
				$new_total = $total + $tax;
				$_SESSION["subtotal_amount"]= $total;
				$_SESSION["tax"]= $tax;
				$_SESSION["new_total"]= $new_total;
				$_SESSION["quantity_array"]= $quantity_array;
		      	echo '</div>';
	      		echo '<div class="row">
		      		<div class="col-sm-6 ">
		      		</div>
		      		<div class="col-sm-6 total_section">
			      		<hr class="hrule" />
		      			<div class="row subtotal">
		      				<div class="col-sm-6 left">
		      					<p class="amount_label">Subtotal - </p>
		      				</div>
		      				<div class="col-sm-6 right">
		      					<p class="amount" id="subtotal_amount">$'.$total.'</p>
		      				</div>
		      			</div>
		      			<div class="row tax">
		      				<div class="col-sm-6 left">
		      					<p class="amount_label">Tax - </p>
		      				</div>
		      				<div class="col-sm-6 right">
		      					<p class="amount" id="tax_amount">$'.$tax.'</p>
		      				</div>
		      			</div>
		      			<div class="row tax">
		      				<div class="col-sm-4 left">
		      					<p class="amount_label">Coupons - </p>
		      				</div>
		      				<div class="col-sm-4 center">
		      					<div class="input-group">
	  								<input type="text" class="form-control small_text" placeholder="Coupon Code">
	  								<span class="input-group-btn">
	        							<button class="btn btn-secondary small_button" type="button">Apply</button>
	      							</span>
								</div>
		      				</div>
		      				<div class="col-sm-4 right">
		      					<p class="amount" id="coupon_amount">- $0.00</p>
		      				</div>
		      			</div>
		      			<div class="row total">
		      				<div class="col-sm-6 left">
		      					<p class="amount_label" >Total - </p>
		      				</div>
		      				<div class="col-sm-6 right">
		      					<p id="bill_amount" class="amount">$'.$new_total.'</p>
		      				</div>
		      			</div>
		      			<div class="row">
		      				<div class="col-sm-3 left">
		      					<p class="amount_label" >Instructions</p>
		      				</div>
		      				<div class="col-sm-9 center">
		      					<input type="text" class="form-control large_text" id="instructions"/>
		      				</div>
	      				</div>
		      			<div class="row">
		      				<div class="col-sm-12 place_order">
		      					<button id="place_order_btn" class="btn btn-secondary large_button" type="button">Place Order</button>
		      				</div>
	      				</div>';
	      		}
	      			?>
	      		</div>
	      	</div>
  		</div>
      </div>
      <?php include('footer.php') ?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
$('.quantity').on("change", function () {
	var cost = parseFloat(this.getAttribute("data-cost"));
	var prev_quantity = parseInt(this.getAttribute("data-quantity"));
  	var quantity = parseInt($(this).val());
  	$(this).attr('data-quantity',quantity);
  	var id = parseInt(this.getAttribute("data-menu-id"));
  	var new_price = cost *  quantity;
  	var price_id = "#cost"+id;
  	$(price_id).text("$" + new_price);
  	var subtotal_amount = $("#subtotal_amount").text();
  	while(subtotal_amount.charAt(0) === '$')
	{
 		subtotal_amount = subtotal_amount.substr(1);
	}
  	var subtract_amount = prev_quantity * cost;
  	subtotal_amount = (subtotal_amount - subtract_amount);
  	subtotal_amount = subtotal_amount + new_price;
  	subtotal_amount = subtotal_amount.toFixed(2);
  	$("#subtotal_amount").text("$" + subtotal_amount);
  	var new_tax = 0.1 * subtotal_amount;
  	new_tax = new_tax.toFixed(2);
  	var new_total = (subtotal_amount- (-new_tax));
  	$("#tax_amount").text("$"+new_tax);
  	$("#bill_amount").text("$"+new_total);
  	$.ajax({
  		 type: 'POST',
         url: 'checkout_session.php',
         data: { item_id: id, quantity: quantity, new_tax: new_tax, subtotal_amount: subtotal_amount, new_total: new_total },
         success: function(data){  
            alert("Quantity changed successfully!");  
          },
          error: function(jqXHR, textStatus, errorThrown) {
          	alert("error: " + textStatus);
          	alert("error thrown: " + errorThrown);
          	alert("error jqXHR: " + jqXHR.status);
          }
    });
});
$("#place_order_btn").on("click", function() {
	var ins = $("#instructions").val();
	$.ajax({
  		 type: 'POST',
         url: 'place_order.php',
         data: { instructions:  ins},
         success: function(data){  
            alert("Order placed successfully!");  
          },
          error: function(jqXHR, textStatus, errorThrown) {
          	alert("error: " + textStatus);
          	alert("error thrown: " + errorThrown);
          	alert("error jqXHR: " + jqXHR.status);
          }
    });
});
</script>
</html>