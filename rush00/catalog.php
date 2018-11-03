<html>
<?php include('header.php'); ?>

<body>
<?php


echo "<div id = 'product-container'>";

if ($_GET['category']) {
	display_products($_GET['category']);
}
else {
	display_all_products();
}

echo "</div>";

?>

</body>

</html>