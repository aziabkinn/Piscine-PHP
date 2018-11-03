<?php
	require_once("connection.php");
?>

<html>
<?php include('header.php'); ?>

 <div id = 'login-form-container'>
   <form method = 'POST' action = 'check_autho.php'>
     &nbsp;&nbsp;Логин: <input required type="text" name="login" placeholder="введите логин" pattern="[A-Za-zА-Яа-яЁё0-9 ]+">
     <br>
     Пароль: <input type="password" pattern="[A-Za-zА-Яа-яЁё0-9 ]+" name="pass" required placeholder="введите пароль">
     <br>
     <input type = 'submit' name = 'submit2' value = 'Вход' class = 'submit'>
     <br>
    <a href="registration.php">Регистрация</a>
   </form>
 </div>

</html>