<?php
	function ft_split($string)
	{
		$data = preg_split('/\s+/', $string);
		sort($data);
		return ($data);
	}
?>
