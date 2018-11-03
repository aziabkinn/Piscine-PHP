#!/usr/bin/php
<?php
	function epur_str($string)
	{
		$trimmed = trim($string);
		$string = preg_split('/\s+/', $trimmed);
		echo (implode(" ", $string));
		echo("\n");
	}

	if ($argc == 2)	
		epur_str($argv[1]);
?>
