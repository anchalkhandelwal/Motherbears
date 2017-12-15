<?php 
include 'connection.php';

$query = 'SELECT * FROM "ItemCategory"'; 

$rs = pg_query($conn, $query) or die("Cannot execute query: $query\n");
	echo "<div class='menu_all'>";
	$count = 1;
while ($row = pg_fetch_row($rs)) {
	unset($category_name);
	$category_name = $row[1];
	$count++;
	echo "<div class='category_section'>";
	echo "<a class='menu_cate' href ='#tabs-".$count."'>";
	if($category_name == "Pizza"){
		echo "<img class='categoryicons img-fluid' src='static/images/category/pizza.jpg' alt='pizza'>";
	}
	else if($category_name == "Pasta"){
		echo "<img class='categoryicons img-fluid' src='static/images/category/pasta.jpg' alt='pasta'>";
	}
	else if($category_name == "Drinks"){
		echo "<img class='categoryicons img-fluid' src='static/images/category/drinks.jpg' alt='pasta'>";
	}
	else if($category_name == "Wings"){
		echo "<img class='categoryicons img-fluid' src='static/images/category/wings.jpg' alt='pasta'>";
	}
	else if($category_name == "Hot Subs"){
		echo "<img class='categoryicons img-fluid' src='static/images/category/subs.jpg' alt='Hot sub'>";
	}
	else if($category_name == "Munchies"){
		echo "<img class='categoryicons img-fluid' src='static/images/category/munchies.jpg' alt='munchies'>";
	}
	else if($category_name == "Build your own pizza"){
		echo "</a><a href='buildyourown_step1.php'><img class='categoryicons img-fluid' src='static/images/category/buildyourown.png' alt='munchies'>";
	}
	else if($category_name == "Salads"){
		echo "<img class='categoryicons img-fluid' src='static/images/category/salad.jpg' alt='salad'>";
	}
	else{
		echo "<img class='categoryicons img-fluid' src='static/images/category/sandwich.jpg' alt='sandwich'>";
	}
	echo "<span class='category_name'>$category_name"."</span>";
	echo "</a>";
	echo "</div>";
}
echo "</div>";
pg_close($con); 
?>
