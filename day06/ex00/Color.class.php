<?php
	class Color
	{
		public $red;
		public $green;
		public $blue;
		static $verbose = false;
		public function __construct($array)
		{
			if (isset($array['red']) && isset($array['green']) && isset($array['blue'])) {
				$this->red = intval($array['red']);
				$this->green = intval($array['green']);
				$this->blue = intval($array['blue']);
			}
			else if (isset($array['rgb'])) {
				$rgb = intval($array["rgb"]);
				$this->red = $rgb / 65281 % 256;
				$this->green = $rgb / 256 % 256;
				$this->blue = $rgb % 256;
			}
			if (Self::$verbose)
				printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		}
		function __destruct()
		{
			if (Self::$verbose)
				printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		}
		public function add($Color)
		{
			return (new Color(array('red' => $this->red + $Color->red, 'green' => $this->green + $Color->green, 'blue' => $this->blue + $Color->blue)));
		}
		public function sub($Color)
		{
			return (new Color(array('red' => $this->red - $Color->red, 'green' => $this->green - $Color->green, 'blue' => $this->blue - $Color->blue)));
		}
		public function mult($mult)
		{
			return (new Color(array('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult)));
		}
		function __toString()
		{
			return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
		}
		public static function doc()
		{
			$read = fopen("Color.doc.txt", 'r');
			while ($read && !feof($read))
				echo fgets($read);
		}
	}
?>
