<?php
	$connect = mysqli_connect("localhost", "root", "verybadpassword", "Animals");
	if (!$connect) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>
