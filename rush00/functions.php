<?php

function is_displayed($displayed, $product) {
	foreach ($displayed as $name) {
		if ($name === $product['type']) {
			return TRUE;
		}
	}
	return FALSE;
}

function display_products($category) {
	$displayed = array();
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$query = "SELECT * FROM ".$category;
	$results = mysqli_query($sql, $query);
	$products = mysqli_fetch_all($results, MYSQLI_ASSOC);
	foreach($products as $product) {
		echo "<a class = 'product' href = 'product.php?category=".$category."&id=".$product['id']."'>";
		  echo "<p class = 'product-name'>";
		    echo $product['type'];
		  echo "</p>";
	
		  echo "<img src = '".$product['img']."' class = 'product-img'>";
	
		  echo "<p class = 'product-price'>";
		    echo $product['price'];
		  echo "</p>";
		echo "</a>";
		array_push($displayed, $product['type']);
	}
}

function display_and_filter($category, $displayed) {
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$query = "SELECT * FROM ".$category;
	$results = mysqli_query($sql, $query);
	$products = mysqli_fetch_all($results, MYSQLI_ASSOC);
	foreach($products as $product) {
		if (!is_displayed($displayed, $product)) {
		echo "<a class = 'product' href = 'product.php?category=".$category."&id=".$product['id']."'>";
		  echo "<p class = 'product-name'>";
		    echo $product['type'];
		  echo "</p>";
	
		  echo "<img src = '".$product['img']."' class = 'product-img'>";
	
		  echo "<p class = 'product-price'>";
		    echo $product['price'];
		  echo "</p>";
		echo "</a>";
		array_push($displayed, $product['type']);
		}
	}
	return ($displayed);
}

function display_all_products() {
	$displayed = array();
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$query = "SELECT * FROM categories";
	$results = mysqli_query($sql, $query);
	$categories = mysqli_fetch_all($results, MYSQLI_ASSOC);
	foreach($categories as $category) { 
		$displayed = display_and_filter($category['name'], $displayed);
	}
}

function display_n($category, $displayed, $n) {
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$query = "SELECT * FROM ".$category;
	$results = mysqli_query($sql, $query);
	$products = mysqli_fetch_all($results, MYSQLI_ASSOC);
	foreach($products as $product) {
		if (!is_displayed($displayed, $product) && $n > 0) {
		echo "<a class = 'product' href = 'product.php?category=".$category."&id=".$product['id']."'>";
		  echo "<p class = 'product-name'>";
		    echo $product['type'];
		  echo "</p>";
	
		  echo "<img src = '".$product['img']."' class = 'product-img'>";
	
		  echo "<p class = 'product-price'>";
		    echo $product['price'];
		  echo "</p>";
		echo "</a>";
		array_push($displayed, $product['type']);
		$n--;
		}
	}
	return ($displayed);
}

function display_n_products($n) {
	$displayed = array();
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$query = "SELECT * FROM categories";
	$results = mysqli_query($sql, $query);
	$categories = mysqli_fetch_all($results, MYSQLI_ASSOC);
	foreach($categories as $category) { 
		$displayed = display_n($category['name'], $displayed, $n);
		$n -= count($displayed);
	}
}

function create_category($name, $connect) {
	$result_sql = "CREATE TABLE IF NOT EXISTS ".$name." (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	numb INT(6) NOT NULL,  
	type VARCHAR(30) NOT NULL,
	price INT(10) NOT NULL,
	img TEXT NOT NULL,
	description TEXT)";

	if (mysqli_query($connect, $result_sql)) {
	    echo "Table ".$name." created successfully\n";
	} else {
	    echo "Error creating table: " . mysqli_error($connect);
	}

	$result_sql = "INSERT INTO categories (name) VALUES ('".$name."')";
	if (mysqli_query($connect, $result_sql)) {
	    echo "Table ".$name." created successfully\n";
	} else {
	    echo "Error creating table: " . mysqli_error($connect);
	}
}

function in_basket($name) {
	session_start();
	foreach ($_SESSION['basket'] as $product) {
		if ($product['name'] === $name) {
			return TRUE;
		}
	}
	return FALSE;
}

function increment_product($name, $quantity) {
	session_start();
	$id = 0;
	foreach ($_SESSION['basket'] as $product) {
		if ($product['name'] === $name && $_SESSION['basket'][$id]['quantity'] < $quantity) {
			$_SESSION['basket'][$id]['quantity']++;
		}
		$id++;
	}
}

function remove_from_basket($name, $quantity) {
	session_start();

	$id = 0;
	foreach ($_SESSION['basket'] as $product) {
		if ($product['name'] === $name) {
			unset($_SESSION['basket'][$id]);
		}
		$id++;
	}
	$_SESSION['basket'] = array_values($_SESSION['basket']);
}

function buy_product($product) {
	session_start();
	if ($product['numb'] > 0) {
		if (!in_basket($product['type'])) {
			array_push($_SESSION['basket'], array('name' => $product['type'], 'quantity' => 1, 'price' => $product['price']));
		}
		else {
			increment_product($product['type'], $product['numb']);
		}
	}
}

?>