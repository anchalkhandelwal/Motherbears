<?php 
include 'connection.php';

$query = 'SELECT * FROM "ItemCategory"'; 

$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");
	echo "<div class='menu_all'>";
while ($row = pg_fetch_row($rs)) {
	unset($category_name);
	$category_name = $row[1];
	echo "<div class='category_section'>";
	if($category_name == "Pizza"){
		echo "<img class='categoryicons img-fluid' src='static/images/category/sandwich.jpg' alt='pizza'>";
	}
	else if($category_name == "Pasta"){
		echo "<img class='categoryicons img-fluid' src='static/images/category/sandwich.jpg' alt='pasta'>";
	}
	else{
		echo "<img class='categoryicons img-fluid' src='static/images/category/sandwich.jpg' alt='sandwich'>";
	}
	echo "<span class='category_name'>$category_name"."</span>";
	echo "</div>";
}
echo "</div>";
pg_close($con); 
?>
