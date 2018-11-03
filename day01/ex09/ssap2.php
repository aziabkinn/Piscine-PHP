#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		function ft_ssap($str1, $str2)
		{
			$char_str = "abcdefghijklmnopqrstuvwxyz0123456789 !\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
			$str1 = strtolower($str1);
			$str2 = strtolower($str2);
			$i = 0;
			while ($str1[$i] && $str2[$i])
			{
				$index1 = strpos($char_str, $str1[$i]);
				$index2 = strpos($char_str, $str2[$i]);
				if ($index1 < $index2)
					return (true);
				else if ($index1 > $index2)
					return (false);
				$i++;
			}
			if (!$str1[$i])
				return (true);
			else
				return (false);
		}
		$arr = explode(" ", $argv[1]);
		$i = 1;
		while (++$i < $argc)
			$arr = array_merge($arr, explode(" ", $argv[$i]));
		$count_arr = count($arr);
		$j = -1;
		while (++$j < $count_arr)
		{
			$i = -1;
			while (++$i + 1 < $count_arr)
			{
				if (!ft_ssap($arr[$i], $arr[$i + 1]))
				{
					$tmp_arr = $arr[$i];
					$arr[$i] = $arr[$i + 1];
					$arr[$i + 1] = $tmp_arr;
				}
			}
		}
		$i = -1;
			while (++$i < $count_arr)
				echo("$arr[$i]\n");
	}
?>
