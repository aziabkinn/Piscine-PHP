<?php
require_once('header.php');
session_start();

if ($_POST['submit'] === 'add-product') {
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');

	$categories = explode('/', $_POST['category']);
	foreach ($categories as $category) {
		$result_sql = "INSERT INTO ".$category." (numb, type, price, img, description) VALUES ('".$_POST['quantity']."', '".$_POST['name']."', '".$_POST['price']."', '".$_POST['image']."', '".$_POST['description']."')";
		mysqli_query($sql, $result_sql);
	}
}
	

else if ($_POST['submit'] === 'delete-product') {
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$categories = mysqli_query($sql, "SELECT * FROM categories");
	$categories = mysqli_fetch_all($categories, MYSQLI_ASSOC);
	foreach ($categories as $category) {
		$request = "DELETE FROM ".$category['name']." WHERE type = '".$_POST['name']."'";
		mysqli_query($sql, $request);
	}
}


else if ($_POST['submit'] === 'add-user') {
	$login = $_POST['login'];
	$pass = hash('whirlpool', $_POST['pass']);
	if ($_POST['admin'] === 'yes') {
		$admin = 'true';
	}
	else {
		$admin = 'false';
	}
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$result_sql = "INSERT INTO User_info (username, password, admin) VALUES ('$login', '$pass', $admin)";
	mysqli_query($sql, $result_sql);
}
	

else if ($_POST['submit'] === 'delete-user') {
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$request = "DELETE FROM user_info WHERE username = '".$_POST['login']."'";
	mysqli_query($sql, $request);
}

else if ($_POST['submit'] === 'add-user') {
	$login = $_POST['login'];
	$pass = hash('whirlpool', $_POST['pass']);
	if ($_POST['admin'] === 'yes') {
		$admin = 'true';
	}
	else {
		$admin = 'false';
	}
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$result_sql = "INSERT INTO User_info (username, password, admin) VALUES ('$login', '$pass', $admin)";
	mysqli_query($sql, $result_sql);
}
	

else if ($_POST['submit'] === 'delete-user') {
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$request = "DELETE FROM user_info WHERE username = '".$_POST['login']."'";
	mysqli_query($sql, $request);
}

else if ($_POST['submit'] === 'add-category') {
	$name = $_POST['name'];
	$connect = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
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
	

else if ($_POST['submit'] === 'delete-category') {
	$sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
	$request = "DELETE FROM categories WHERE name = '".$_POST['name']."'";
	mysqli_query($sql, $request);
	$request = "DROP TABLE ".$_POST['name'];
	mysqli_query($sql, $request);
}

?>

<pre class = 'manage'>
<form method = 'POST'>
	<p>Добавить товар</p>
	Категория:&#9;&#9;<input required type = 'text' name = 'category' pattern = '[A-Za-zА-Яа-яЁё /]+'><span class = 'form-guide'> (буквы кириллицей и латиницей, и пробелы)</span>
	<br>
	Название:&#9;&#9;<input required type = 'text' name = 'name' pattern = '[A-Za-zА-Яа-яЁё ]+'><span class = 'form-guide'> (буквы кириллицей и латиницей, и пробелы)</span>
	<br>
	Изображение:&#9;<input required type = 'text' name = 'image' pattern = '[A-Za-zА-Яа-яЁё -_%/:]+'><span class = 'form-guide'>(буквы кириллицей и латиницей, -, _, %, /, :, .)</span>
	<br>
	Количество:&#9;&#9;<input required type = 'text' name = 'quantity' pattern = '[0-9]+'><span class = 'form-guide'> (цифры)</span>
	<br>
	Цена:&#9;&#9;&#9;<input required type = 'text' name = 'price' pattern = '[0-9]+'><span class = 'form-guide'> (цифры)</span>
	<br>
	Описание:&#9;&#9;<textarea type = 'text' name = 'description' pattern = '[A-Za-zА-Яа-яЁё ]+'></textarea><br>
	<span class = 'form-guide'> (буквы кириллицей и латиницей, и пробелы)</span>
	<br>
	<button type = 'submit' name = 'submit' value = 'add-product'>Добавить</button>
</form>

<hr>

<form method = 'POST'>
	<p>Удалить товар</p>
	Название:&#9;<input required type = 'text' name = 'name' pattern = '[A-Za-zА-Яа-яЁё ]+'><span class = 'form-guide'> (буквы кириллицей и латиницей, и пробелы)</span>
	<br>
	<button type = 'submit' name = 'submit' value = 'delete-product'>Удалить</button>
</form>

<hr>

<form method = 'POST'>
	<p>Добавить пользователя</p>
	Логин:&#9;<input required type = 'text' name = 'login' pattern = '[A-Za-zА-Яа-яЁё0-9 ]+'><span class = 'form-guide'> (буквы кириллицей и латиницей, цифры и пробелы)</span>
	<br>
	Пароль:&#9;<input required type = 'text' name = 'pass' pattern = '[A-Za-zА-Яа-яЁё0-9 ]+'><span class = 'form-guide'> (буквы кириллицей и латиницей, цифры и пробелы)</span>
	<br>
	Права администратора:
	Да <input type="radio" name="admin" value="yes">
 	Нет <input type="radio" name="admin" value="no">
	<br>
	<button type = 'submit' name = 'submit' value = 'add-user'>Добавить</button>
</form>

<hr>

<form method = 'POST'>
	<p>Удалить пользователя</p>
	Логин:&#9;<input required type = 'text' name = 'login' pattern = '[A-Za-zА-Яа-яЁё0-9 ]+'><span class = 'form-guide'> (буквы кириллицей и латиницей, цифры и пробелы)</span>
	<br>
	<button type = 'submit' name = 'submit' value = 'delete-user'>Удалить</button>
</form>

<form method = 'POST'>
	<p>Добавить категорию</p>
	Название:&#9;<input required type = 'text' name = 'name' pattern = '[A-Za-zА-Яа-яЁё ]+'><span class = 'form-guide'> (буквы кириллицей и латиницей, и пробелы)</span>
	<br>
	<button type = 'submit' name = 'submit' value = 'add-category'>Добавить</button>
</form>

<hr>

<form method = 'POST'>
	<p>Удалить категорию</p>
	Название:&#9;<input required type = 'text' name = 'name' pattern = '[A-Za-zА-Яа-яЁё ]+'><span class = 'form-guide'> (буквы кириллицей и латиницей, и пробелы)</span>
	<br>
	<button type = 'submit' name = 'submit' value = 'delete-category'>Удалить</button>
</form>

</pre>