<?php 
include 'connection.php';

$query = 'SELECT * FROM "Menu" WHERE category_id = '.$category_id ; 

$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");
	echo "<div class='menu_all'>";
while ($row = pg_fetch_row($rs)) {
	unset($item_name, $item_description, $cost_small, $cost_medium, $cost_large, $item_photo);
	$item_name = $row[2];
	$item_description = $row[3];
	$cost_small = $row[5];
	$cost_medium = $row[4];
	$cost_large = $row[6];
	$item_photo = $row[7];
	echo "<div class='category_section'>";
	echo "<img class='categoryicons img-fluid' src='static/images/item/$item_photo' alt='pizza'>";
	
	echo "<span class='category_name'>$item_name"."</span>";
	echo "</div>";
}
echo "</div>";
pg_close($con); 
?>
