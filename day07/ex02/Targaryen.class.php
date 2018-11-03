<?php
	class Targaryen
	{
	  	public function resistsFire() {
			return FALSE;
		}

	  	public function getBurned() {
	  		if ($this->resistsFire() === FALSE) {
	  			return ("burns alive");
	  		}
	  		else {
	  			return ("emerges naked but unharmed");
	  		}
	  	}
	}  
?>
