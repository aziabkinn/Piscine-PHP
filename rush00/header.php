<head>
  <title>42 Лапки</title>
  <link rel = 'stylesheet' href = 'style.css'>
  <link rel = 'shortcut icon' href = 'logo.png'>
  <?php 
    session_start();
    if (!$_SESSION['basket']) {
      $_SESSION['basket'] = array();
    }
    require_once('functions.php');
  ?>
</head>


<div id = 'menu-container'>
  <div id = 'menu'>
  	<a id = 'logo-button' href = 'index.php'>
      <img src = '42.png'>
  	</a>

    
  	<ul class = 'menu-button menu-1 link'>
     <a href = 'catalog.php' class = 'menu-link'>
  	 <p>Каталог</p>
     </a>

<?php
  $sql = mysqli_connect('localhost', 'root', 'verybadpassword', 'Animals');
  $query = "SELECT * FROM categories";
  $results = mysqli_query($sql, $query);
  $categories = mysqli_fetch_all($results, MYSQLI_ASSOC);
  foreach($categories as $category) { 
    echo "<li class = 'menu-dropdown'>";
  	echo "<a href = 'catalog.php?category=".$category['name']."' class = 'menu-link'>";
    echo "<p>".$category['name']."</p>";
    echo "</a>";
  	echo "</li>";
  }
?>

  	</ul>
    

    <a class = 'menu-button menu-2' href = 'basket.php'>
      <p>Корзина</p>
    </a>

    <a class = 'menu-button menu-2' href = 'https://ru.wikipedia.org/wiki/%D0%92%D1%8B%D0%B4%D1%80%D0%B0'>
      <p>О выдрах</p>
    </a>

    <a class = 'menu-button menu-3' href = 'http://www.paletton.com/'>
      <p>Бесполезная кнопка</p>
    </a>

    <a class = 'menu-button menu-2' href = 'https://www.icrc.org/ru'>
      <p>Помощь</p>
    </a>

    <a class = 'menu-button menu-final' href = 'https://www.youtube.com/watch?v=GxW5AveaIGY'>
      <p>Спасите</p>
    </a>
  </div>

  <div id = 'top-block'>
 	  <div id = 'sidebar'>

<?php

  if ($_SESSION['user'] && $_SESSION['ad'] === 'true')
  {
      echo "<a id = 'manage-button' href = 'manage.php'>";
        echo "<p>Управление</p>";
      echo "</a>";
  }
  if ($_SESSION['user']) {
    echo "<a id = 'authorize-button' href = 'logout.php'>";
      echo "<p>Выйти</p>";
    echo "</a>";
  }
  else {
      $_SESSION['ad'] === 'false';
      echo "<a id = 'authorize-button' href = 'login.php'>";
        echo "<p>Авторизация</p>";
      echo "</a>";
  }
?>

  	</div>
  </div>

</div>