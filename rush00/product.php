<html>
<?php
include('header.php');
?>

<body>

<div id = 'product-page-container'>

<h1 id = 'product-main-title'><?php
if (!$_GET['category'] || !$_GET['id'] || $_GET['category'] == '')
	echo "<h1>Error: invalid url</h1>";

$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
$query = "SELECT * FROM `".$_GET['category']."` WHERE id = ".$_GET['id'];
$results = mysqli_query($sql, $query);
$products = mysqli_fetch_all($results, MYSQLI_ASSOC);
$product = $products[0];


if ($_POST['submit'] === 'BUY') {
	buy_product($product);
}

echo $product['type'];

?></h1>

<img src = "<?php 
echo $product['img'];
?>">

<div id = 'product-description'>
	<div id = 'specs'>
		<h1>Технические характеристики</h1>
		<p><?php echo $product['description']; ?></p>
	</div>

	<div id = 'buy-button'>
		<p id = 'stock'>В наличии: <?php echo $product['numb']; ?></p>
		<form method = 'POST'>
			<button type="submit" name = 'submit' value='BUY'><h1>В корзину</h1></button>
		</form>
	</div>
</div>


</div>

</body>

</html>