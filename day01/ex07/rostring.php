#!/usr/bin/php
<?php
	function epur_str($string)
	{
		$trimmed = trim($string);
		$string = preg_split('/\s+/', $trimmed);
		return ($string);
	}

	function rostring($string)
	{
		$arr = epur_str($string);
		$len = count($arr);
		if ($len > 1)
		{
			$i = 0;
			while (++$i < $len)
	  			print($arr[$i] .= " ");
			echo($arr[0]);
		}
		if ($len == 1)
			echo($arr[0]);
		echo("\n");
	}

	if ($argc >= 2)
		rostring($argv[1]);
?>
