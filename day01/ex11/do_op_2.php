#!/usr/bin/php
<?php
	if ($argc == 2)
	{
		$str = trim($argv[1]);
		$num1 = intval($str);
		$tmp = substr($str, strlen($num1));
		$tmp = trim($tmp); 
		$tmp1 = str_split($tmp);
		if ($tmp1[0] == '-' || $tmp1[0] == '+' || $tmp1[0] == '*' || $tmp1[0] == '/' || $tmp1[0] == '%')
			$sign = $tmp1[0]; 
		else
		{
			echo("Syntax Error\n");
			exit(0);
		}
		$tmp = substr($tmp, 1);
		$tmp = trim($tmp);
		$num2 = intval($tmp);
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