<?php 
include 'connection.php';

$query = 'SELECT * FROM "Menu" WHERE category_id = '.$category_id ; 

$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");
	echo "<div class='menu_all'>";
while ($row = pg_fetch_row($rs)) {
	unset($item_id, $item_name, $item_description, $cost_small, $cost_medium, $cost_large, $item_photo);
	$item_id = $row[0];
	$item_name = $row[2];
	$item_description = $row[3];
	$cost_small = $row[5];
	$cost_medium = $row[4];
	$cost_large = $row[6];
	$item_photo = $row[7];
	echo "<div class='item_section $item_id'>";
	echo "<span class='item_name'>$item_name"."</span>";
	echo "<span class='item_description'>$item_description"."</span>";
	echo "<img class='itemicons img-fluid' src='static/images/item/$item_photo' alt='$item_name'>";
	echo "<div class='item_size'>";
		echo "<select name='item_size' class='item_size_selection'>";
			echo "<option value='$cost_small'>Small</option>";
			echo "<option value='$cost_medium' selected='selected'>Medium</option>";
			echo "<option value='$cost_large'>Large</option>";
		echo "</select>";
		echo "<div class='item_cost'>";
			echo "$";
			echo "<span>$cost_medium</span>";
		echo "</div>";
	echo "</div>";
	if (isset($_SESSION['user_id'])) {
		echo "<div class='item_image'><a href='?cart=$item_id&size=Medium' class='btn btn-primary'>Order Now</a></div>";
	} else {
		echo "<div class='item_image sign_in_to_order'>Sign In To Order</div>";
	}
	echo "</div>";
}
echo "</div>";
pg_close($con); 
?>