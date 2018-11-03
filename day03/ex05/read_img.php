<?php
header('Content-type: image/png');

$dir = '../img/';
readfile($dir . '42.png');
?>