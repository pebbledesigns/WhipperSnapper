<?php
/*----------------------
This is the class that gets the banner 
for the respective page
------------------------*/

class banner {
	
	public $test;

	function __construct($test) {
		$this->test = $test;
	}

	// function setBanner($test) {
	//  	return $this->test = $sectionTitle;
	// }

	function getBanner() {
		return $this->test;
		//echo 'sad';
	}

	
}
