<?php
	function ft_is_sort($array)
	{
		$count_arr = count($array);
		if ($count_arr == 1)
			return (TRUE);
		$copy_arr = $array;
		sort($copy_arr);
		if (array_diff_assoc($copy_arr, $array) != NULL)
			return (FAlSE);
		else
			return (TRUE);
	}
?>
