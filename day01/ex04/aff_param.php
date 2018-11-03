#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$count_argv = count($argv);
		$i = 0;
		while (++$i < $count_argv)
			echo("$argv[$i]\n");
	}
?>