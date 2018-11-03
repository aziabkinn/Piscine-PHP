<?php
$log = "zaz";
$pass = "jaimelespetitsponeys";
if ($_SERVER['PHP_AUTH_USER'] != $log || $_SERVER['PHP_AUTH_PW'] != $pass)
{
	header('WWW-Authenticate: Basic realm="Member area"');
    header('HTTP/1.0 401 Unauthorized');
    echo "<html><body>That area is accessible for members only</body></html>";
}
else
{
    echo "<html><body>Hello Zaz <img src='data:image/png;base64, ";
	echo base64_encode(file_get_contents('../img/42.png')) . "'>";
}
?>
</body></html>