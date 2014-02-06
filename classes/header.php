<?php
/*----------------------
This is the class that gets the banner 
for the respective page
------------------------*/

class header {
	
	public $sectionName;	
	public $sectionBGIMAGE;
	public $sectionICON;
	public $sectionIMAGE;
	public $sectionTEXT;
	public $sectionHEX;

	 function __construct($sectionName) {
	  	$sql = DB::getInstance()->query("select * from sections where sections_NAME = '$sectionName' LIMIT 1");
	  	
	  	if ($sql->count()) {
	  		foreach ($sql->results() as $section) {
			 	$this->sectionBGIMAGE 	= $section->sections_BGIMAGE;
			 	$this->sectionICON 		= $section->sections_ICON;
			 	$this->sectionNAME 		= $section->sections_NAME;
			 	$this->sectionIMAGE 	= $section->sections_IMAGE;
			 	$this->sectionTEXT 		= $section->sections_TEXT;
			 	$this->sectionHEX 		= $section->sections_HEX;
			}
	  	} else {
	  		return false;
	  	}	  	
	 }
	
}
