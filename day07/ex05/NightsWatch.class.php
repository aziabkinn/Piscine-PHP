<?php
	class NightsWatch implements iFighter {
		private $fighter = array(); 

		function recruit($who) {
			if ($who instanceof iFighter)
				$this->fighter[] = $who;
		}
	
		function fight(){
			foreach ($this->fighter as $f)
				$f->fight();
		}
	}
?>
