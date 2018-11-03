<html>

<?php 
require_once('header.php');

if ($_POST['remove']) {
	remove_from_basket($_POST['remove'], $_POST['quantity']);
} ?>

<?php

if (count($_SESSION['basket']) > 0) {

$total = 0;

echo "<div class = 'generic-container'>";
echo "<table style = 'width: 80%' id = 'basket-table'>";
	echo "<tr>";
	  echo "<td>";
	  echo "Имя"; 
	  echo "</td>";

	  echo "<td>";
	  echo "Количество";
	  echo "</td>";

	  echo "<td>";
	  echo "Цена";
	  echo "</td>";

	  echo "<td>";
	  echo "</td>";
  	echo "</tr>";

foreach ($_SESSION['basket'] as $product) {
	echo "<tr>";
	  echo "<td>";
	  echo $product['name']; 
	  echo "</td>";

	  echo "<td>";
	  echo $product['quantity'];
	  echo "</td>";

	  echo "<td>";
	  echo $product['price'];
	  echo "</td>";

	  echo "<td>";
	    echo "<form method = 'POST'>";
	    echo "<input type = 'hidden' name = 'quantity' value = '".$product['quantity']."'>";
	    echo "<button name = 'remove' value = '".$product['name']."'>Удалить из корзины</button>";
	    echo "</form>";
	  echo "</td>";

	  $total += (0 + $product['quantity']) * (0 + $product['price']);

  	echo "</tr>";
}
echo "</table>";
echo "</div>";

echo "<h2>Всего к оплате: $total</h2>";
}

else {
	echo "<h1>Ваша корзина пуста. Как насчёт купить выдру?</h1>";
}

if ($_SESSION['user'] && count($_SESSION['basket']) > 0) {
echo "<form action = 'buy.php'>";
echo "<button id = 'order-button'>Оформить заказ</button></form>";
}

?>

</html>