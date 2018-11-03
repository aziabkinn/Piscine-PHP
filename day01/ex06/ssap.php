#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$arr = explode(" ", $argv[1]);
		$i = 1;
		while (++$i < $argc)
			$arr = array_merge($arr, explode(" ", $argv[$i]));
		sort($arr);
		$count_arr = count($arr);
		$i = -1;
		while (++$i < $count_arr)
			echo("$arr[$i]\n");
	}
?>
