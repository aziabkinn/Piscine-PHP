<?php
session_start();
    require_once("connection.php"); 
    if(isset($_POST['submit1']))
    {
        $pass = hash('whirlpool', $_POST['pass']);
        $sql = "INSERT INTO `user_info`(`username`, `password`, `admin`) VALUES (\"".$_POST['login']."\",'$pass', false)";
        mysqli_query($connect, $sql);
        header('Location: index.php');
    }
    if(isset($_POST['submit2']))
    {
        $pass = hash('whirlpool', $_POST['pass']);
        $sql_req = "SELECT * FROM `user_info` WHERE `username` = \"".$_POST['login']."\" && `password` = '$pass' ";
        $sql = mysqli_query($connect, $sql_req);
        if (mysqli_num_rows($sql) > 0) 
        {
            $_SESSION['user'] = $_POST['login'];
            $sql_req1 = "SELECT * FROM `user_info` WHERE `username` = \"".$_POST['login']."\" && `admin`=1";
            $sql1 = mysqli_query($connect, $sql_req1);
            if (mysqli_num_rows($sql1) > 0) 
            {
                $_SESSION['ad'] = 'true';
            }
            else
                $_SESSION['ad'] = 'false';
            header('Location: index.php');
        }
        else
        {
            echo "<script>alert(\"Неверно!\");</script>";
        ?>
             <html><body><ul><li><a href="login.php">Попробовать снова</a></li></ul></body></html>
        <?php
        }
    }
?> 