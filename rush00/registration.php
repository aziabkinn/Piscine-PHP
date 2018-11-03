<?php
	require_once("connection.php");
?>

<html>
<?php include('header.php'); ?>

 <div id = 'login-form-container'>
   <form method = 'POST' action = 'check_autho.php'>
     &nbsp;&nbsp;
     Логин: <input required type=”text” name="login" placeholder="введите логин" pattern="[A-Za-zА-Яа-яЁё0-9 ]+">
     <br>
     Пароль: <input type="password" pattern="[A-Za-zА-Яа-яЁё0-9 ]+" name="pass" required placeholder="введите пароль">
 	<br>
 	<label><font size="1" color="red" face="Arial">Пароль должен cодержать цифры и буквы</font></label>
     <input type = 'submit' name = 'submit1' value = 'Готово' class = 'submit'>
   </form>
 </div>
</html>
