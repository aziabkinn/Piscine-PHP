#!/usr/bin/php
<?php
	if ($argc == 4)
	{
		$sign = trim($argv[2], " /t");
		$num1 = trim($argv[1], " /t");
		$num2 = trim($argv[3], " /t");
		if ($sign == "+")
			echo($num1 + $num2);
		else if ($sign == "-")
			echo($num1 - $num2);
		else if ($sign == "*")
			echo($num1 * $num2);
		else if ($sign == "/")
			echo($num1 / $num2);
		else if ($sign == "%")
			echo($num1 % $num2);
	}
	else
		echo("Incorrect Parameters");
	echo("\n");
?>
