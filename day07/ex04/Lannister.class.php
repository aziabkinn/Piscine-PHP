<?php
	class Lannister {
		function sleepWith($who){
			if (get_parent_class($who) == "Lannister") {
				if (get_class($who) == "Cersei" && get_class($this) == "Jaime")
					echo ("With pleasure, but only in a tower in Winterfell, then.\n");
				else
					echo ("Not even if I'm drunk !\n");
			}
			else
				echo ("Let's do this.\n");
		}
	}
?>
